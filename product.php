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
  <section class="pt-5 min-vh-100">
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
  </section>
  <!-- footer -->
  <footer class="py-4" >
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
    document.getElementById("langSwitch").addEventListener("click", function() {
      document.body.classList.toggle("lang-my");

      // Save language state
      if (document.body.classList.contains("lang-en")) {
        localStorage.setItem("selectedLang", "en");
      } else {
        localStorage.setItem("selectedLang", "my");
      }

      // Re-render current product type title in new language
      let savedType = localStorage.getItem("selectedProductType") || "clothing";
      showCards(savedType);
    });

    // On page load
    document.addEventListener("DOMContentLoaded", function() {
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