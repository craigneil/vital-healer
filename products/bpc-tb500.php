<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// Load configuration
require_once(__DIR__ . '/../config.php');

// Product-specific data
$product = [
    'id' => 'bpc-tb500-blend',
    'name' => 'BPC-157 & TB-500 Peptide Blend',
    'short_name' => 'BPC-157 TB-500 Blend',
    'sku' => 'VHL-BPC-TB-001',
    'variants' => [
        '10mg' => ['price' => 120.00, 'stock' => true],
        '20mg' => ['price' => 200.00, 'stock' => true]
    ],
    'default_variant' => '10mg',
    'rating' => 4.9,
    'review_count' => 108,
    'image' => '/images/bpc-tb500-blend.jpg',
    'purity' => '99%',
    'manufacturer' => 'USA',
    'cas_number' => 'BPC-137525-51-0 / TB-77591-33-4'
];

// SEO Settings
$page_title = 'Buy BPC-157 TB-500 Blend 10mg/20mg | 99% Purity | USA Made';
$page_description = 'Premium BPC-157 and TB-500 peptide blend for research. Synergistic healing properties, third-party tested, 99% purity. Fast shipping, lab-tested COA included.';
$page_keywords = 'BPC-157 TB-500 blend, buy BPC-157 TB-500, peptide blend, tissue repair peptides, recovery peptides, research peptides';

// Structured Data for Rich Snippets
$structured_data = [
    '@context' => 'https://schema.org',
    '@type' => 'Product',
    'name' => $product['name'],
    'image' => SITE_URL . $product['image'],
    'description' => $page_description,
    'sku' => $product['sku'],
    'brand' => [
        '@type' => 'Brand',
        'name' => 'Vital Healer Labs'
    ],
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => $product['rating'],
        'reviewCount' => $product['review_count']
    ],
    'offers' => [
        '@type' => 'AggregateOffer',
        'url' => SITE_URL . '/products/' . $product['id'],
        'priceCurrency' => 'USD',
        'lowPrice' => $product['variants']['10mg']['price'],
        'highPrice' => $product['variants']['20mg']['price'],
        'availability' => 'https://schema.org/InStock',
        'offerCount' => count($product['variants'])
    ]
];

// Include header

include(__DIR__ . '/../includes/header.php');
?>

<!-- Breadcrumbs for SEO -->
<nav aria-label="breadcrumb" class="container-xl py-3">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/products">Research Peptides</a></li>
        <li class="breadcrumb-item"><a href="/products#blends">Peptide Blends</a></li>
        <li class="breadcrumb-item active" aria-current="page">BPC-157 TB-500</li>
    </ol>
</nav>

