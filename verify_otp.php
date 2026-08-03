<?php
declare(strict_types=1);
session_start();
header('Content-Type: application/json');

$raw_input = file_get_contents('php://input');
$json_data = json_decode($raw_input, true);

$otp = '';
if (isset($json_data['otp'])) {
    $otp = trim($json_data['otp']);
} elseif (isset($_POST['otp'])) {
    $otp = trim($_POST['otp']);
}

if (empty($otp) || strlen($otp) !== 6) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid verification code format.'
    ]);
    exit;
}

if (isset($_SESSION['email_otp']) && $_SESSION['email_otp'] === $otp) {
    echo json_encode([
        'success' => true,
        'message' => 'Verification successful.'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'The verification code you entered is incorrect. Please try again.'
    ]);
}
