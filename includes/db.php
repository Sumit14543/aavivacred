<?php
/**
 * AavivaCred - Live MySQL Database & Lead Handler
 */

/**
 * Returns a PDO instance for MySQL connection
 */
function get_db_pdo() {
    static $pdo = null;
    if ($pdo === null && defined('DB_HOST') && defined('DB_NAME')) {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            error_log("MySQL PDO Error: " . $e->getMessage());
            $pdo = false;
        }
    }
    return $pdo;
}

/**
 * Initializes the backup JSON directory and file if they do not exist.
 */
function db_init() {
    $db_file = DB_PATH;
    $db_dir = dirname($db_file);
    
    if (!file_exists($db_dir)) {
        @mkdir($db_dir, 0777, true);
    }
    
    if (!file_exists($db_file)) {
        @file_put_contents($db_file, json_encode([], JSON_PRETTY_PRINT));
    }
}

/**
 * Saves a lead directly to MySQL database `leads` table and backup JSON file.
 * 
 * @param array $lead_data
 * @return bool Success status
 */
function db_save_lead($lead_data) {
    $lead_id = uniqid('AVV-', true);
    $lead_data['id'] = $lead_id;
    $lead_data['created_at'] = date('Y-m-d H:i:s');

    $mysql_saved = false;
    $pdo = get_db_pdo();

    if ($pdo) {
        try {
            // Ensure gst_number column exists in MySQL leads table
            try {
                $pdo->exec("ALTER TABLE `leads` ADD COLUMN `gst_number` VARCHAR(50) NULL AFTER `pan_number`");
            } catch (Exception $ex) {}

            $stmt = $pdo->prepare("INSERT INTO `leads` 
                (`lead_id`, `name`, `email`, `mobile`, `category`, `city`, `loan_amount`, `employment_type`, `monthly_income`, `pan_number`, `gst_number`, `aadhaar_number`, `ifsc_code`, `bank_name`, `account_number`, `message`, `created_at`) 
                VALUES 
                (:lead_id, :name, :email, :mobile, :category, :city, :loan_amount, :employment_type, :monthly_income, :pan_number, :gst_number, :aadhaar_number, :ifsc_code, :bank_name, :account_number, :message, :created_at)");

            $stmt->execute([
                ':lead_id'         => $lead_id,
                ':name'            => $lead_data['name'] ?? '',
                ':email'           => $lead_data['email'] ?? '',
                ':mobile'          => $lead_data['mobile'] ?? '',
                ':category'        => $lead_data['category'] ?? '',
                ':city'            => $lead_data['city'] ?? '',
                ':loan_amount'     => floatval($lead_data['loan_amount'] ?? 0),
                ':employment_type' => $lead_data['employment_type'] ?? '',
                ':monthly_income'  => floatval($lead_data['monthly_income'] ?? 0),
                ':pan_number'      => $_POST['pan_number'] ?? ($lead_data['pan_number'] ?? ''),
                ':gst_number'      => $_POST['gst_number'] ?? ($lead_data['gst_number'] ?? ''),
                ':aadhaar_number'  => $_POST['aadhaar_number'] ?? ($lead_data['aadhaar_number'] ?? ''),
                ':ifsc_code'       => $_POST['ifsc_code'] ?? ($lead_data['ifsc_code'] ?? ''),
                ':bank_name'       => $_POST['bank_name'] ?? ($lead_data['bank_name'] ?? ''),
                ':account_number'  => $_POST['account_number'] ?? ($lead_data['account_number'] ?? ''),
                ':message'         => $lead_data['message'] ?? '',
                ':created_at'      => $lead_data['created_at']
            ]);
            $mysql_saved = true;
        } catch (PDOException $e) {
            error_log("MySQL Lead Insert Exception: " . $e->getMessage());
        }
    }

    // Always backup to JSON
    db_init();
    $db_file = DB_PATH;
    $leads = db_get_all_leads();
    $leads[] = $lead_data;
    @file_put_contents($db_file, json_encode($leads, JSON_PRETTY_PRINT));

    return $mysql_saved || file_exists(DB_PATH);
}

/**
 * Retrieves all saved leads from MySQL or JSON fallback.
 * 
 * @return array
 */
function db_get_all_leads() {
    $pdo = get_db_pdo();
    if ($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM `leads` ORDER BY `id` DESC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("MySQL Lead Select Exception: " . $e->getMessage());
        }
    }

    db_init();
    $db_file = DB_PATH;
    $content = @file_get_contents($db_file);
    $leads = json_decode($content, true);
    return is_array($leads) ? $leads : [];
}
