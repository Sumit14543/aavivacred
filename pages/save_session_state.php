<?php
/**
 * AavivaCred - Save Session State AJAX endpoint
 */
declare(strict_types=1);
session_start();
header('Content-Type: application/json');

$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (is_array($data)) {
    if (!isset($_SESSION['lead_values']) || !is_array($_SESSION['lead_values'])) {
        $_SESSION['lead_values'] = [];
    }
    
    $allowedKeys = [
        'name', 'email', 'mobile', 'category', 'city', 'loan_amount',
        'employment_type', 'monthly_income', 'pan_number', 'udyam_number', 'gst_number',
        'business_name', 'legal_owner_name', 'business_nature', 'gst_turnover',
        'aadhaar_number', 'ifsc_code', 'bank_name', 'account_number', 'message'
    ];

    foreach ($data as $key => $val) {
        if (in_array($key, $allowedKeys, true)) {
            $_SESSION['lead_values'][$key] = trim((string)$val);
        }
    }
    
    // Also save mobile and email targets specifically
    if (!empty($_SESSION['lead_values']['email'])) {
        $_SESSION['email_otp_target'] = $_SESSION['lead_values']['email'];
    }
    if (!empty($_SESSION['lead_values']['name'])) {
        $_SESSION['pan_name'] = $_SESSION['lead_values']['name'];
    }
    if (!empty($_SESSION['lead_values']['aadhaar_number'])) {
        $_SESSION['last_aadhaar_num'] = $_SESSION['lead_values']['aadhaar_number'];
    }

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data payload']);
}
