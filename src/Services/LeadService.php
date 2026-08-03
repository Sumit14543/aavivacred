<?php
/**
 * AavivaCred - Lead Service Layer
 * Enterprise Application Logic & Validation
 */

namespace AavivaCred\Services;

use AavivaCred\Repositories\LeadRepository;
use AavivaCred\Security\Security;

class LeadService {
    private LeadRepository $repo;

    public function __construct() {
        $this->repo = new LeadRepository();
    }

    public function processSubmission(array $postData): array {
        $errors = [];
        
        // Rate limiting check: max 5 form submissions per 10 mins per IP
        if (!Security::checkRateLimit('lead_submission', 10, 600)) {
            return [
                'success' => false,
                'errors' => ['global' => 'Too many requests. Please wait a few minutes before submitting again.']
            ];
        }

        // CSRF Verification if token is supplied
        if (isset($postData['_csrf_token']) && !Security::verifyCsrfToken($postData['_csrf_token'])) {
            return [
                'success' => false,
                'errors' => ['global' => 'Invalid or expired session security token. Please refresh and try again.']
            ];
        }

        $name            = Security::sanitize($postData['name'] ?? '');
        $email           = Security::sanitize($postData['email'] ?? '');
        $mobile          = Security::sanitize($postData['mobile'] ?? '');
        $category        = Security::sanitize($postData['category'] ?? '');
        $city            = Security::sanitize($postData['city'] ?? '');
        $loanAmountRaw   = Security::sanitize($postData['loan_amount'] ?? '');
        $employmentType  = Security::sanitize($postData['employment_type'] ?? '');
        $monthlyIncomeRaw= Security::sanitize($postData['monthly_income'] ?? '');
        $message         = Security::sanitize($postData['message'] ?? '');

        // Additional KYC & Verification fields
        $panNumber       = strtoupper(Security::sanitize($postData['pan_number'] ?? ''));
        $udyamNumber     = strtoupper(Security::sanitize($postData['udyam_number'] ?? ''));
        $gstNumber       = strtoupper(Security::sanitize($postData['gst_number'] ?? ''));
        $aadhaarNumber   = Security::sanitize($postData['aadhaar_number'] ?? '');
        $ifscCode        = strtoupper(Security::sanitize($postData['ifsc_code'] ?? ''));
        $bankName        = Security::sanitize($postData['bank_name'] ?? '');
        $accountNumber   = Security::sanitize($postData['account_number'] ?? '');

        // File Uploads Handling
        $docPanPath = '';
        $docAadhaarPath = '';
        $uploadDir = __DIR__ . '/../../uploads/documents/';
        if (!file_exists($uploadDir)) {
            @mkdir($uploadDir, 0777, true);
        }

        if (isset($_FILES['doc_pan']) && $_FILES['doc_pan']['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($_FILES['doc_pan']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'pdf'], true)) {
                $fileName = 'pan_' . time() . '_' . uniqid() . '.' . $ext;
                if (move_uploaded_file($_FILES['doc_pan']['tmp_name'], $uploadDir . $fileName)) {
                    $docPanPath = 'uploads/documents/' . $fileName;
                }
            }
        }

        if (isset($_FILES['doc_aadhaar']) && $_FILES['doc_aadhaar']['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($_FILES['doc_aadhaar']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'pdf'], true)) {
                $fileName = 'aadhaar_' . time() . '_' . uniqid() . '.' . $ext;
                if (move_uploaded_file($_FILES['doc_aadhaar']['tmp_name'], $uploadDir . $fileName)) {
                    $docAadhaarPath = 'uploads/documents/' . $fileName;
                }
            }
        }

        // Validation Rules
        if (empty($name) || strlen($name) < 2) {
            $errors['name'] = 'Please enter a valid full name.';
        }

        if (empty($mobile) || !preg_match('/^[6-9]\d{9}$/', $mobile)) {
            $errors['mobile'] = 'Please enter a valid 10-digit mobile number.';
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        }

        $loanAmount = floatval(preg_replace('/[^0-9.]/', '', $loanAmountRaw));
        if ($loanAmount <= 0) {
            $errors['loan_amount'] = 'Please enter a valid loan amount.';
        }

        $monthlyIncome = floatval(preg_replace('/[^0-9.]/', '', $monthlyIncomeRaw));

        if (!empty($errors)) {
            return ['success' => false, 'errors' => $errors];
        }

        $leadData = [
            'name'            => $name,
            'email'           => $email,
            'mobile'          => $mobile,
            'category'        => $category,
            'city'            => $city,
            'loan_amount'     => $loanAmount,
            'employment_type' => $employmentType,
            'monthly_income'  => $monthlyIncome,
            'pan_number'      => $panNumber,
            'udyam_number'    => $udyamNumber,
            'gst_number'      => $gstNumber,
            'aadhaar_number'  => $aadhaarNumber,
            'ifsc_code'       => $ifscCode,
            'bank_name'       => $bankName,
            'account_number'  => $accountNumber,
            'doc_pan'         => $docPanPath,
            'doc_aadhaar'     => $docAadhaarPath,
            'message'         => $message,
            'status'          => 'New',
            'assigned_to'     => '',
            'created_at'      => date('Y-m-d H:i:s')
        ];

        $saved = $this->repo->save($leadData);

        if ($saved) {
            return ['success' => true, 'errors' => [], 'data' => $leadData];
        }

        return ['success' => false, 'errors' => ['global' => 'Failed to save application. Please try again.']];
    }

    public function getLeads(string $search = '', string $category = '', string $status = '', string $assignedTo = ''): array {
        return $this->repo->getAll($search, $category, $status, $assignedTo);
    }

    public function updateLeadStatus(string $leadId, string $status): bool {
        return $this->repo->updateStatus($leadId, $status);
    }

    public function assignLeads(array $leadIds, string $assignedTo): bool {
        return $this->repo->assignLeads($leadIds, $assignedTo);
    }

    public function getDashboardStats(): array {
        return $this->repo->getStats();
    }
}