<!-- Product Main Section -->
<section class="bg-white py-4">
    <div class="container-xl">
        <div class="row">
            <!-- Product Images -->
            <div class="col-lg-5 mb-4">
                <div class="sticky-top" style="top: 100px;">
                    <img src="<?php echo $product['image']; ?>" 
                         alt="BPC-157 TB-500 Peptide Blend Vial - <?php echo $product['purity']; ?> Purity" 
                         class="img-fluid rounded shadow-sm mb-3"
                         width="500"
                         height="500">
                    
                    <!-- Trust Badges -->
                    <div class="d-flex justify-content-around text-center mt-4">
                        <div>
                            <div class="text-primary fw-bold fs-4"><?php echo $product['purity']; ?></div>
                            <small class="text-muted">Purity</small>
                        </div>
                        <div>
                            <div class="text-primary fw-bold fs-4">USA</div>
                            <small class="text-muted">Made</small>
                        </div>
                        <div>
                            <div class="text-primary fw-bold fs-4">24h</div>
                            <small class="text-muted">Shipping</small>
                        </div>
                        <div>
                            <div class="text-primary fw-bold fs-4">COA</div>
                            <small class="text-muted">Included</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-7">
                <h1 class="display-5 fw-bold mb-3"><?php echo $product['name']; ?></h1>
                
                <!-- Rating -->
                <div class="d-flex align-items-center mb-3">
                    <div class="text-warning me-2">
                        <?php for($i = 0; $i < 5; $i++): ?>
                            <span>★</span>
                        <?php endfor; ?>
                    </div>
                    <span class="text-muted"><?php echo $product['rating']; ?> (<?php echo $product['review_count']; ?> reviews)</span>
                </div>

                <!-- Key Benefits -->
                <div class="alert alert-info border-primary mb-4">
                    <h2 class="h5 mb-3">Synergistic Research Benefits:</h2>
                    <ul class="mb-0">
                        <li>Enhanced tissue repair through complementary pathways</li>
                        <li>BPC-157: Angiogenesis & growth factor regulation</li>
                        <li>TB-500: Cell migration & actin regulation</li>
                        <li>Combined action on fibroblast longevity</li>
                    </ul>
                </div>

                <!-- Product Options -->
                <form id="product-form" class="mb-4">
                    <div class="mb-4">
                        <label class="form-label fw-semibold fs-5">Select Dosage:</label>
                        <div class="btn-group w-100" role="group">
                            <?php foreach($product['variants'] as $size => $details): ?>
                            <input type="radio" 
                                   class="btn-check" 
                                   name="variant" 
                                   id="variant-<?php echo $size; ?>" 
                                   value="<?php echo $size; ?>"
                                   data-price="<?php echo $details['price']; ?>"
                                   <?php echo $size === $product['default_variant'] ? 'checked' : ''; ?>>
                            <label class="btn btn-outline-primary btn-lg" for="variant-<?php echo $size; ?>">
                                <?php echo $size; ?> - $<?php echo number_format($details['price'], 2); ?>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Quantity:</label>
                        <div class="input-group" style="max-width: 150px;">
                            <button class="btn btn-outline-secondary" type="button" id="qty-minus">−</button>
                            <input type="number" class="form-control text-center" id="quantity" value="1" min="1" max="10">
                            <button class="btn btn-outline-secondary" type="button" id="qty-plus">+</button>
                        </div>
                    </div>

                    <div class="d-grid gap-3 mb-4">
                        <button type="submit" class="btn btn-primary btn-lg fw-semibold py-3">
                            Add to Cart - $<span id="total-price">120.00</span>
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-lg">
                            Add to Wishlist
                        </button>
                    </div>
                </form>

                <!-- Product Meta -->
                <div class="border-top pt-4">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-muted">SKU:</th>
                                <td><?php echo $product['sku']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Purity:</th>
                                <td><?php echo $product['purity']; ?> (HPLC Verified)</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Form:</th>
                                <td>Lyophilized Powder</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">Storage:</th>
                                <td>Store at -20°C</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-muted">CAS Numbers:</th>
                                <td><?php echo $product['cas_number']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Product Information Tabs -->
