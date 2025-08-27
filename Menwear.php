<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>22mm Mulberry Silk Basic Men's Shirt - LuxeSilk</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/ProductDetail.css">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">LuxeSilk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Men</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Women</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Collections</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <section class="product-section">
            <div class="row p-4">
                <!-- Product Image -->
                <div class="col-lg-6 mb-4">
                    <div class="image-zoom-container" id="imageZoomContainer">
                        <img src="img/clothing/paso1.webp" alt="Cushion Cover" class="product-image"
                            id="mainProductImage">
                        <div class="zoom-lens" id="zoomLens"></div>
                        <div class="zoom-result" id="zoomResult">
                            <img src="img/clothing/paso1.webp" alt="Zoomed Product" id="zoomResultImg">
                        </div>
                        <div class="zoom-instructions">
                            ✨ Hover to see magical zoom
                        </div>
                    </div>
                </div>

                <!-- Product Information -->
                <div class="col-lg-6">
                    <!-- Product Title -->
                    <h1 class="product-title">Traditional Men's Longyi</h1>

                    <!-- Color Selection -->
                    <div class="color-section mb-4">
                        <h5 class="text-primary-custom mb-3">Available Colors</h5>
                        <div class="color-options d-flex gap-3 flex-wrap">
                            <div class="color-option-container text-center">
                                <img
                                    class="color-option active"
                                    src="img/clothing/paso1.webp"
                                    data-color="Gunmetal Gray"
                                    data-image="img/clothing/paso1.webp"
                                    data-zoom-image="img/clothing/paso1.webp"
                                    alt="Gunmetal Gray"
                                    title="GunmetalGray" />
                                <small class="color-name mt-1 d-block text-tertiary-custom">Gunmetal Gray</small>
                            </div>
                            <div class="color-option-container text-center">
                                <img
                                    class="color-option active"
                                    src="img/clothing/paso2.webp"
                                    data-color="Raisin Black"
                                    data-image="img/clothing/paso2.webp"
                                    data-zoom-image="img/clothing/paso2.webp"
                                    alt="Raisin Black"
                                    title="RaisinBlack" />
                                <small class="color-name mt-1 d-block text-tertiary-custom">Raisin Black</small>
                            </div>
                            <div class="color-option-container text-center">
                                <img
                                    class="color-option active"
                                    src="img/clothing/paso3.webp"
                                    data-color="Moss Gray"
                                    data-image="img/clothing/paso3.webp"
                                    data-zoom-image="img/clothing/paso3.webp"
                                    alt="Moss Gray"
                                    title="MossGray" />
                                <small class="color-name mt-1 d-block text-tertiary-custom">Moss Gray</small>
                            </div>
                            <div class="color-option-container text-center">
                                <img
                                    class="color-option active"
                                    src="img/clothing/paso4.webp"
                                    data-color="Rich Navy"
                                    data-image="img/clothing/paso4.webp"
                                    data-zoom-image="img/clothing/paso4.webp"
                                    alt="Rich Navy"
                                    title="RichNavy" />
                                <small class="color-name mt-1 d-block text-tertiary-custom">Rich Navy</small>
                            </div>
                        </div>
                        <div class="selected-color mt-3">
                            <span class="text-tertiary-custom">Selected: </span>
                            <span class="text-primary-custom fw-bold" id="selectedColor">Gunmetal Gray</span>
                        </div>
                    </div>

                    <!-- Size Selection -->
                    <div class="size-section mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-primary-custom mb-0">Available Sizes</h5>
                            <a href="#" class="size-guide-link" data-bs-toggle="modal"
                                data-bs-target="#sizeGuideModal">Size Guide</a>
                        </div>
                        <div class="size-options d-flex gap-2 flex-wrap">
                            <button class="size-option out-of-stock" data-size="XS"
                                title="Extra Small - Out of Stock">XS</button>
                            <button class="size-option active" data-size="S" title="Small">S</button>
                            <button class="size-option" data-size="M" title="Medium">M</button>
                            <button class="size-option" data-size="L" title="Large">L</button>
                            <button class="size-option out-of-stock" data-size="XL" title="Extra Large - Out of Stock"
                                disabled>XL</button>
                            <button class="size-option out-of-stock" data-size="XXL"
                                title="Double Extra Large - Out of Stock" disabled>XXL</button>
                        </div>
                        <div class="selected-size mt-3">
                            <span class="text-tertiary-custom">Selected Size: </span>
                            <span class="text-primary-custom fw-bold" id="selectedSize">S</span>
                        </div>
                        <div class="mt-2">
                            <small class="text-tertiary-custom">
                                <span style="color: #ccc;">⚬</span> Out of stock sizes are shown crossed out
                            </small>
                        </div>
                    </div>

                    <!-- Product Features -->
                    <div class="product-features">
                        <h5 class="text-primary-custom mb-3">Key Features</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="features-list">
                                    <li>100% Cotton or Traditional Fabric</li>
                                    <li>Classic Checked or Plain Patterns</li>
                                    <li>Comfortable Everyday Fit</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="features-list">
                                    <li>Breathable & Durable</li>
                                    <li>Machine Washable</li>
                                    <li>Fade Resistant Colors</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details Tabs -->
            <div class="p-4 bg-secondary-custom">
                <ul class="nav nav-tabs" id="productTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                            data-bs-target="#description" type="button">
                            Description
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="specifications-tab" data-bs-toggle="tab"
                            data-bs-target="#specifications" type="button">
                            Specifications
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="care-tab" data-bs-toggle="tab" data-bs-target="#care"
                            type="button">
                            Care Instructions
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="productTabsContent">
                    <!-- Description Tab -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="mt-4">
                            <h3 class="text-primary-custom">Comfortable & Classic Paso for Men</h3>
                            <p class="mb-3">This traditional men's longyi (Paso) combines comfort, durability,
                                and timeless style. Perfect for daily wear, cultural events, or formal occasions.</p>
                        </div>
                    </div>

                    <!-- Specifications Tab -->
                    <div class="tab-pane fade" id="specifications" role="tabpanel">
                        <div class="specifications-table mt-4">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Material</th>
                                        <td>100% Cotton or Traditional Fabric</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Length</th>
                                        <td>42–46 inches (approx.)</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fit</th>
                                        <td>Free Size / Standard Fit</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Weight</th>
                                        <td>Lightweight to Medium</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Country of Origin</th>
                                        <td>Myanmar</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Certification</th>
                                        <td>OEKO-TEX Standard</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Care Instructions Tab -->
                    <div class="tab-pane fade" id="care" role="tabpanel">
                        <div class="care-instructions mt-4">
                            <h3 class="text-primary-custom">Care Instructions</h3>
                            <ul>
                                <li>Machine wash cold or hand wash gently</li>
                                <li>Use mild detergent, do not bleach</li>
                                <li>Hang dry or tumble dry low</li>
                                <li>Iron on medium heat if needed</li>
                                <li>Fold neatly or hang to avoid wrinkles</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Size Guide Modal -->
    <div class="modal fade" id="sizeGuideModal" tabindex="-1" aria-labelledby="sizeGuideModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary-custom" id="sizeGuideModalLabel">
                        Size Guide
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="mb-3">Find your perfect fit. Refer to the charts below for different product categories.</p>

                    <div class="accordion" id="sizeGuideAccordion">
                        <!-- Clothes (default table you had) -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingClothes">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseClothes" aria-expanded="true" aria-controls="collapseClothes">
                                    Clothing (Chest, Shoulder, Sleeves)
                                </button>
                            </h2>
                            <div id="collapseClothes" class="accordion-collapse collapse show" aria-labelledby="headingClothes" data-bs-parent="#sizeGuideAccordion">
                                <div class="accordion-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered specifications-table">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Size</th>
                                                    <th>Chest</th>
                                                    <th>Shoulder</th>
                                                    <th>Sleeves</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>XS</td>
                                                    <td>34-36</td>
                                                    <td>16.5</td>
                                                    <td>24</td>
                                                </tr>
                                                <tr>
                                                    <td>S</td>
                                                    <td>36-38</td>
                                                    <td>17</td>
                                                    <td>24.5</td>
                                                </tr>
                                                <tr>
                                                    <td>M</td>
                                                    <td>38-40</td>
                                                    <td>17.5</td>
                                                    <td>25</td>
                                                </tr>
                                                <tr>
                                                    <td>L</td>
                                                    <td>40-42</td>
                                                    <td>18</td>
                                                    <td>25.5</td>
                                                </tr>
                                                <tr>
                                                    <td>XL</td>
                                                    <td>42-44</td>
                                                    <td>18.5</td>
                                                    <td>26</td>
                                                </tr>
                                                <tr>
                                                    <td>XXL</td>
                                                    <td>44-46</td>
                                                    <td>19</td>
                                                    <td>26.5</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Blanket / Bed Sheet -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingBlanket">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBlanket" aria-expanded="false" aria-controls="collapseBlanket">
                                    Blanket / Bed Sheet
                                </button>
                            </h2>
                            <div id="collapseBlanket" class="accordion-collapse collapse" aria-labelledby="headingBlanket" data-bs-parent="#sizeGuideAccordion">
                                <div class="accordion-body">
                                    <ul>
                                        <li><strong>Single:</strong> 150cm × 230cm</li>
                                        <li><strong>Double:</strong> 200cm × 230cm</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Scarf -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingScarf">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseScarf" aria-expanded="false" aria-controls="collapseScarf">
                                    Scarf
                                </button>
                            </h2>
                            <div id="collapseScarf" class="accordion-collapse collapse" aria-labelledby="headingScarf" data-bs-parent="#sizeGuideAccordion">
                                <div class="accordion-body">
                                    <p>Free Size (Approx. 70cm × 180cm)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Myanmar Women Traditional Oneset -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingWomenSet">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWomenSet" aria-expanded="false" aria-controls="collapseWomenSet">
                                    Myanmar Women Traditional Oneset
                                </button>
                            </h2>
                            <div id="collapseWomenSet" class="accordion-collapse collapse" aria-labelledby="headingWomenSet" data-bs-parent="#sizeGuideAccordion">
                                <div class="accordion-body">
                                    <p>Free Size (Fits Small to Large)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Men Traditional Paso -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingPaso">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePaso" aria-expanded="false" aria-controls="collapsePaso">
                                    Men Traditional Paso
                                </button>
                            </h2>
                            <div id="collapsePaso" class="accordion-collapse collapse" aria-labelledby="headingPaso" data-bs-parent="#sizeGuideAccordion">
                                <div class="accordion-body">
                                    <p>Free Size (Approx. 2m × 1m)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Table Cover -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTableCover">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTableCover" aria-expanded="false" aria-controls="collapseTableCover">
                                    Table Cover
                                </button>
                            </h2>
                            <div id="collapseTableCover" class="accordion-collapse collapse" aria-labelledby="headingTableCover" data-bs-parent="#sizeGuideAccordion">
                                <div class="accordion-body">
                                    <p>Available in multiple sizes (90cm × 150cm, 120cm × 180cm, etc.)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Cushion -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingCushion">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCushion" aria-expanded="false" aria-controls="collapseCushion">
                                    Cushion
                                </button>
                            </h2>
                            <div id="collapseCushion" class="accordion-collapse collapse" aria-labelledby="headingCushion" data-bs-parent="#sizeGuideAccordion">
                                <div class="accordion-body">
                                    <p>Standard Sizes: 40cm × 40cm, 45cm × 45cm, 50cm × 50cm</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="productDetail.js"></script>
</body>

</html>