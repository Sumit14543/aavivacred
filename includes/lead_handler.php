<?php
/**
 * AavivaCred - Direct Loan Application & Validation Handler Wrapper (B2C)
 * Enterprise Wrapper around LeadService
 */

require_once __DIR__ . '/../config/config.php';

// Ensure autoload
spl_autoload_register(function ($class) {
    $prefix = 'AavivaCred\\';
    $base_dir = __DIR__ . '/../src/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

class LeadHandler {
    private array $errors = [];
    private array $values = [
        'name'            => '',
        'email'           => '',
        'mobile'          => '',
        'category'        => '',
        'city'            => '',
        'loan_amount'     => '',
        'employment_type' => '',
        'monthly_income'  => '',
        'pan_number'      => '',
        'udyam_number'    => '',
        'gst_number'      => '',
        'aadhaar_number'  => '',
        'ifsc_code'       => '',
        'bank_name'       => '',
        'account_number'  => '',
        'message'         => ''
    ];
    private bool $submitted = false;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Restore values from session if saved before Aadhaar redirection
        if (isset($_SESSION['lead_values']) && is_array($_SESSION['lead_values'])) {
            foreach ($_SESSION['lead_values'] as $key => $val) {
                if (array_key_exists($key, $this->values)) {
                    $this->values[$key] = $val;
                }
            }
        }

        // Prefill from specific session states if empty
        if (empty($this->values['email']) && isset($_SESSION['email_otp_target'])) {
            $this->values['email'] = $_SESSION['email_otp_target'];
        }
        if (empty($this->values['name']) && isset($_SESSION['pan_name'])) {
            $this->values['name'] = $_SESSION['pan_name'];
        }
        if (empty($this->values['aadhaar_number']) && isset($_SESSION['last_aadhaar_num'])) {
            $this->values['aadhaar_number'] = $_SESSION['last_aadhaar_num'];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processPost();
        }
    }

    private function processPost(): void {
        foreach ($this->values as $key => $val) {
            $this->values[$key] = isset($_POST[$key]) ? trim($_POST[$key]) : '';
        }

        // Preserves form state in session on submission failures too
        $_SESSION['lead_values'] = $this->values;

        $service = new \AavivaCred\Services\LeadService();
        $result = $service->processSubmission($_POST);

        if ($result['success']) {
            $this->submitted = true;
            $this->errors = [];
            // Clear session values on successful insert
            unset($_SESSION['lead_values']);
            unset($_SESSION['email_otp']);
            unset($_SESSION['email_otp_target']);
            unset($_SESSION['pan_verified']);
            unset($_SESSION['pan_name']);
            unset($_SESSION['pan_masked_aadhaar']);
            unset($_SESSION['aadhaar_verified']);
            unset($_SESSION['aadhaar_name']);
            unset($_SESSION['aadhaar_number_masked']);
            unset($_SESSION['last_aadhaar_ref']);
            unset($_SESSION['last_aadhaar_num']);
            unset($_SESSION['udyam_verified']);
            unset($_SESSION['udyam_data']);
            unset($_SESSION['gst_verified']);
            unset($_SESSION['gst_data']);
        } else {
            $this->submitted = false;
            $this->errors = $result['errors'];

            // Log submission errors for telemetry and debugging
            $logDir = __DIR__ . '/../data';
            if (!file_exists($logDir)) {
                mkdir($logDir, 0777, true);
            }
            $logMsg = date('[Y-m-d H:i:s] ') . "Form Submission Failed: " . json_encode($result['errors']) . " | POST: " . json_encode($_POST) . "\n";
            file_put_contents($logDir . '/submission_error.log', $logMsg, FILE_APPEND);
        }
    }

    public function getErrors(): array {
        return $this->errors;
    }

    public function getValues(): array {
        return $this->values;
    }

    public function isSubmitted(): bool {
        return $this->submitted;
    }
}
