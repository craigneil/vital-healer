<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : DEFAULT_TITLE; ?></title>
    <meta name="description" content="<?php echo isset($page_description) ? $page_description : DEFAULT_DESCRIPTION; ?>">
    <meta name="keywords" content="<?php echo isset($page_keywords) ? $page_keywords : DEFAULT_KEYWORDS; ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title : DEFAULT_TITLE; ?>">
    <meta property="og:description" content="<?php echo isset($page_description) ? $page_description : DEFAULT_DESCRIPTION; ?>">
    <meta property="og:image" content="<?php echo isset($page_og_image) ? $page_og_image : DEFAULT_OG_IMAGE; ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    <meta property="twitter:title" content="<?php echo isset($page_title) ? $page_title : DEFAULT_TITLE; ?>">
    <meta property="twitter:description" content="<?php echo isset($page_description) ? $page_description : DEFAULT_DESCRIPTION; ?>">
    <meta property="twitter:image" content="<?php echo isset($page_og_image) ? $page_og_image : DEFAULT_OG_IMAGE; ?>">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Google Material Symbols for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    
    <!-- Custom Styles for Brand Colors and Minor Adjustments -->
    <style>
        :root {
            --bs-primary: #2d65c7;
            --bs-primary-rgb: 45, 101, 199;
        }
        .text-accent {
            color: #b136c7;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .card, .btn {
            transition: all 0.2s ease-in-out;
        }
        .feature-icon {
            font-size: 2.5rem;
            color: var(--bs-primary);
        }
        /* Header fixes for solid background and proper layering */
        header.sticky-top {
            background-color: #ffffff !important;
            z-index: 1030;
            position: sticky;
            top: 0;
        }
        header.sticky-top .navbar {
            background-color: #ffffff !important;
        }
        header.sticky-top .navbar-collapse {
            background-color: #ffffff !important;
        }
        /* Ensure mobile menu also has solid background */
        @media (max-width: 991.98px) {
            header.sticky-top .navbar-collapse {
                background-color: #ffffff !important;
                padding: 1rem;
                margin-top: 0.5rem;
                border-radius: 0.375rem;
            }
        }
    </style>
    <?php if (isset($additional_css)) echo $additional_css; ?>
</head>
<body>

