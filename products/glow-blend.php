<?php
// Load configuration
require_once(__DIR__ . '/../config.php');

// Product-specific data
$product = [
	'id' => 'glow-blend',
	'name' => 'BPC-157, TB-500, GHK-Cu (Glow Blend)',
	'short_name' => 'Glow Blend',
	'sku' => 'VHL-GLOW-001',
	'variants' => [
		'30mg' => ['price' => 185.00, 'stock' => true]
	],
	'default_variant' => '30mg',
	'rating' => 4.9,
	'review_count' => 142,
	'image' => '/images/glow-blend.jpg',
	'purity' => '99%',
	'manufacturer' => 'USA',
	'cas_number' => 'BPC-137525-51-0 / TB-77591-33-4 / GHK-Cu-89030-95-5'
];

// SEO Settings
$page_title = 'Buy BPC-157, TB-500, GHK-Cu Glow Blend 30mg | 99% Purity | USA Made';
$page_description = 'Premium BPC-157, TB-500, and GHK-Cu (copper peptide) research blend. Skin and soft-tissue focused synergy: angiogenesis, actin regulation, collagen support. Third-party tested, 99% purity. Fast USA shipping.';
$page_keywords = 'BPC-157 TB-500 GHK-Cu, glow blend, copper peptide, GHK-Cu skin, collagen peptide, hair peptide, wound healing peptide, peptide blend skin, research peptides';

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
		'lowPrice' => $product['variants']['30mg']['price'],
		'highPrice' => $product['variants']['30mg']['price'],
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
		<li class="breadcrumb-item active" aria-current="page">Glow Blend</li>
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
						 alt="BPC-157, TB-500, GHK-Cu Glow Blend Vial - <?php echo $product['purity']; ?> Purity"
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
					<h2 class="h5 mb-3">Skin & Soft-Tissue Focused Synergy:</h2>
					<ul class="mb-0">
						<li>BPC-157: Angiogenesis and growth factor regulation</li>
						<li>TB-500: Actin regulation and cell migration</li>
						<li>GHK-Cu: Collagen synthesis signaling and antioxidant copper peptide</li>
						<li>Together: Enhanced dermal repair, vascular support, and ECM remodeling</li>
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
							Add to Cart - $<span id="total-price"><?php echo number_format(reset($product['variants'])['price'], 2); ?></span>
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
									<li><a href="#overview-what" class="text-decoration-none">What is the Glow Blend?</a></li>
									<li><a href="#overview-components" class="text-decoration-none">Individual Components</a></li>
									<li><a href="#overview-synergy" class="text-decoration-none">Why Combine Them?</a></li>
									<li><a href="#overview-molecular" class="text-decoration-none">Molecular Information</a></li>
								</ul>
							</div>
							<div class="col-md-6">
								<ul class="list-unstyled mb-0">
									<li><a href="#overview-applications" class="text-decoration-none">Research Applications</a></li>
									<li><a href="#overview-quality" class="text-decoration-none">Quality Assurance</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<h2 class="h3 mb-4" id="overview-what">What is the BPC-157, TB-500, GHK-Cu Glow Blend?</h2>

				<p class="lead">The Glow Blend combines three well-studied research peptides with complementary actions on vascular support, cellular migration, and extracellular matrix remodeling. It is formulated for dermal, soft-tissue, and cosmetic biology research where angiogenesis, actin dynamics, and collagen signaling are central.</p>

				<div class="row g-4 my-4" id="overview-components">
					<div class="col-md-4">
						<div class="card h-100 border-primary">
							<div class="card-body">
								<h3 class="h5 text-primary mb-3">BPC-157</h3>
								<ul class="mb-0">
									<li>Stable gastric pentadecapeptide (15 aa)</li>
									<li>Angiogenesis and growth factor modulation</li>
									<li>Supports fibroblast migration</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card h-100 border-primary">
							<div class="card-body">
								<h3 class="h5 text-primary mb-3">TB-500</h3>
								<ul class="mb-0">
									<li>Thymosin Beta-4 fragment (43 aa)</li>
									<li>Actin-regulation and cell migration</li>
									<li>Reduces inflammatory markers in models</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card h-100 border-primary">
							<div class="card-body">
								<h3 class="h5 text-primary mb-3">GHK-Cu</h3>
								<ul class="mb-0">
									<li>Copper peptide (glycyl-L-histidyl-L-lysine-Cu²⁺)</li>
									<li>Signals collagen and ECM synthesis</li>
									<li>Antioxidant and skin remodeling pathways</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="row g-4 my-4">
					<div class="col-md-4">
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
									<li>15 amino acid sequence</li>
									<li>Promotes angiogenesis (blood vessel formation)<sup><a href="#ref1">[1]</a></sup></li>
									<li>Regulates growth factor production</li>
									<li>Enhances collagen formation</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card h-100 border-primary">
							<div class="card-body">
								<h3 class="h5 text-primary mb-3">TB-500 (Thymosin Beta-4)</h3>
								<div class="text-center mb-3">
									<img src="/images/tb-500-chem.jpg"
									     alt="TB-500 Chemical Structure - 43 Amino Acid Thymosin Beta-4 Fragment"
									     class="img-fluid"
									     style="max-height: 200px; width: auto;">
								</div>
								<ul class="mb-0">
									<li>Naturally occurring peptide in thymus</li>
									<li>43 amino acid sequence</li>
									<li>Actin-binding protein<sup><a href="#ref3">[3]</a></sup></li>
									<li>Facilitates cell migration to injury sites</li>
									<li>Reduces inflammation</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card h-100 border-primary">
							<div class="card-body">
								<h3 class="h5 text-primary mb-3">GHK-Cu (Copper Peptide)</h3>
								<div class="text-center mb-3">
									<img src="/images/ghk-cu-chem.jpg"
									     alt="GHK-Cu Chemical Structure - Tripeptide Copper Complex"
									     class="img-fluid"
									     style="max-height: 200px; width: auto;">
								</div>
								<ul class="mb-0">
									<li>Tripeptide-copper complex</li>
									<li>3 amino acid sequence with Cu²⁺</li>
									<li>Copper delivery and chelation</li>
									<li>Upregulates collagen synthesis<sup><a href="#ref5">[5]</a></sup></li>
									<li>Balances MMP/TIMP for ECM turnover</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="mt-4">
					<h3 class="h4 mb-3">Comparative Analysis</h3>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead class="table-light">
								<tr>
									<th>Aspect</th>
									<th>BPC-157</th>
									<th>TB-500</th>
									<th>GHK-Cu</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><strong>Primary Mechanism</strong></td>
									<td>Angiogenesis, growth factor modulation<sup><a href="#ref1">[1]</a></sup></td>
									<td>Actin regulation, cell migration<sup><a href="#ref3">[3]</a></sup></td>
									<td>Copper-mediated ECM/collagen signaling<sup><a href="#ref5">[5]</a></sup></td>
								</tr>
								<tr>
									<td><strong>Key Use in Blend</strong></td>
									<td>Perfusion & repair environment</td>
									<td>Directed cellular trafficking</td>
									<td>Matrix renewal & dermal quality</td>
								</tr>
								<tr>
									<td><strong>Representative Pathways</strong></td>
									<td>VEGF/NO</td>
									<td>G-actin / filament dynamics</td>
									<td>LOX, SOD, MMP/TIMP balance</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<h3 class="h4 mb-3" id="overview-synergy">Why Combine Them?</h3>
				<p>These agents act at distinct but complementary levels of the repair cascade: BPC-157 improves vascular supply and growth factor signaling<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup>, TB-500 organizes actin for directed cell migration<sup><a href="#ref3" class="text-decoration-none">[3]</a></sup>, and GHK-Cu provides copper-mediated signaling that upregulates collagen-related genes and combats oxidative stress<sup><a href="#ref5" class="text-decoration-none">[5]</a></sup><sup><a href="#ref6" class="text-decoration-none">[6]</a></sup>. Together, the blend targets angiogenesis, cell trafficking, and ECM remodeling—key axes in dermal and soft-tissue research.</p>

				<h3 class="h4 mb-4 mt-5" id="overview-molecular">Molecular & Chemical Information</h3>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead class="table-light">
							<tr>
								<th>Property</th>
								<th>BPC-157</th>
								<th>TB-500</th>
								<th>GHK-Cu</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><strong>Molecular Formula</strong></td>
								<td>C₆₂H₉₈N₁₆O₂₂</td>
								<td>C₂₁₂H₃₅₀N₅₆O₇₈S</td>
								<td>C₁₄H₂₄N₆O₄ · Cu</td>
							</tr>
							<tr>
								<td><strong>Molecular Weight</strong></td>
								<td>1419.53 g/mol</td>
								<td>4963.44 g/mol</td>
								<td>~340.87 g/mol + Cu</td>
							</tr>
							<tr>
								<td><strong>Sequence Length</strong></td>
								<td>15 aa</td>
								<td>43 aa</td>
								<td>Tripeptide (3 aa + Cu²⁺)</td>
							</tr>
							<tr>
								<td><strong>CAS Number</strong></td>
								<td>137525-51-0</td>
								<td>77591-33-4</td>
								<td>89030-95-5</td>
							</tr>
							<tr>
								<td><strong>Primary Role</strong></td>
								<td>Angiogenesis & growth factors</td>
								<td>Actin dynamics & migration</td>
								<td>ECM/collagen signaling</td>
							</tr>
						</tbody>
					</table>
				</div>

				<h4 class="h5 mb-3 mt-4">Chemical Structure Visualization</h4>
				<p>Below are the detailed chemical structures of all three peptides in this blend. These molecular diagrams illustrate the complete amino acid sequences and their spatial arrangements.</p>

				<div class="row g-4 mb-4">
					<div class="col-lg-4">
						<div class="card">
							<div class="card-header bg-primary text-white">
								<strong>BPC-157 Structure</strong>
							</div>
							<div class="card-body text-center bg-light">
								<img src="/images/bpc-157-chem.jpg"
								     alt="Complete BPC-157 Chemical Structure"
								     class="img-fluid"
								     style="max-width: 100%; height: auto;">
								<p class="small text-muted mt-3 mb-0">
									<strong>15 aa</strong><br>
									1419.53 g/mol
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card">
							<div class="card-header bg-info text-white">
								<strong>TB-500 Structure</strong>
							</div>
							<div class="card-body text-center bg-light">
								<img src="/images/tb-500-chem.jpg"
								     alt="Complete TB-500 Chemical Structure"
								     class="img-fluid"
								     style="max-width: 100%; height: auto;">
								<p class="small text-muted mt-3 mb-0">
									<strong>43 aa</strong><br>
									4963.44 g/mol
								</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card">
							<div class="card-header bg-success text-white">
								<strong>GHK-Cu Structure</strong>
							</div>
							<div class="card-body text-center bg-light">
								<img src="/images/ghk-cu-chem.jpg"
								     alt="Complete GHK-Cu Chemical Structure"
								     class="img-fluid"
								     style="max-width: 100%; height: auto;">
								<p class="small text-muted mt-3 mb-0">
									<strong>Tripeptide · Cu²⁺</strong><br>
									~340.87 g/mol + Cu
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="alert alert-info">
					<h5 class="h6 fw-bold">Structural Notes:</h5>
					<ul class="mb-0">
						<li><strong>BPC-157:</strong> A stable pentadecapeptide (15 amino acids) with resistance to gastric degradation, enabling multiple administration routes<sup><a href="#ref1">[1]</a></sup>.</li>
						<li><strong>TB-500:</strong> A 43-amino acid peptide with acetylated N-terminus (Ac-Ser) containing the critical actin-binding domain for cell migration<sup><a href="#ref3">[3]</a></sup>.</li>
						<li><strong>GHK-Cu:</strong> A tripeptide with high-affinity copper coordination via histidine, facilitating copper delivery to lysyl oxidase and other ECM enzymes<sup><a href="#ref5">[5]</a></sup>.</li>
					</ul>
				</div>

				<h3 class="h4 mb-4 mt-5" id="overview-applications">Quality Assurance & Testing</h3>
				<p>Every batch of Glow Blend undergoes rigorous third-party testing to ensure pharmaceutical-grade quality:</p>
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
					<li><strong>HPLC:</strong> Verifies purity and concentration</li>
					<li><strong>Mass Spectrometry:</strong> Confirms molecular weights and identity</li>
					<li><strong>Amino Acid Analysis:</strong> Validates sequence accuracy</li>
					<li><strong>Endotoxin Testing:</strong> Ensures acceptable levels</li>
					<li><strong>Sterility Testing:</strong> Confirms absence of microbial contamination</li>
				</ul>
			</div>

			<!-- Mechanism Tab -->
			<div class="tab-pane fade" id="mechanism" role="tabpanel">
				<h2 class="h3 mb-4">Mechanism of Action: Tri-Axis Tissue Support</h2>
				<p class="lead">The Glow Blend targets three complementary axes of repair biology—angiogenesis (BPC-157), cytoskeletal migration (TB-500), and ECM/collagen signaling (GHK-Cu).</p>

				<h3 class="h5 mb-3 mt-4">1. Angiogenesis & Vascular Support (BPC-157)</h3>
				<ul>
					<li>Modulates VEGF-pathway activity for endothelial proliferation and migration</li>
					<li>Enhances nitric oxide signaling supporting blood flow to tissues</li>
					<li>Promotes microvascular formation crucial for hypoxic dermal sites</li>
				</ul>

				<h3 class="h5 mb-3 mt-4">2. Actin Dynamics & Directed Cell Migration (TB-500)</h3>
				<ul>
					<li>Regulates G-actin availability and polymerization for controlled movement</li>
					<li>Facilitates fibroblast and reparative cell trafficking to injury sites</li>
					<li>Supports efficient cytoskeletal organization during remodeling</li>
				</ul>

				<h3 class="h5 mb-3 mt-4">3. ECM Remodeling & Collagen Signaling (GHK-Cu)</h3>
				<ul>
					<li>Upregulates genes involved in collagen and glycosaminoglycan synthesis</li>
					<li>Exerts antioxidant action via copper-mediated redox enzymes</li>
					<li>Supports dermal matrix renewal and appearance-related pathways</li>
				</ul>

				<div class="alert alert-success mt-3">
					<h5 class="h6 fw-bold">Synergistic Outcome</h5>
					<p class="mb-0">Improved perfusion (BPC-157) meets efficient cellular trafficking (TB-500) and ECM signaling (GHK-Cu), a combination well-suited to research in dermal repair, scar remodeling, and cosmetic biology.</p>
				</div>
			</div>

			<!-- Research Applications Tab -->
			<div class="tab-pane fade" id="research" role="tabpanel">
				<h2 class="h3 mb-4">Research Applications</h2>
				<p class="lead">Preclinical and laboratory research contexts where this triad is often explored include:</p>
				<div class="accordion" id="researchAccordion">
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#research1">
								Dermatologic & Cosmetic Biology
							</button>
						</h3>
						<div id="research1" class="accordion-collapse collapse show" data-bs-parent="#researchAccordion">
							<div class="accordion-body">
								<ul>
									<li>Support of collagen signaling and ECM renewal (GHK-Cu)</li>
								<li>Microvascular density and perfusion (BPC-157)<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup></li>
									<li>Fibroblast migration and organization (TB-500)</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#research2">
								Wound Repair & Scar Remodeling
							</button>
						</h3>
						<div id="research2" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
							<div class="accordion-body">
								<ul>
								<li>Angiogenesis and re-epithelialization models<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup><sup><a href="#ref4" class="text-decoration-none">[4]</a></sup></li>
									<li>Collagen deposition and alignment studies</li>
									<li>Inflammatory marker modulation</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#research3">
								Hair & Scalp Research
							</button>
						</h3>
						<div id="research3" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
							<div class="accordion-body">
								<ul>
								<li>GHK-Cu pathways in follicular environment and dermal papilla<sup><a href="#ref5" class="text-decoration-none">[5]</a></sup></li>
									<li>Vascular support and tissue perfusion (BPC-157)</li>
									<li>Cell migration in follicular niche (TB-500)</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#research4">
								Soft-Tissue & Vascular Studies
							</button>
						</h3>
						<div id="research4" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
							<div class="accordion-body">
								<ul>
									<li>Ischemia-reperfusion protection models (BPC-157)</li>
									<li>Directed migration in tissue engineering (TB-500)</li>
									<li>Redox balance and matrix turnover (GHK-Cu)</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="alert alert-warning mt-4">
					<strong>Important Research Note:</strong> Information provided reflects laboratory and preclinical research contexts. Product is sold strictly for in-vitro laboratory research and is not intended for human or veterinary use.
				</div>
			</div>

			<!-- Dosing Tab -->
			<div class="tab-pane fade" id="dosing" role="tabpanel">
				<h2 class="h3 mb-4">Research Dosing Guidelines</h2>
				<p class="lead">Provided for research reference only. Researchers should determine exact parameters per protocol and model.</p>
				<h3 class="h5 mb-3">Reconstitution Instructions</h3>
				<div class="card mb-4">
					<div class="card-body">
						<ol class="mb-0">
							<li>Use bacteriostatic or sterile water for reconstitution</li>
							<li>Add water slowly down vial side; avoid foaming</li>
							<li>Do not shake; allow to dissolve or gently swirl</li>
							<li><strong>30mg vial:</strong> Add 3mL for 10mg/mL concentration (or 6mL for 5mg/mL)</li>
							<li>Allow 2–3 minutes for complete dissolution</li>
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
							<td>2–8°C or -20°C</td>
							<td>3–4 months at room temp, 2+ years frozen</td>
						</tr>
						<tr>
							<td>Reconstituted</td>
							<td>2–8°C only</td>
							<td>Up to 30 days (bacteriostatic)</td>
						</tr>
						<tr>
							<td>Reconstituted (sterile water)</td>
							<td>2–8°C only</td>
							<td>Up to 5–7 days</td>
						</tr>
					</tbody>
				</table>
				<div class="alert alert-danger mt-4">
					<strong>⚠️ For Research Use Only:</strong> Not for human consumption, medical use, veterinary application, or any in-vivo use without proper ethical approval.
				</div>
			</div>

			<!-- Safety & Side Effects Tab -->
			<div class="tab-pane fade" id="safety" role="tabpanel">
				<h2 class="h3 mb-4">Safety & Preclinical Observations</h2>
				<div class="alert alert-warning">
					<strong>Important:</strong> The following summarizes observations from preclinical literature contexts. This product is for research use only.
				</div>
				<div class="row g-3 mb-4">
					<div class="col-md-6">
						<div class="card h-100">
							<div class="card-header bg-success text-white">
								<strong>Favorable Observations</strong>
							</div>
							<div class="card-body">
								<ul class="small mb-0">
									<li>Broad tissue compatibility in models</li>
									<li>Well-tolerated across administration routes (model-dependent)</li>
									<li>Reversible effects upon discontinuation</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card h-100">
							<div class="card-header bg-info text-white">
								<strong>Key Features</strong>
							</div>
							<div class="card-body">
								<ul class="small mb-0">
									<li>GHK-Cu supports antioxidant enzyme systems</li>
									<li>BPC-157 supports vascular integrity</li>
									<li>TB-500 aids controlled cellular movement</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="alert alert-info mt-3">
					<h4 class="h6 fw-bold">Regulatory Status</h4>
					<p class="mb-0">Not approved by FDA or any regulatory agency for human or veterinary use. Laboratory research use only.</p>
				</div>
			</div>

			<!-- FAQ Tab -->
			<div class="tab-pane fade" id="faq" role="tabpanel">
				<h2 class="h3 mb-4">Frequently Asked Questions</h2>
				<div class="accordion" id="faqAccordion">
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
								What makes the Glow Blend unique?
							</button>
						</h3>
						<div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
							<div class="accordion-body">
								<p>It combines vascular support (BPC-157), directed cellular migration (TB-500), and ECM/collagen signaling (GHK-Cu), a triad frequently explored in dermal and soft-tissue research contexts.</p>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
								How should it be stored?
							</button>
						</h3>
						<div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
							<div class="accordion-body">
								<ul class="mb-0">
									<li>Powder: 2–8°C or -20°C for long-term</li>
									<li>Reconstituted: 2–8°C; avoid freeze–thaw cycles</li>
									<li>Protect from light and moisture</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
								Is this product approved for human use?
							</button>
						</h3>
						<div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
							<div class="accordion-body">
								<div class="alert alert-danger mb-0">
									<p class="fw-bold">NO. This product is FOR RESEARCH USE ONLY.</p>
									<p class="mb-0">Not approved for human or veterinary applications. Intended solely for in-vitro laboratory research by qualified professionals.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- References & Citations Tab -->
			<div class="tab-pane fade" id="references" role="tabpanel">
				<h2 class="h3 mb-4">References & Scientific Citations</h2>
				<p class="lead">Selected literature commonly referenced in the context of these peptides:</p>
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
						<strong>Philp D, Huff T, Gho YS, et al.</strong> The actin binding site on thymosin beta-4 promotes angiogenesis. <em>FASEB J.</em> 2003;17(14):2103-2105.
						[<a href="https://doi.org/10.1096/fj.03-0206fje" target="_blank" rel="nofollow noopener">DOI</a>]
					</li>
					<li id="ref4" class="mb-3">
						<strong>Goldstein AL, Hannappel E, Kleinman HK.</strong> Thymosin β4: actin-sequestering protein moonlights to repair injured tissues. <em>Trends Mol Med.</em> 2005;11(9):421-429.
						[<a href="https://doi.org/10.1016/j.molmed.2005.07.004" target="_blank" rel="nofollow noopener">DOI</a>]
					</li>
					<li id="ref5" class="mb-3">
						<strong>Pickart L, Margolina A.</strong> GHK-Cu in skin remodeling and anti-aging. <em>Clin Cosmet Investig Dermatol.</em> 2018;11:469–483.
						[<a href="https://www.dovepress.com/ghk-cu-in-skin-remodeling-and-anti-aging-peer-reviewed-fulltext-article-CCID" target="_blank" rel="nofollow noopener">Source</a>]
					</li>
					<li id="ref6" class="mb-3">
						<strong>Maquart FX, et al.</strong> Stimulation of collagen synthesis by the tripeptide-copper complex GHK-Cu in fibroblast cultures. <em>FEBS Lett.</em> 1988;238(2):343–346.
						[<a href="https://pubmed.ncbi.nlm.nih.gov/2965491/" target="_blank" rel="nofollow noopener">PubMed</a>]
					</li>
				</ol>
				<div class="alert alert-warning mt-4">
					<h4 class="h6 fw-bold">Disclaimer:</h4>
					<p class="mb-0"><strong>ALL CONTENT IS FOR INFORMATIONAL AND EDUCATIONAL PURPOSES ONLY.</strong> Products are for in-vitro laboratory research use only and are not medicines or drugs. Not approved by the FDA to prevent, treat, or cure any disease. Bodily introduction in humans or animals is strictly forbidden.</p>
				</div>
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
					<img src="/images/bpc-157-solo.jpg" class="card-img-top" alt="BPC-157 Solo" loading="lazy" width="300" height="300">
					<div class="card-body">
						<h3 class="h6">BPC-157 5mg</h3>
						<p class="text-primary fw-bold">$59.50</p>
						<a href="/products/bpc-157" class="btn btn-sm btn-outline-primary w-100">View Product</a>
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


