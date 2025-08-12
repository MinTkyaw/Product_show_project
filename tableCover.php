<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>22mm Mulberry Silk Basic Men's Shirt - LuxeSilk</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/ProductDetail.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top">
      <div class="container">
        <a
          class="navbar-brand text-white icon-text animate__animated animate__fadeInDown d-flex align-items-center"
          href="index.php"
          ><img
            src="img/Zarifa-logo.svg"
            alt="zarifa-logo"
            class="navbar-brand-logo"
          /><span>Zarifa</span></a
        >
        <div class="collapse navbar-collapse" id="navbarSupportedContent10">
          <ul class="navbar-nav mx-auto my-2 my-lg-0">
            <li class="nav-item d-flex align-items-center me-4">
              <a
                class="nav-link active text-white fs-6 animate__animated animate__fadeInDown"
                aria-current="page"
                href="index.php"
                data-i18n="nav_home"
                >Home</a
              >
            </li>
            <li class="nav-item d-flex align-items-center me-4">
              <a
                class="nav-link text-white animate__animated animate__fadeInDown"
                href="#"
                data-i18n="nav_about"
                >About</a
              >
            </li>
            <li class="nav-item d-flex align-items-center me-4">
              <a
                class="nav-link text-white animate__animated animate__fadeInDown"
                href="product.php"
                data-i18n="nav_products"
                >Products</a
              >
            </li>
            <li class="nav-item d-flex align-items-center me-4">
              <a
                class="nav-link text-white fs-6 animate__animated animate__fadeInDown"
                href="#"
                data-i18n="nav_contact"
                >Contact</a
              >
            </li>
          </ul>
          <button id="langSwitch" class="btn btn-light text-primary">
            <span class="english-text">မြန်မာ</span>
            <span class="myanmar-text hidden">English</span>
          </button>
        </div>
      </div>
    </nav>
    <br /><br /><br />

    <!-- Main Content -->
    <div class="container">
      <section class="product-section">
        <div class="row p-4">
          <!-- Product Image -->
          <div class="col-lg-6 mb-4">
            <div class="image-zoom-container" id="imageZoomContainer">
              <img
                src="img/HomeAccessories/table1.jpg"
                alt="Cushion Cover"
                class="product-image"
                id="mainProductImage"
              />
              <div class="zoom-lens" id="zoomLens"></div>
              <div class="zoom-result" id="zoomResult">
                <img
                  src="img/HomeAccessories/table1.jpg"
                  alt="Zoomed Product"
                  id="zoomResultImg"
                />
              </div>
              <div class="zoom-instructions">✨ Hover to see magical zoom</div>
            </div>
          </div>

          <!-- Product Information -->
          <div class="col-lg-6">
            <!-- Product Title -->
            <h1 class="product-title">Table Cover</h1>

            <!-- Color Selection -->
            <div class="color-section mb-4">
              <h5 class="text-primary-custom mb-3">
                Available Colors and Design
              </h5>
              <div class="color-options d-flex gap-3 flex-wrap">
                <div class="color-option-container text-center">
                  <div
                    class="color-option active"
                    style="background: #a5a7b3"
                    data-color="Slate Gray"
                    data-image="img/HomeAccessories/table1.jpg"
                    data-zoom-image="img/HomeAccessories/table1.jpg"
                    title="Slate Gray"
                  ></div>
                  <small class="color-name mt-1 d-block text-tertiary-custom"
                    >Slate Gray</small
                  >
                </div>
                <div class="color-option-container text-center">
                  <div
                    class="color-option"
                    style="background: #d8dde1"
                    data-color="Mist "
                    data-image="img/HomeAccessories/table2.jpg"
                    data-zoom-image="img/HomeAccessories/table2.jpg"
                    title="Mist "
                  ></div>
                  <small class="color-name mt-1 d-block text-tertiary-custom"
                    >Mist
                  </small>
                </div>
                <div class="color-option-container text-center">
                  <div
                    class="color-option"
                    style="background: #cfc5bb"
                    data-color="Taupe "
                    data-image="img/HomeAccessories/table3.jpg"
                    data-zoom-image="img/HomeAccessories/table3.jpg"
                    title="Taupe "
                  ></div>
                  <small class="color-name mt-1 d-block text-tertiary-custom"
                    >Taupe
                  </small>
                </div>
                <div class="color-option-container text-center">
                  <div
                    class="color-option"
                    style="background: #008792"
                    data-color="Teal "
                    data-image="img/HomeAccessories/table4.jpg"
                    data-zoom-image="img/HomeAccessories/table4.jpg"
                    title="Teal "
                  ></div>
                  <small class="color-name mt-1 d-block text-tertiary-custom"
                    >Teal
                  </small>
                </div>
              </div>
              <div class="selected-color mt-3">
                <span class="text-tertiary-custom">Selected: </span>
                <span class="text-primary-custom fw-bold" id="selectedColor"
                  >Sky Blue</span
                >
              </div>
            </div>

            <!-- Size Selection -->
            <div class="size-section mb-4">
              <div
                class="d-flex justify-content-between align-items-center mb-3"
              >
                <h5 class="text-primary-custom mb-0">Available Sizes</h5>
                
                <!-- sizeguide --><!-- <a
                  href="#"
                  class="size-guide-link"
                  data-bs-toggle="modal"
                  data-bs-target="#sizeGuideModal"
                  >Size Guide</a
                > -->
              </div>
              <div class="size-options d-flex gap-2 flex-wrap">
                <button
                  class="size-option out-of-stock"
                  data-size="XS"
                  title="Extra Small - Out of Stock"
                >
                  XS
                </button>
                <button class="size-option active" data-size="S" title="Small">
                  S
                </button>
                <button class="size-option" data-size="M" title="Medium">
                  M
                </button>
                <button class="size-option" data-size="L" title="Large">
                  L
                </button>
                <button
                  class="size-option out-of-stock"
                  data-size="XL"
                  title="Extra Large - Out of Stock"
                  disabled
                >
                  XL
                </button>
                <button
                  class="size-option out-of-stock"
                  data-size="XXL"
                  title="Double Extra Large - Out of Stock"
                  disabled
                >
                  XXL
                </button>
              </div>
              <div class="selected-size mt-3">
                <span class="text-tertiary-custom">Selected Size: </span>
                <span class="text-primary-custom fw-bold" id="selectedSize"
                  >S</span
                >
              </div>
              <div class="mt-2">
                <small class="text-tertiary-custom">
                  <span style="color: #ccc">⚬</span> Out of stock sizes are
                  shown crossed out
                </small>
              </div>
            </div>

            <!-- Product Features -->
            <div class="product-features">
              <h5 class="text-primary-custom mb-3">Key Features</h5>
              <div class="row">
                <div class="col-md-6">
                  <ul class="features-list">
                    <li>Elegant Design Options</li>
                    <li>Water & Stain Resistant</li>
                    <li>Fits Standard Tables</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="features-list">
                    <li>Easy to Clean</li>
                    <li>Durable & Reusable</li>
                    <li>Perfect for All Occasions</li>
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
              <button
                class="nav-link active"
                id="description-tab"
                data-bs-toggle="tab"
                data-bs-target="#description"
                type="button"
              >
                Description
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link"
                id="specifications-tab"
                data-bs-toggle="tab"
                data-bs-target="#specifications"
                type="button"
              >
                Specifications
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button
                class="nav-link"
                id="care-tab"
                data-bs-toggle="tab"
                data-bs-target="#care"
                type="button"
              >
                Care Instructions
              </button>
            </li>
          </ul>

          <div class="tab-content" id="productTabsContent">
            <!-- Description Tab -->
            <div
              class="tab-pane fade show active"
              id="description"
              role="tabpanel"
            >
              <div class="mt-4">
                <h3 class="text-primary-custom">Table Cover</h3>
                <p class="mb-3">Stylish and protective table cover</p>
              </div>
            </div>

            <!-- Specifications Tab -->
            <div class="tab-pane fade" id="specifications" role="tabpanel">
              <div class="specifications-table mt-4">
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th scope="row">Material</th>
                      <td>Cotton / Polyester / Blended Fabric</td>
                    </tr>
                    <tr>
                      <th scope="row">Size</th>
                      <td>60 x 90 inches (standard 6-seater)</td>
                    </tr>
                    <tr>
                      <th scope="row">Pattern</th>
                      <td>Solid / Printed / Embroidered</td>
                    </tr>
                    <tr>
                      <th scope="row">Edges</th>
                      <td>Hemmed / Lace Border</td>
                    </tr>
                    <tr>
                      <th scope="row">Country of Origin</th>
                      <td>Myanamar</td>
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
                  <li>Machine wash cold on gentle cycle</li>
                  <li>Use mild detergent, avoid bleach</li>
                  <li>Hang dry or tumble dry low</li>
                  <li>Iron on low heat if necessary</li>
                  <li>Do not dry clean unless specified</li>
                  <li>Store folded to prevent creases</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Size Guide Modal -->
    <div
      class="modal fade"
      id="sizeGuideModal"
      tabindex="-1"
      aria-label="sizeGuideModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-center">
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title text-primary-custom"
              id="sizeGuideModalLabel"
            >
              Size Guide
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <p class="mb-3">
              Find your perfect fit. Refer to the chart below for chest,
              shoulder and sleeves measurements.
            </p>
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
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="./node_modules/aos/dist/aos.js"></script>
    <script src="main.js"></script>
    <script src="productDetail.js"></script>
  </body>
</html>
