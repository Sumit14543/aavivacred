<?php
session_start();
require_once __DIR__ . '/config/config.php';

$uniqueId = $_GET['uniqueId'] ?? '';
$state = $_GET['referenceId'] ?? $_GET['reference_id'] ?? $_GET['state'] ?? $_GET['last_aadhaar_ref'] ?? $_SESSION['last_aadhaar_ref'] ?? '';
$state = trim(str_replace([' ', '_'], '-', $state));
$mock = isset($_GET['mock']) && $_GET['mock'] === 'true';
$isLocal = ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1');

$mappedAadhaarNum = '';
if (!empty($uniqueId)) {
    $mappingFile = __DIR__ . '/data/aadhaar_mappings.json';
    if (file_exists($mappingFile)) {
        $mappings = json_decode(file_get_contents($mappingFile), true) ?: [];
        if (isset($mappings[$uniqueId])) {
            $state = $mappings[$uniqueId]['referenceId'];
            $mappedAadhaarNum = $mappings[$uniqueId]['aadhaar_number'];
            $_SESSION['last_aadhaar_num'] = $mappedAadhaarNum;
            $_SESSION['last_aadhaar_ref'] = $state;
        }
    }
}

// Debug Logging for cross-site parameters
$logDir = __DIR__ . '/data';
if (!file_exists($logDir)) {
    mkdir($logDir, 0777, true);
}
$debugData = [
    'date' => date('Y-m-d H:i:s'),
    'GET' => $_GET,
    'POST' => $_POST,
    'RAW_BODY' => file_get_contents('php://input'),
    'SESSION' => $_SESSION ?? [],
    'SERVER' => [
        'REQUEST_URI' => $_SERVER['REQUEST_URI'] ?? '',
        'HTTP_HOST' => $_SERVER['HTTP_HOST'] ?? '',
    ]
];
file_put_contents($logDir . '/callback_debug.log', json_encode($debugData) . "\n", FILE_APPEND);

$name = 'Rahul Sharma';
$aadhaarNum = $_SESSION['last_aadhaar_num'] ?? '123456789012';
$maskedAadhaar = 'XXXX XXXX ' . substr($aadhaarNum, -4);

if ($mock) {
    if (!$isLocal) {
        // Mock not allowed on production! Redirect back to Step 5 with error
        header('Location: ' . PATH_PREFIX . 'apply?step=5&error=mock_forbidden');
        exit;
    }
    $_SESSION['aadhaar_verified'] = true;
    $_SESSION['aadhaar_name'] = $name;
    $_SESSION['aadhaar_number_masked'] = $maskedAadhaar;
} else if (!empty($uniqueId) || !empty($state)) {
    // Reverse lookups if parameters are missing
    if (empty($uniqueId) && !empty($state)) {
        $mappingFile = __DIR__ . '/data/aadhaar_mappings.json';
        if (file_exists($mappingFile)) {
            $mappings = json_decode(file_get_contents($mappingFile), true) ?: [];
            foreach ($mappings as $uId => $mapInfo) {
                if (($mapInfo['referenceId'] ?? '') === $state) {
                    $uniqueId = $uId;
                    break;
                }
            }
        }
    }

    $token = getenv('BIFROST_API_TOKEN');
    if (!$token && isset($_ENV['BIFROST_API_TOKEN'])) {
        $token = $_ENV['BIFROST_API_TOKEN'];
    }

    $apiUrl = 'https://bifrost.unifers.ai/enrich/get-aadhaar-data';
    $payload = json_encode([
        'uniqueId' => $uniqueId
    ]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: ' . $token,
        'Content-Type: application/json'
    ]);

    $response = '';
    $httpCode = 0;
    $curlError = '';
    $resData = null;

    // Retry loop: try up to 4 times with 1.2s delay to allow Befisc backend syncing
    for ($attempt = 1; $attempt <= 4; $attempt++) {
        if ($attempt > 1) {
            usleep(1200000); // Sleep for 1.2 seconds
        }
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        
        if ($httpCode === 200) {
            $resData = json_decode($response, true);
            if ($resData && isset($resData['error']) && $resData['error'] === false && ($resData['data']['status'] ?? '') === 'SUCCESS' && !empty($resData['data']['aadhaar'])) {
                // Success! Found the verified result, break the retry loop!
                break;
            }
        }
    }
    curl_close($ch);

    // Log callback error or failure
    $isSuccess = ($httpCode === 200 && $resData && isset($resData['error']) && $resData['error'] === false && ($resData['data']['status'] ?? '') === 'SUCCESS' && !empty($resData['data']['aadhaar']));
    if (!$isSuccess) {
        $logDir = __DIR__ . '/data';
        if (!file_exists($logDir)) {
            mkdir($logDir, 0777, true);
        }
        $logMsg = date('[Y-m-d H:i:s] ') . "Aadhaar Callback Failure (Attempts: $attempt): HTTP $httpCode, cURL Err: $curlError, Response: $response\n";
        file_put_contents($logDir . '/aadhaar_error.log', $logMsg, FILE_APPEND);
    }

    if ($isSuccess) {
        $xmlStr = $resData['data']['aadhaar'];
        
        // Clean namespaces for easy SimpleXML parsing
        $xmlClean = preg_replace('/xmlns="[^"]+"/', '', $xmlStr);
        $xmlClean = preg_replace('/[a-zA-Z0-9]+:[a-zA-Z0-9]+="[^"]+"/', '', $xmlClean);
        
        $xml = simplexml_load_string($xmlClean);
        if ($xml) {
            $poi = $xml->CertificateData->KycRes->UidData->Poi ?? null;
            if ($poi && isset($poi['name'])) {
                $name = (string)$poi['name'];
            }
        }
        
        $_SESSION['aadhaar_verified'] = true;
        $_SESSION['aadhaar_name'] = $name;
        $_SESSION['aadhaar_number_masked'] = 'XXXX XXXX ' . substr($aadhaarNum, -4);
        $name = $_SESSION['aadhaar_name'];
        $maskedAadhaar = $_SESSION['aadhaar_number_masked'];
    } else {
        $errorMessage = 'Aadhaar verification could not be completed.';
        if ($curlError) {
            $errorMessage = 'cURL Connection Error: ' . $curlError;
        } else if ($resData && !empty($resData['message'])) {
            $errorMessage = 'API Error: ' . $resData['message'];
        } else if ($resData && isset($resData['data']['status'])) {
            $errorMessage = 'Verification Status: ' . $resData['data']['status'];
        } else {
            $errorMessage = 'HTTP Status: ' . $httpCode . ' | Response: ' . substr(htmlspecialchars($response), 0, 150);
        }
        $_SESSION['aadhaar_verified'] = false;
        $_SESSION['aadhaar_error'] = $errorMessage;
    }
} else {
    $_SESSION['aadhaar_verified'] = false;
    $_SESSION['aadhaar_error'] = 'No session state or reference received.';
}

