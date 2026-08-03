<?php
/**
 * AavivaCred - Technical SEO & Metadata Configuration
 */

declare(strict_types=1);

return [
    'defaults' => [
        'site_title'        => 'AavivaCred - Compare & Apply Loans Online',
        'title'             => 'Smart Loan Solutions Designed Around Your Financial Goals',
        'description'       => 'Compare and apply for personal, business, gold, home, payday, and EDI merchant loans with AavivaCred. Instant digital approvals from trusted lending partners.',
        'keywords'          => 'personal loan, business loan, gold loan, home loan, payday loan, edi loan, compare loans, apply loan online, aavivacred',
        'robots'            => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
        'canonical_base'    => 'https://aavivacred.com',
        'og_type'           => 'website',
        'og_image'          => 'https://aavivacred.com/assets/images/og-default.jpg',
        'twitter_card'      => 'summary_large_image',
        'twitter_site'      => '@aavivacred',
    ],
    'organization' => [
        '@context'        => 'https://schema.org',
        '@type'           => 'FinancialService',
        'name'            => 'AavivaCred',
        'legalName'       => 'AavivaCred Financial Services Pvt. Ltd.',
        'url'             => 'https://aavivacred.com',
        'logo'            => 'https://aavivacred.com/assets/images/aavivacred_light.png',
        'telephone'       => '+91-9711149319',
        'email'           => 'support@aavivacred.com',
        'address' => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => '71 Navyug Market',
            'addressLocality'  => 'Ghaziabad',
            'addressRegion'    => 'Uttar Pradesh',
            'postalCode'      => '201001',
            'addressCountry'  => 'IN'
        ],
        'priceRange'      => '₹₹',
        'openingHours'    => 'Mo-Sa 09:30-18:30'
    ]
];
