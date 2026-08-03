<?php
/**
 * AavivaCred - Central Application Configuration
 * Enterprise Configuration Layer
 */

declare(strict_types=1);

if (!defined('AAVIVACRED_INIT')) {
    define('AAVIVACRED_INIT', true);
}

return [
    'app' => [
        'name'        => getenv('APP_NAME') ?: 'AavivaCred',
        'env'         => getenv('APP_ENV') ?: 'production',
        'debug'       => getenv('APP_DEBUG') === 'true',
        'url'         => getenv('APP_URL') ?: 'https://aavivacred.com',
        'timezone'    => 'Asia/Kolkata',
        'locale'      => 'en_IN',
        'version'     => '2.4.0',
    ],
    'company' => [
        'legal_name'   => 'AavivaCred Financial Services Pvt. Ltd.',
        'brand_name'   => 'AavivaCred',
        'phone'        => '9711149319',
        'phone_format' => '+91 97111 49319',
        'email'        => 'support@aavivacred.com',
        'address'      => '71 Navyug Market, Ghaziabad, Uttar Pradesh, 201001',
        'city'         => 'Ghaziabad',
        'state'        => 'Uttar Pradesh',
        'pincode'      => '201001',
        'working_hours'=> 'Mon - Sat: 9:30 AM - 6:30 PM',
    ],
    'social' => [
        'facebook'  => 'https://facebook.com/aavivacred',
        'twitter'   => 'https://twitter.com/aavivacred',
        'instagram' => 'https://instagram.com/aavivacred',
        'linkedin'  => 'https://linkedin.com/company/aavivacred',
    ],
    'security' => [
        'csrf_token_name' => '_csrf_token',
        'session_lifetime'=> 7200, // 2 hours
        'max_login_attempts' => 5,
        'lockout_time'    => 900,  // 15 minutes
        'rate_limit_max'  => 10,   // submissions per 10 mins
        'rate_limit_decay' => 600,
    ],
    'db' => [
        'host'     => getenv('DB_HOST') ?: 'localhost',
        'user'     => getenv('DB_USER') ?: 'root',
        'pass'     => getenv('DB_PASS') !== false ? getenv('DB_PASS') : '',
        'name'     => getenv('DB_NAME') ?: 'aavivacred',
        'charset'  => 'utf8mb4',
        'json_path'=> dirname(__DIR__) . '/data/leads.json',
    ]
];
