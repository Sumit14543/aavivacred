<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$keys_to_clear = [
    'pan_verified', 'pan_number', 'pan_name', 'pan_masked_aadhaar',
    'aadhaar_verified', 'aadhaar_number', 'aadhaar_number_masked', 'aadhaar_name',
    'udyam_verified', 'udyam_data', 'gst_verified', 'gst_data',
    'email_verified', 'lead_values'
];

foreach ($keys_to_clear as $key) {
    unset($_SESSION[$key]);
}

header('Content-Type: application/json');
echo json_encode(['success' => true]);