<!-- Header and Navbar -->
<header class="sticky-top bg-white shadow-sm">
    <nav class="navbar navbar-expand-lg">
        <div class="container-xl">
            <!-- Brand Logo and Name -->
            <a class="navbar-brand d-flex align-items-center gap-2" href="<?php echo SITE_URL; ?>">
                 <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 495 495" style="width: 2rem; height: 2rem;">
                    <defs>
                        <style>.cls-1{fill:#b136c7;}.cls-2{fill:#2d65c7;fill-rule:evenodd;}</style>
                    </defs>
                    <path class="cls-1" d="M355.33,176.32a359.37,359.37,0,0,0-12.77-50.19c-12.52,2.63-25.51,6-38.81,10v12.26c17.68,8.51,34.92,17.82,51.58,27.89m0,162.66a620.34,620.34,0,0,1-67.13,35.11,463.6,463.6,0,0,0,54.36,15.07A359.22,359.22,0,0,0,355.33,339Zm-193.18,0a359.2,359.2,0,0,0,12.78,50.18,463.6,463.6,0,0,0,54.36-15.07A621.42,621.42,0,0,1,162.15,339Zm-4.2-134a473,473,0,0,0,0,105.44,593,593,0,0,0,100.79,52.71,592.72,592.72,0,0,0,100.8-52.71,473,473,0,0,0,0-105.44,592.27,592.27,0,0,0-79.36-43.5V96.35H237.31v65.08A593.4,593.4,0,0,0,158,204.93Zm4.2-28.61q25-15.09,51.59-27.89V136.17c-13.31-4.06-26.29-7.41-38.81-10A358,358,0,0,0,162.15,176.32ZM132.7,292.76a495.83,495.83,0,0,1,0-70.23,416.76,416.76,0,0,0-41.59,35.12A416.72,416.72,0,0,0,132.7,292.76Zm3,29.25A467.87,467.87,0,0,1,75.58,273.8c-73.74,82.6-39.74,136,76.13,119.47A399.27,399.27,0,0,1,135.69,322Zm246.11,0a399.26,399.26,0,0,1-16,71.26c115.88,16.57,149.88-36.86,76.14-119.47A468.57,468.57,0,0,1,381.8,322Zm3-99.48a495.83,495.83,0,0,1,0,70.23,416.72,416.72,0,0,0,41.59-35.11A416.76,416.76,0,0,0,384.79,222.53Zm-171-108.79V96.35c-15.34-.16-15.34-21.2,0-21.35h90c15.34.15,15.34,21.19,0,21.35v17.39c10.6-3.06,21-5.69,31.13-7.87C292.93,7,224.56,7,182.61,105.87,192.74,108.05,203.14,110.68,213.74,113.74Zm-154,143.91a248.45,248.45,0,0,1-25.28-32.28,35.6,35.6,0,0,0,12.41-3.82,33.2,33.2,0,0,0,8.3-6.12,234.31,234.31,0,0,0,20.39,26.06,467,467,0,0,1,60.11-48.2,399.39,399.39,0,0,1,16-71.27c-74-10.58-114.64,7.42-115.07,43.34a36.48,36.48,0,0,0-23.34,3.49l0,0c-2.93-51.84,50.64-82,146-67.33C209-20,308.45-20,358.23,101.54a299.63,299.63,0,0,1,43.94-3.7A27.91,27.91,0,0,0,401,119.05a286.14,286.14,0,0,0-35.22,3,399.57,399.57,0,0,1,16,71.27,467.68,467.68,0,0,1,60.11,48.2c46.93-52.57,50.21-93.31,16.54-111.73a28.68,28.68,0,0,0,8.16-19.88v-.31c50.75,23.69,52.7,80.73-8.88,148.08,91.85,100.41,42.42,178-99.5,156.11a235.64,235.64,0,0,1-18.45,36.36,32.76,32.76,0,0,0-9.86-7.82,35.59,35.59,0,0,0-10-3.45,222.38,222.38,0,0,0,14.95-29.42,516.46,516.46,0,0,1-76.14-23.06,516.35,516.35,0,0,1-76.13,23.06c26.85,63.19,64.19,86.13,98.65,68.82a31.1,31.1,0,0,0,14.84,16.63c-48,27.71-103.35.68-136.85-81.12C17.32,435.6-32.08,358.08,59.76,257.65Z" transform="translate(-9.35 -10.4)"/>
                    <path class="cls-2" d="M283.72,252.59c10.27,0,18.59,7.54,18.59,16.84s-8.32,16.83-18.59,16.83-18.58-7.53-18.58-16.83,8.32-16.84,18.58-16.84M255.57,298c5.89,0,10.66,4.32,10.66,9.65s-4.77,9.66-10.66,9.66-10.65-4.32-10.65-9.66S249.69,298,255.57,298ZM237.22,189c6.95,0,12.57,5.1,12.57,11.39s-5.62,11.39-12.57,11.39-12.57-5.1-12.57-11.39S230.28,189,237.22,189Zm19.9-27.11a5.51,5.51,0,1,1-6.05,5.48A5.78,5.78,0,0,1,257.12,161.84ZM269,202.73c4.6,0,8.34,3.38,8.34,7.55s-3.74,7.55-8.34,7.55-8.33-3.38-8.33-7.55S264.41,202.73,269,202.73Zm-36.69,68.2c3.36,0,6.09,2.47,6.09,5.51a6.12,6.12,0,0,1-12.18,0C226.23,273.4,229,270.93,232.32,270.93Zm103.55,27.32a366.07,366.07,0,0,0,.83-72.53c-32.91-14.41-57.2-.11-82.06,9.4a6.52,6.52,0,0,1,.72,3c0,3.91-3.5,7.08-7.82,7.08a7.73,7.73,0,0,1-7.58-5.31c-17.58,4.39-36.29,3.37-59.17-14.15a366.07,366.07,0,0,0,.82,72.53,457.86,457.86,0,0,0,77.13,40.34A457.48,457.48,0,0,0,335.87,298.25Z" transform="translate(-9.35 -10.4)"/>
                    <path class="cls-2" d="M433.63,86.86a22.22,22.22,0,1,1-22.05,22.21,22.13,22.13,0,0,1,22.05-22.21" transform="translate(-9.35 -10.4)"/>
                    <path class="cls-2" d="M311.68,445.75A22.22,22.22,0,1,1,289.63,468a22.14,22.14,0,0,1,22.05-22.22" transform="translate(-9.35 -10.4)"/>
                    <path class="cls-2" d="M31.4,173.46a22.22,22.22,0,1,1-22,22.22,22.14,22.14,0,0,1,22-22.22" transform="translate(-9.35 -10.4)"/>
                </svg>
                <div class="fs-4 fw-bolder lh-1">
                    <span class="text-accent">Vital Healer</span> <span class="text-primary">Labs</span>
                </div>
            </a>
            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5 fw-semibold">
                    <?php foreach ($nav_menu as $item): ?>
                    <li class="nav-item">
                        <a href="<?php echo $item['url']; ?>" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == $item['url']) ? 'active' : ''; ?>">
                            <?php echo $item['label']; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