$isVerified = isset($_SESSION['aadhaar_verified']) && $_SESSION['aadhaar_verified'];
$errorMsg = $_SESSION['aadhaar_error'] ?? 'Aadhaar verification failed.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aadhaar e-KYC Verification</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Plus Jakarta Sans', sans-serif; }
  </style>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-4">
  <div class="max-w-md w-full bg-slate-950 border-2 <?php echo $isVerified ? 'border-emerald-500/30' : 'border-rose-500/30'; ?> rounded-3xl p-6 sm:p-8 text-center space-y-6 shadow-2xl relative overflow-hidden">
    <div class="absolute -top-12 -right-12 w-24 h-24 <?php echo $isVerified ? 'bg-emerald-500/10' : 'bg-rose-500/10'; ?> rounded-full blur-2xl"></div>
    
    <?php if ($isVerified): ?>
      <div class="w-16 h-16 bg-emerald-500/10 border-2 border-emerald-500 rounded-2xl flex items-center justify-center mx-auto text-emerald-400 text-3xl animate-bounce">
        ✔
      </div>
      
      <div class="space-y-1">
        <h2 class="font-extrabold text-xl text-white uppercase tracking-wider">Aadhaar e-KYC Success</h2>
        <p class="text-xs text-slate-400 font-semibold">DigiLocker has verified your credentials securely.</p>
      </div>
      
      <div class="bg-white/5 border border-white/10 rounded-2xl p-4 text-left space-y-2.5">
        <div class="flex justify-between text-xs">
          <span class="text-slate-400 font-bold">Holder Name:</span>
          <span class="text-white font-black" id="holder-name"><?php echo htmlspecialchars($name); ?></span>
        </div>
        <div class="flex justify-between text-xs">
          <span class="text-slate-400 font-bold">Aadhaar Number:</span>
          <span class="text-white font-mono font-black"><?php echo htmlspecialchars($maskedAadhaar); ?></span>
        </div>
        <div class="flex justify-between text-xs">
          <span class="text-slate-400 font-bold">Verification:</span>
          <span class="text-emerald-400 font-black">✔ SUCCESSFUL</span>
        </div>
      </div>
      
      <p class="text-[10px] text-slate-400 font-bold">Redirecting you back to the application form...</p>
      
      <script>
        setTimeout(() => {
          const category = <?php echo json_encode($_SESSION['category'] ?? ''); ?>;
          const employment = <?php echo json_encode($_SESSION['employment'] ?? ''); ?>;
          const isBusinessSkipped = (category !== 'business' && category !== 'edi' && employment === 'Salaried');
          window.location.href = "apply?step=" + (isBusinessSkipped ? "7" : "6");
        }, 2000);
      </script>

    <?php else: ?>
      <div class="w-16 h-16 bg-rose-500/10 border-2 border-rose-500 rounded-2xl flex items-center justify-center mx-auto text-rose-400 text-3xl">
        ✘
      </div>
      
      <div class="space-y-1">
        <h2 class="font-extrabold text-xl text-white uppercase tracking-wider">Verification Failed</h2>
        <p class="text-xs text-slate-400 font-semibold">Aadhaar verification could not be completed.</p>
      </div>
      
      <div class="bg-white/5 border border-white/10 rounded-2xl p-4 text-left space-y-2.5">
        <div class="text-xs text-rose-400 font-semibold leading-relaxed text-center">
          <?php echo htmlspecialchars($errorMsg); ?>
        </div>
      </div>
      
      <button onclick="window.location.href='apply?step=5'" class="w-full py-3 bg-rose-600 hover:bg-rose-700 text-white text-xs font-black rounded-2xl transition shadow-lg">
        Try Again
      </button>
    <?php endif; ?>
  </div>
</body>
</html>
