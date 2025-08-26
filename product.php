<?php
// Include your existing config
require_once 'config.php'; // Your existing database connection

// Function to get first product by type from a specific table
function getFirstProductByType($conn, $table, $productType)
{
  try {
    $sql = "SELECT id, productType, image, description FROM $table 
                WHERE productType LIKE ? 
                ORDER BY id ASC 
                LIMIT 1";

    $stmt = $conn->prepare($sql);
    $searchTerm = "%$productType%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->fetch_assoc();
  } catch (Exception $e) {
    error_log("Error fetching product: " . $e->getMessage());
    return null;
  }
}

// Get products for each card type
function getCardProducts($conn)
{
  return [
    // Clothing products
    'men_longyi' => getFirstProductByType($conn, 'menclothing', 'longyi'),
    'one_set_ready' => getFirstProductByType($conn, 'menclothing', 'one set') ?:
      getFirstProductByType($conn, 'womenclothing', 'one set'),
    'party_dress' => getFirstProductByType($conn, 'womenclothing', 'Party Dress(Traditional)'),

    // Bedding products  
    'blanket' => getFirstProductByType($conn, 'bedding', 'blanket'),
    'single_bedsheet' => getFirstProductByType($conn, 'bedding', 'single'),
    'double_bedsheet' => getFirstProductByType($conn, 'bedding', 'double'),

    // Home accessories
    'cushion' => getFirstProductByType($conn, 'homeaccessories', 'cushion'),
    'table_cover' => getFirstProductByType($conn, 'homeaccessories', 'table'),
    'scarf' => getFirstProductByType($conn, 'homeaccessories', 'scarf')
  ];
}

// Get the products
$cardProducts = getCardProducts($conn);

// Function to safely get image path
function getImagePath($product, $defaultImage = 'img/placeholder.jpg')
{
  if ($product && !empty($product['image'])) {
    // Check if image path already includes 'img/' directory
    $imagePath = $product['image'];
    if (!str_starts_with($imagePath, 'img/') && !str_starts_with($imagePath, 'http')) {
      $imagePath = 'img/' . $imagePath;
    }
    return htmlspecialchars($imagePath);
  }
  return $defaultImage;
}

