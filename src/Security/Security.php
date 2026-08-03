<?php
/**
 * AavivaCred - Security Layer
 * Enterprise Security: CSRF, XSS, Rate Limiting, HTTP Headers
 */

namespace AavivaCred\Security;

class Security {

    public static function initSession(): void {
        if (session_status() === PHP_SESSION_NONE) {
            ini_set('session.cookie_httponly', '1');
            ini_set('session.use_only_cookies', '1');
            ini_set('session.cookie_samesite', 'Lax');
            session_start();
        }
    }

    public static function setSecurityHeaders(): void {
        if (!headers_sent()) {
            header("X-Frame-Options: SAMEORIGIN");
            header("X-XSS-Protection: 1; mode=block");
            header("X-Content-Type-Options: nosniff");
            header("Referrer-Policy: strict-origin-when-cross-origin");
            header("Permissions-Policy: geolocation=(), microphone=(), camera=()");
        }
    }

    public static function generateCsrfToken(): string {
        self::initSession();
        if (empty($_SESSION['_csrf_token'])) {
            $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['_csrf_token'];
    }

    public static function verifyCsrfToken(?string $token): bool {
        self::initSession();
        if (empty($_SESSION['_csrf_token']) || empty($token)) {
            return false;
        }
        return hash_equals($_SESSION['_csrf_token'], $token);
    }

    public static function csrfField(): string {
        $token = self::generateCsrfToken();
        return sprintf('<input type="hidden" name="_csrf_token" value="%s">', htmlspecialchars($token, ENT_QUOTES, 'UTF-8'));
    }

    public static function sanitize(string $input): string {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    /**
     * IP-based rate limiting helper
     */
    public static function checkRateLimit(string $actionKey, int $maxAttempts = 10, int $decaySeconds = 600): bool {
        self::initSession();
        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        $key = 'rate_' . $actionKey . '_' . md5($ip);

        $current = $_SESSION[$key] ?? ['count' => 0, 'start_time' => time()];

        if (time() - $current['start_time'] > $decaySeconds) {
            $current = ['count' => 1, 'start_time' => time()];
            $_SESSION[$key] = $current;
            return true;
        }

        if ($current['count'] >= $maxAttempts) {
            return false;
        }

        $current['count']++;
        $_SESSION[$key] = $current;
        return true;
    }
}
