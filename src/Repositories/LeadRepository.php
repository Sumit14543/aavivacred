<?php
/**
 * AavivaCred - Lead Repository
 * Enterprise Repository Pattern
 */

namespace AavivaCred\Repositories;

use AavivaCred\Core\Database;
use PDO;
use Exception;

class LeadRepository {
    private ?PDO $pdo;
    private string $jsonPath;

    public function __construct() {
        $this->pdo = Database::getInstance()->getPdo();
        $config = require dirname(__DIR__, 2) . '/config/app.php';
        $this->jsonPath = $config['db']['json_path'];
    }

    public function save(array $data): bool {
        $leadId = !empty($data['lead_id']) ? $data['lead_id'] : 'AVV-' . strtoupper(uniqid());
        $data['lead_id'] = $leadId;
        if (empty($data['created_at'])) {
            $data['created_at'] = date('Y-m-d H:i:s');
        }

        $mysqlSaved = false;

        if ($this->pdo) {
            try {
                $this->ensureColumnsExist();

                $stmt = $this->pdo->prepare("INSERT INTO `leads`
                    (`lead_id`, `name`, `email`, `mobile`, `category`, `city`, `loan_amount`, `employment_type`, `monthly_income`, `pan_number`, `udyam_number`, `gst_number`, `business_name`, `legal_owner_name`, `business_nature`, `organization_type`, `gst_turnover`, `business_address`, `aadhaar_number`, `ifsc_code`, `bank_name`, `account_number`, `message`, `status`, `assigned_to`, `created_at`)
                    VALUES
                    (:lead_id, :name, :email, :mobile, :category, :city, :loan_amount, :employment_type, :monthly_income, :pan_number, :udyam_number, :gst_number, :business_name, :legal_owner_name, :business_nature, :organization_type, :gst_turnover, :business_address, :aadhaar_number, :ifsc_code, :bank_name, :account_number, :message, :status, :assigned_to, :created_at)");

                $stmt->execute([
                    ':lead_id'         => $leadId,
                    ':name'            => $data['name'] ?? '',
                    ':email'           => $data['email'] ?? '',
                    ':mobile'          => $data['mobile'] ?? '',
                    ':category'        => $data['category'] ?? '',
                    ':city'            => $data['city'] ?? '',
                    ':loan_amount'     => floatval($data['loan_amount'] ?? 0),
                    ':employment_type' => $data['employment_type'] ?? '',
                    ':monthly_income'  => floatval($data['monthly_income'] ?? 0),
                    ':pan_number'      => $data['pan_number'] ?? '',
                    ':udyam_number'    => $data['udyam_number'] ?? '',
                    ':gst_number'      => $data['gst_number'] ?? '',
                    ':business_name'   => $data['business_name'] ?? '',
                    ':legal_owner_name'=> $data['legal_owner_name'] ?? '',
                    ':business_nature' => $data['business_nature'] ?? '',
                    ':organization_type'=> $data['organization_type'] ?? '',
                    ':gst_turnover'    => $data['gst_turnover'] ?? '',
                    ':business_address'=> $data['business_address'] ?? '',
                    ':aadhaar_number'  => $data['aadhaar_number'] ?? '',
                    ':ifsc_code'       => $data['ifsc_code'] ?? '',
                    ':bank_name'       => $data['bank_name'] ?? '',
                    ':account_number'  => $data['account_number'] ?? '',
                    ':message'         => $data['message'] ?? '',
                    ':status'          => $data['status'] ?? 'New',
                    ':assigned_to'     => $data['assigned_to'] ?? '',
                    ':created_at'      => $data['created_at']
                ]);
                $mysqlSaved = true;
            } catch (Exception $e) {
                error_log("LeadRepository MySQL Insert Error: " . $e->getMessage());
            }
        }

        // Backup in JSON file
        $this->backupToJson($data);

        return $mysqlSaved || file_exists($this->jsonPath);
    }

    public function getAll(string $search = '', string $category = '', string $status = '', string $assignedTo = ''): array {
        if ($this->pdo) {
            try {
                $sql = "SELECT * FROM `leads` WHERE 1=1";
                $params = [];

                if (!empty($search)) {
                    $sql .= " AND (name LIKE :search OR email LIKE :search OR mobile LIKE :search OR lead_id LIKE :search OR assigned_to LIKE :search)";
                    $params[':search'] = '%' . $search . '%';
                }

                if (!empty($category)) {
                    $sql .= " AND category = :category";
                    $params[':category'] = $category;
                }

                if (!empty($status)) {
                    $sql .= " AND status = :status";
                    $params[':status'] = $status;
                }

                if ($assignedTo === 'unassigned') {
                    $sql .= " AND (assigned_to IS NULL OR assigned_to = '')";
                } elseif (!empty($assignedTo)) {
                    $sql .= " AND assigned_to = :assigned_to";
                    $params[':assigned_to'] = $assignedTo;
                }

                $sql .= " ORDER BY id DESC";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($params);
                return $stmt->fetchAll();
            } catch (Exception $e) {
                error_log("LeadRepository getAll MySQL Error: " . $e->getMessage());
            }
        }

        // JSON Fallback
        return $this->getFromJson();
    }

    public function updateStatus(string $leadId, string $status): bool {
        if ($this->pdo) {
            try {
                $stmt = $this->pdo->prepare("UPDATE `leads` SET `status` = :status WHERE `lead_id` = :lead_id OR `id` = :id");
                return $stmt->execute([':status' => $status, ':lead_id' => $leadId, ':id' => $leadId]);
            } catch (Exception $e) {
                error_log("LeadRepository Update Error: " . $e->getMessage());
            }
        }
        return false;
    }

    public function assignLeads(array $leadIds, string $assignedTo): bool {
        if (empty($leadIds) || !$this->pdo) return false;
        try {
            $inClause = implode(',', array_fill(0, count($leadIds), '?'));
            $sql = "UPDATE `leads` SET `assigned_to` = ? WHERE `lead_id` IN ($inClause) OR `id` IN ($inClause)";
            $stmt = $this->pdo->prepare($sql);
            $params = array_merge([$assignedTo], $leadIds, $leadIds);
            return $stmt->execute($params);
        } catch (Exception $e) {
            error_log("LeadRepository Assign Leads Error: " . $e->getMessage());
            return false;
        }
    }

    public function getStats(): array {
        $stats = ['total' => 0, 'new' => 0, 'in_review' => 0, 'approved' => 0, 'rejected' => 0, 'total_amount' => 0];

        if ($this->pdo) {
            try {
                $stmt = $this->pdo->query("SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN status = 'New' OR status = '' THEN 1 ELSE 0 END) as new_count,
                    SUM(CASE WHEN status = 'In Review' THEN 1 ELSE 0 END) as in_review,
                    SUM(CASE WHEN status = 'Approved' THEN 1 ELSE 0 END) as approved,
                    SUM(CASE WHEN status = 'Rejected' THEN 1 ELSE 0 END) as rejected,
                    SUM(loan_amount) as total_amount
                    FROM `leads`");
                $row = $stmt->fetch();
                if ($row) {
                    $stats['total'] = (int)($row['total'] ?? 0);
                    $stats['new'] = (int)($row['new_count'] ?? 0);
                    $stats['in_review'] = (int)($row['in_review'] ?? 0);
                    $stats['approved'] = (int)($row['approved'] ?? 0);
                    $stats['rejected'] = (int)($row['rejected'] ?? 0);
                    $stats['total_amount'] = (float)($row['total_amount'] ?? 0);
                }
                return $stats;
            } catch (Exception $e) {
                error_log("LeadRepository Stats Error: " . $e->getMessage());
            }
        }

        $all = $this->getFromJson();
        $stats['total'] = count($all);
        foreach ($all as $lead) {
            $stats['total_amount'] += floatval($lead['loan_amount'] ?? 0);
            $st = strtolower($lead['status'] ?? 'new');
            if ($st === 'approved') $stats['approved']++;
            elseif ($st === 'in review') $stats['in_review']++;
            elseif ($st === 'rejected') $stats['rejected']++;
            else $stats['new']++;
        }
        return $stats;
    }

    private function ensureColumnsExist(): void {
        if (!$this->pdo) return;
        try {
            $colsNeeded = [
                'udyam_number'     => "VARCHAR(50) DEFAULT '' AFTER pan_number",
                'business_name'    => "VARCHAR(255) DEFAULT '' AFTER gst_number",
                'legal_owner_name' => "VARCHAR(255) DEFAULT '' AFTER business_name",
                'business_nature'  => "VARCHAR(255) DEFAULT '' AFTER legal_owner_name",
                'organization_type'=> "VARCHAR(100) DEFAULT '' AFTER business_nature",
                'gst_turnover'     => "VARCHAR(100) DEFAULT '' AFTER organization_type",
                'business_address' => "TEXT DEFAULT NULL AFTER gst_turnover"
            ];
            
            $existingCols = [];
            $stmt = $this->pdo->query("SHOW COLUMNS FROM `leads`");
            if ($stmt) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $existingCols[] = strtolower($row['Field']);
                }
            }
            
            foreach ($colsNeeded as $col => $sql) {
                if (!in_array(strtolower($col), $existingCols, true)) {
                    $this->pdo->exec("ALTER TABLE `leads` ADD COLUMN `$col` $sql");
                }
            }
        } catch (Exception $e) {
            error_log("LeadRepository ensureColumnsExist Error: " . $e->getMessage());
        }
    }

    private function backupToJson(array $data): void {
        $dir = dirname($this->jsonPath);
        if (!file_exists($dir)) {
            @mkdir($dir, 0777, true);
        }
        $leads = $this->getFromJson();
        $leads[] = $data;
        @file_put_contents($this->jsonPath, json_encode($leads, JSON_PRETTY_PRINT));
    }

    private function getFromJson(): array {
        if (!file_exists($this->jsonPath)) return [];
        $content = @file_get_contents($this->jsonPath);
        $decoded = json_decode($content, true);
        return is_array($decoded) ? array_reverse($decoded) : [];
    }
}
