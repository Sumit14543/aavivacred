<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/config.php';

// Get JSON input or POST/GET param
$raw_input = file_get_contents('php://input');
$json_data = json_decode($raw_input, true);

$pan = '';
if (isset($json_data['pan_number'])) {
    $pan = strtoupper(trim($json_data['pan_number']));
} elseif (isset($_POST['pan_number'])) {
    $pan = strtoupper(trim($_POST['pan_number']));
} elseif (isset($_GET['pan'])) {
    $pan = strtoupper(trim($_GET['pan']));
}

if (!preg_match('/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', $pan)) {
    echo json_encode([
        'error' => true,
        'message' => 'Invalid PAN format. Please enter a valid 10-character PAN number.'
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

$apiUrl = 'https://bifrost.unifers.ai/enrich/pan/v4';
$payload = json_encode([
    'PAN_Number' => $pan,
    'Concent' => 'Y',
    'Concent_Text' => 'We confirm and undertake that valid end-user consent has been obtained for fetching PAN DETAILS using PAN NUMBER, and that such consent remains active and unrevoked at the time of this request.'
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
        'message' => 'cURL error: ' . $curlError
    ]);
    exit;
}

$data = json_decode($response, true);

if ($data && !empty($data['data']['result'])) {
    $res = $data['data']['result'];
    
    $fullName = $res['full_name'] ?? '';
    $firstName = $res['name']['first_name'] ?? '';
    $middleName = $res['name']['middle_name'] ?? '';
    $lastName = $res['name']['last_name'] ?? '';
    
    // Extract Father Name ONLY if explicitly returned by API
    $fatherName = '';
    if (!empty($res['father_name'])) {
        $fatherName = trim($res['father_name']);
    } elseif (!empty($res['fatherName'])) {
        $fatherName = trim($res['fatherName']);
    } elseif (!empty($res['father_full_name'])) {
        $fatherName = trim($res['father_full_name']);
    } elseif (!empty($res['name']['father_name'])) {
        $fatherName = trim($res['name']['father_name']);
    } else {
        $fatherName = 'NOT SPECIFIED IN API';
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['pan_verified'] = true;
    $_SESSION['pan_name'] = $fullName;
    $_SESSION['pan_masked_aadhaar'] = $res['masked_aadhaar'] ?? '';
    
    if (!isset($_SESSION['lead_values']) || !is_array($_SESSION['lead_values'])) {
        $_SESSION['lead_values'] = [];
    }
    $_SESSION['lead_values']['pan_number'] = $pan;
    if (!empty($fullName)) {
        $_SESSION['lead_values']['name'] = $fullName;
    }
    if (!empty($res['masked_aadhaar']) && empty($_SESSION['lead_values']['aadhaar_number'])) {
        $_SESSION['lead_values']['aadhaar_number'] = $res['masked_aadhaar'];
    }

    echo json_encode([
        'error' => false,
        'http_code' => $httpCode,
        'data' => [
            'full_name' => $fullName,
            'pan' => $res['pan'] ?? $pan,
            'father_name' => $fatherName,
            'dob' => $res['dob'] ?? '',
            'gender' => $res['gender'] ?? '',
            'type_of_holder' => $res['type_of_holder'] ?? 'Individual',
            'aadhaar_seeding_status' => $res['aadhaar_seeding_status'] ?? false,
            'masked_aadhaar' => $res['masked_aadhaar'] ?? '',
            'masked_email' => $res['masked_email'] ?? '',
            'masked_mobile' => $res['masked_mobile'] ?? '',
            'address' => $res['address'] ?? []
        ],
        'raw_response' => $data
    ]);
} else {
    echo json_encode([
        'error' => true,
        'message' => $data['data']['message'] ?? ($data['message'] ?? 'Unable to fetch PAN details from Bifrost NSDL API'),
        'raw_response' => $data
    ]);
}
