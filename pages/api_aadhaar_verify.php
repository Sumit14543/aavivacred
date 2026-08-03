<?php
session_start();
require_once __DIR__ . '/../config/config.php';

$aadhaar = '';
if (isset($_GET['aadhaar'])) {
    $aadhaar = preg_replace('/[^0-9]/', '', $_GET['aadhaar']);
}

if (strlen($aadhaar) !== 12) {
    die("Error: Invalid Aadhaar number. Must be exactly 12 digits.");
}

// Generate unique reference ID
$refId = 'AVR-ADHR-' . strtoupper(substr(md5(uniqid()), 0, 10));
$_SESSION['last_aadhaar_ref'] = $refId;
$_SESSION['last_aadhaar_num'] = $aadhaar;

$token = getenv('BIFROST_API_TOKEN');
if (!$token && isset($_ENV['BIFROST_API_TOKEN'])) {
    $token = $_ENV['BIFROST_API_TOKEN'];
}

$apiUrl = 'https://bifrost.unifers.ai/enrich/get-aadhaar-verification';
$payload = json_encode([
    'referenceId' => $refId
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

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

// Log cURL errors or failures
if ($curlError || $httpCode !== 200) {
    $logDir = dirname(__DIR__) . '/data';
    if (!file_exists($logDir)) {
        mkdir($logDir, 0777, true);
    }
    $logMsg = date('[Y-m-d H:i:s] ') . "Aadhaar Request Error: HTTP $httpCode, cURL Err: $curlError, Response: $response\n";
    file_put_contents($logDir . '/aadhaar_error.log', $logMsg, FILE_APPEND);
}

$resData = json_decode($response, true);

$isLocal = ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1');

if ($httpCode === 200 && $resData && isset($resData['error']) && $resData['error'] === false && !empty($resData['data']['authorizationUrl'])) {
    $uniqueId = $resData['data']['uniqueId'] ?? '';
    if ($uniqueId) {
        $mappingFile = dirname(__DIR__) . '/data/aadhaar_mappings.json';
        $mappings = [];
        if (file_exists($mappingFile)) {
            $mappings = json_decode(file_get_contents($mappingFile), true) ?: [];
        }
        $mappings[$uniqueId] = [
            'referenceId' => $refId,
            'aadhaar_number' => $aadhaar,
            'created_at' => time()
        ];
        if (count($mappings) > 200) {
            $mappings = array_slice($mappings, -200, null, true);
        }
        file_put_contents($mappingFile, json_encode($mappings, JSON_PRETTY_PRINT));
    }
    // Redirect user to DigiLocker authorization URL
    header('Location: ' . $resData['data']['authorizationUrl']);
    exit;
} else {
    if ($isLocal) {
        // Redirect to local mock callback for testing form wizard flow seamlessly
        $mockCallbackUrl = PATH_PREFIX . 'api_aadhar_callback?mock=true&state=' . urlencode($refId);
        header('Location: ' . $mockCallbackUrl);
    } else {
        // API Failed or returned error. Redirect back to step 5 with error!
        header('Location: ' . PATH_PREFIX . 'apply?step=5&error=aadhaar_failed');
    }
    exit;
}
