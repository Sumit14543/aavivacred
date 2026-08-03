<?php
/**
 * AavivaCred - Enterprise Database Core (Singleton PDO Wrapper)
 */

namespace AavivaCred\Core;

use PDO;
use PDOException;

class Database {
    private static ?self $instance = null;
    private ?PDO $pdo = null;

    private function __construct() {
        $config = require dirname(__DIR__, 2) . '/config/app.php';
        $db = $config['db'];

        try {
            $dsn = sprintf(
                "mysql:host=%s;dbname=%s;charset=%s",
                $db['host'],
                $db['name'],
                $db['charset']
            );
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
            ];
            $this->pdo = new PDO($dsn, $db['user'], $db['pass'], $options);
            $this->ensureTablesExist();
        } catch (PDOException $e) {
            error_log("AavivaCred PDO Exception: " . $e->getMessage());
            $this->pdo = null;
        }
    }

    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPdo(): ?PDO {
        return $this->pdo;
    }

    public function isConnected(): bool {
        return $this->pdo !== null;
    }

    /**
     * Ensures necessary database tables exist upon startup.
     */
    private function ensureTablesExist(): void {
        if (!$this->pdo) return;

        try {
            // Leads Table
            $this->pdo->exec("CREATE TABLE IF NOT EXISTS `leads` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `lead_id` VARCHAR(64) UNIQUE NOT NULL,
                `name` VARCHAR(150) NOT NULL,
                `email` VARCHAR(150) NOT NULL,
                `mobile` VARCHAR(20) NOT NULL,
                `category` VARCHAR(50) NOT NULL,
                `city` VARCHAR(100) NOT NULL,
                `loan_amount` DECIMAL(15, 2) DEFAULT 0.00,
                `employment_type` VARCHAR(100) DEFAULT '',
                `monthly_income` DECIMAL(15, 2) DEFAULT 0.00,
                `pan_number` VARCHAR(20) DEFAULT '',
                `gst_number` VARCHAR(50) DEFAULT '',
                `aadhaar_number` VARCHAR(20) DEFAULT '',
                `ifsc_code` VARCHAR(20) DEFAULT '',
                `bank_name` VARCHAR(100) DEFAULT '',
                `account_number` VARCHAR(50) DEFAULT '',
                `message` TEXT DEFAULT NULL,
                `status` VARCHAR(30) DEFAULT 'New',
                `assigned_to` VARCHAR(150) DEFAULT '',
                `created_at` DATETIME NOT NULL,
                INDEX (`mobile`),
                INDEX (`email`),
                INDEX (`status`),
                INDEX (`created_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

            // Ensure assigned_to and new KYC columns exist if table existed prior
            try {
                $this->pdo->exec("ALTER TABLE `leads` ADD COLUMN `assigned_to` VARCHAR(150) DEFAULT ''");
            } catch (\PDOException $ex) {}
            try {
                $this->pdo->exec("ALTER TABLE `leads` ADD COLUMN `pan_number` VARCHAR(20) DEFAULT ''");
            } catch (\PDOException $ex) {}
            try {
                $this->pdo->exec("ALTER TABLE `leads` ADD COLUMN `gst_number` VARCHAR(50) DEFAULT ''");
            } catch (\PDOException $ex) {}
            try {
                $this->pdo->exec("ALTER TABLE `leads` ADD COLUMN `aadhaar_number` VARCHAR(20) DEFAULT ''");
            } catch (\PDOException $ex) {}
            try {
                $this->pdo->exec("ALTER TABLE `leads` ADD COLUMN `ifsc_code` VARCHAR(20) DEFAULT ''");
            } catch (\PDOException $ex) {}
            try {
                $this->pdo->exec("ALTER TABLE `leads` ADD COLUMN `bank_name` VARCHAR(100) DEFAULT ''");
            } catch (\PDOException $ex) {}
            try {
                $this->pdo->exec("ALTER TABLE `leads` ADD COLUMN `account_number` VARCHAR(50) DEFAULT ''");
            } catch (\PDOException $ex) {}

            // Blog Posts Table
            $this->pdo->exec("CREATE TABLE IF NOT EXISTS `blog_posts` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `slug` VARCHAR(200) UNIQUE NOT NULL,
                `title` VARCHAR(255) NOT NULL,
                `excerpt` TEXT NOT NULL,
                `content` LONGTEXT NOT NULL,
                `category` VARCHAR(100) DEFAULT 'Finance',
                `author` VARCHAR(100) DEFAULT 'AavivaCred Editorial Team',
                `image_url` VARCHAR(255) DEFAULT '',
                `read_time` INT DEFAULT 5,
                `status` VARCHAR(20) DEFAULT 'published',
                `created_at` DATETIME NOT NULL,
                INDEX (`slug`),
                INDEX (`category`),
                INDEX (`status`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

            // Admin Users Table
            $this->pdo->exec("CREATE TABLE IF NOT EXISTS `admin_users` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `username` VARCHAR(50) UNIQUE NOT NULL,
                `email` VARCHAR(150) UNIQUE NOT NULL,
                `password_hash` VARCHAR(255) NOT NULL,
                `role` VARCHAR(30) DEFAULT 'admin',
                `created_at` DATETIME NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

            // Create default admin user if empty
            $stmt = $this->pdo->query("SELECT COUNT(*) as cnt FROM `admin_users`");
            $count = $stmt->fetchColumn();
            if ($count == 0) {
                $hash = password_hash('Admin@AavivaCred2026', PASSWORD_BCRYPT);
                $stmtIns = $this->pdo->prepare("INSERT INTO `admin_users` (`username`, `email`, `password_hash`, `role`, `created_at`) VALUES ('admin', 'admin@aavivacred.com', :hash, 'super_admin', NOW())");
                $stmtIns->execute([':hash' => $hash]);
            }

        } catch (PDOException $e) {
            error_log("AavivaCred ensureTablesExist Error: " . $e->getMessage());
        }
    }
}
