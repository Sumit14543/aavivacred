<?php
/**
 * AavivaCred - Unified Loan Products & Business Constants
 */

declare(strict_types=1);

return [
    'categories' => [
        'personal' => [
            'key'          => 'personal',
            'slug'         => 'personal-loan',
            'name'         => 'Personal Loan',
            'description'  => 'Instant collateral-free personal loans for weddings, travel, medical or emergency needs.',
            'min_amount'   => 50000,
            'max_amount'   => 3500000,
            'min_rate'     => 10.49,
            'max_rate'     => 24.0,
            'min_tenure'   => 12, // months
            'max_tenure'   => 84, // months
            'icon'         => 'user-check',
            'color'        => 'blue',
            'bg'           => 'bg-blue-50',
            'text_color'   => 'text-primary',
            'gradient'     => 'from-sky-400 to-blue-500',
            'features'     => [
                '100% digital & paperless process',
                'Rates starting at 10.49% p.a.',
                'Flexible repayment terms up to 84 months',
                'Zero hidden fees & quick disbursal'
            ]
        ],
        'business' => [
            'key'          => 'business',
            'slug'         => 'business-loan',
            'name'         => 'Business Loan',
            'description'  => 'SMEs and retail merchants seeking capital expansion, equipment funding or inventory loans.',
            'min_amount'   => 100000,
            'max_amount'   => 5000000,
            'min_rate'     => 12.50,
            'max_rate'     => 26.0,
            'min_tenure'   => 12,
            'max_tenure'   => 60,
            'icon'         => 'building',
            'color'        => 'purple',
            'bg'           => 'bg-purple-50',
            'text_color'   => 'text-purple-600',
            'gradient'     => 'from-purple-400 to-purple-600',
            'features'     => [
                'Collateral-free business loans',
                'Fast approval with minimal paperwork',
                'Tailored EMI options for cash flows',
                'Custom credit limit evaluation'
            ]
        ],
        'gold' => [
            'key'          => 'gold',
            'slug'         => 'gold-loan',
            'name'         => 'Gold Loan',
            'description'  => 'High asset value gold loans starting from 8.5% p.a. with maximum loan-to-value ratio.',
            'min_amount'   => 25000,
            'max_amount'   => 2500000,
            'min_rate'     => 8.50,
            'max_rate'     => 16.0,
            'min_tenure'   => 3,
            'max_tenure'   => 36,
            'icon'         => 'coins',
            'color'        => 'amber',
            'bg'           => 'bg-amber-50',
            'text_color'   => 'text-amber-500',
            'gradient'     => 'from-amber-400 to-orange-500',
            'features'     => [
                'Lowest interest rates from 8.50%',
                'Instant gold valuation & cash credit',
                'Secure bank vault storage',
                'Flexible bullet or EMI repayments'
            ]
        ],
        'home' => [
            'key'          => 'home',
            'slug'         => 'home-loan',
            'name'         => 'Home Loan',
            'description'  => 'Salaried and self-employed house purchase, construction, or home balance transfer loans.',
            'min_amount'   => 500000,
            'max_amount'   => 20000000,
            'min_rate'     => 8.40,
            'max_rate'     => 11.5,
            'min_tenure'   => 60,
            'max_tenure'   => 360,
            'icon'         => 'home',
            'color'        => 'rose',
            'bg'           => 'bg-rose-50',
            'text_color'   => 'text-rose-500',
            'gradient'     => 'from-rose-400 to-pink-500',
            'features'     => [
                'Low interest rates starting at 8.40%',
                'Tenure up to 30 years',
                'PMAY tax savings & subsidies',
                'Painless balance transfer options'
            ]
        ],
        'payday' => [
            'key'          => 'payday',
            'slug'         => 'payday-loan',
            'name'         => 'Payday Loan',
            'description'  => 'Salaried professionals seeking short-term salary advances before payday.',
            'min_amount'   => 10000,
            'max_amount'   => 100000,
            'min_rate'     => 14.0,
            'max_rate'     => 36.0,
            'min_tenure'   => 1,
            'max_tenure'   => 12,
            'icon'         => 'clock',
            'color'        => 'sky',
            'bg'           => 'bg-sky-50',
            'text_color'   => 'text-sky-500',
            'gradient'     => 'from-sky-400 to-blue-500',
            'features'     => [
                'Same-day disbursal within 2 hours',
                'Zero collateral required',
                'Ideal for urgent bills or expenses',
                'Minimal salary slip documentation'
            ]
        ],
        'edi' => [
            'key'          => 'edi',
            'slug'         => 'edi-loan',
            'name'         => 'EDI Merchant Loan',
            'description'  => 'Equated Daily Installment collection loans for retail shopkeepers and micro-merchants.',
            'min_amount'   => 30000,
            'max_amount'   => 500000,
            'min_rate'     => 12.0,
            'max_rate'     => 22.0,
            'min_tenure'   => 3,
            'max_tenure'   => 24,
            'icon'         => 'shopping-bag',
            'color'        => 'emerald',
            'bg'           => 'bg-emerald-50',
            'text_color'   => 'text-emerald-500',
            'gradient'     => 'from-emerald-400 to-teal-500',
            'features'     => [
                'Daily automated collection facility',
                'No heavy monthly EMI burden',
                'Easy qualification for small traders',
                'Instant top-up loan availability'
            ]
        ],
    ],
    'employment_types' => [
        'Salaried'            => 'Salaried Employee',
        'Self-Employed'       => 'Self-Employed / Business Owner',
        'Doctor/Professional' => 'Doctor / Medical Professional',
        'Professional'        => 'CA / CS / Architect / Lawyer',
        'Other'               => 'Other Employment'
    ],
    'cities' => [
        'Delhi NCR', 'Mumbai', 'Bengaluru', 'Hyderabad', 'Chennai', 
        'Kolkata', 'Pune', 'Ahmedabad', 'Jaipur', 'Lucknow', 
        'Ghaziabad', 'Noida', 'Gurugram', 'Surat', 'Indore', 'Chandigarh'
    ]
];
