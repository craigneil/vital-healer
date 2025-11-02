<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
// Load configuration
require_once 'config.php';

// Page-specific SEO settings
$page_title = DEFAULT_TITLE;
$page_description = DEFAULT_DESCRIPTION;
$page_keywords = DEFAULT_KEYWORDS;
$page_og_image = DEFAULT_OG_IMAGE;

// Include header
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="bg-white py-5">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-3 fw-bolder text-dark mb-4">
                     <span class="text-primary">Premium</span> Research <span class="text-primary">Peptides</span><br> Trusted Worldwide.
                </h1>
                <h2 class="fs-4 text-secondary mb-5" style="max-width: 45rem;">
                    Advancing wellness and performance through cutting-edge research compounds. Pure. Tested. Backed by science.
                </h2>
                <div class="d-grid gap-3 d-sm-flex justify-content-center justify-content-lg-start mb-5">
                    <a href="shop.php" class="btn btn-primary btn-lg text-white fw-semibold px-5 py-3 rounded-pill shadow m-2 text-decoration-none">
                        Shop Research Peptides
                    </a>
                    <a href="guides.php" class="btn btn-outline-secondary btn-lg fw-semibold px-5 py-3 rounded-pill m-2 text-decoration-none">
                        Explore Guides
                    </a>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <img 
                    src="images/peptide_bottle_vital_healer.webp" 
                    alt="Vital Healer Labs Research Peptide Vial" 
                    class="img-fluid mx-auto"
                    width="500"
                    height="500"
                    loading="eager"
                >
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="bg-light py-5">
    <div class="container-md">
        <h2 class="fs-2 fw-bolder text-dark mb-4 border-bottom border-4 border-primary d-inline-block pb-2">About Vital Healer Labs</h2>
        <div class="row g-4 g-lg-5 fs-5 text-secondary">
            <div class="col-lg-6">
                <p>
                    At Vital Healer Labs, we believe scientific research drives tomorrow's breakthroughs. That's why we provide researchers with high-quality, rigorously tested peptides to support studies in recovery, performance, longevity, and beyond.
                </p>
            </div>
            <div class="col-lg-6">
                <p>
                    Every product undergoes independent lab testing to ensure purity and consistency. Our dedication to scientific integrity means we hold ourselves to the highest standards of quality assurance. We provide results you can trust, confirming exactly what's in every vial. 
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Content Section -->
<section class="py-5 bg-white">
    <div class="container-md">
        <div class="row g-5">
            <!-- Featured Compounds -->
            <div class="col-lg-6">
                <h2 class="fs-3 fw-bolder text-dark mb-4 border-bottom pb-2">Featured Research Compounds</h2>
                <p class="fs-5 text-secondary mb-4">Browse our most requested peptides:</p>
                <div class="d-flex flex-column gap-3">
                    <?php foreach ($featured_compounds as $compound): ?>
                    <div class="p-3 border rounded-3 shadow-sm">
                        <strong class="text-primary d-block"><?php echo $compound['name']; ?></strong> 
                        &mdash; <?php echo $compound['description']; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="products.php" class="mt-4 d-inline-block text-primary fw-semibold text-decoration-none">
                    [View All Products] &rarr;
                </a>
            </div>
            <!-- Educational Guides -->
            <div class="col-lg-6">
                <h2 class="fs-3 fw-bolder text-dark mb-4 border-bottom pb-2">Educational Guides</h2>
                <p class="fs-5 text-secondary mb-4">Knowledge is power. Explore our expert-written research guides:</p>
                <div class="d-flex flex-column gap-3">
                    <?php foreach ($educational_guides as $guide): ?>
                    <div class="p-3 bg-light rounded-3 border">
                        <strong class="text-dark d-block"><?php echo $guide['title']; ?></strong> 
                        <?php echo $guide['subtitle']; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="guides.php" class="mt-4 d-inline-block text-primary fw-semibold text-decoration-none">
                    [Read Guides] &rarr;
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-5 bg-light">
    <div class="container-md">
        <h2 class="fs-2 fw-bolder text-center text-dark mb-5">Why Researchers Choose Us</h2>
        <div class="row g-4">
            <?php foreach ($feature_cards as $feature): ?>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 text-center p-3 shadow-sm border-0 border-top border-4 border-primary card-hover">
                    <div class="card-body">
                        <div class="feature-icon mb-2">
                            <span class="material-symbols-outlined"><?php echo $feature['icon']; ?></span>
                        </div>
                        <h3 class="fw-bold fs-5 mb-2 text-dark"><?php echo $feature['title']; ?></h3>
                        <p class="text-secondary mb-0"><?php echo $feature['description']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Disclaimer Section -->
<section class="bg-danger-subtle py-4">
    <div class="container-md text-center" style="max-width: 45rem;">
        <h2 class="fs-4 fw-bolder text-danger mb-3">Compliance Disclaimer</h2>
        <p class="text-danger-emphasis fw-medium mb-0">
            <strong>All products sold by Vital Healer Labs are for laboratory research use only.</strong> Not for human consumption, medical, or veterinary use.
        </p>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>
