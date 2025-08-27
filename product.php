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
  <title>Zarifa - Cotton Products</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="node_modules/aos/dist/aos.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand text-white icon-text animate__animated animate__fadeInDown d-flex align-items-center" href="index.php">
        <img src="img/Zarifa-logo.svg" alt="zarifa-logo" class="navbar-brand-logo" />
        <span>Zarifa</span>
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent10">
        <ul class="navbar-nav mx-auto my-2 my-lg-0">
          <li class="nav-item d-flex align-items-center me-4">
            <a class="nav-link active text-white fs-6 animate__animated animate__fadeInDown" aria-current="page" href="index.php" data-i18n="nav_home">Home</a>
          </li>
          <li class="nav-item d-flex align-items-center me-4">
            <a class="nav-link text-white animate__animated animate__fadeInDown" href="#" data-i18n="nav_about">About</a>
          </li>
          <li class="nav-item d-flex align-items-center me-4">
            <a class="nav-link text-white animate__animated animate__fadeInDown" href="product.php" data-i18n="nav_products">Products</a>
          </li>
          <li class="nav-item d-flex align-items-center me-4">
            <a class="nav-link text-white fs-6 animate__animated animate__fadeInDown" href="#" data-i18n="nav_contact">Contact</a>
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

  <section class="py-5 min-vh-100">
    <div class="container">
      <div class="row justify-content-center text-center mb-2 mb-md-3">
        <div class="col-xl-9 col-xxl-8">
          <p class="text-muted mb-0" data-aos="zoom-in">Our Products</p>
          <h2 class="display-6 fw-bold text-primary" data-aos="zoom-in">Cotton</h2>
          <p class="mb-0" data-aos="zoom-in">
            Experience everyday elegance with our soft, breathable cotton collection.
            Designed for comfort and crafted with care, these pieces are perfect for casual outings, workdays, or relaxed evenings.
          </p>
          <p class="d-inline-flex gap-1 m-0" data-aos="zoom-in">
            <a class="fw-bold text-decoration-none d-block m-auto" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <ul class="text-justify dynamic-txts ps-0 lh-lg position-relative typing-text-width mx-auto">
                <li class="list-unstyled position-absolute top-0">
                  <span>Looking for something more luxurious?</span>
                </li>
                <li class="list-unstyled position-absolute top-0">
                  <span>Explore our luxurious collection here<i class="fa-solid fa-angle-down"></i></span>
                </li>
              </ul>
            </a>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body bg-primary text-white">
              Explore our silk collection — crafted with rich textures and elegant designs, perfect for special occasions or when you want to feel truly exquisite.<br />
              <a class="btn btn-light text-primary silk-link-button mx-auto mt-3" href="silk.php">Silk</a>
            </div>
          </div>
        </div>
      </div>

      <div class="dropdown mb-5 d-inline-block">
        <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-aos="fade-up" data-bs-toggle="dropdown" aria-expanded="false">Types</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="javascript:void(0)" onclick="showCards('clothing')">Clothing</a></li>
          <li><a class="dropdown-item" href="javascript:void(0)" onclick="showCards('bedding')">Bedding</a></li>
          <li><a class="dropdown-item" href="javascript:void(0)" onclick="showCards('homeAccessories')">Home Accessories</a></li>
        </ul>
      </div>

      <h3 class="text-center fw-bold mb-5 text-primary" id="productTypeTitle" data-aos="fade-up">Clothing</h3>

      <!-- Dynamic Card Sections -->
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
    </div>
  </section>

  <!-- Pagination -->
  <nav aria-label="Page navigation example" class="text-white" data-aos="zoom-in-up">
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

  <!-- Footer -->
  <footer class="py-4 text-primary">
    <div class="container">
      <div class="row g-4">
        <div class="col-12 col-lg-3 mb-4 mb-lg-0" data-aos="fade-up">
          <div class="d-flex align-items-center mb-3">
            <img src="./img/Zarifa-logo.svg" alt="Zarifa Logo" width="55" class="img-fluid" />
            <span class="fs-3 fw-bolder ms-2 icon-text">Zarifa</span>
          </div>
          <p class="mb-1">JKT Digital Institute</p>
          <p class="mb-1">Tel: +1 123-456-7890</p>
          <p class="mb-3">
            <a href="mailto:hello@yourdomain.com" class="text-decoration-none">hello@yourdomain.com</a>
          </p>
        </div>

        <div class="col-12 col-lg-8 offset-lg-1 row g-4">
          <div class="col-6 col-md-4 mt-3">
            <h4 class="h5 mb-3" data-aos="fade-up">Quick Links</h4>
            <ul class="list-unstyled" data-aos="fade-up">
              <li class="mb-2"><a href="#" class="text-decoration-none">Home</a></li>
              <li class="mb-2"><a href="#" class="text-decoration-none">About</a></li>
              <li class="mb-2"><a href="#" class="text-decoration-none">Product</a></li>
              <li class="mb-2"><a href="#" class="text-decoration-none">Contact</a></li>
            </ul>
          </div>

          <div class="col-6 col-md-4 mt-3">
            <h4 class="h5 mb-3" data-aos="fade-up">Useful Info</h4>
            <ul class="list-unstyled" data-aos="fade-up">
              <li class="mb-2"><a href="#" class="text-decoration-none">Our Products</a></li>
              <li class="mb-2"><a href="#" class="text-decoration-none">Best Products</a></li>
            </ul>
          </div>

          <div class="col-12 col-md-4 mt-3">
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

      <div class="border-top border-secondary mt-4 pt-4 d-flex flex-column flex-lg-row justify-content-between">
        <div class="small mb-3 mb-lg-0 text-black-50">
          © 2025 Zafira.dev. All rights reserved.
        </div>
        <div class="small d-flex flex-column flex-lg-row">
          <a href="#" class="text-white-50 mb-2 mb-lg-0 me-lg-3 text-decoration-none">Privacy Policy</a>
          <a href="#" class="text-white-50 text-decoration-none">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./node_modules/aos/dist/aos.js"></script>
  <script src="main.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: false,
      mirror: true,
    });

    function animateTitleChange(newTitle) {
      const titleElement = document.getElementById("productTypeTitle");
      titleElement.style.opacity = 0;
      titleElement.style.transition = "opacity 300ms ease-out";

      setTimeout(() => {
        titleElement.textContent = newTitle;
        titleElement.style.opacity = 1;
        titleElement.removeAttribute("data-aos");
        void titleElement.offsetWidth;
        titleElement.setAttribute("data-aos", "fade-up");
        AOS.refresh();
      }, 300);
    }

    function setStaggeredAnimations() {
      const visibleCards = document.querySelectorAll(".card-group:not(.d-none) .card");
      visibleCards.forEach((card, index) => {
        card.removeAttribute("data-aos");
        card.removeAttribute("data-aos-delay");
        card.classList.remove("aos-animate");
        card.setAttribute("data-aos", "zoom-in-up");
        card.setAttribute("data-aos-delay", index * 150);
      });
      AOS.refresh();
    }

    document.addEventListener("DOMContentLoaded", function() {
        setStaggeredAnimations();
    });

    function showCards(type) {
      document.querySelectorAll(".card-group").forEach((card) => {
        card.classList.add("d-none");
      });

      document.querySelectorAll(`.${type}`).forEach((card) => {
        card.classList.remove("d-none");
      });

      const titleMap = {
        clothing: "Clothing",
        bedding: "Bedding",
        homeAccessories: "Home Accessories",
      };
      animateTitleChange(titleMap[type]);
      setStaggeredAnimations();
    }
  </script>
</body>

</html>