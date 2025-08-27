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
    <nav class="navbar navbar-expand-md bg-primary fixed-top">
        <!-- Container for the navigation bar -->
        <div class="container">
            <!-- Logo of the navigation bar -->
            <a class="navbar-brand text-white icon-text animate__animated animate__fadeInDown d-flex align-items-center"
                href="index.php"><img src="img/Zarifa-logo.svg" alt="zarifa-logo"
                    class="navbar-brand-logo" /><span>Zarifa</span></a>
            <!-- Toggle button for collapsing the navigation bar -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapsible navigation bar items -->
            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto my-4 my-lg-0 column-gap-4 ">
                    <!-- Home page link -->
                    <li class="nav-item d-flex align-items-center m-auto text-center">
                        <a class="nav-link active text-white display-6  animate__animated animate__fadeInDown animate__delay-02s"
                            aria-current="page" href="#home-link
                    " data-i18n="nav_home">Home</a>
                    </li>
                    <!-- About page link -->
                    <li class="nav-item d-flex align-items-center m-auto">
                        <a class="nav-link text-white animate__animated animate__fadeInDown animate__delay-04s" href="product.php"
                            data-i18n="nav_products">Products</a>
                    </li>

                </ul>
                <!-- Language switch button -->
                <button id="langSwitch" class="btn btn-light text-primary animate__animated animate__fadeInDown animate__delay-06s">
                    <span class="english-text">မြန်မာ</span>
                    <span class="myanmar-text hidden">English</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container pt-12">
        <section class="product-section">
            <div class="row p-4">
                <!-- Product Image -->
                <div class="col-lg-6 mb-4">
                    <div class="image-zoom-container" id="imageZoomContainer">
                        <img src="img/clothing/oneSet1.jpg" alt="Cushion Cover" class="product-image"
                            id="mainProductImage">
                        <div class="zoom-lens" id="zoomLens"></div>
                        <div class="zoom-result" id="zoomResult">
                            <img src="img/clothing/oneSet1.jpg" alt="Zoomed Product" id="zoomResultImg">
                        </div>
                        <div class="zoom-instructions">
                            ✨ Hover to see magical zoom
                        </div>
                    </div>
                </div>

                <!-- Product Information -->
                <div class="col-lg-6">
                    <!-- Product Title -->
                    <h1 class="product-title">Women's Readymade Myanmar Traditional Outfit (One Set)</h1>

                    <!-- Color Selection -->
                    <div class="color-section mb-4">
                        <h5 class="text-primary-custom mb-3">Available Colors</h5>
                        <div class="color-options d-flex gap-3 flex-wrap">
                            <div class="color-option-container text-center">
                                <img
                                    class="color-option active"
                                    src="img/clothing/oneSet1.jpg"
                                    data-color="Dusty Rose"
                                    data-image="img/clothing/oneSet1.jpg"
                                    data-zoom-image="img/clothing/oneSet1.jpg"
                                    alt="Dusty Rose"
                                    title="DustyRose" />
                                <small class="color-name mt-1 d-block text-tertiary-custom">Dusty Rose</small>
                            </div>
                            <div class="color-option-container text-center">
                                <img
                                    class="color-option active"
                                    src="img/clothing/oneSet2.jpg"
                                    data-color="Orchid Pink"
                                    data-image="img/clothing/oneSet2.jpg"
                                    data-zoom-image="img/clothing/oneSet2.jpg"
                                    alt="Orchid Pink"
                                    title="OrchidPink" />
                                <small class="color-name mt-1 d-block text-tertiary-custom">Orchid Pink</small>
                            </div>
                            <div class="color-option-container text-center">
                                <img
                                    class="color-option active"
                                    src="img/clothing/oneSet3.jpg"
                                    data-color="Orchid Pink"
                                    data-image="img/clothing/oneSet3.jpg"
                                    data-zoom-image="img/clothing/oneSet3.jpg"
                                    alt="Dark Plum"
                                    title="DarkPlum" />
                                <small class="color-name mt-1 d-block text-tertiary-custom">Dark Plum</small>
                            </div>
                            <div class="color-option-container text-center">
                                <img
                                    class="color-option active"
                                    src="img/clothing/oneSet4.jpg"
                                    data-color="Sage Gray"
                                    data-image="img/clothing/oneSet4.jpg"
                                    data-zoom-image="img/clothing/oneSet4.jpg"
                                    alt="Sage Gray"
                                    title="Sage Gray" />
                                <small class="color-name mt-1 d-block text-tertiary-custom">Sage Gray</small>
                            </div>
                        </div>
                        <div class="selected-color mt-3">
                            <span class="text-tertiary-custom">Selected: </span>
                            <span class="text-primary-custom fw-bold" id="selectedColor">Dusty Rose</span>
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
                                    <li>2-Piece Set: Blouse & Longyi (Htamein)</li>
                                    <li>Premium Cotton or Silk Blend</li>
                                    <li>Intricate Traditional Patterns</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="features-list">
                                    <li>Comfort Fit with Tailored Finish</li>
                                    <li>Breathable & Lightweight</li>
                                    <li>Machine Washable</li>
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
                            <h3 class="text-primary-custom">Elegant Myanmar Readymade Outfit</h3>
                            <p class="mb-3">This graceful women's traditional outfit includes a matching blouse and
                                htamein.
                                Designed for comfort and cultural charm, perfect for ceremonies, festivals, or daily
                                elegance.</p>
                        </div>
                    </div>

                    <!-- Specifications Tab -->
                    <div class="tab-pane fade" id="specifications" role="tabpanel">
                        <div class="specifications-table mt-4">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Material</th>
                                        <td>Cotton, Silk Blend, or Satin</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Set Includes</th>
                                        <td>Blouse + Longyi (Htamein)</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Fit</th>
                                        <td>Tailored / Comfort Fit</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Weight</th>
                                        <td>Lightweight</td>
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
                                <li>Hand wash gently or use delicate machine cycle</li>
                                <li>Use mild detergent, avoid bleach</li>
                                <li>Hang dry in shade to preserve fabric quality</li>
                                <li>Iron blouse and longyi on low to medium heat</li>
                                <li>Store on hangers or neatly folded</li>
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
    <footer class="py-4 border-1 border-top mt-5 shadow-lg">
        <div class="container">
            <div class="d-lg-flex justify-content-between py-3 py-lg-2">
                <div class="small mb-2 mb-lg-0">
                    <p class="text-muted mb-0 me-5">© 2025 Zafira.dev. All rights reserved.</p>
                </div>
                <div class="d-flex small align-items-end justify-content-between">

                    <div class="d-none d-lg-block ms-3">
                        <a class="me-2 text-decoration-none" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                        <a class="me-2 text-decoration-none" href="">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                        <a class="me-2 text-decoration-none" href="">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>
                    <div class="d-lg-none">
                        <a class="me-2" href=""><svg class="bi bi-pinterest text-primary" fill="currentColor" height="16" viewbox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z"></path>
                            </svg></a> <a class="me-2" href=""><svg class="bi bi-twitter text-primary" fill="currentColor" height="16" viewbox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                            </svg></a> <a class="me-2" href=""><svg class="bi bi-facebook text-primary" fill="currentColor" height="16" viewbox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="productDetail.js"></script>
    <script src="./node_modules/aos/dist/aos.js"></script>
    <script src="main.js"></script>
</body>

</html>