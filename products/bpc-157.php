<?php
// Load configuration
require_once(__DIR__ . '/../config.php');

// Product-specific data
$product = [
    'id' => 'bpc-157',
    'name' => 'BPC-157 Peptide',
    'short_name' => 'BPC-157',
    'sku' => 'VHL-BPC-001',
    'variants' => [
        '5mg' => ['price' => 59.50, 'stock' => true],
        '10mg' => ['price' => 95.00, 'stock' => true]
    ],
    'default_variant' => '5mg',
    'rating' => 4.9,
    'review_count' => 654,
    'image' => '/images/bpc-157-solo.jpg',
    'purity' => '99%',
    'manufacturer' => 'USA',
    'cas_number' => '137525-51-0'
];

// SEO Settings
$page_title = 'Buy BPC-157 Peptide 5mg/10mg | 99% Pure | Body Protection Compound';
$page_description = 'Premium BPC-157 (Body Protection Compound-157) for research. Gastric pentadecapeptide with angiogenic properties. Third-party tested, 99% purity. Fast USA shipping.';
$page_keywords = 'BPC-157, buy BPC-157, body protection compound, BPC 157 peptide, gastric peptide, angiogenesis peptide, tissue repair research';

// Preload LCP image for better performance
$additional_css = '<link rel="preload" href="' . $product['image'] . '" as="image" fetchpriority="high">';

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
        'lowPrice' => $product['variants']['5mg']['price'],
        'highPrice' => $product['variants']['10mg']['price'],
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
        <li class="breadcrumb-item"><a href="/products#single">Single Peptides</a></li>
        <li class="breadcrumb-item active" aria-current="page">BPC-157</li>
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
                         alt="BPC-157 Peptide Vial - <?php echo $product['purity']; ?> Purity"
                         class="img-fluid rounded shadow-sm mb-3"
                         width="500"
                         height="500"
                         fetchpriority="high">

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
                    <h2 class="h5 mb-3">Key Research Properties:</h2>
                    <ul class="mb-0">
                        <li>Stable gastric pentadecapeptide (15 amino acids)</li>
                        <li>Promotes angiogenesis and vascular repair</li>
                        <li>Modulates growth factor expression</li>
                        <li>Supports fibroblast migration and proliferation</li>
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
                            Add to Cart - $<span id="total-price">59.50</span>
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
                                <th scope="row" class="text-muted">CAS Number:</th>
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
                <h2 class="h3 mb-4">What is BPC-157?</h2>

                <p class="lead">BPC-157 (Body Protection Compound-157) is a synthetic pentadecapeptide derived from a protective protein found in human gastric juice. This 15-amino acid sequence has been extensively studied for its remarkable tissue protective and regenerative properties.</p>

                <p>Originally isolated from gastric secretions, BPC-157 represents a stable fragment of the larger body protection compound naturally present in the GI tract<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup>. Its designation as "BPC-157" reflects its role as the 157th compound identified in the body protection series, with significant research demonstrating its cytoprotective effects across multiple tissue types<sup><a href="#ref2" class="text-decoration-none">[2]</a></sup>.</p>

                <div class="row g-4 my-4">
                    <div class="col-md-12">
                        <div class="card h-100 border-primary">
                            <div class="card-body">
                                <h3 class="h5 text-primary mb-3">BPC-157 (Body Protection Compound)</h3>
                                <div class="text-center mb-3">
                                    <img src="/images/bpc-157-chem.jpg"
                                         alt="BPC-157 Chemical Structure - 15 Amino Acid Sequence"
                                         class="img-fluid"
                                         style="max-height: 200px; width: auto;">
                                </div>
                                <ul class="mb-0">
                                    <li>Derived from gastric protective protein</li>
                                    <li>15 amino acid pentadecapeptide sequence</li>
                                    <li>Promotes angiogenesis (blood vessel formation)<sup><a href="#ref3">[3]</a></sup></li>
                                    <li>Regulates growth factor production<sup><a href="#ref7">[7]</a></sup></li>
                                    <li>Enhances fibroblast migration and collagen formation<sup><a href="#ref1">[1]</a></sup></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="h4 mb-3 mt-4">Key Research Properties</h3>
                <p>BPC-157 demonstrates unique characteristics that distinguish it from other regenerative peptides<sup><a href="#ref5">[5]</a></sup>:</p>
                <ol>
                    <li><strong>Exceptional Stability:</strong> Resistant to gastric acid degradation and stable at body temperature, making it highly bioavailable across multiple administration routes.</li>
                    <li><strong>Broad Tissue Specificity:</strong> Unlike many peptides with narrow tissue specificity, BPC-157 demonstrates beneficial effects across musculoskeletal, gastrointestinal, vascular, and neural tissues<sup><a href="#ref5">[5]</a></sup>.</li>
                    <li><strong>Multi-Pathway Action:</strong> Simultaneously modulates angiogenesis, growth factors, inflammation, and cytoprotection for comprehensive tissue repair<sup><a href="#ref4">[4]</a></sup>.</li>
                    <li><strong>Favorable Safety Profile:</strong> Extensive preclinical research shows minimal adverse effects with wide therapeutic window<sup><a href="#ref5">[5]</a></sup>.</li>
                </ol>

                <h3 class="h4 mb-4 mt-5">Molecular & Chemical Information</h3>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Property</th>
                                <th>BPC-157</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Molecular Formula</strong></td>
                                <td>C₆₂H₉₈N₁₆O₂₂</td>
                            </tr>
                            <tr>
                                <td><strong>Molecular Weight</strong></td>
                                <td>1419.53 g/mol</td>
                            </tr>
                            <tr>
                                <td><strong>Sequence Length</strong></td>
                                <td>15 amino acids</td>
                            </tr>
                            <tr>
                                <td><strong>CAS Number</strong></td>
                                <td>137525-51-0</td>
                            </tr>
                            <tr>
                                <td><strong>Sequence</strong></td>
                                <td>Gly-Glu-Pro-Pro-Pro-Gly-Lys-Pro-Ala-Asp-Asp-Ala-Gly-Leu-Val</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="h5 mb-3 mt-4">Chemical Structure Visualization</h4>
                <p>Below is the detailed chemical structure of BPC-157. This molecular diagram illustrates the complete amino acid sequence and spatial arrangement.</p>

                <div class="row g-4 mb-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <strong>BPC-157 Structure</strong>
                            </div>
                            <div class="card-body text-center bg-light">
                                <img src="/images/bpc-157-chem.jpg"
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
                </div>

                <div class="alert alert-info">
                    <h5 class="h6 fw-bold">Structural Notes:</h5>
                    <ul class="mb-0">
                        <li><strong>BPC-157:</strong> A stable pentadecapeptide (15 amino acids) with a compact structure that contributes to its resistance to degradation in gastric environments<sup><a href="#ref1">[1]</a></sup>.</li>
                        <li><strong>Bioavailability:</strong> The peptide's stability allows for effective delivery across multiple administration routes (subcutaneous, oral, intraperitoneal) in research models.</li>
                        <li><strong>Activity:</strong> The specific sequence and structure enable interaction with growth factor receptors and modulation of angiogenic pathways<sup><a href="#ref3">[3]</a></sup>.</li>
                    </ul>
                </div>

                <h3 class="h4 mb-3 mt-4">Key Characteristics</h3>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="card h-100 border-primary">
                            <div class="card-body">
                                <h4 class="h6 text-primary mb-2">Gastric Origin</h4>
                                <p class="small mb-0">Derived from body protection compound (BPC) found naturally in human gastric juice. This origin contributes to its exceptional stability in acidic environments and its protective effects on GI tissues<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-primary">
                            <div class="card-body">
                                <h4 class="h6 text-primary mb-2">Angiogenic Properties</h4>
                                <p class="small mb-0">Promotes formation of new blood vessels through VEGF receptor modulation and endothelial cell proliferation. This angiogenic activity is central to its tissue repair capabilities<sup><a href="#ref3" class="text-decoration-none">[3]</a></sup>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-primary">
                            <div class="card-body">
                                <h4 class="h6 text-primary mb-2">Cytoprotective Effects</h4>
                                <p class="small mb-0">Protects cells from various stressors including oxidative damage, inflammation, and ischemia. Research demonstrates protective effects across multiple organ systems<sup><a href="#ref4" class="text-decoration-none">[4]</a></sup>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 border-primary">
                            <div class="card-body">
                                <h4 class="h6 text-primary mb-2">Broad Tissue Specificity</h4>
                                <p class="small mb-0">Unlike many peptides with narrow tissue specificity, BPC-157 demonstrates beneficial effects across musculoskeletal, gastrointestinal, vascular, and neural tissues<sup><a href="#ref5" class="text-decoration-none">[5]</a></sup>.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="h4 mb-3 mt-4">Quality Assurance & Testing</h3>

                <p>Every batch of BPC-157 from Vital Healer Labs undergoes comprehensive third-party testing to ensure pharmaceutical-grade quality:</p>

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
                    <li><strong>Endotoxin Testing:</strong> Ensures levels are within acceptable limits for research</li>
                    <li><strong>Sterility Testing:</strong> Confirms absence of microbial contamination</li>
                </ul>
            </div>

            <!-- Mechanism Tab -->
            <div class="tab-pane fade" id="mechanism" role="tabpanel">
                <h2 class="h3 mb-4">Mechanism of Action</h2>

                <p class="lead">BPC-157 exerts its tissue protective and regenerative effects through multiple interconnected biochemical pathways, making it one of the most versatile peptides in regenerative research.</p>

                <h3 class="h5 mb-3 mt-4">1. Angiogenesis & Vascular Repair</h3>

                <p>One of BPC-157's most well-documented mechanisms is its pro-angiogenic activity through VEGF (Vascular Endothelial Growth Factor) pathway modulation<sup><a href="#ref3" class="text-decoration-none">[3]</a></sup>:</p>

                <ul>
                    <li><strong>VEGF Receptor Interaction:</strong> BPC-157 influences VEGF receptor expression and activation, promoting endothelial cell proliferation and migration</li>
                    <li><strong>Nitric Oxide Pathway:</strong> Enhances NO-mediated vasodilation and vascular function, contributing to improved blood flow to injured tissues<sup><a href="#ref6" class="text-decoration-none">[6]</a></sup></li>
                    <li><strong>Blood Vessel Formation:</strong> Stimulates formation of new capillaries and collateral circulation, crucial for healing hypoxic tissues</li>
                </ul>

                <div class="alert alert-primary">
                    <h4 class="h6">Research Insight:</h4>
                    <p class="mb-0">Studies demonstrate that BPC-157 accelerates angiogenesis in wound healing models, with significant increases in vascular density observed within 7-14 days of treatment<sup><a href="#ref3" class="text-decoration-none">[3]</a></sup>.</p>
                </div>

                <h3 class="h5 mb-3 mt-4">2. Growth Factor Modulation</h3>

                <p>BPC-157 influences multiple growth factor systems critical for tissue repair<sup><a href="#ref7" class="text-decoration-none">[7]</a></sup>:</p>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="h6 fw-bold">Upregulated Factors</h5>
                                <ul class="small mb-0">
                                    <li>VEGF (vascular repair)</li>
                                    <li>EGF (epithelial growth)</li>
                                    <li>FGF (fibroblast function)</li>
                                    <li>Growth hormone receptors</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="h6 fw-bold">Downstream Effects</h5>
                                <ul class="small mb-0">
                                    <li>Enhanced cell proliferation</li>
                                    <li>Improved cell survival</li>
                                    <li>Accelerated differentiation</li>
                                    <li>Increased collagen synthesis</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="h5 mb-3 mt-4">3. Fibroblast Activation & ECM Remodeling</h3>

                <p>BPC-157 significantly impacts fibroblast function and extracellular matrix production:</p>

                <ul>
                    <li><strong>Fibroblast Proliferation:</strong> Promotes fibroblast migration to injury sites and increases proliferation rates<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup></li>
                    <li><strong>Collagen Production:</strong> Upregulates collagen Type I and III synthesis, essential for structural tissue repair</li>
                    <li><strong>Matrix Metalloproteinase Balance:</strong> Helps regulate MMP activity for proper ECM remodeling without excessive degradation</li>
                    <li><strong>Tendon Outgrowth:</strong> Specifically enhances tendon cell outgrowth and tendon-to-bone healing<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup></li>
                </ul>

                <h3 class="h5 mb-3 mt-4">4. Anti-Inflammatory Mechanisms</h3>

                <p>BPC-157 demonstrates potent anti-inflammatory activity through multiple pathways<sup><a href="#ref8" class="text-decoration-none">[8]</a></sup>:</p>

                <div class="table-responsive mb-3">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Pathway</th>
                                <th>Effect</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>NF-κB Signaling</td>
                                <td>Inhibits activation</td>
                                <td>Reduced pro-inflammatory cytokines</td>
                            </tr>
                            <tr>
                                <td>Macrophage Polarization</td>
                                <td>Promotes M2 phenotype</td>
                                <td>Enhanced resolution of inflammation</td>
                            </tr>
                            <tr>
                                <td>Oxidative Stress</td>
                                <td>Reduces ROS production</td>
                                <td>Protection from oxidative damage</td>
                            </tr>
                            <tr>
                                <td>Cytokine Modulation</td>
                                <td>Balances IL-6, TNF-α</td>
                                <td>Controlled inflammatory response</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 class="h5 mb-3 mt-4">5. Cytoprotection & Cell Survival</h3>

                <p>BPC-157 protects cells from various stressors:</p>

                <ul>
                    <li><strong>Ischemia-Reperfusion Injury:</strong> Protects tissues from damage during restoration of blood flow</li>
                    <li><strong>Apoptosis Inhibition:</strong> Reduces programmed cell death in stressed tissues</li>
                    <li><strong>Membrane Stabilization:</strong> Helps maintain cellular membrane integrity under stress</li>
                    <li><strong>Mitochondrial Protection:</strong> Preserves mitochondrial function during injury</li>
                </ul>

                <div class="alert alert-success mt-3">
                    <h5 class="h6 fw-bold">Unique Multi-System Activity:</h5>
                    <p class="mb-0">Unlike many peptides with narrow mechanisms, BPC-157's ability to simultaneously modulate angiogenesis, growth factors, inflammation, and cytoprotection makes it exceptionally effective for comprehensive tissue repair research<sup><a href="#ref5" class="text-decoration-none">[5]</a></sup>.</p>
                </div>
            </div>

            <!-- Research Applications Tab -->
            <div class="tab-pane fade" id="research" role="tabpanel">
                <h2 class="h3 mb-4">Research Applications</h2>

                <p class="lead">BPC-157 has been studied across numerous tissue types and injury models, demonstrating broad therapeutic potential in preclinical research.</p>

                <div class="accordion" id="researchAccordion">
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#research1">
                                Musculoskeletal Tissue Research
                            </button>
                        </h3>
                        <div id="research1" class="accordion-collapse collapse show" data-bs-parent="#researchAccordion">
                            <div class="accordion-body">
                                <h4 class="h6 fw-bold">Tendon & Ligament Healing</h4>
                                <p>Extensive research demonstrates BPC-157's effects on tendon repair<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup>:</p>
                                <ul>
                                    <li>Accelerates tendon-to-bone healing in Achilles tendon models</li>
                                    <li>Promotes tendon cell outgrowth, survival, and migration</li>
                                    <li>Enhances collagen organization and fiber alignment</li>
                                    <li>Improves biomechanical strength of repaired tendons</li>
                                </ul>

                                <h4 class="h6 fw-bold mt-3">Muscle Injury Studies</h4>
                                <ul>
                                    <li>Accelerates muscle regeneration after crush injury</li>
                                    <li>Reduces fibrosis and scar tissue formation</li>
                                    <li>Improves functional recovery metrics</li>
                                    <li>Protects against atrophy during immobilization</li>
                                </ul>

                                <h4 class="h6 fw-bold mt-3">Bone & Joint Research</h4>
                                <ul>
                                    <li>Promotes fracture healing with improved callus formation</li>
                                    <li>Potential protective effects on cartilage in arthritis models</li>
                                    <li>Enhances integration of bone grafts</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#research2">
                                Gastrointestinal Research
                            </button>
                        </h3>
                        <div id="research2" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
                            <div class="accordion-body">
                                <p>Given its gastric origin, BPC-157 has been extensively studied for GI protection<sup><a href="#ref2" class="text-decoration-none">[2]</a></sup>:</p>
                                <ul>
                                    <li><strong>Ulcer Healing:</strong> Accelerates healing of gastric and duodenal ulcers in various injury models</li>
                                    <li><strong>Mucosal Protection:</strong> Prevents NSAID and alcohol-induced gastric damage</li>
                                    <li><strong>Inflammatory Bowel Disease:</strong> Shows promise in colitis models with reduced inflammation</li>
                                    <li><strong>Fistula Healing:</strong> Promotes healing of experimental GI fistulas</li>
                                    <li><strong>Esophageal Repair:</strong> Protects against esophageal damage and promotes healing</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#research3">
                                Vascular & Cardiovascular Studies
                            </button>
                        </h3>
                        <div id="research3" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
                            <div class="accordion-body">
                                <p>Research demonstrates significant vascular effects<sup><a href="#ref6" class="text-decoration-none">[6]</a></sup>:</p>
                                <ul>
                                    <li><strong>Ischemia-Reperfusion:</strong> Protects tissues from ischemic damage and reperfusion injury</li>
                                    <li><strong>Angiogenesis:</strong> Promotes new blood vessel formation in hypoxic tissues</li>
                                    <li><strong>Blood Flow:</strong> Improves regional blood flow through NO pathway activation</li>
                                    <li><strong>Thrombosis Prevention:</strong> May help prevent pathological clot formation</li>
                                    <li><strong>Vessel Integrity:</strong> Supports endothelial function and vessel wall stability</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#research4">
                                Wound Healing Research
                            </button>
                        </h3>
                        <div id="research4" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
                            <div class="accordion-body">
                                <p>Dermal wound studies show accelerated healing<sup><a href="#ref9" class="text-decoration-none">[9]</a></sup>:</p>
                                <ul>
                                    <li>Faster wound closure rates in incisional and excisional models</li>
                                    <li>Enhanced re-epithelialization and granulation tissue formation</li>
                                    <li>Improved collagen deposition and organization</li>
                                    <li>Reduced scarring and improved cosmetic outcomes</li>
                                    <li>Effective in diabetic wound models with impaired healing</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#research5">
                                Neurological & CNS Research
                            </button>
                        </h3>
                        <div id="research5" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
                            <div class="accordion-body">
                                <p>Emerging research on neuroprotective effects<sup><a href="#ref10" class="text-decoration-none">[10]</a></sup>:</p>
                                <ul>
                                    <li><strong>Peripheral Nerve Injury:</strong> Promotes nerve regeneration and functional recovery</li>
                                    <li><strong>Traumatic Brain Injury:</strong> Neuroprotective effects in TBI models</li>
                                    <li><strong>Spinal Cord Injury:</strong> May support recovery in SCI research models</li>
                                    <li><strong>Neurotransmitter Systems:</strong> Influences dopaminergic and serotonergic pathways</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-warning mt-4">
                    <strong>Important Research Note:</strong> BPC-157 research remains primarily preclinical, with most studies conducted in animal models. This product is sold strictly for laboratory research purposes only and is not intended for human use, consumption, or clinical application.
                </div>
            </div>

            <!-- Dosing Tab -->
            <div class="tab-pane fade" id="dosing" role="tabpanel">
                <h2 class="h3 mb-4">Research Dosing Guidelines</h2>

                <p class="lead">The following information is provided for research reference only. All dosing should be determined by qualified researchers based on specific research protocols and models.</p>

                <h3 class="h5 mb-3">Reconstitution Instructions</h3>
                <div class="card mb-4">
                    <div class="card-body">
                        <ol class="mb-0">
                            <li>Use bacteriostatic water or sterile water for reconstitution</li>
                            <li>Add water slowly down the side of the vial to avoid foaming</li>
                            <li>Do not shake vigorously; allow to dissolve naturally or gently swirl</li>
                            <li><strong>5mg vial:</strong> Add 1mL for 5mg/mL concentration (or 2mL for 2.5mg/mL)</li>
                            <li><strong>10mg vial:</strong> Add 2mL for 5mg/mL concentration (or 4mL for 2.5mg/mL)</li>
                            <li>Allow 2-3 minutes for complete dissolution</li>
                        </ol>
                    </div>
                </div>

                <h3 class="h5 mb-3">Storage Requirements</h3>
                <table class="table table-bordered">
                    <thead class="table-light">
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
                            <td>Up to 30 days with bacteriostatic water</td>
                        </tr>
                        <tr>
                            <td>Reconstituted (sterile water)</td>
                            <td>2-8°C (refrigerator) only</td>
                            <td>Up to 5-7 days</td>
                        </tr>
                    </tbody>
                </table>

                <h3 class="h5 mb-3 mt-4">Research Dosing Considerations</h3>
                <p>Research protocols vary significantly based on study objectives, animal models, and injury types. Common parameters from published research include:</p>

                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        <strong>Typical Research Dosing Range</strong>
                    </div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li><strong>Animal Models:</strong> 10 μg/kg to 10 mg/kg body weight (varies by species and model)</li>
                            <li><strong>Frequency:</strong> Once or twice daily in most protocols</li>
                            <li><strong>Duration:</strong> Typically 7-28 days depending on injury model</li>
                            <li><strong>Administration Routes:</strong> Subcutaneous, intraperitoneal, intramuscular, or oral in research</li>
                        </ul>
                    </div>
                </div>

                <div class="alert alert-info">
                    <h4 class="h6 fw-bold">Stability Note:</h4>
                    <p class="mb-0">BPC-157 demonstrates exceptional stability compared to many peptides. Research shows it remains active in gastric acid and at body temperature, contributing to its effectiveness across multiple administration routes<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup>.</p>
                </div>

                <h3 class="h5 mb-3 mt-4">Handling Best Practices</h3>
                <ul>
                    <li>Always use aseptic technique when reconstituting and handling</li>
                    <li>Avoid freeze-thaw cycles with reconstituted solution</li>
                    <li>Protect from prolonged exposure to light</li>
                    <li>Use calibrated syringes for accurate measurement</li>
                    <li>Document all preparation and storage conditions</li>
                </ul>

                <div class="alert alert-danger mt-4">
                    <strong>⚠️ For Research Use Only:</strong> This product is intended solely for in-vitro laboratory research by qualified professionals. It is not for human consumption, medical use, veterinary applications, or any in-vivo use without proper ethical approval. Researchers must follow all applicable regulations, IRB/IACUC protocols, and safety guidelines.
                </div>
            </div>

            <!-- Safety & Side Effects Tab -->
            <div class="tab-pane fade" id="safety" role="tabpanel">
                <h2 class="h3 mb-4">Safety Profile & Preclinical Observations</h2>

                <div class="alert alert-warning">
                    <strong>Important:</strong> The following information is based solely on preclinical research studies in laboratory models. This product is for research purposes only and is not approved for human or veterinary use.
                </div>

                <p class="lead">BPC-157 has demonstrated a favorable safety profile in extensive preclinical research, with minimal adverse effects reported across numerous animal studies.</p>

                <h3 class="h5 mb-3 mt-4">Preclinical Safety Data</h3>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header bg-success text-white">
                                <strong>Favorable Observations</strong>
                            </div>
                            <div class="card-body">
                                <ul class="small mb-0">
                                    <li>No significant toxicity at therapeutic doses in animal models</li>
                                    <li>Wide therapeutic window between effective and toxic doses</li>
                                    <li>No mutagenic or carcinogenic effects in standard assays</li>
                                    <li>Well-tolerated across various administration routes</li>
                                    <li>Minimal impact on standard hematology and biochemistry panels</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header bg-info text-white">
                                <strong>Key Safety Features</strong>
                            </div>
                            <div class="card-body">
                                <ul class="small mb-0">
                                    <li>Naturally-derived sequence from human gastric juice</li>
                                    <li>Stable in acidic and neutral pH environments</li>
                                    <li>Rapid clearance prevents accumulation</li>
                                    <li>No significant drug-drug interactions reported</li>
                                    <li>Reversible effects upon discontinuation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="h5 mb-3 mt-4">Organ System Safety (Preclinical)</h3>

                <div class="table-responsive mb-4">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>System</th>
                                <th>Research Observations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Cardiovascular</strong></td>
                                <td>Generally protective effects; improved endothelial function; no arrhythmias reported</td>
                            </tr>
                            <tr>
                                <td><strong>Gastrointestinal</strong></td>
                                <td>Protective effects on GI mucosa; reduced ulceration; improved gut integrity</td>
                            </tr>
                            <tr>
                                <td><strong>Hepatic</strong></td>
                                <td>No hepatotoxicity; potential hepatoprotective effects in injury models</td>
                            </tr>
                            <tr>
                                <td><strong>Renal</strong></td>
                                <td>No nephrotoxicity; possible nephroprotective properties</td>
                            </tr>
                            <tr>
                                <td><strong>Hematologic</strong></td>
                                <td>Improved platelet function in some models; no hematologic toxicity</td>
                            </tr>
                            <tr>
                                <td><strong>Neurological</strong></td>
                                <td>Neuroprotective in various models; no neurotoxicity observed</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3 class="h5 mb-3 mt-4">Research Contraindications & Considerations</h3>

                <div class="alert alert-danger">
                    <h4 class="h6 fw-bold">Theoretical Contraindications in Research:</h4>
                    <ul class="mb-0">
                        <li><strong>Active malignancy:</strong> Pro-angiogenic effects raise theoretical concerns about tumor angiogenesis</li>
                        <li><strong>Retinopathy models:</strong> Angiogenic activity may complicate retinal pathology research</li>
                        <li><strong>Pregnancy/lactation studies:</strong> Insufficient safety data for reproductive research</li>
                        <li><strong>Pediatric models:</strong> Limited developmental safety data</li>
                    </ul>
                </div>

                <h3 class="h5 mb-3 mt-4">Reported Observations from Research</h3>

                <p>In animal studies, the following have been occasionally noted:</p>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Common (>5% in studies)</strong>
                            </div>
                            <div class="card-body">
                                <ul class="small mb-0">
                                    <li>Transient injection site reactions (mild)</li>
                                    <li>Increased vascular density (expected pharmacology)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Uncommon (1-5% in studies)</strong>
                            </div>
                            <div class="card-body">
                                <ul class="small mb-0">
                                    <li>Temporary changes in blood pressure (usually beneficial)</li>
                                    <li>Altered pain thresholds in some neuropathy models</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="h5 mb-3 mt-4">Potential Drug Interactions (Theoretical)</h3>
                <p>While no significant interactions have been documented, theoretical considerations for research protocols include:</p>
                <ul>
                    <li><strong>Anti-coagulants:</strong> Potential additive effects on blood flow and platelet function</li>
                    <li><strong>Growth factors:</strong> May have synergistic effects with other angiogenic compounds</li>
                    <li><strong>NSAIDs:</strong> BPC-157 may counteract NSAID-induced gastric damage</li>
                    <li><strong>Corticosteroids:</strong> May have opposing effects on tissue repair processes</li>
                    <li><strong>Chemotherapy agents:</strong> Angiogenic effects may theoretically interfere with anti-angiogenic therapies</li>
                </ul>

                <h3 class="h5 mb-3 mt-4">Long-Term Safety Considerations</h3>
                <ul>
                    <li>Most research studies have been short to medium term (days to weeks)</li>
                    <li>Long-term safety data (months to years) is limited</li>
                    <li>No evidence of tolerance or dependency in animal models</li>
                    <li>Effects appear reversible upon discontinuation</li>
                    <li>No accumulation with repeated dosing observed</li>
                </ul>

                <div class="alert alert-info mt-4">
                    <h4 class="h6 fw-bold">Research Standards:</h4>
                    <p class="mb-0">All research involving BPC-157 should follow appropriate institutional review board (IRB) or institutional animal care and use committee (IACUC) guidelines. Proper documentation, ethical approval, and safety monitoring protocols must be implemented according to institutional and regulatory requirements.</p>
                </div>

                <div class="alert alert-warning mt-3">
                    <h4 class="h6 fw-bold">Regulatory Status:</h4>
                    <p class="mb-0">BPC-157 is not approved by the FDA or any regulatory agency for human or veterinary use. It is available solely as a research chemical for in-vitro laboratory research. Claims about therapeutic benefits refer only to preclinical research findings.</p>
                </div>
            </div>

            <!-- FAQ Tab -->
            <div class="tab-pane fade" id="faq" role="tabpanel">
                <h2 class="h3 mb-4">Frequently Asked Questions</h2>

                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                What makes BPC-157 unique compared to other peptides?
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>BPC-157 possesses several unique characteristics:</p>
                                <ul>
                                    <li><strong>Gastric origin:</strong> Derived from naturally occurring body protection compound in human gastric juice</li>
                                    <li><strong>Exceptional stability:</strong> Resistant to gastric acid and stable at body temperature, unlike many peptides that require careful handling</li>
                                    <li><strong>Broad tissue specificity:</strong> Effective across musculoskeletal, GI, vascular, and neural tissues rather than single-system activity</li>
                                    <li><strong>Multiple mechanisms:</strong> Simultaneously affects angiogenesis, growth factors, inflammation, and cytoprotection</li>
                                    <li><strong>Favorable safety profile:</strong> Extensive preclinical research shows minimal adverse effects<sup><a href="#ref5" class="text-decoration-none">[5]</a></sup></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                How should BPC-157 be stored?
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p><strong>Lyophilized (powder) form:</strong></p>
                                <ul>
                                    <li>Short-term (3-4 months): Room temperature or refrigerator (2-8°C) acceptable</li>
                                    <li>Long-term (1-2+ years): Freezer at -20°C or colder recommended</li>
                                    <li>Keep away from direct light and moisture</li>
                                </ul>
                                <p><strong>After reconstitution:</strong></p>
                                <ul class="mb-0">
                                    <li>Must be refrigerated at 2-8°C immediately</li>
                                    <li>With bacteriostatic water: Stable up to 30 days</li>
                                    <li>With sterile water only: Use within 5-7 days</li>
                                    <li>Do NOT freeze reconstituted solution</li>
                                    <li>Protect from prolonged light exposure</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What is the purity level and how is it verified?
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Our BPC-157 is guaranteed to be <strong>99%+ pure</strong>, verified through comprehensive third-party testing:</p>
                                <ul>
                                    <li><strong>HPLC (High-Performance Liquid Chromatography):</strong> Quantifies purity percentage and confirms concentration</li>
                                    <li><strong>Mass Spectrometry:</strong> Verifies exact molecular weight (1419.53 g/mol) and peptide identity</li>
                                    <li><strong>Amino Acid Analysis:</strong> Validates complete 15-amino acid sequence accuracy</li>
                                    <li><strong>Endotoxin Testing (LAL assay):</strong> Ensures endotoxin levels below 1 EU/mg</li>
                                    <li><strong>Sterility Testing:</strong> Confirms absence of bacterial and fungal contamination</li>
                                </ul>
                                <p class="mb-0">Third-party certificates of analysis (COA) are available upon request for each batch.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                What is the proper way to reconstitute BPC-157?
                            </button>
                        </h3>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <ol>
                                    <li>Remove vial from refrigerator and allow to reach room temperature (5-10 minutes)</li>
                                    <li>Use bacteriostatic water (0.9% benzyl alcohol) for longer stability, or sterile water for short-term use</li>
                                    <li>Wipe rubber stopper with alcohol swab</li>
                                    <li>Draw appropriate volume of water into sterile syringe</li>
                                    <li>Inject water <strong>slowly down the side of the vial</strong> to avoid foaming</li>
                                    <li>Do NOT shake vigorously - gently swirl or let dissolve naturally (2-3 minutes)</li>
                                    <li>Solution should be clear and colorless when fully dissolved</li>
                                    <li>Refrigerate immediately after reconstitution</li>
                                </ol>
                                <p class="mb-0 text-muted small"><strong>Note:</strong> Always use proper aseptic technique. Shaking can denature peptides and reduce effectiveness.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                What research has been conducted on BPC-157?
                            </button>
                        </h3>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>BPC-157 has been studied extensively in preclinical research across multiple areas:</p>
                                <ul>
                                    <li><strong>Musculoskeletal healing:</strong> Tendon, ligament, muscle, and bone repair studies showing accelerated healing and improved functional outcomes<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup></li>
                                    <li><strong>Gastrointestinal protection:</strong> Ulcer healing, mucosal protection, inflammatory bowel disease models<sup><a href="#ref2" class="text-decoration-none">[2]</a></sup></li>
                                    <li><strong>Angiogenesis:</strong> Blood vessel formation, ischemia-reperfusion injury, wound healing<sup><a href="#ref3" class="text-decoration-none">[3]</a></sup></li>
                                    <li><strong>Neuroprotection:</strong> Peripheral nerve injury, traumatic brain injury, spinal cord injury research<sup><a href="#ref10" class="text-decoration-none">[10]</a></sup></li>
                                    <li><strong>Anti-inflammatory effects:</strong> Various inflammatory disease models<sup><a href="#ref8" class="text-decoration-none">[8]</a></sup></li>
                                </ul>
                                <p class="mb-0">See the "References & Citations" tab for complete bibliography with links to primary literature.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                Is BPC-157 approved for human use?
                            </button>
                        </h3>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <div class="alert alert-danger mb-0">
                                    <p class="fw-bold">NO. This product is FOR RESEARCH USE ONLY.</p>
                                    <p class="mb-0">BPC-157 is not approved by the FDA or any regulatory agency for human consumption, medical use, or veterinary applications. It is classified as a research chemical intended solely for in-vitro laboratory research by qualified professionals. Any other use is strictly prohibited by law. All therapeutic claims refer exclusively to preclinical research findings.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                How does BPC-157 compare to TB-500?
                            </button>
                        </h3>
                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>BPC-157 and TB-500 are both studied for tissue repair but work through different mechanisms:</p>
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Aspect</th>
                                            <th>BPC-157</th>
                                            <th>TB-500</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>Origin</strong></td>
                                            <td>Gastric peptide</td>
                                            <td>Thymosin Beta-4 fragment</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Size</strong></td>
                                            <td>15 amino acids</td>
                                            <td>43 amino acids</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Primary Mechanism</strong></td>
                                            <td>Angiogenesis, growth factors</td>
                                            <td>Actin regulation, cell migration</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tissue Specificity</strong></td>
                                            <td>Very broad (GI, MSK, vascular)</td>
                                            <td>Primarily musculoskeletal</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Stability</strong></td>
                                            <td>Exceptional (gastric acid stable)</td>
                                            <td>Good (acetylated)</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="mb-0">Many researchers use them together for synergistic effects. See our <a href="/products/bpc-tb500">BPC-157 & TB-500 Blend</a> product.</p>
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
                                <p>Yes, we ship to most international destinations. Key points:</p>
                                <ul class="mb-0">
                                    <li><strong>Domestic (USA) orders:</strong> Typically ship within 24 hours via USPS Priority or FedEx</li>
                                    <li><strong>International shipping:</strong> Available to most countries, 7-14 business days transit time</li>
                                    <li><strong>Cold chain packaging:</strong> All shipments include insulation and gel packs to maintain product stability</li>
                                    <li><strong>Buyer responsibility:</strong> Customers are responsible for compliance with local laws and import regulations</li>
                                    <li><strong>Restricted countries:</strong> Some countries have import restrictions on research peptides - please verify legality before ordering</li>
                                    <li><strong>Customs:</strong> Package declared as "research chemical" or "laboratory reagent" with appropriate documentation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- References & Citations Tab -->
            <div class="tab-pane fade" id="references" role="tabpanel">
                <h2 class="h3 mb-4">References & Scientific Citations</h2>

                <p class="lead">All information on this page is supported by peer-reviewed scientific research. Below is a comprehensive bibliography of studies referenced.</p>

                <div class="alert alert-info">
                    <h4 class="h6 fw-bold">Research Integrity:</h4>
                    <p class="mb-0">We are committed to providing accurate, evidence-based information backed by published scientific literature. All claims about BPC-157's properties refer exclusively to preclinical research findings.</p>
                </div>

                <h3 class="h5 mb-4 mt-4">Primary Literature Citations</h3>

                <ol class="references-list">
                    <li id="ref1" class="mb-3">
                        <strong>Chang CH, Tsai WC, Lin MS, Hsu YH, Pang JHS.</strong> The promoting effect of pentadecapeptide BPC 157 on tendon healing involves tendon outgrowth, cell survival, and cell migration. <em>J Appl Physiol.</em> 2011;110(3):774-780. doi:10.1152/japplphysiol.00945.2010
                        [<a href="https://journals.physiology.org/doi/full/10.1152/japplphysiol.00945.2010" target="_blank" rel="nofollow noopener">Source</a>]
                    </li>

                    <li id="ref2" class="mb-3">
                        <strong>Sikiric P, Seiwerth S, Rucman R, et al.</strong> Stable gastric pentadecapeptide BPC 157: Novel therapy in gastrointestinal tract. <em>Curr Pharm Des.</em> 2011;17(16):1612-1632. doi:10.2174/138161211796196954
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/21548866" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref3" class="mb-3">
                        <strong>Seiwerth S, Milavić M, Vukojević J, et al.</strong> Stable gastric pentadecapeptide BPC 157 and primary vascular response. <em>Front Pharmacol.</em> 2021;12:718909. doi:10.3389/fphar.2021.718909
                        [<a href="https://www.frontiersin.org/articles/10.3389/fphar.2021.718909/" target="_blank" rel="nofollow noopener">Source</a>]
                    </li>

                    <li id="ref4" class="mb-3">
                        <strong>Sikiric P, Seiwerth S, Brcic L, et al.</strong> Revised Robert's cytoprotection and adaptive cytoprotection and stable gastric pentadecapeptide BPC 157. Possible significance and implications for novel mediator. <em>Curr Pharm Des.</em> 2010;16(10):1224-1234. doi:10.2174/138161210790945977
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/20166983" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref5" class="mb-3">
                        <strong>Kang EA, Han YM, An JM, et al.</strong> The Effects of BPC 157 on Bone Healing: Potential Mechanisms and Therapeutic Implications. <em>Biomedicines.</em> 2022;10(11):2945. doi:10.3390/biomedicines10112945
                        [<a href="https://www.mdpi.com/2227-9059/10/11/2945" target="_blank" rel="nofollow noopener">Source</a>]
                    </li>

                    <li id="ref6" class="mb-3">
                        <strong>Sikiric P, Seiwerth S, Brcic L, et al.</strong> Stable gastric pentadecapeptide BPC 157-NO-system relation. <em>Curr Pharm Des.</em> 2014;20(7):1126-1135. doi:10.2174/13816128113190990411
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/23755723" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref7" class="mb-3">
                        <strong>Chang CH, Tsai WC, Hsu YH, Pang JHS.</strong> Pentadecapeptide BPC 157 enhances the growth hormone receptor expression in tendon fibroblasts. <em>Molecules.</em> 2014;19(11):19066-19077. doi:10.3390/molecules191119066
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/25415472" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref8" class="mb-3">
                        <strong>Cesarec V, Becejac T, Misir M, et al.</strong> Pentadecapeptide BPC 157 and the central nervous system. <em>Neural Regen Res.</em> 2013;8(12):1103-1111. doi:10.3969/j.issn.1673-5374.2013.12.007
                        [<a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4146148/" target="_blank" rel="nofollow noopener">PMC</a>]
                    </li>

                    <li id="ref9" class="mb-3">
                        <strong>Gwyer D, Wragg NM, Wilson SL.</strong> Gastric pentadecapeptide body protection compound BPC 157 and its role in accelerating musculoskeletal soft tissue healing. <em>Cell Tissue Res.</em> 2019;377(2):153-159. doi:10.1007/s00441-019-03016-8
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/31139883" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref10" class="mb-3">
                        <strong>Sikiric P, Seiwerth S, Rucman R, et al.</strong> Brain-gut axis and pentadecapeptide BPC 157: theoretical and practical implications. <em>Curr Neuropharmacol.</em> 2016;14(8):857-865. doi:10.2174/1570159X13666150624160546
                        [<a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC5050387/" target="_blank" rel="nofollow noopener">PMC</a>]
                    </li>

                    <li id="ref11" class="mb-3">
                        <strong>Sikiric P, Seiwerth S, Mise S, et al.</strong> Corticosteroid-impairment of healing and gastric pentadecapeptide BPC-157 creams in burned mice. <em>Burns.</em> 2003;29(4):323-334. doi:10.1016/s0305-4179(03)00004-4
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/12781608" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>

                    <li id="ref12" class="mb-3">
                        <strong>Tkalcević VI, Cuzić S, Brajsa K, et al.</strong> Enhancement by PL 14736 of granulation and collagen organization in healing wounds and the potential role of egr-1 expression. <em>Eur J Pharmacol.</em> 2007;570(1-3):212-221. doi:10.1016/j.ejphar.2007.05.072
                        [<a href="https://www.ncbi.nlm.nih.gov/pubmed/17628536" target="_blank" rel="nofollow noopener">PubMed</a>]
                    </li>
                </ol>

                <div class="alert alert-warning mt-5">
                    <h4 class="h6 fw-bold">Disclaimer:</h4>
                    <p class="mb-0"><strong>ALL ARTICLES AND PRODUCT INFORMATION PROVIDED ON THIS WEBSITE ARE FOR INFORMATIONAL AND EDUCATIONAL PURPOSES ONLY.</strong> The products offered are for in-vitro laboratory research use only. These products are not medicines or drugs and have not been approved by the FDA to prevent, treat, or cure any medical condition, ailment, or disease. Bodily introduction of any kind into humans or animals is strictly forbidden by law. All research cited refers to preclinical studies only.</p>
                </div>

                <h3 class="h5 mb-3 mt-4">Additional Resources</h3>
                <ul>
                    <li><a href="https://pubmed.ncbi.nlm.nih.gov/" target="_blank" rel="nofollow noopener">PubMed</a> - Search "BPC-157" for complete research database</li>
                    <li><a href="https://scholar.google.com/" target="_blank" rel="nofollow noopener">Google Scholar</a> - Academic search for BPC-157 research</li>
                    <li><a href="https://www.ncbi.nlm.nih.gov/pmc/" target="_blank" rel="nofollow noopener">PubMed Central</a> - Free full-text articles</li>
                    <li><a href="https://clinicaltrials.gov/" target="_blank" rel="nofollow noopener">ClinicalTrials.gov</a> - Registry of clinical research (note: limited BPC-157 trials)</li>
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
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="/images/bpc-tb500-blend.jpg" class="card-img-top" alt="BPC-157 TB-500 Blend" loading="lazy" width="300" height="300">
                    <div class="card-body">
                        <h3 class="h6">BPC-157 & TB-500 Blend 10mg</h3>
                        <p class="text-primary fw-bold">$120.00</p>
                        <a href="/products/bpc-tb500" class="btn btn-sm btn-outline-primary w-100">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="/images/tb-500-solo.jpg" class="card-img-top" alt="TB-500 Solo" loading="lazy" width="300" height="300">
                    <div class="card-body">
                        <h3 class="h6">TB-500 5mg</h3>
                        <p class="text-primary fw-bold">$75.00</p>
                        <a href="/products/tb-500" class="btn btn-sm btn-outline-primary w-100">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="/images/ghk-cu.jpg" class="card-img-top" alt="GHK-Cu" loading="lazy" width="300" height="300">
                    <div class="card-body">
                        <h3 class="h6">GHK-Cu 50mg</h3>
                        <p class="text-primary fw-bold">$55.00</p>
                        <a href="/products/ghk-cu" class="btn btn-sm btn-outline-primary w-100">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="/images/bpc-157-solo.jpg" class="card-img-top" alt="Sermorelin" loading="lazy" width="300" height="300">
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

// Handle reference citation links - activate References tab then scroll
document.querySelectorAll('a[href^="#ref"]').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const refId = this.getAttribute('href');
        const targetElement = document.querySelector(refId);

        if (targetElement) {
            // Activate the References & Citations tab
            const referencesTabButton = document.getElementById('references-tab');
            const referencesTab = new bootstrap.Tab(referencesTabButton);

            // Show the tab first
            referencesTab.show();

            // Scroll to citation after tab transition completes
            setTimeout(() => {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                // Highlight the citation briefly
                targetElement.style.backgroundColor = '#fff3cd';
                setTimeout(() => {
                    targetElement.style.backgroundColor = '';
                }, 2000);
            }, 150);
        }
    });
});

// Smooth scroll for other anchor links
document.querySelectorAll('a[href^="#"]:not([href^="#ref"])').forEach(anchor => {
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