<section class="bg-light py-5">
    <div class="container-xl">
        <ul class="nav nav-tabs border-0 mb-4" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fw-semibold" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button">
                    Overview
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-semibold" id="mechanism-tab" data-bs-toggle="tab" data-bs-target="#mechanism" type="button">
                    Mechanism of Action
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-semibold" id="research-tab" data-bs-toggle="tab" data-bs-target="#research" type="button">
                    Research Applications
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-semibold" id="dosing-tab" data-bs-toggle="tab" data-bs-target="#dosing" type="button">
                    Dosing Information
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-semibold" id="coa-tab" data-bs-toggle="tab" data-bs-target="#coa" type="button">
                    COA / Testing
                </button>
            </li>
        </ul>

        <div class="tab-content bg-white rounded p-4 shadow-sm">
            <!-- Overview Tab -->
            <div class="tab-pane fade show active" id="overview" role="tabpanel">
                <h2 class="h3 mb-4">What is BPC-157 & TB-500 Peptide Blend?</h2>
                
                <p class="lead">The BPC-157 and TB-500 peptide blend represents a synergistic combination designed for comprehensive tissue repair and recovery research. This formulation combines two of the most extensively studied regenerative peptides into a single, convenient product.</p>

                <div class="row g-4 my-4">
                    <div class="col-md-6">
                        <div class="card h-100 border-primary">
                            <div class="card-body">
                                <h3 class="h5 text-primary mb-3">BPC-157 (Body Protection Compound)</h3>
                                <ul class="mb-0">
                                    <li>Derived from gastric protective protein</li>
                                    <li>15 amino acid sequence</li>
                                    <li>Promotes angiogenesis (blood vessel formation)</li>
                                    <li>Regulates growth factor production</li>
                                    <li>Enhances collagen formation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-primary">
                            <div class="card-body">
                                <h3 class="h5 text-primary mb-3">TB-500 (Thymosin Beta-4)</h3>
                                <ul class="mb-0">
                                    <li>Naturally occurring peptide in thymus</li>
                                    <li>43 amino acid sequence</li>
                                    <li>Actin-binding protein</li>
                                    <li>Facilitates cell migration to injury sites</li>
                                    <li>Reduces inflammation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="h4 mb-3">Why Combine BPC-157 and TB-500?</h3>
                <p>Research suggests that BPC-157 and TB-500 work through different but complementary biochemical pathways. When combined, they may offer enhanced benefits for tissue regeneration:</p>
                
                <ol>
                    <li><strong>Dual Pathway Activation:</strong> BPC-157 works at the gene level to increase actin production, while TB-500 helps organize existing actin where it's most needed for cell movement.</li>
                    <li><strong>Enhanced Fibroblast Function:</strong> BPC-157 increases growth hormone receptors on fibroblasts, extending their lifespan. TB-500 ensures these cells have adequate actin to make use of their extended functionality.</li>
                    <li><strong>Comprehensive Healing:</strong> Together, they address multiple aspects of tissue repair including angiogenesis, cell migration, collagen production, and inflammation reduction.</li>
                </ol>
            </div>

            <!-- Mechanism Tab -->
            <div class="tab-pane fade" id="mechanism" role="tabpanel">
                <h2 class="h3 mb-4">Mechanism of Action: Synergistic Healing</h2>
                
                <h3 class="h5 mb-3">Actin Regulation and Cell Migration</h3>
                <p>Successful wound healing depends heavily on cell migration to injury sites. Both peptides influence actin, the protein responsible for cell movement, but through different mechanisms:</p>
                
                <div class="alert alert-primary">
                    <h4 class="h6">BPC-157's Role:</h4>
                    <p class="mb-0">Operates at the gene expression level, increasing the overall production of actin proteins. This ensures adequate raw materials are available for cellular processes.</p>
                </div>

                <div class="alert alert-info">
                    <h4 class="h6">TB-500's Role:</h4>
                    <p class="mb-0">Functions as an actin-binding protein, sequestering and organizing actin in locations where it's most useful for building the cytoskeletal filaments necessary for cell movement.</p>
                </div>

                <h3 class="h5 mb-3 mt-4">Growth Hormone Potentiation</h3>
                <p>The combination creates an enhanced environment for tissue repair through growth hormone interaction:</p>
                
                <ul>
                    <li><strong>BPC-157</strong> increases expression of growth hormone receptors on fibroblasts, extending their lifespan and regenerative capacity</li>
                    <li><strong>TB-500</strong> ensures these longer-lived fibroblasts have adequate actin stores to utilize their extended functionality</li>
                    <li>This synergy may significantly accelerate tissue regeneration compared to either peptide alone</li>
                </ul>

                <h3 class="h5 mb-3 mt-4">Angiogenesis and Blood Flow</h3>
                <p>BPC-157 particularly excels at promoting angiogenesis—the formation of new blood vessels. This improved vascularization:</p>
                <ul>
                    <li>Delivers more oxygen and nutrients to healing tissues</li>
                    <li>Removes waste products more efficiently</li>
                    <li>Supports the migration facilitated by TB-500</li>
                    <li>Creates a more favorable environment for tissue regeneration</li>
                </ul>
            </div>

            <!-- Research Applications Tab -->
            <div class="tab-pane fade" id="research" role="tabpanel">
                <h2 class="h3 mb-4">Research Applications</h2>
                
                <p class="lead">This peptide blend has been studied extensively in preclinical research for various tissue repair applications. The following represents documented research areas:</p>

                <div class="accordion" id="researchAccordion">
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#research1">
                                Tendon and Ligament Research
                            </button>
                        </h3>
                        <div id="research1" class="accordion-collapse collapse show" data-bs-parent="#researchAccordion">
                            <div class="accordion-body">
                                <p>Studies have shown both peptides influence tendon healing:</p>
                                <ul>
                                    <li>BPC-157 promotes tendon outgrowth, cell survival, and migration</li>
                                    <li>TB-500 facilitates cellular migration to damaged areas</li>
                                    <li>Combined use may accelerate healing of tendon injuries</li>
                                    <li>Research indicates improved structural integrity of repaired tissue</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#research2">
                                Muscle Tissue Repair
                            </button>
                        </h3>
                        <div id="research2" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
                            <div class="accordion-body">
                                <p>Both peptides have demonstrated effects on muscle tissue:</p>
                                <ul>
                                    <li>Enhanced satellite cell activation and migration</li>
                                    <li>Improved muscle fiber regeneration</li>
                                    <li>Reduced fibrosis during healing</li>
                                    <li>Faster return of functional capacity</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#research3">
                                Wound Healing Studies
                            </button>
                        </h3>
                        <div id="research3" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
                            <div class="accordion-body">
                                <p>Preclinical research has explored dermal wound healing:</p>
                                <ul>
                                    <li>Accelerated wound closure rates</li>
                                    <li>Enhanced collagen deposition</li>
                                    <li>Improved angiogenesis at wound sites</li>
                                    <li>Reduced inflammation markers</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#research4">
                                Joint and Cartilage Research
                            </button>
                        </h3>
                        <div id="research4" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
                            <div class="accordion-body">
                                <p>Studies have investigated effects on joint tissues:</p>
                                <ul>
                                    <li>Potential protective effects on cartilage</li>
                                    <li>Modulation of inflammatory responses</li>
                                    <li>Support for synovial fluid composition</li>
                                    <li>Enhanced recovery from joint stress</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning mt-4">
                    <strong>Important Research Note:</strong> While promising, much of the research on BPC-157 and TB-500 remains preclinical. These products are sold strictly for laboratory research purposes only and are not intended for human use, consumption, or application.
                </div>
            </div>

            <!-- Dosing Tab -->
            <div class="tab-pane fade" id="dosing" role="tabpanel">
                <h2 class="h3 mb-4">Research Dosing Guidelines</h2>
                
                <p class="lead">The following information is provided for research reference only. All dosing should be determined by qualified researchers based on specific research protocols.</p>

                <h3 class="h5 mb-3">Reconstitution Instructions</h3>
                <div class="card mb-4">
                    <div class="card-body">
                        <ol class="mb-0">
                            <li>Use bacteriostatic water for reconstitution</li>
                            <li>Add water slowly down the side of the vial</li>
                            <li>Do not shake; allow to dissolve naturally or gently swirl</li>
                            <li>10mg vial: Add 2mL for 5mg/mL concentration</li>
                            <li>20mg vial: Add 2mL for 10mg/mL concentration</li>
                        </ol>
                    </div>
                </div>

                <h3 class="h5 mb-3">Storage Requirements</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>State</th>
                            <th>Temperature</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lyophilized (powder)</td>
                            <td>2-8°C (refrigerator) or -20°C (freezer)</td>
                            <td>3-4 months at room temp, 2+ years frozen</td>
                        </tr>
                        <tr>
                            <td>Reconstituted</td>
                            <td>2-8°C (refrigerator) only</td>
                            <td>Up to 30 days</td>
                        </tr>
                    </tbody>
                </table>

                <h3 class="h5 mb-3 mt-4">Research Dosing Considerations</h3>
                <p>Research protocols vary significantly based on study objectives. Common research dosing parameters include:</p>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <strong>BPC-157 Component</strong>
                            </div>
                            <div class="card-body">
                                <ul class="mb-0">
                                    <li>Typical research range: 200-500mcg</li>
                                    <li>Frequency: Once or twice daily</li>
                                    <li>Duration: Varies by protocol (2-8 weeks common)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <strong>TB-500 Component</strong>
                            </div>
                            <div class="card-body">
                                <ul class="mb-0">
                                    <li>Typical research range: 2-2.5mg</li>
                                    <li>Frequency: 1-2 times per week</li>
                                    <li>Loading phase may differ from maintenance</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-danger mt-4">
                    <strong>⚠️ For Research Use Only:</strong> This product is intended solely for laboratory research by qualified professionals. It is not for human consumption, medical use, or veterinary applications. Researchers must follow all applicable regulations and safety protocols.
                </div>
            </div>

            <!-- COA Tab -->
            <div class="tab-pane fade" id="coa" role="tabpanel">
                <h2 class="h3 mb-4">Certificate of Analysis & Third-Party Testing</h2>
                
                <p class="lead">Every batch of our BPC-157 & TB-500 blend undergoes rigorous third-party testing to ensure purity, identity, and quality.</p>

                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="card text-center h-100">
                            <div class="card-body">
                                <div class="display-4 text-primary mb-2">99%+</div>
                                <h3 class="h6">Purity</h3>
                                <p class="small text-muted mb-0">Verified by HPLC</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center h-100">
                            <div class="card-body">
                                <div class="display-4 text-primary mb-2">✓</div>
                                <h3 class="h6">Identity Confirmed</h3>
                                <p class="small text-muted mb-0">Mass Spectrometry</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center h-100">
                            <div class="card-body">
                                <div class="display-4 text-primary mb-2">3rd</div>
                                <h3 class="h6">Party Tested</h3>
                                <p class="small text-muted mb-0">Independent Lab</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="h5 mb-3">Our Testing Process</h3>
                <div class="card mb-4">
                    <div class="card-body">
                        <ol>
                            <li><strong>HPLC (High-Performance Liquid Chromatography):</strong> Verifies purity and determines the exact concentration of the peptide</li>
                            <li><strong>Mass Spectrometry:</strong> Confirms molecular weight and identity of the peptide sequence</li>
                            <li><strong>Amino Acid Analysis:</strong> Validates the complete amino acid sequence</li>
                            <li><strong>Sterility Testing:</strong> Ensures product is free from bacterial contamination</li>
                            <li><strong>Endotoxin Testing:</strong> Verifies endotoxin levels are within acceptable limits</li>
                        </ol>
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary btn-lg mb-3">
                        Download Current Batch COA (PDF)
                    </button>
                    <p class="text-muted small">Certificate of Analysis is included with every shipment</p>
                </div>

                <h3 class="h5 mb-3 mt-4">Quality Assurance</h3>
                <p>Vital Healer Labs maintains strict quality control standards:</p>
                <ul>
                    <li>GMP-compliant manufacturing facilities</li>
                    <li>Batch-specific testing for every production run</li>
                    <li>Proper cold chain storage from manufacture to delivery</li>
                    <li>Vacuum-sealed vials to maintain stability</li>
                    <li>QR code on each vial for batch verification</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="bg-white py-5">
    <div class="container-xl">
        <h2 class="h3 mb-4">Related Research Peptides</h2>
        <div class="row g-4">
            <!-- You can loop through related products here -->
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="/images/bpc-157-solo.jpg" class="card-img-top" alt="BPC-157 Solo">
                    <div class="card-body">
                        <h3 class="h6">BPC-157 5mg</h3>
                        <p class="text-primary fw-bold">$59.50</p>
                        <a href="/products/bpc-157" class="btn btn-sm btn-outline-primary w-100">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="/images/tb-500-solo.jpg" class="card-img-top" alt="TB-500 Solo">
                    <div class="card-body">
                        <h3 class="h6">TB-500 5mg</h3>
                        <p class="text-primary fw-bold">$75.00</p>
                        <a href="/products/tb-500" class="btn btn-sm btn-outline-primary w-100">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="/images/ghk-cu.jpg" class="card-img-top" alt="GHK-Cu">
                    <div class="card-body">
                        <h3 class="h6">GHK-Cu 50mg</h3>
                        <p class="text-primary fw-bold">$55.00