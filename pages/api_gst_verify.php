<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/config.php';

// Get JSON input or POST/GET param
$raw_input = file_get_contents('php://input');
$json_data = json_decode($raw_input, true);

$gst = '';
if (isset($json_data['gst_number'])) {
    $gst = strtoupper(trim($json_data['gst_number']));
} elseif (isset($_POST['gst_number'])) {
    $gst = strtoupper(trim($_POST['gst_number']));
} elseif (isset($_GET['gst'])) {
    $gst = strtoupper(trim($_GET['gst']));
}

$gst = preg_replace('/[^A-Z0-9]/', '', $gst);

if (strlen($gst) !== 15) {
    echo json_encode([
        'error' => true,
        'message' => 'Invalid GST number format. GST number must be exactly 15 characters long.'
    ]);
    exit;
}

// Get Bifrost Token from ENV
$token = getenv('BIFROST_API_TOKEN');
if (!$token && isset($_ENV['BIFROST_API_TOKEN'])) {
    $token = $_ENV['BIFROST_API_TOKEN'];
}

if (!$token) {
    echo json_encode([
        'error' => true,
        'message' => 'BIFROST_API_TOKEN is missing in .env file.'
    ]);
    exit;
}

$apiUrl = 'https://bifrost.unifers.ai/enrich/get-gst-info';
$payload = json_encode([
    'GST_Number' => $gst,
    'Concent' => 'Y',
    'Concent_Text' => 'We confirm and undertake that valid end-user consent has been obtained for fetching GST INFO using GST NUMBER, and that such consent remains active and unrevoked at the time of this request.'
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: ' . $token,
    'Content-Type: application/json'
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

if ($curlError) {
    echo json_encode([
        'error' => true,
        'message' => 'cURL Error connecting to Bifrost GST API: ' . $curlError
    ]);
    exit;
}

$resData = json_decode($response, true);

if (!$resData || (isset($resData['error']) && $resData['error'] === true) || !empty($resData['data']['errorMessage']) || empty($resData['data']['result'])) {
    $msg = $resData['data']['errorMessage'] ?? $resData['message'] ?? 'GST Verification Failed. Please verify the GST number.';
    echo json_encode([
        'error' => true,
        'message' => $msg,
        'raw_response' => $resData
    ]);
    exit;
}

// Format clean output response
$result = $resData['data']['result'] ?? [];

if (session_status() === PHP_SESSION_NONE) { session_start(); }
$_SESSION['lead_values']['gst_number'] = $gst;
$_SESSION['lead_values']['business_name'] = !empty($result['trade_name']) ? $result['trade_name'] : ($result['legal_name'] ?? '');
$_SESSION['lead_values']['legal_owner_name'] = $result['legal_name'] ?? '';
$_SESSION['lead_values']['business_nature'] = is_array($result['business_nature'] ?? null) ? implode(', ', $result['business_nature']) : ($result['business_nature'] ?? '');
$_SESSION['lead_values']['organization_type'] = $result['business_constitution'] ?? $result['constitution'] ?? '';
$_SESSION['lead_values']['gst_turnover'] = $result['aggre_turnover'] ?? '';
$_SESSION['lead_values']['business_address'] = $result['address'] ?? '';

echo json_encode([
    'error' => false,
    'message' => 'GST Verification Successful',
    'data' => [
        'gst_number' => $gst,
        'legal_name' => $result['legal_name'] ?? '',
        'trade_name' => $result['trade_name'] ?? '',
        'business_constitution' => $result['business_constitution'] ?? $result['constitution'] ?? '',
        'current_status' => $result['current_status'] ?? '',
        'registration_date' => $result['registration_date'] ?? '',
        'address' => $result['address'] ?? '',
        'tax_payer_type' => $result['tax_payer_type'] ?? '',
        'aggre_turnover' => $result['aggre_turnover'] ?? '',
        'aggre_turnover_fy' => $result['aggre_turnover_fy'] ?? '',
        'owners' => $result['owners'] ?? [],
        'business_nature' => $result['business_nature'] ?? [],
        'e_invoice' => $result['E-Invoice'] ?? '',
        'central_jurisdiction' => $result['central_jurisdiction'] ?? '',
        'state_jurisdiction' => $result['state_jurisdiction'] ?? ''
    ],
    'raw_response' => $resData
]);
