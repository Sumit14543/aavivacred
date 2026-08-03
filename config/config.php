<?php
/**
 * AavivaCred - Configuration File
 */

// Load .env environment variables
if (!function_exists('load_env_file')) {
    function load_env_file($path) {
        if (!file_exists($path)) return;
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line) || strpos($line, '#') === 0) continue;
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value, " \t\n\r\0\x0B\"'");
                if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                    putenv("{$name}={$value}");
                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                }
            }
        }
    }
}
load_env_file(dirname(__DIR__) . '/.env');

define('SITE_NAME', 'AavivaCred');
define('SITE_EMAIL', 'support@aavivacred.com');
define('SITE_PHONE', '9711149319');
define('SITE_ADDRESS', '71 Navyug market Ghaziabad');

// MySQL Database Credentials
define('DB_HOST', getenv('DB_HOST') ? getenv('DB_HOST') : 'localhost');
define('DB_USER', getenv('DB_USER') ? getenv('DB_USER') : 'root');
define('DB_PASS', getenv('DB_PASS') !== false ? getenv('DB_PASS') : '');
define('DB_NAME', getenv('DB_NAME') ? getenv('DB_NAME') : 'aavivacred');
define('DB_PATH', dirname(__DIR__) . '/data/leads.json');

// Calculate directory prefix dynamically based on request URI to support clean rewritten URLs
$request_uri = $_SERVER['REQUEST_URI'] ?? '';
$in_pages_uri = (strpos($request_uri, '/pages/') !== false);
define('PATH_PREFIX', $in_pages_uri ? '../' : '');

define('LEAD_CATEGORIES', [
    'edi' => [
        'name' => 'EDI Merchant Loan',
        'description' => 'Daily collection business loans for retail shopkeepers and micro-merchants.',
        'icon' => 'coins',
        'color' => 'blue',
        'bg' => 'bg-blue-50',
        'text_color' => 'text-blue-500',
        'gradient' => 'from-sky-400 to-blue-500'
    ],
    'business' => [
        'name' => 'Business Loan',
        'description' => 'SMEs and retail merchants seeking business expansion capital.',
        'icon' => 'building',
        'color' => 'purple',
        'bg' => 'bg-purple-50',
        'text_color' => 'text-purple-605',
        'gradient' => 'from-purple-400 to-purple-600'
    ],
    'two_wheeler' => [
        'name' => 'Two Wheeler Loan',
        'description' => 'Get a quick and seamless two-wheeler loan approval in 8 minutes.',
        'icon' => 'bike',
        'color' => 'sky',
        'bg' => 'bg-sky-50',
        'text_color' => 'text-sky-500',
        'gradient' => 'from-sky-400 to-blue-500'
    ],
    'payday' => [
        'name' => 'Payday Loan',
        'description' => 'Salaried professionals seeking short-term salary advances.',
        'icon' => 'clock',
        'color' => 'amber',
        'bg' => 'bg-amber-50',
        'text_color' => 'text-amber-500',
        'gradient' => 'from-amber-400 to-orange-500'
    ],
    'home_loan' => [
        'name' => 'Home Loan',
        'description' => 'Salaried and self-employed house purchase loan seekers.',
        'icon' => 'home',
        'color' => 'rose',
        'bg' => 'bg-rose-50',
        'text_color' => 'text-rose-500',
        'gradient' => 'from-rose-400 to-pink-500'
    ],
    'insurance' => [
        'name' => 'Insurance Policies',
        'description' => 'Options for health, life, or motor insurance plans.',
        'icon' => 'shield',
        'color' => 'cyan',
        'bg' => 'bg-cyan-50',
        'text_color' => 'text-cyan-500',
        'gradient' => 'from-cyan-400 to-teal-500'
    ],
    'mutual_fund' => [
        'name' => 'Gold Loan',
        'description' => 'High asset value gold loans starting from 8.5% P.A.',
        'icon' => 'trending-up',
        'color' => 'indigo',
        'bg' => 'bg-indigo-50',
        'text_color' => 'text-indigo-500',
        'gradient' => 'from-indigo-400 to-blue-600'
    ]
]);

/**
 * Checks if the current page matches the given page name for desktop navigation.
 * 
 * @param string $page_name
 * @return string CSS classes
 */
function is_active_page($page_name) {
    $current_page = basename($_SERVER['PHP_SELF']);
    if ($current_page === $page_name) {
        return 'px-4 py-2 rounded-full text-sm font-semibold bg-primary/10 text-primary dark:bg-primary/20 dark:text-sky-400 shadow-sm';
    }
    return 'px-4 py-2 rounded-full text-sm font-medium text-slate-650 hover:text-primary hover:bg-primary/5 dark:text-slate-300 dark:hover:text-sky-400 dark:hover:bg-primary/10 transition-all';
}

/**
 * Checks if the current page matches the given page name for mobile navigation.
 * 
 * @param string $page_name
 * @return string CSS classes
 */
function is_active_page_mobile($page_name) {
    $current_page = basename($_SERVER['PHP_SELF']);
    if ($current_page === $page_name) {
        return 'block rounded-xl px-4 py-3 text-base font-semibold bg-primary/10 text-primary dark:bg-primary/20 dark:text-sky-400';
    }
    return 'block rounded-xl px-4 py-3 text-base font-medium text-slate-605 hover:bg-gray-50 dark:text-slate-350 dark:hover:bg-slate-800';
}
