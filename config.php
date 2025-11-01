<?php
// Site Configuration
define('SITE_NAME', 'Vital Healer Labs');
define('SITE_TAGLINE', 'Premium Research Peptides');
define('SITE_URL', 'https://vitalhealer.com');
define('SITE_EMAIL', 'info@vitalhealer.com');

// Default SEO Settings
define('DEFAULT_TITLE', 'Vital Healer Labs - Premium Research Peptides');
define('DEFAULT_DESCRIPTION', 'Advancing wellness and performance through cutting-edge research compounds. Pure. Tested. Backed by science.');
define('DEFAULT_KEYWORDS', 'research peptides, BPC-157, TB-500, peptide research, laboratory peptides');
define('DEFAULT_OG_IMAGE', SITE_URL . '/images/og-image.jpg');

// Navigation Menu
$nav_menu = [
    ['url' => 'shop.php', 'label' => 'Shop'],
    ['url' => 'products.php', 'label' => 'Products'],
    ['url' => 'guides.php', 'label' => 'Guides'],
    ['url' => 'shipping.php', 'label' => 'Shipping'],
    ['url' => 'contact.php', 'label' => 'Contact']
];

// Featured Compounds
$featured_compounds = [
    ['name' => 'BPC-157', 'description' => 'tissue and recovery research'],
    ['name' => 'TB-500', 'description' => 'performance and healing studies'],
    ['name' => 'Epithalon', 'description' => 'longevity research focus'],
    ['name' => 'Selank', 'description' => 'cognitive and mood studies'],
    ['name' => 'Semax', 'description' => 'neurological research']
];

// Educational Guides
$educational_guides = [
    ['title' => 'What Are Peptides?', 'subtitle' => 'A Beginner's Guide'],
    ['title' => 'Peptide Storage & Stability', 'subtitle' => 'Best Practices'],
    ['title' => 'BPC-157 vs TB-500:', 'subtitle' => 'Key Differences']
];

// Feature Cards
$feature_cards = [
    [
        'icon' => 'science',
        'title' => 'Scientific Integrity',
        'description' => 'Products rigorously tested with HPLC & mass spectrometry for verification.'
    ],
    [
        'icon' => 'public',
        'title' => 'Global Reach',
        'description' => 'Secure, discreet, and reliable international shipping to most destinations.'
    ],
    [
        'icon' => 'description',
        'title' => 'Purity',
        'description' => 'Most materials are guaranteed to 98.99% purity.'
    ],
    [
        'icon' => 'bolt',
        'title' => 'Fast Fulfillment',
        'description' => 'We prioritize speed; most orders ship within 24 hours of purchase.'
    ]
];
