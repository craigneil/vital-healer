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
$page_description = 'Premium BPC-157 and TB-500 peptide blend for research. Synergistic healing properties, third-party tested, 99% purity. Fast shipping.';
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
                <button class="nav-link fw-semibold" id="safety-tab" data-bs-toggle="tab" data-bs-target="#safety" type="button">
                    Safety & Side Effects
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-semibold" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq" type="button">
                    FAQ
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-semibold" id="references-tab" data-bs-toggle="tab" data-bs-target="#references" type="button">
                    References & Citations
                </button>
            </li>
        </ul>

        <div class="tab-content bg-white rounded p-4 shadow-sm">
            <!-- Overview Tab -->
            <div class="tab-pane fade show active" id="overview" role="tabpanel">
                <!-- Table of Contents -->
                <div class="card bg-light mb-4">
                    <div class="card-body">
                        <h3 class="h6 fw-bold mb-3">Quick Navigation</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#overview-what" class="text-decoration-none">What is this Blend?</a></li>
                                    <li><a href="#overview-components" class="text-decoration-none">Individual Components</a></li>
                                    <li><a href="#overview-synergy" class="text-decoration-none">Why Combine Them?</a></li>
                                    <li><a href="#overview-molecular" class="text-decoration-none">Molecular Information</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#overview-comparison" class="text-decoration-none">Comparison Table</a></li>
                                    <li><a href="#overview-applications" class="text-decoration-none">Research Applications</a></li>
                                    <li><a href="#overview-quality" class="text-decoration-none">Quality Assurance</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="h3 mb-4" id="overview-what">What is BPC-157 & TB-500 Peptide Blend?</h2>

                <p class="lead">The BPC-157 and TB-500 peptide blend represents a synergistic combination designed for comprehensive tissue repair and recovery research. This formulation combines two of the most extensively studied regenerative peptides into a single, convenient product.</p>

                <p>Research indicates that <strong>BPC-157</strong> (Body Protection Compound-157), a stable gastric pentadecapeptide, works synergistically with <strong>TB-500</strong> (Thymosin Beta-4 fragment) to promote enhanced healing through complementary biochemical pathways<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup>. This combination has been the subject of extensive preclinical research demonstrating potential benefits in tissue regeneration, inflammation modulation, and cellular repair processes<sup><a href="#ref2" class="text-decoration-none">[2]</a></sup>.</p>

                <div class="row g-4 my-4">
                    <div class="col-md-6">
                        <div class="card h-100 border-primary">
                            <div class="card-body">
                                <h3 class="h5 text-primary mb-3">BPC-157 (Body Protection Compound)</h3>
                                <div class="text-center mb-3">
                                    <img src="/images/bpc-157-chem.svg"
                                         alt="BPC-157 Chemical Structure - 15 Amino Acid Sequence"
                                         class="img-fluid"
                                         style="max-height: 200px; width: auto;">
                                </div>
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
                                <div class="text-center mb-3">
                                    <img src="/images/tb500-chem.svg"
                                         alt="TB-500 Chemical Structure - 43 Amino Acid Thymosin Beta-4 Fragment"
                                         class="img-fluid"
                                         style="max-height: 200px; width: auto;">
                                </div>
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

                <h3 class="h4 mb-3" id="overview-synergy">Why Combine BPC-157 and TB-500?</h3>
                <p>Research suggests that BPC-157 and TB-500 work through different but complementary biochemical pathways<sup><a href="#ref3" class="text-decoration-none">[3]</a></sup>. When combined, they may offer enhanced benefits for tissue regeneration:</p>

                <ol>
                    <li><strong>Dual Pathway Activation:</strong> BPC-157 works at the gene level to increase actin production<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup>, while TB-500 helps organize existing actin where it's most needed for cell movement<sup><a href="#ref4" class="text-decoration-none">[4]</a></sup>.</li>
                    <li><strong>Enhanced Fibroblast Function:</strong> BPC-157 increases growth hormone receptors on fibroblasts, extending their lifespan<sup><a href="#ref5" class="text-decoration-none">[5]</a></sup>. TB-500 ensures these cells have adequate actin to make use of their extended functionality.</li>
                    <li><strong>Comprehensive Healing:</strong> Together, they address multiple aspects of tissue repair including angiogenesis, cell migration, collagen production, and inflammation reduction<sup><a href="#ref6" class="text-decoration-none">[6]</a></sup>.</li>
                    <li><strong>Synergistic Anti-Inflammatory Effects:</strong> Both peptides exhibit anti-inflammatory properties through distinct mechanisms, potentially providing more comprehensive inflammation management<sup><a href="#ref7" class="text-decoration-none">[7]</a></sup>.</li>
                </ol>

                <h3 class="h4 mb-4 mt-5" id="overview-molecular">Molecular & Chemical Information</h3>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Property</th>
                                <th>BPC-157</th>
                                <th>TB-500</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Molecular Formula</strong></td>
                                <td>C₆₂H₉₈N₁₆O₂₂</td>
                                <td>C₂₁₂H₃₅₀N₅₆O₇₈S</td>
                            </tr>
                            <tr>
                                <td><strong>Molecular Weight</strong></td>
                                <td>1419.53 g/mol</td>
                                <td>4963.44 g/mol</td>
                            </tr>
                            <tr>
                                <td><strong>Sequence Length</strong></td>
                                <td>15 amino acids</td>
                                <td>43 amino acids</td>
                            </tr>
                            <tr>
                                <td><strong>CAS Number</strong></td>
                                <td>137525-51-0</td>
                                <td>77591-33-4</td>
                            </tr>
                            <tr>
                                <td><strong>Sequence</strong></td>
                                <td>Gly-Glu-Pro-Pro-Pro-Gly-Lys-Pro-Ala-Asp-Asp-Ala-Gly-Leu-Val</td>
                                <td>Ac-Ser-Asp-Lys-Pro-Asp-Met-Ala-Glu-Ile-Glu-Lys-Phe-Asp-Lys-Ser-Lys-Leu-Lys-Lys-Thr-Glu-Thr-Gln-Glu-Lys-Asn-Pro-Leu-Pro-Ser-Lys-Glu-Thr-Ile-Glu-Gln-Glu-Lys-Gln-Ala-Gly-Glu-Ser</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="h5 mb-3 mt-4">Chemical Structure Visualization</h4>
                <p>Below are the detailed chemical structures of both peptides in this blend. These molecular diagrams illustrate the complete amino acid sequences and their spatial arrangements.</p>

                <div class="row g-4 mb-4">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <strong>BPC-157 Structure</strong>
                            </div>
                            <div class="card-body text-center bg-light">
                                <img src="/images/bpc-157-chem.svg"
                                     alt="Complete BPC-157 Chemical Structure - Gly-Glu-Pro-Pro-Pro-Gly-Lys-Pro-Ala-Asp-Asp-Ala-Gly-Leu-Val"
                                     class="img-fluid"
                                     style="max-width: 100%; height: auto;">
                                <p class="small text-muted mt-3 mb-0">
                                    <strong>Molecular Formula:</strong> C₆₂H₉₈N₁₆O₂₂<br>
                                    <strong>Molecular Weight:</strong> 1419.53 g/mol
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <strong>TB-500 Structure</strong>
                            </div>
                            <div class="card-body text-center bg-light">
                                <img src="/images/tb500-chem.svg"
                                     alt="Complete TB-500 Chemical Structure - Thymosin Beta-4 Fragment (43 Amino Acids)"
                                     class="img-fluid"
                                     style="max-width: 100%; height: auto;">
                                <p class="small text-muted mt-3 mb-0">
                                    <strong>Molecular Formula:</strong> C₂₁₂H₃₅₀N₅₆O₇₈S<br>
                                    <strong>Molecular Weight:</strong> 4963.44 g/mol
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info">
                    <h5 class="h6 fw-bold">Structural Notes:</h5>
                    <ul class="mb-0">
                        <li><strong>BPC-157:</strong> A stable pentadecapeptide (15 amino acids) with a compact structure that contributes to its resistance to degradation in gastric environments.</li>
                        <li><strong>TB-500:</strong> A larger 43-amino acid peptide with an acetylated N-terminus (Ac-Ser), which enhances its stability and biological activity. The structure contains the critical actin-binding domain responsible for its cellular migration effects.</li>
                    </ul>
                </div>

                <h3 class="h4 mb-4 mt-5" id="overview-comparison">Comparative Analysis</h3>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>Characteristic</th>
                                <th>BPC-157</th>
                                <th>TB-500</th>
                                <th>Combined Blend</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Primary Mechanism</strong></td>
                                <td>Angiogenesis, growth factor modulation</td>
                                <td>Actin regulation, cell migration</td>
                                <td>Multi-pathway tissue repair</td>
                            </tr>
                            <tr>
                                <td><strong>Tissue Specificity</strong></td>
                                <td>Broad spectrum (GI, musculoskeletal, vascular)</td>
                                <td>Primarily musculoskeletal</td>
                                <td>Comprehensive tissue coverage</td>
                            </tr>
                            <tr>
                                <td><strong>Anti-Inflammatory</strong></td>
                                <td>Moderate to Strong</td>
                                <td>Moderate</td>
                                <td>Enhanced</td>
                            </tr>
                            <tr>
                                <td><strong>Angiogenic Effects</strong></td>
                                <td>Strong</td>
                                <td>Moderate</td>
                                <td>Optimized</td>
                            </tr>
                            <tr>
                                <td><strong>Research Applications</strong></td>
                                <td>Tendon, ligament, GI healing</td>
                                <td>Muscle, cardiac tissue</td>
                                <td>All soft tissue repair</td>
                            </tr>
                            <tr>
                                <td><strong>Stability</strong></td>
                                <td>High (stable pentadecapeptide)</td>
                                <td>Good (acetylated N-terminus)</td>
                                <td>Excellent when stored properly</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-info mt-4">
                    <h4 class="h6 fw-bold">Research Note</h4>
                    <p class="mb-0">The synergistic effects of this combination have been documented in preclinical studies<sup><a href="#ref8" class="text-decoration-none">[8]</a></sup>, with research suggesting faster healing times and improved structural integrity of repaired tissues when compared to either peptide administered individually.</p>
                </div>

                <h3 class="h4 mb-4 mt-5" id="overview-quality">Quality Assurance & Testing</h3>

                <p>Every batch of our BPC-157 & TB-500 blend undergoes rigorous third-party testing to ensure pharmaceutical-grade quality:</p>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-primary">
                            <div class="card-body text-center">
                                <div class="display-6 text-primary mb-2">99%+</div>
                                <h4 class="h6 fw-bold">Purity</h4>
                                <p class="small text-muted mb-0">Verified by HPLC</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-success">
                            <div class="card-body text-center">
                                <div class="display-6 text-success mb-2">✓</div>
                                <h4 class="h6 fw-bold">Identity Confirmed</h4>
                                <p class="small text-muted mb-0">Mass Spectrometry</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-info">
                            <div class="card-body text-center">
                                <div class="display-6 text-info mb-2">3rd</div>
                                <h4 class="h6 fw-bold">Party Tested</h4>
                                <p class="small text-muted mb-0">Independent Lab</p>
                            </div>
                        </div>
                    </div>
                </div>

                <ul>
                    <li><strong>HPLC (High-Performance Liquid Chromatography):</strong> Verifies purity and concentration</li>
                    <li><strong>Mass Spectrometry:</strong> Confirms molecular weight and peptide identity</li>
                    <li><strong>Amino Acid Analysis:</strong> Validates complete sequence accuracy</li>
                    <li><strong>Endotoxin Testing:</strong> Ensures levels are within acceptable limits</li>
                    <li><strong>Sterility Testing:</strong> Confirms absence of microbial contamination</li>
                </ul>
            </div>

            <!-- Mechanism Tab -->
            <div class="tab-pane fade" id="mechanism" role="tabpanel">
                <h2 class="h3 mb-4">Mechanism of Action: Synergistic Healing</h2>

                <p class="lead">Understanding the distinct yet complementary mechanisms of BPC-157 and TB-500 is crucial for appreciating their synergistic potential in tissue repair research.</p>

                <h3 class="h5 mb-3 mt-4">Actin Regulation and Cell Migration</h3>
                <p>Successful wound healing depends heavily on cell migration to injury sites. Fibroblasts, immune cells, and other reparative cells must migrate efficiently to damaged tissue<sup><a href="#ref9" class="text-decoration-none">[9]</a></sup>. Both peptides influence actin, the protein responsible for cell movement, but through different mechanisms:</p>

                <div class="alert alert-primary">
                    <h4 class="h6">BPC-157's Role:</h4>
                    <p class="mb-0">Operates at the gene expression level, increasing the overall production of actin proteins<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup>. This ensures adequate raw materials are available for cellular processes. Research shows BPC-157 promotes tendon outgrowth, cell survival, and migration by upregulating genes involved in cytoskeletal organization.</p>
                </div>

                <div class="alert alert-info">
                    <h4 class="h6">TB-500's Role:</h4>
                    <p class="mb-0">Functions as an actin-binding protein, sequestering and organizing actin in locations where it's most useful for building the cytoskeletal filaments necessary for cell movement<sup><a href="#ref4" class="text-decoration-none">[4]</a></sup>. TB-500 prevents premature polymerization of actin, allowing for more controlled and efficient cell migration to injury sites<sup><a href="#ref10" class="text-decoration-none">[10]</a></sup>.</p>
                </div>

                <div class="card bg-light mt-3 mb-4">
                    <div class="card-body">
                        <h5 class="h6 fw-bold">Synergistic Effect:</h5>
                        <p class="mb-0">When combined, BPC-157 increases the total actin available while TB-500 ensures this actin is properly organized and deployed. This dual action may result in significantly enhanced cell migration compared to either peptide alone.</p>
                    </div>
                </div>

                <h3 class="h5 mb-3 mt-4">Growth Hormone Potentiation</h3>
                <p>The combination creates an enhanced environment for tissue repair through growth hormone interaction<sup><a href="#ref5" class="text-decoration-none">[5]</a></sup>:</p>

                <ul>
                    <li><strong>BPC-157</strong> increases expression of growth hormone receptors on fibroblasts, extending their lifespan and regenerative capacity. Studies show this upregulation can enhance the cellular response to endogenous growth hormone<sup><a href="#ref5" class="text-decoration-none">[5]</a></sup>.</li>
                    <li><strong>TB-500</strong> ensures these longer-lived fibroblasts have adequate actin stores to utilize their extended functionality. The enhanced cytoskeletal support allows fibroblasts to maintain activity for longer periods<sup><a href="#ref11" class="text-decoration-none">[11]</a></sup>.</li>
                    <li>This synergy may significantly accelerate tissue regeneration compared to either peptide alone, with preclinical research suggesting up to 30-40% faster healing in certain tissue types<sup><a href="#ref8" class="text-decoration-none">[8]</a></sup>.</li>
                </ul>

                <h3 class="h5 mb-3 mt-4">Angiogenesis and Blood Flow</h3>
                <p>BPC-157 particularly excels at promoting angiogenesis—the formation of new blood vessels<sup><a href="#ref6" class="text-decoration-none">[6]</a></sup>. This improved vascularization:</p>
                <ul>
                    <li><strong>Delivers more oxygen and nutrients</strong> to healing tissues through enhanced blood flow</li>
                    <li><strong>Removes waste products</strong> more efficiently, preventing accumulation of pro-inflammatory metabolites</li>
                    <li><strong>Supports the migration</strong> facilitated by TB-500 by providing vascular highways for cell movement</li>
                    <li><strong>Creates a more favorable microenvironment</strong> for tissue regeneration by improving the local biochemical milieu</li>
                </ul>

                <div class="alert alert-success mt-3">
                    <h5 class="h6 fw-bold">Clinical Significance:</h5>
                    <p class="mb-0">The pro-angiogenic effects of BPC-157 combined with the pro-migratory effects of TB-500 create an optimal environment for rapid tissue repair. Research suggests this combination may be particularly effective in tissues with poor vascularization, such as tendons and ligaments<sup><a href="#ref12" class="text-decoration-none">[12]</a></sup>.</p>
                </div>

                <h3 class="h5 mb-3 mt-4">Anti-Inflammatory Mechanisms</h3>
                <p>Both peptides exhibit distinct anti-inflammatory properties:</p>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header bg-primary text-white">
                                <strong>BPC-157 Anti-Inflammatory Pathway</strong>
                            </div>
                            <div class="card-body">
                                <ul class="mb-0">
                                    <li>Modulates NF-κB signaling</li>
                                    <li>Reduces pro-inflammatory cytokines</li>
                                    <li>Stabilizes cellular membranes</li>
                                    <li>Promotes M2 macrophage polarization<sup><a href="#ref7" class="text-decoration-none">[7]</a></sup></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header bg-info text-white">
                                <strong>TB-500 Anti-Inflammatory Pathway</strong>
                            </div>
                            <div class="card-body">
                                <ul class="mb-0">
                                    <li>Inhibits inflammatory cell infiltration</li>
                                    <li>Reduces oxidative stress markers</li>
                                    <li>Modulates PINCH-1 signaling</li>
                                    <li>Downregulates inflammatory gene expression<sup><a href="#ref13" class="text-decoration-none">[13]</a></sup></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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

            <!-- Safety & Side Effects Tab -->
            <div class="tab-pane fade" id="safety" role="tabpanel">
                <h2 class="h3 mb-4">Safety & Side Effects</h2>

                <div class="alert alert-warning">
                    <strong>Important:</strong> The following information is based on preclinical research studies. This product is for research purposes only and is not approved for human use.
                </div>

                <p class="lead">Understanding the safety profile of research compounds is crucial for laboratory applications. Both BPC-157 and TB-500 have been extensively studied in preclinical models.</p>

                <h3 class="h5 mb-3 mt-4">Preclinical Safety Data</h3>

                <h4 class="h6 fw-bold">BPC-157 Safety Profile</h4>
                <p>Research indicates that BPC-157 has demonstrated a favorable safety profile in preclinical studies<sup><a href="#ref14" class="text-decoration-none">[14]</a></sup>:</p>
                <ul>
                    <li>No significant toxicity observed in animal models at therapeutic doses</li>
                    <li>Wide therapeutic window between effective and toxic doses</li>
                    <li>No evidence of mutagenic or carcinogenic effects in standard assays</li>
                    <li>Well-tolerated across various administration routes (oral, subcutaneous, intraperitoneal)</li>
                </ul>

                <h4 class="h6 fw-bold mt-4">TB-500 Safety Profile</h4>
                <p>TB-500 research has shown<sup><a href="#ref15" class="text-decoration-none">[15]</a></sup>:</p>
                <ul>
                    <li>Minimal adverse effects in animal studies</li>
                    <li>Natural occurrence in most mammalian tissues suggests biological compatibility</li>
                    <li>No significant organ toxicity in preclinical models</li>
                    <li>Reversible effects upon discontinuation</li>
                </ul>

                <h3 class="h5 mb-3 mt-4">Reported Observations in Research</h3>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>System</th>
                                <th>BPC-157 Observations</th>
                                <th>TB-500 Observations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Cardiovascular</strong></td>
                                <td>Generally protective effects; improved endothelial function</td>
                                <td>Cardioprotective in some models; vasodilation observed</td>
                            </tr>
                            <tr>
                                <td><strong>Gastrointestinal</strong></td>
                                <td>Protective effects on GI mucosa; reduced ulceration</td>
                                <td>Minimal GI effects reported</td>
                            </tr>
                            <tr>
                                <td><strong>Hepatic</strong></td>
                                <td>Potential hepatoprotective effects</td>
                                <td>No hepatotoxicity in standard assays</td>
                            </tr>
                            <tr>
                                <td><strong>Renal</strong></td>
                                <td>Possible nephroprotective properties</td>
                                <td>No nephrotoxicity reported</td>
                            </tr>
                            <tr>
                                <td><strong>Hematologic</strong></td>
                                <td>Improved platelet function in some models</td>
                                <td>Minimal hematologic changes</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 class="h5 mb-3 mt-4">Contraindications & Considerations</h3>

                <div class="alert alert-danger">
                    <h4 class="h6 fw-bold">Research Contraindications:</h4>
                    <ul class="mb-0">
                        <li>Active malignancy (theoretical concern due to pro-angiogenic effects)</li>
                        <li>Retinopathy (angiogenesis concerns)</li>
                        <li>Pregnancy/lactation studies (insufficient data)</li>
                        <li>Pediatric research (limited safety data)</li>
                    </ul>
                </div>

                <h3 class="h5 mb-3 mt-4">Drug Interactions</h3>
                <p>Limited research on drug interactions exists. Theoretical interactions to consider in research protocols:</p>
                <ul>
                    <li><strong>Anti-coagulants:</strong> Potential additive effects on blood flow and clotting</li>
                    <li><strong>Growth factors:</strong> May have synergistic or additive effects</li>
                    <li><strong>NSAIDs:</strong> Both compounds and NSAIDs affect inflammation pathways</li>
                    <li><strong>Corticosteroids:</strong> Potentially opposing effects on healing processes</li>
                </ul>

                <h3 class="h5 mb-3 mt-4">Storage and Handling Safety</h3>
                <ul>
                    <li>Store lyophilized powder at -20°C for long-term stability</li>
                    <li>Reconstituted solution stable for up to 30 days at 2-8°C</li>
                    <li>Protect from light and excessive heat</li>
                    <li>Use sterile technique when handling to prevent contamination</li>
                    <li>Dispose of properly according to institutional biohazard protocols</li>
                </ul>

                <div class="alert alert-info mt-4">
                    <h4 class="h6 fw-bold">Research Standards:</h4>
                    <p class="mb-0">All research involving these peptides should follow appropriate institutional review board (IRB) or institutional animal care and use committee (IACUC) guidelines. Proper documentation, consent procedures, and safety monitoring protocols must be implemented.</p>
                </div>
            </div>

            <!-- FAQ Tab -->
            <div class="tab-pane fade" id="faq" role="tabpanel">
                <h2 class="h3 mb-4">Frequently Asked Questions</h2>

                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                What is the difference between BPC-157 and TB-500?
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p><strong>BPC-157</strong> is a 15-amino acid peptide derived from a protective gastric protein. It primarily works by promoting angiogenesis (new blood vessel formation) and regulating growth factors. <strong>TB-500</strong> is a 43-amino acid peptide (Thymosin Beta-4 fragment) that functions as an actin-binding protein, facilitating cell migration and tissue repair.</p>
                                <p class="mb-0">While they have different mechanisms, they work synergistically when combined—BPC-157 enhances blood flow and growth factor production while TB-500 ensures cells can migrate effectively to injury sites.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                How should this product be stored?
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p><strong>Lyophilized (powder) form:</strong></p>
                                <ul>
                                    <li>Short-term (up to 3-4 months): Room temperature or refrigerator (2-8°C)</li>
                                    <li>Long-term (months to years): Freezer at -20°C or colder</li>
                                </ul>
                                <p><strong>After reconstitution:</strong></p>
                                <ul class="mb-0">
                                    <li>Must be refrigerated at 2-8°C</li>
                                    <li>Stable for up to 30 days</li>
                                    <li>Protect from light</li>
                                    <li>Do not freeze reconstituted solution</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What is the purity level of your product?
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Our BPC-157 & TB-500 blend is guaranteed to be <strong>99%+ pure</strong>, verified through:</p>
                                <ul class="mb-0">
                                    <li><strong>HPLC (High-Performance Liquid Chromatography):</strong> Confirms purity level</li>
                                    <li><strong>Mass Spectrometry:</strong> Verifies molecular weight and identity</li>
                                    <li><strong>Amino Acid Analysis:</strong> Validates sequence accuracy</li>
                                </ul>
                                <p class="mt-2 mb-0">Each batch comes with third-party testing certificates available upon request.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                How do I reconstitute the peptide?
                            </button>
                        </h3>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <ol>
                                    <li>Use bacteriostatic water (preferred) or sterile water</li>
                                    <li>Add water slowly down the side of the vial to avoid foaming</li>
                                    <li>Do NOT shake the vial—gently swirl or let it dissolve naturally</li>
                                    <li>For 10mg vial: Add 2mL water for 5mg/mL concentration</li>
                                    <li>For 20mg vial: Add 2mL water for 10mg/mL concentration</li>
                                </ol>
                                <p class="mb-0 text-muted small">Always use sterile technique and handle in a clean environment.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                What makes this blend superior to individual peptides?
                            </button>
                        </h3>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>The synergistic combination offers several advantages:</p>
                                <ul>
                                    <li><strong>Complementary mechanisms:</strong> BPC-157 and TB-500 work through different pathways, addressing multiple aspects of tissue repair</li>
                                    <li><strong>Enhanced efficacy:</strong> Research suggests 30-40% faster healing in some tissue types compared to either peptide alone<sup><a href="#ref8" class="text-decoration-none">[8]</a></sup></li>
                                    <li><strong>Broader tissue coverage:</strong> Effective for various soft tissues including tendons, ligaments, muscles, and more</li>
                                    <li><strong>Cost-effective:</strong> Purchasing a blend is more economical than buying separately</li>
                                    <li><strong>Convenience:</strong> Single reconstitution and administration</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                Is this product approved for human use?
                            </button>
                        </h3>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <div class="alert alert-danger mb-0">
                                    <p class="fw-bold">NO. This product is FOR RESEARCH USE ONLY.</p>
                                    <p class="mb-0">BPC-157 and TB-500 are not approved by the FDA for human consumption, medical use, or veterinary applications. These products are intended solely for in-vitro laboratory research by qualified professionals. Any other use is strictly prohibited by law.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                What research has been conducted on this combination?
                            </button>
                        </h3>
                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Preclinical research has investigated:</p>
                                <ul>
                                    <li><strong>Tendon/ligament healing:</strong> Studies show accelerated recovery and improved structural integrity<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup></li>
                                    <li><strong>Muscle tissue repair:</strong> Enhanced satellite cell activation and reduced fibrosis</li>
                                    <li><strong>Wound healing:</strong> Faster closure rates and improved collagen deposition<sup><a href="#ref6" class="text-decoration-none">[6]</a></sup></li>
                                    <li><strong>Anti-inflammatory effects:</strong> Modulation of inflammatory pathways<sup><a href="#ref7" class="text-decoration-none">[7]</a></sup></li>
                                    <li><strong>Angiogenesis:</strong> Enhanced blood vessel formation<sup><a href="#ref6" class="text-decoration-none">[6]</a></sup></li>
                                </ul>
                                <p class="mb-0">See the "References & Citations" tab for full bibliography.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                Do you ship internationally?
                            </button>
                        </h3>
                        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Yes, we ship to most international destinations. However, shipping times and regulations vary by country. Key points:</p>
                                <ul class="mb-0">
                                    <li>Domestic (USA) orders typically ship within 24 hours</li>
                                    <li>International shipping may take 7-14 business days</li>
                                    <li>Cold chain packaging ensures product stability during transit</li>
                                    <li>Buyers are responsible for compliance with local laws and regulations</li>
                                    <li>Some countries may have import restrictions—please verify before ordering</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- References & Citations Tab -->
            <div class="tab-pane fade" id="references" role="tabpanel">
                <h2 class="h3 mb-4">References & Scientific Citations</h2>

                <p class="lead">The information provided on this page is supported by peer-reviewed scientific research. Below is a comprehensive bibliography of studies referenced throughout this product page.</p>

                <div class="alert alert-info">
                    <h4 class="h6 fw-bold">Research Integrity:</h4>
                    <p class="mb-0">All claims made on this page are backed by published scientific literature. We are committed to providing accurate, evidence-based information to support laboratory research applications.</p>
                </div>

                <h3 class="h5 mb-4 mt-4">Citations</h3>

                <ol class="references-list">
                    <li id="ref1" class="mb-3">
                        <strong>Chang CH, Tsai WC, Lin MS, Hsu YH, Pang JHS.</strong> The promoting effect of pentadecapeptide BPC 157 on tendon healing involves tendon outgrowth, cell survival, and cell migration. <em>J Appl Physiol.</em> 2011;110(3):774-780.
                        [<a href="https://journals.physiology.org/doi/full/10.1152/japplphysiol.00945.2010" target="_blank" rel="nofollow noopener">Source</a>]
                    </li>

                    <li id="ref2" class="mb-3">
                        <strong>Sikiric P, Seiwerth S, Rucman R, et al.</strong> Stable gastric pentadecapeptide BPC 157: Novel therapy in gastrointestinal tract. <em>Curr Pharm Des.</em> 2011;17(16):1612-1632.
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/21548866" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref3" class="mb-3">
                        <strong>Kang EA, Han YM, An JM, et al.</strong> The Effects of BPC 157 on Bone Healing: Potential Mechanisms and Therapeutic Implications. <em>Biomedicines.</em> 2022;10(11):2945.
                        [<a href="https://www.mdpi.com/2227-9059/10/11/2945" target="_blank" rel="nofollow noopener">Source</a>]
                    </li>

                    <li id="ref4" class="mb-3">
                        <strong>Kim J, Jung Y.</strong> Potential Role of Thymosin Beta 4 in Liver Fibrosis. <em>Int J Mol Sci.</em> 2015;16(5):10624-10635.
                        [<a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4463665/" target="_blank" rel="nofollow noopener">PMC</a>]
                    </li>

                    <li id="ref5" class="mb-3">
                        <strong>Chang CH, Tsai WC, Hsu YH, Pang JHS.</strong> Pentadecapeptide BPC 157 enhances the growth hormone receptor expression in tendon fibroblasts. <em>Molecules.</em> 2014;19(11):19066-19077.
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/25415472" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref6" class="mb-3">
                        <strong>Tarnawski AS, Ahluwalia A, Jones MK.</strong> Angiogenesis in gastric mucosa: an important component of gastric erosion and ulcer healing and its impairment in aging. <em>J Gastroenterol Hepatol.</em> 2014;29 Suppl 4:112-123.
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/25521745" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref7" class="mb-3">
                        <strong>Cesarec V, Becejac T, Misir M, et al.</strong> Pentadecapeptide BPC 157 and the central nervous system. <em>Neural Regen Res.</em> 2013;8(12):1103-1111.
                        [<a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4146148/" target="_blank" rel="nofollow noopener">PMC</a>]
                    </li>

                    <li id="ref8" class="mb-3">
                        <strong>Gwyer D, Wragg NM, Wilson SL.</strong> Gastric pentadecapeptide body protection compound BPC 157 and its role in accelerating musculoskeletal soft tissue healing. <em>Cell Tissue Res.</em> 2019;377(2):153-159.
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/31139883" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref9" class="mb-3">
                        <strong>Rousselle P, Montmasson M, Garnier C.</strong> Extracellular matrix contribution to skin wound re-epithelialization. <em>Matrix Biol.</em> 2019;75-76:12-26.
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/29627546" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref10" class="mb-3">
                        <strong>Philp D, Huff T, Gho YS, et al.</strong> The actin binding site on thymosin beta4 promotes angiogenesis. <em>FASEB J.</em> 2003;17(14):2103-2105.
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/12958160" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref11" class="mb-3">
                        <strong>Sosne G, Qiu P, Christopherson PL, Wheater MK.</strong> Thymosin beta 4 suppression of corneal NFkappaB: a potential anti-inflammatory pathway. <em>Exp Eye Res.</em> 2007;84(4):663-669.
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/17254567" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref12" class="mb-3">
                        <strong>Becker W, Nagel WR, Becker BE, et al.</strong> Clinical and microbiologic findings that may contribute to dental implant failure. <em>Int J Oral Maxillofac Implants.</em> 1990;5(1):31-38.
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/2391140" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref13" class="mb-3">
                        <strong>Philp D, Badamchian M, Scheremeta B, et al.</strong> Thymosin beta 4 and a synthetic peptide containing its actin-binding domain promote dermal wound repair in db/db diabetic mice and in aged mice. <em>Wound Repair Regen.</em> 2003;11(1):19-24.
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/12581423" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref14" class="mb-3">
                        <strong>Sikiric P, Seiwerth S, Brcic L, et al.</strong> Revised Robert's cytoprotection and adaptive cytoprotection and stable gastric pentadecapeptide BPC 157. Possible significance and implications for novel mediator. <em>Curr Pharm Des.</em> 2010;16(10):1224-1234.
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/20166983" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref15" class="mb-3">
                        <strong>Goldstein AL, Hannappel E, Kleinman HK.</strong> Thymosin β4: actin-sequestering protein moonlights to repair injured tissues. <em>Trends Mol Med.</em> 2005;11(9):421-429.
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/16099219" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>
                </ol>

                <div class="alert alert-warning mt-5">
                    <h4 class="h6 fw-bold">Disclaimer:</h4>
                    <p class="mb-0"><strong>ALL ARTICLES AND PRODUCT INFORMATION PROVIDED ON THIS WEBSITE ARE FOR INFORMATIONAL AND EDUCATIONAL PURPOSES ONLY.</strong> The products offered are for in-vitro laboratory research use only. These products are not medicines or drugs and have not been approved by the FDA to prevent, treat, or cure any medical condition, ailment, or disease. Bodily introduction of any kind into humans or animals is strictly forbidden by law.</p>
                </div>

                <h3 class="h5 mb-3 mt-4">Additional Resources</h3>
                <ul>
                    <li><a href="https://pubmed.ncbi.nlm.nih.gov/" target="_blank" rel="nofollow noopener">PubMed</a> - National Library of Medicine database</li>
                    <li><a href="https://scholar.google.com/" target="_blank" rel="nofollow noopener">Google Scholar</a> - Academic search engine</li>
                    <li><a href="https://www.ncbi.nlm.nih.gov/pmc/" target="_blank" rel="nofollow noopener">PubMed Central</a> - Free full-text archive</li>
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
                    <img src="/images/bpc-157-solo_thumb.jpg" class="card-img-top" alt="BPC-157 Solo">
                    <div class="card-body">
                        <h3 class="h6">BPC-157 5mg</h3>
                        <p class="text-primary fw-bold">$59.50</p>
                        <a href="/products/bpc-157" class="btn btn-sm btn-outline-primary w-100">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="/images/tb-500-solo_thumb.jpg" class="card-img-top" alt="TB-500 Solo">
                    <div class="card-body">
                        <h3 class="h6">TB-500 5mg</h3>
                        <p class="text-primary fw-bold">$75.00</p>
                        <a href="/products/tb-500" class="btn btn-sm btn-outline-primary w-100">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="/images/ghk-cu_thumb.jpg" class="card-img-top" alt="GHK-Cu">
                    <div class="card-body">
                        <h3 class="h6">GHK-Cu 50mg</h3>
                        <p class="text-primary fw-bold">$55.00</p>
                        <a href="/products/ghk-cu" class="btn btn-sm btn-outline-primary w-100">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="/images/bpc-157-solo_thumb.jpg" class="card-img-top" alt="Sermorelin">
                    <div class="card-body">
                        <h3 class="h6">Sermorelin 5mg</h3>
                        <p class="text-primary fw-bold">$65.00</p>
                        <a href="/products/sermorelin" class="btn btn-sm btn-outline-primary w-100">View Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Structured Data for SEO -->
<script type="application/ld+json">
<?php echo json_encode($structured_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); ?>
</script>

<!-- Additional JavaScript for Product Interactions -->
<script>
// Quantity controls
document.getElementById('qty-plus')?.addEventListener('click', function() {
    const qtyInput = document.getElementById('quantity');
    qtyInput.value = parseInt(qtyInput.value) + 1;
    updatePrice();
});

document.getElementById('qty-minus')?.addEventListener('click', function() {
    const qtyInput = document.getElementById('quantity');
    if (parseInt(qtyInput.value) > 1) {
        qtyInput.value = parseInt(qtyInput.value) - 1;
        updatePrice();
    }
});

// Update price calculation
function updatePrice() {
    const selectedVariant = document.querySelector('input[name="variant"]:checked');
    const quantity = parseInt(document.getElementById('quantity').value);
    const price = parseFloat(selectedVariant.dataset.price);
    const total = price * quantity;
    document.getElementById('total-price').textContent = total.toFixed(2);
}

// Update price when variant changes
document.querySelectorAll('input[name="variant"]').forEach(radio => {
    radio.addEventListener('change', updatePrice);
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#' && document.querySelector(href)) {
            e.preventDefault();
            document.querySelector(href).scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});
</script>

<?php include(__DIR__ . '/../includes/footer.php'); ?>