// Function to safely get product name
function getProductName($product, $fallbackName)
{
  if ($product && !empty($product['productType'])) {
    return htmlspecialchars($product['productType']);
  }
  return $fallbackName;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="node_modules/aos/dist/aos.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand text-white icon-text animate__animated animate__fadeInDown d-flex align-items-center"
        href="index.php"><img src="img/Zarifa-logo.svg" alt="zarifa-logo"
          class="navbar-brand-logo" /><span>Zarifa</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse flex-grow-0 navbar-collapse text-center" id="navbarSupportedContent">
        <!-- <ul class="navbar-nav mx-auto my-4 my-lg-0 ">
          <li class="nav-item d-flex align-items-center m-auto text-center">
            <a class="nav-link active text-white fs-6 animate__animated animate__fadeInDown animate__delay-02s"
              aria-current="page" href="index.php
                " data-i18n="nav_home">Home</a>
          </li>
          <li class="nav-item d-flex align-items-center m-auto">
            <a class="nav-link text-white animate__animated animate__fadeInDown animate__delay-03s" href="#"
              data-i18n="nav_about">About</a>
          </li>
          <li class="nav-item d-flex align-items-center m-auto">
            <a class="nav-link text-white animate__animated animate__fadeInDown animate__delay-04s" href="product.php"
              data-i18n="nav_products">Products</a>
          </li>
          <li class="nav-item d-flex align-items-center m-auto">
            <a class="nav-link text-white fs-6 animate__animated animate__fadeInDown animate__delay-05s" href="#"
              data-i18n="nav_contact">Contact</a>
          </li>
        </ul> -->
        <button id="langSwitch" class="btn btn-light text-primary animate__animated animate__fadeInDown ">
          <span class="english-text">မြန်မာ</span>
          <span class="myanmar-text hidden">English</span>
        </button>
      </div>
    </div>
  </nav>
  <br /><br /><br />
  <section class="py-5 min-vh-100">
    <div class="container">
      <div class="row justify-content-center text-center mb-2 mb-md-3">
        <div class="col-xl-9 col-xxl-8">
          <p class="text-muted mb-0" data-aos="zoom-in" data-i18n="product_semi-title">Our Products</p>
          <h2 class="display-6 fw-bold text-primary myanmar-product-title-size" data-aos="zoom-in" data-i18n="product_title" id="product-main">
            Cotton and Silk
          </h2>
          <p class="mb-0" data-aos="zoom-in" data-i18n="product_description">
            Myanmar silk and cotton products combine the beauty of traditional craftsmanship with the elegance of modern design and premium quality. Our soft and refined cotton fabrics, along with vibrantly beautiful silk, are perfectly crafted for gifts, clothing, home decoration, and more—designed to suit your needs and enhance your everyday life.
          </p>


        </div>
      </div>
      <div class="dropdown mb-5 d-inline-block">
        <a
          class="btn btn-primary dropdown-toggle"
          href="#"
          role="button"
          data-aos="fade-up"
          data-bs-toggle="dropdown"
          aria-expanded="false"
          data-i18n="product_type">
          Types
        </a>

        <ul class="dropdown-menu">
          <li>
            <a
              class="dropdown-item"
              href="javascript:void(0)"
              onclick="showCards('clothing')"
              data-i18n="product_type_clothing">Clothing</a>
          </li>
          <li>
            <a
              class="dropdown-item"
              href="javascript:void(0)"
              onclick="showCards('bedding')" data-i18n="product_type_bedding">Bedding</a>
          </li>
          <li>
            <a
              class="dropdown-item"
              href="javascript:void(0)"
              onclick="showCards('homeAccessories')" data-i18n="product_type_homeAccessories">Home Accessories</a>
          </li>
        </ul>
      </div>
      <h3
        class="text-center fw-bold mb-5 text-primary"
        id="productTypeTitle"
        data-aos="fade-up" data-i18n="product_type_title">
        Clothing
      </h3>
      <!-- Card Sections -->
      <div class="row g-4">
        <!-- Clothing Cards -->
        <a href="Menwear.php" class="col-md-4 mb-lg-0 mt-0 card-group clothing">
          <div class="card text-white border-0 justify-content-end position-relative" data-aos="zoom-in-up">
            <div class="ratio ratio-1x1">
              <img class="img-fluid object-fit-cover"
                src="<?= getImagePath($cardProducts['men_longyi'], 'img/clothing/paso1.webp') ?>"
                alt="<?= getProductName($cardProducts['men_longyi'], 'Men\'s Longyi') ?>" />
            </div>
            <div class="position-absolute bottom-0 w-100 p-2 p-lg-4 bg-dark" style="--bs-bg-opacity: 0.3">
              <h5 class="fw-bold"><?= getProductName($cardProducts['men_longyi'], 'Longyi (Men)') ?></h5>
            </div>
          </div>
        </a>
        <a href="OneSet1.php" class="col-md-4 mb-lg-0 mt-0 card-group clothing">
          <div class="card text-white border-0 justify-content-end position-relative" data-aos="zoom-in-up">
            <div class="ratio ratio-1x1">
              <img class="img-fluid object-fit-cover"
                src="<?= getImagePath($cardProducts['one_set_ready'], 'img/clothing/oneSet1.jpg') ?>"
                alt="<?= getProductName($cardProducts['one_set_ready'], 'One Set Ready Made') ?>" />
            </div>
            <div class="position-absolute bottom-0 w-100 p-2 p-lg-4 bg-dark" style="--bs-bg-opacity: 0.3">
              <h5 class="fw-bold"><?= getProductName($cardProducts['one_set_ready'], 'One Set (Ready Made)') ?></h5>
            </div>
          </div>
        </a>
        <a href="partyDress.php" class="col-md-4 mb-lg-0 mt-0 card-group clothing">
          <div class="card text-white border-0 justify-content-end position-relative" data-aos="zoom-in-up">
            <div class="ratio ratio-1x1">
              <img class="img-fluid object-fit-cover"
                src="<?= getImagePath($cardProducts['party_dress'], 'img/clothing/partyDress1.jpg') ?>"
                alt="<?= getProductName($cardProducts['party_dress'], 'Party Dress (Traditional)') ?>" />
            </div>
            <div class="position-absolute bottom-0 w-100 p-2 p-lg-4 bg-dark" style="--bs-bg-opacity: 0.3">
              <h5 class="fw-bold"><?= getProductName($cardProducts['party_dress'], 'Party Dress (Traditional)') ?></h5>
            </div>
          </div>
        </a>
        <!-- Bedding Cards -->
        <a href="blanket.php" class="col-md-4 mb-lg-0 mt-0 card-group bedding d-none d-block">
          <div class="card text-white border-0 justify-content-end position-relative" data-aos="zoom-in-up">
            <div class="ratio ratio-1x1">
              <img class="img-fluid object-fit-cover"
                src="<?= getImagePath($cardProducts['blanket'], 'img/bedding/blanket1.webp') ?>"
                alt="<?= getProductName($cardProducts['blanket'], 'Blanket') ?>" />
            </div>
            <div class="position-absolute bottom-0 w-100 p-2 p-lg-4 bg-dark" style="--bs-bg-opacity: 0.3">
              <h5 class="fw-bold"><?= getProductName($cardProducts['blanket'], 'Blanket') ?></h5>
            </div>
          </div>
        </a>

        <a href="singleBedsheet.php" class="col-md-4 mb-lg-0 mt-0 card-group bedding d-none d-block">
          <div class="card text-white border-0 justify-content-end position-relative" data-aos="zoom-in-up">
            <div class="ratio ratio-1x1">
              <img class="img-fluid object-fit-cover"
                src="<?= getImagePath($cardProducts['single_bedsheet'], 'img/bedding/single1.jpg') ?>"
                alt="<?= getProductName($cardProducts['single_bedsheet'], 'Single Bedsheet') ?>" />
            </div>
            <div class="position-absolute bottom-0 w-100 p-2 p-lg-4 bg-dark" style="--bs-bg-opacity: 0.3">
              <h5 class="fw-bold"><?= getProductName($cardProducts['single_bedsheet'], 'Single Bedsheet') ?></h5>
            </div>
          </div>
        </a>

        <a href="doubleBedsheet.php" class="col-md-4 mb-lg-0 mt-0 card-group bedding d-none d-block">
          <div class="card text-white border-0 justify-content-end position-relative" data-aos="zoom-in-up">
            <div class="ratio ratio-1x1">
              <img class="img-fluid object-fit-cover"
                src="<?= getImagePath($cardProducts['double_bedsheet'], 'img/bedding/double1.jpg') ?>"
                alt="<?= getProductName($cardProducts['double_bedsheet'], 'Double Bedsheet') ?>" />
            </div>
            <div class="position-absolute bottom-0 w-100 p-2 p-lg-4 bg-dark" style="--bs-bg-opacity: 0.3">
              <h5 class="fw-bold"><?= getProductName($cardProducts['double_bedsheet'], 'Double Bedsheet') ?></h5>
            </div>
          </div>
        </a>

        <!-- Home Accessories Cards -->
        <a href="cushion.php" class="col-md-4 mb-lg-0 mt-0 card-group homeAccessories d-none d-block">
          <div class="card text-white border-0 justify-content-end position-relative" data-aos="zoom-in-up">
            <div class="ratio ratio-1x1">
              <img class="img-fluid object-fit-cover"
                src="<?= getImagePath($cardProducts['cushion'], 'img/HomeAccessories/coverBlue.png') ?>"
                alt="<?= getProductName($cardProducts['cushion'], 'Cushion') ?>" />
            </div>
            <div class="position-absolute bottom-0 w-100 p-2 p-lg-4 bg-dark" style="--bs-bg-opacity: 0.3">
              <h5 class="fw-bold"><?= getProductName($cardProducts['cushion'], 'Cushion') ?></h5>
            </div>
          </div>
        </a>
        <a href="tableCover.php" class="col-md-4 mb-lg-0 mt-0 card-group homeAccessories d-none d-block">
          <div class="card text-white border-0 justify-content-end position-relative" data-aos="zoom-in-up">
            <div class="ratio ratio-1x1">
              <img class="img-fluid object-fit-cover"
                src="<?= getImagePath($cardProducts['table_cover'], 'img/HomeAccessories/table1.jpg') ?>"
                alt="<?= getProductName($cardProducts['table_cover'], 'Table Cover') ?>" />
            </div>
            <div class="position-absolute bottom-0 w-100 p-2 p-lg-4 bg-dark" style="--bs-bg-opacity: 0.3">
              <h5 class="fw-bold"><?= getProductName($cardProducts['table_cover'], 'Table Cover') ?></h5>
            </div>
          </div>
        </a>
        <a href="scarf.php" class="col-md-4 mb-lg-0 mt-0 card-group homeAccessories d-none d-block">
          <div class="card text-white border-0 justify-content-end position-relative" data-aos="zoom-in-up">
            <div class="ratio ratio-1x1">
              <img class="img-fluid object-fit-cover"
                src="<?= getImagePath($cardProducts['scarf'], 'img/HomeAccessories/scarf1.jpg') ?>"
                alt="<?= getProductName($cardProducts['scarf'], 'Scarf') ?>" />
            </div>
            <div class="position-absolute bottom-0 w-100 p-2 p-lg-4 bg-dark" style="--bs-bg-opacity: 0.3">
              <h5 class="fw-bold"><?= getProductName($cardProducts['scarf'], 'Scarf') ?></h5>
            </div>
          </div>
        </a>
      </div>
      <nav
        aria-label="Page navigation example"
        class="text-white mt-5"
        data-aos="zoom-in-up">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- footer -->

      <footer class=" py-4 text-primary">
        <!-- Changed background -->
        <div class="container">
          <div class="row g-4 footer-container">
            <!-- Added gutter spacing -->

            <!-- Logo Column - Full width on mobile -->
            <div class="col-12 col-lg-3 mb-4 mb-lg-0 right-footer__content" data-aos="fade-up">
              <div class="d-flex align-items-center mb-3">
                <img src="./img/Zarifa-logo.svg" alt="Zarifa Logo" width="55" class="img-fluid" />
                <span class="fs-3 fw-bolder ms-2 icon-text">Zarifa</span>
                <!-- Added text-white -->
              </div>
              <p class="mb-1">JKT Digital Institute</p>
              <p class="mb-1">Tel: +1 123-456-7890</p>
              <p class="mb-3">
                <a href="mailto:hello@yourdomain.com" class="text-decoration-none">
                  <!-- Changed to white -->
                  hello@yourdomain.com
                </a>
              </p>
            </div>

            <!-- Links Columns - Stack on mobile -->
            <div class="col-12 col-lg-8 offset-lg-1 row g-4 justify-content-end left-footer__content">
              <!-- Quick Links -->
              <div class="col-6 col-md-4 mt-3">
                <h4 class="h5 mb-3" data-aos="fade-up">Quick Links</h4>
                <!-- Smaller heading -->
                <ul class="list-unstyled" data-aos="fade-up">
                  <li class="mb-2">
                    <a href="#" class="text-decoration-none" data-i18n="nav_home">Home</a>
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-decoration-none" data-i18n="nav_about">About</a>
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-decoration-none" data-i18n="nav_products">Product</a>
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-decoration-none" data-i18n="nav_contact">Contact</a>
                  </li>
                </ul>
              </div>
              <!-- Socials -->
              <div class="col-12 col-md-4 mt-3 left-footer__socials">
                <!-- Full width on small devices -->
                <h4 class="h5 mb-3" data-aos="fade-up">Socials</h4>
                <ul class="list-unstyled" data-aos="fade-up">
                  <li class="mb-2">
                    <a href="#" class="text-decoration-none d-flex align-items-center">
                      <i class="fab fa-pinterest me-2"></i> Pinterest
                    </a>
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-decoration-none d-flex align-items-center">
                      <i class="fab fa-x-twitter me-2"></i> Twitter
                    </a>
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-decoration-none d-flex align-items-center">
                      <i class="fab fa-facebook me-2"></i> Facebook
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Copyright Section -->
          <div class="border-top border-secondary mt-4 pt-4 d-flex flex-column flex-lg-row justify-content-between">
            <div class="small mb-3 mb-lg-0 text-black-50">
              © 2025 Zafira.dev. All rights reserved.
            </div>
            <div class="small d-flex flex-column flex-lg-row">
              <a href="#" class="text-black-50 mb-2 mb-lg-0 me-lg-3 text-decoration-none">Privacy
                Policy</a>
              <a href="#" class="text-black-50 text-decoration-none">Terms of Service</a>
            </div>
          </div>
        </div>
      </footer>
      <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="./node_modules/aos/dist/aos.js"></script>
      <script src="main.js"></script>
      <script>
  // Initialize AOS with default settings
  AOS.init({
    duration: 800,
    once: false,
    mirror: true,
  });

  // Function to animate title change
  function animateTitleChange(newTitle) {
    const titleElement = document.getElementById("productTypeTitle");

    // Fade out current title
    titleElement.style.opacity = 0;
    titleElement.style.transition = "opacity 300ms ease-out";

    // After fade out completes, change text and fade in
    setTimeout(() => {
      titleElement.textContent = newTitle;
      titleElement.style.opacity = 1;

      // Refresh AOS to trigger fade-up animation again
      titleElement.removeAttribute("data-aos");
      void titleElement.offsetWidth; // Trigger reflow
      titleElement.setAttribute("data-aos", "fade-up");
      AOS.refresh();
    }, 300);
  }

  // Function to set staggered animations for cards
  function setStaggeredAnimations() {
    const visibleCards = document.querySelectorAll(
      ".card-group:not(.d-none) .card"
    );
    visibleCards.forEach((card, index) => {
      card.removeAttribute("data-aos");
      card.removeAttribute("data-aos-delay");
      card.classList.remove("aos-animate");
      card.setAttribute("data-aos", "zoom-in-up");
      card.setAttribute("data-aos-delay", index * 150);
    });
    AOS.refresh();
  }

  // Detect current language
  function getCurrentLang() {
    return document.body.classList.contains("lang-my") ? "my" : "en";
  }

  // Title translations
  const titleMap = {
    clothing: {
      en: "Clothing",
      my: "အဝတ်အစား",
    },
    bedding: {
      en: "Bedding",
      my: "အိပ်ယာ အသုံးအဆောင်",
    },
    homeAccessories: {
      en: "Home Accessories",
      my: "အိမ်အလှဆင်ပစ္စည်းများ",
    },
  };

  // Modified showCards function
  function showCards(type) {
    // Hide all card groups
    document.querySelectorAll(".card-group").forEach((card) => {
      card.classList.add("d-none");
    });

    // Show selected group
    document.querySelectorAll(`.${type}`).forEach((card) => {
      card.classList.remove("d-none");
    });

    // Save selected type
    localStorage.setItem("selectedProductType", type);

    // Update title with animation
    const lang = getCurrentLang();
    animateTitleChange(titleMap[type][lang]);

    // Reapply card animations
    setStaggeredAnimations();
  }

  // Language switcher
  document.getElementById("langSwitch").addEventListener("click", function () {
    document.body.classList.toggle("lang-my");

    // Save language state
    if (document.body.classList.contains("lang-my")) {
      localStorage.setItem("selectedLang", "my");
    } else {
      localStorage.setItem("selectedLang", "en");
    }

    // Re-render current product type title in new language
    let savedType = localStorage.getItem("selectedProductType") || "clothing";
    showCards(savedType);
  });

  // On page load
  document.addEventListener("DOMContentLoaded", function () {
    // Restore language state
    let savedLang = localStorage.getItem("selectedLang") || "en";
    if (savedLang === "my") {
      document.body.classList.add("lang-my");
    }

    // Restore product type
    let savedType = localStorage.getItem("selectedProductType") || "clothing";
    showCards(savedType);

    // Run initial animations
    setStaggeredAnimations();
  });
</script>

</body>

</html>