<?php
// Load configuration
require_once(__DIR__ . '/../config.php');

// Product-specific data
$product = [
	'id' => 'ghk-cu',
	'name' => 'GHK-Cu (Copper Peptide)',
	'short_name' => 'GHK-Cu',
	'sku' => 'VHL-GHK-001',
	'variants' => [
		'50mg' => ['price' => 55.00, 'stock' => true],
		'100mg' => ['price' => 95.00, 'stock' => true]
	],
	'default_variant' => '50mg',
	'rating' => 4.9,
	'review_count' => 212,
	'image' => '/images/ghk-cu.jpg',
	'purity' => '99%',
	'manufacturer' => 'USA',
	'cas_number' => '89030-95-5'
];

// SEO Settings
$page_title = 'Buy GHK-Cu Copper Peptide 50mg/100mg | 99% Pure | Collagen & Skin Research';
$page_description = 'Premium GHK-Cu (copper peptide) for research. Tripeptide-copper complex studied for collagen synthesis, dermal remodeling, hair follicle biology, and wound repair. Third-party tested, 99% purity. Fast USA shipping.';
$page_keywords = 'GHK-Cu, copper peptide, buy GHK-Cu, collagen peptide, skin peptide, hair peptide, wound healing peptide, tripeptide copper complex, research peptides';

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
		'lowPrice' => $product['variants']['50mg']['price'],
		'highPrice' => $product['variants']['100mg']['price'],
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
		<li class="breadcrumb-item active" aria-current="page">GHK-Cu</li>
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
					     alt="GHK-Cu Copper Peptide Vial - <?php echo $product['purity']; ?> Purity"
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
						<li>Tripeptide-copper complex (glycyl-L-histidyl-L-lysine + Cu²⁺)</li>
						<li>Supports collagen synthesis and dermal extracellular matrix remodeling</li>
						<li>Modulates MMP/TIMP balance for healthy matrix turnover</li>
						<li>Signals via copper delivery and high-affinity receptors</li>
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
							Add to Cart - $<span id="total-price">55.00</span>
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
				<h2 class="h3 mb-4">What is GHK-Cu?</h2>
				<p class="lead">GHK-Cu is a naturally occurring tripeptide-copper complex composed of glycyl-L-histidyl-L-lysine chelated to Cu²⁺. It has been studied extensively for its roles in dermal remodeling, collagen synthesis, hair follicle biology, and wound repair signaling<sup><a href="#ref2" class="text-decoration-none">[2]</a></sup><sup><a href="#ref3" class="text-decoration-none">[3]</a></sup>.</p>
				<p>Originally identified in human plasma and later in saliva and urine, GHK exhibits a remarkably high affinity for copper. When complexed with copper (GHK-Cu), it serves as a bioactive signal that can influence gene expression programs related to extracellular matrix production, protease balance, and cellular proliferation/migration in skin and connective tissues<sup><a href="#ref1" class="text-decoration-none">[1]</a></sup><sup><a href="#ref4" class="text-decoration-none">[4]</a></sup>.</p>

				<div class="row g-4 my-4">
					<div class="col-md-12">
						<div class="card h-100 border-primary">
							<div class="card-body">
								<h3 class="h5 text-primary mb-3">GHK-Cu (Copper Peptide Complex)</h3>
								<div class="text-center mb-3">
									<img src="/images/ghk-cu-chem.jpg"
									     alt="GHK-Cu Chemical Structure - Tripeptide Copper Complex"
									     class="img-fluid"
									     style="max-height: 200px; width: auto;">
								</div>
								<ul class="mb-0">
									<li>Tripeptide-copper complex (Gly-His-Lys · Cu²⁺)</li>
									<li>High-affinity copper chelation and delivery</li>
									<li>Upregulates collagen and glycosaminoglycan synthesis<sup><a href="#ref3">[3]</a></sup></li>
									<li>Balances MMPs and TIMPs for healthy ECM turnover<sup><a href="#ref2">[2]</a></sup></li>
									<li>Supports hair follicle stem cell niche signaling<sup><a href="#ref2">[2]</a></sup></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<h3 class="h4 mb-3 mt-4">Key Research Properties</h3>
				<p>GHK-Cu demonstrates unique characteristics that make it particularly valuable for dermatologic and cosmetic research<sup><a href="#ref2">[2]</a></sup>:</p>
				<ol>
					<li><strong>Copper-Mediated Signaling:</strong> GHK binds Cu²⁺ with high affinity and delivers bioavailable copper to cells, supporting lysyl oxidase and superoxide dismutase pathways<sup><a href="#ref2">[2]</a></sup>.</li>
					<li><strong>ECM Remodeling:</strong> Promotes synthesis of collagen types I/III and dermal GAGs while balancing matrix metalloproteinases<sup><a href="#ref3">[3]</a></sup>.</li>
					<li><strong>Hair Follicle Support:</strong> Signals within the hair follicle microenvironment and encourages keratinocyte-fibroblast crosstalk<sup><a href="#ref2">[2]</a></sup>.</li>
					<li><strong>Antioxidant Effects:</strong> Copper-dependent enzyme support provides antioxidant capacity relevant to skin health models.</li>
				</ol>

				<h3 class="h4 mb-4 mt-5">Molecular & Chemical Information</h3>

				<div class="table-responsive">
					<table class="table table-bordered">
						<thead class="table-light">
							<tr>
								<th>Property</th>
								<th>GHK-Cu</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><strong>Molecular Formula</strong></td>
								<td>C₁₄H₂₄N₆O₄ · Cu</td>
							</tr>
							<tr>
								<td><strong>Molecular Weight</strong></td>
								<td>~340.87 g/mol (peptide) + Cu</td>
							</tr>
							<tr>
								<td><strong>Sequence Length</strong></td>
								<td>Tripeptide (3 amino acids)</td>
							</tr>
							<tr>
								<td><strong>CAS Number</strong></td>
								<td>89030-95-5</td>
							</tr>
							<tr>
								<td><strong>Sequence</strong></td>
								<td>Gly-His-Lys · Cu²⁺</td>
							</tr>
						</tbody>
					</table>
				</div>

				<h4 class="h5 mb-3 mt-4">Chemical Structure Visualization</h4>
				<p>Below is the detailed chemical structure of GHK-Cu. This molecular diagram illustrates the tripeptide sequence with coordinated copper ion.</p>

				<div class="row g-4 mb-4">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header bg-success text-white">
								<strong>GHK-Cu Structure</strong>
							</div>
							<div class="card-body text-center bg-light">
								<img src="/images/ghk-cu-chem.jpg"
								     alt="Complete GHK-Cu Chemical Structure - Gly-His-Lys Copper Complex"
								     class="img-fluid"
								     style="max-width: 100%; height: auto;">
								<p class="small text-muted mt-3 mb-0">
									<strong>Molecular Formula:</strong> C₁₄H₂₄N₆O₄ · Cu<br>
									<strong>Molecular Weight:</strong> ~340.87 g/mol + Cu
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="alert alert-info">
					<h5 class="h6 fw-bold">Structural Notes:</h5>
					<ul class="mb-0">
						<li><strong>GHK-Cu:</strong> A tripeptide with high-affinity 1:1 complex formation with Cu²⁺, facilitating copper delivery to enzymatic systems<sup><a href="#ref2">[2]</a></sup>.</li>
						<li><strong>Copper Coordination:</strong> The histidine imidazole ring and terminal groups chelate the copper ion, creating a stable bioactive complex.</li>
						<li><strong>ECM Signaling:</strong> The copper-peptide complex influences gene expression programs related to collagen synthesis, MMP balance, and antioxidant enzyme support<sup><a href="#ref3">[3]</a></sup>.</li>
					</ul>
				</div>

				<h3 class="h4 mb-4 mt-5">Comparative Analysis</h3>

				<div class="table-responsive">
					<table class="table table-striped">
						<thead class="table-primary">
							<tr>
								<th>Characteristic</th>
								<th>GHK-Cu</th>
								<th>BPC-157</th>
								<th>TB-500</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><strong>Primary Mechanism</strong></td>
								<td>Copper delivery, ECM/collagen signaling<sup><a href="#ref2">[2]</a></sup></td>
								<td>Angiogenesis, growth factor modulation</td>
								<td>Actin regulation, cell migration</td>
							</tr>
							<tr>
								<td><strong>Tissue Specificity</strong></td>
								<td>Dermal, cosmetic biology</td>
								<td>Broad spectrum (GI, musculoskeletal, vascular)</td>
								<td>Primarily musculoskeletal</td>
							</tr>
							<tr>
								<td><strong>Key Pathways</strong></td>
								<td>LOX, SOD, MMP/TIMP balance</td>
								<td>VEGF/NO, growth factors</td>
								<td>G-actin/filament dynamics</td>
							</tr>
							<tr>
								<td><strong>Research Applications</strong></td>
								<td>Skin remodeling, hair follicle biology</td>
								<td>Tendon, ligament, GI healing</td>
								<td>Muscle, cardiac tissue</td>
							</tr>
						</tbody>
					</table>
				</div>

				<h3 class="h4 mb-4 mt-5">Quality Assurance & Testing</h3>

				<p>Every batch of GHK-Cu from Vital Healer Labs undergoes comprehensive third-party testing to ensure pharmaceutical-grade quality:</p>

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
				<p class="lead">GHK-Cu primarily acts as a copper-delivery signal that influences gene expression programs involved in extracellular matrix synthesis, protease balance, and cellular regeneration.</p>
				<h3 class="h5 mb-3 mt-4">1. Copper-Mediated Signaling</h3>
				<ul>
					<li><strong>High-affinity chelation:</strong> GHK binds Cu²⁺ and delivers bioavailable copper to cells.</li>
					<li><strong>Enzymatic cofactor roles:</strong> Supports lysyl oxidase and superoxide dismutase pathways relevant to collagen crosslinking and redox balance<sup><a href="#ref2" class="text-decoration-none">[2]</a></sup>.</li>
				</ul>
				<h3 class="h5 mb-3 mt-4">2. ECM Remodeling & Collagen Synthesis</h3>
				<ul>
					<li><strong>Collagen/GAG upregulation:</strong> Promotes synthesis of collagen types I/III and dermal GAGs<sup><a href="#ref3" class="text-decoration-none">[3]</a></sup>.</li>
					<li><strong>MMP/TIMP modulation:</strong> Balances matrix metalloproteinases with tissue inhibitors to encourage orderly remodeling<sup><a href="#ref2" class="text-decoration-none">[2]</a></sup>.</li>
				</ul>
				<h3 class="h5 mb-3 mt-4">3. Hair Follicle & Dermal Signaling</h3>
				<ul>
					<li><strong>Follicular niche support:</strong> Signals within the hair follicle microenvironment associated with anagen support<sup><a href="#ref2" class="text-decoration-none">[2]</a></sup>.</li>
					<li><strong>Keratinocyte-fibroblast crosstalk:</strong> Encourages coordinated epithelial-mesenchymal interactions in skin models<sup><a href="#ref2" class="text-decoration-none">[2]</a></sup>.</li>
				</ul>
			</div>

			<!-- Research Applications Tab -->
			<div class="tab-pane fade" id="research" role="tabpanel">
				<h2 class="h3 mb-4">Research Applications</h2>
				<p class="lead">Preclinical research points to broad utility across dermatologic and connective tissue models.</p>
				<div class="accordion" id="researchAccordion">
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#research1">
								Dermal Remodeling & Skin Integrity
							</button>
						</h3>
						<div id="research1" class="accordion-collapse collapse show" data-bs-parent="#researchAccordion">
							<div class="accordion-body">
								<ul>
									<li><strong>Collagen synthesis:</strong> Upregulates matrix genes associated with firmness and elasticity.</li>
									<li><strong>Photoaging models:</strong> Supports gene expression patterns consistent with improved dermal quality.</li>
									<li><strong>Barrier support:</strong> May influence keratinocyte differentiation markers.</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#research2">
								Hair Follicle Biology
							</button>
						</h3>
						<div id="research2" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
							<div class="accordion-body">
								<ul>
									<li><strong>Anagen support:</strong> Signals within follicular microenvironments compatible with growth phase support.</li>
									<li><strong>Scalp environment:</strong> Encourages balanced ECM in perifollicular dermis.</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#research3">
								Wound Repair Models
							</button>
						</h3>
						<div id="research3" class="accordion-collapse collapse" data-bs-parent="#researchAccordion">
							<div class="accordion-body">
								<ul>
									<li><strong>Granulation tissue:</strong> Associated with improved granulation and re-epithelialization dynamics.</li>
									<li><strong>Matrix organization:</strong> Supports orderly collagen deposition and remodeling.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="alert alert-warning mt-4">
					<strong>Important Research Note:</strong> GHK-Cu research is primarily preclinical. This product is sold strictly for laboratory research purposes and is not intended for human use.
				</div>
			</div>

			<!-- Dosing Tab -->
			<div class="tab-pane fade" id="dosing" role="tabpanel">
				<h2 class="h3 mb-4">Research Dosing Guidelines</h2>
				<p class="lead">Information below is for research reference only. Researchers must determine parameters based on protocols and models.</p>
				<h3 class="h5 mb-3">Reconstitution Instructions</h3>
				<div class="card mb-4">
					<div class="card-body">
						<ol class="mb-0">
							<li>Use bacteriostatic or sterile water for reconstitution.</li>
							<li>Add water slowly down the vial wall; avoid foaming.</li>
							<li>Do not shake vigorously; allow to dissolve naturally.</li>
							<li>Allow 2–3 minutes for complete dissolution.</li>
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
							<td>Months at 2–8°C; 2+ years frozen</td>
						</tr>
						<tr>
							<td>Reconstituted</td>
							<td>2–8°C</td>
							<td>Up to 30 days (bacteriostatic)</td>
						</tr>
						<tr>
							<td>Reconstituted (sterile water)</td>
							<td>2–8°C</td>
							<td>5–7 days</td>
						</tr>
					</tbody>
				</table>
				<div class="alert alert-danger mt-4">
					<strong>⚠️ For Research Use Only:</strong> Not for human or veterinary use. In-vitro laboratory research by qualified professionals only.
				</div>
			</div>

			<!-- Safety & Side Effects Tab -->
			<div class="tab-pane fade" id="safety" role="tabpanel">
				<h2 class="h3 mb-4">Safety Profile & Preclinical Observations</h2>
				<div class="alert alert-warning">
					<strong>Important:</strong> The following reflects preclinical research observations only. Product is for research use.
				</div>
				<ul>
					<li>Favorable tolerance in dermal and wound models at research-relevant concentrations.</li>
					<li>No mutagenicity signals in standard peptide assays reported in preclinical literature.</li>
					<li>Effects are reversible upon discontinuation in most models.</li>
				</ul>
			</div>

			<!-- FAQ Tab -->
			<div class="tab-pane fade" id="faq" role="tabpanel">
				<h2 class="h3 mb-4">Frequently Asked Questions</h2>
				<div class="accordion" id="faqAccordion">
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
								What makes GHK-Cu distinct among peptides?
							</button>
						</h3>
						<div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
							<div class="accordion-body">
								<ul>
									<li><strong>Copper-mediated signaling</strong> with high-affinity chelation.</li>
									<li><strong>Dermal focus</strong> on collagen/GAG synthesis and ECM balance.</li>
									<li><strong>Hair follicle niche</strong> support indicated in preclinical studies.</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-header">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
								How should GHK-Cu be stored for research?
							</button>
						</h3>
						<div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
							<div class="accordion-body">
								<p>Lyophilized powder may be stored refrigerated or frozen; reconstituted solutions require refrigeration and limited shelf-life based on diluent.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- References & Citations Tab -->
			<div class="tab-pane fade" id="references" role="tabpanel">
				<h2 class="h3 mb-4">References & Scientific Citations</h2>
				<p class="lead">Select peer-reviewed literature related to GHK and copper peptide biology.</p>
				<ol class="references-list">
					<li id="ref1" class="mb-3">
						<strong>Pickart L.</strong> The human tri-peptide GHK and tissue remodeling. <em>J Biomater Sci Polym Ed.</em> 2008;19(8):969-988.
						[<a href="https://doi.org/10.1163/156856208784909435" target="_blank" rel="nofollow noopener">DOI</a>]
					</li>
					<li id="ref2" class="mb-3">
						<strong>Pickart L, Margolina A.</strong> GHK-Cu in skin remodeling and anti-aging. <em>Clin Cosmet Investig Dermatol.</em> 2018;11:369-383.
						[<a href="https://www.dovepress.com/ghk-cu-in-skin-remodeling-and-anti-aging-peer-reviewed-fulltext-article-CCID" target="_blank" rel="nofollow noopener">Source</a>]
					</li>
					<li id="ref3" class="mb-3">
						<strong>Maquart FX, Pickart L, et al.</strong> Stimulation of collagen synthesis by the tripeptide-copper complex GHK-Cu in fibroblast cultures. <em>J Invest Dermatol.</em> 1988;91(4):434-439.
						[<a href="https://pubmed.ncbi.nlm.nih.gov/3182109/" target="_blank" rel="nofollow noopener">PubMed</a>]
					</li>
					<li id="ref4" class="mb-3">
						<strong>Varani J, et al.</strong> Reduced collagen and elevated MMPs in aged skin; implications for remodeling. <em>Am J Pathol.</em> 2006;169(2):482-490.
						[<a href="https://pubmed.ncbi.nlm.nih.gov/16877359/" target="_blank" rel="nofollow noopener">PubMed</a>]
					</li>
				</ol>
				<div class="alert alert-warning mt-5">
					<h4 class="h6 fw-bold">Disclaimer:</h4>
					<p class="mb-0"><strong>ALL PRODUCT INFORMATION IS FOR EDUCATIONAL PURPOSES ONLY.</strong> Products are for in-vitro laboratory research use only. Not approved by the FDA to diagnose, treat, cure, or prevent any disease. No human or animal use.</p>
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
					<img src="/images/bpc-157-solo.jpg" class="card-img-top" alt="BPC-157" loading="lazy" width="300" height="300">
					<div class="card-body">
						<h3 class="h6">BPC-157 5mg</h3>
						<p class="text-primary fw-bold">$59.50</p>
						<a href="/products/bpc-157" class="btn btn-sm btn-outline-primary w-100">View Product</a>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card h-100">
					<img src="/images/glow-blend.jpg" class="card-img-top" alt="Glow Blend" loading="lazy" width="300" height="300">
					<div class="card-body">
						<h3 class="h6">Glow Blend 30mg</h3>
						<p class="text-primary fw-bold">$185.00</p>
						<a href="/products/glow-blend" class="btn btn-sm btn-outline-primary w-100">View Product</a>
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
</script>

<?php include(__DIR__ . '/../includes/footer.php'); ?>


