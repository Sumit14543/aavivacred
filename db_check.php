<?php
/**
 * AavivaCred - Database Diagnostics & Mock Insertion Utility
 * Access via: http://yourdomain.com/db_check.php?secret=check321
 */

if (($_GET['secret'] ?? '') !== 'check321') {
    die('Forbidden');
}

require_once __DIR__ . '/config/config.php';

// Register autoloader
spl_autoload_register(function ($class) {
    $prefix = 'AavivaCred\\';
    $base_dir = __DIR__ . '/src/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require_once $file;
});

echo "<h3 style='font-family: sans-serif; color: #0f172a;'>Database Diagnostics & Lead Insertion</h3>";

try {
    $db = \AavivaCred\Core\Database::getInstance();
    $pdo = $db->getPdo();
    
    if ($pdo) {
        echo "<p style='color:green; font-family: sans-serif; font-weight: bold;'>✔ Database connected successfully!</p>";
        
        // Describe leads table to show current columns
        $stmt = $pdo->query("DESCRIBE `leads`");
        $cols = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<h4 style='font-family: sans-serif;'>Leads Table Columns:</h4>";
        echo "<ul style='font-family: monospace; font-size: 13px;'>";
        foreach ($cols as $col) {
            echo "<li><strong>" . htmlspecialchars($col['Field']) . "</strong> - " . htmlspecialchars($col['Type']) . "</li>";
        }
        echo "</ul>";
        
        // Create a permanent test lead with full KYC details
        $leadId = 'AVV-CONFIRM-' . rand(1000, 9999);
        
        $stmt = $pdo->prepare("INSERT INTO `leads`
            (`lead_id`, `name`, `email`, `mobile`, `category`, `city`, `loan_amount`, `employment_type`, `monthly_income`, `pan_number`, `gst_number`, `aadhaar_number`, `ifsc_code`, `bank_name`, `account_number`, `message`, `status`, `assigned_to`, `created_at`)
            VALUES
            (:lead_id, :name, :email, :mobile, :category, :city, :loan_amount, :employment_type, :monthly_income, :pan_number, :gst_number, :aadhaar_number, :ifsc_code, :bank_name, :account_number, :message, :status, :assigned_to, NOW())");
            
        $stmt->execute([
            ':lead_id'         => $leadId,
            ':name'            => 'TEST SUMIT KUMAR (CONFIRM)',
            ':email'           => 'sumitlodhi9401@gmail.com',
            ':mobile'          => '9138170000',
            ':category'        => 'payday',
            ':city'            => 'Bulandshahr',
            ':loan_amount'     => 150000.00,
            ':employment_type' => 'Salaried',
            ':monthly_income'  => 45000.00,
            ':pan_number'      => 'ABCDE1234F',
            ':gst_number'      => '09ABCDE1234F1Z5',
            ':aadhaar_number'  => '50XXXXXX16',
            ':ifsc_code'       => 'HDFC0001234',
            ':bank_name'       => 'HDFC BANK (BULANDSHAHR)',
            ':account_number'  => '50100012345678',
            ':message'         => 'Automated verification test lead to confirm DB mapping works.',
            ':status'          => 'New',
            ':assigned_to'     => ''
        ]);
        
        echo "<div style='background-color: #ecfdf5; border: 1px solid #10b981; padding: 15px; border-radius: 8px; font-family: sans-serif; margin-top: 20px;'>";
        echo "<h4 style='color: #065f46; margin-top: 0;'>✔ Permanent Test Lead Pushed Successfully!</h4>";
        echo "<p style='color: #047857; margin-bottom: 0;'>A real lead with Lead ID <strong>$leadId</strong> has been written to the database. You can now verify it in your phpMyAdmin or Admin Dashboard!</p>";
        echo "</div>";
        
    } else {
        echo "<p style='color:red; font-family: sans-serif;'>✘ Connection returned null! Check .env credentials.</p>";
    }
} catch (Exception $e) {
    echo "<p style='color:red; font-family: sans-serif; font-weight: bold;'>✘ Database Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}
