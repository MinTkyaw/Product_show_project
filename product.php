<?php

// $host = "localhost";
// $user = "root";
// $password = "";
// $db = "productshow";

// $conn = new mysqli($host, $user, $password, $db);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $product_id = $_GET['product_id'] ?? 27;

// // Fetch product info

// $product_sql = $conn->prepare("SELECT * FROM products ORDER BY product_id DESC LIMIT 3");
// $product_sql->execute();
// $product_result = $product_sql->get_result();
// $products = $product_result->fetch_all(MYSQLI_ASSOC);

// $img_sql = $conn->prepare("SELECT image FROM variants WHERE product_id = ?");
// $img_sql->bind_param("i", $product_id);
// $img_sql->execute();
// $img_result = $img_sql->get_result();
// $images = $img_result->fetch_all(MYSQLI_ASSOC);



// $host = "localhost";
// $user = "root";
// $password = "";
// $db = "productshow";

// $conn = new mysqli($host, $user, $password, $db);
// if ($conn->connect_error) {
//     die(json_encode(['error' => 'Database connection failed']));
// }

// $category_name = $_GET['category'] ?? 'clothing', 'Bedding', 'HomeAccessories';

// // Map category names to category IDs
// $categories = [
//     'Clothing' => 1,
//     'Bedding' => 2,
//     'HomeAccessories' => 3
// ];

// $category_id = $categories[$category_name] ?? 1;

// // Fetch 3 products with their first variant image
// $stmt = $conn->prepare("
//     SELECT p.product_id, p.name, v.image 
//     FROM products p
//     JOIN variants v ON p.product_id = v.product_id
//     WHERE p.category_id = ?
//     GROUP BY p.product_id
//     LIMIT 3
// ");
// $stmt->bind_param("i", $category_id);
// $stmt->execute();
// $result = $stmt->get_result();

// $products = [];
// while ($row = $result->fetch_assoc()) {
//     $products[] = $row;
// }

// echo json_encode($products);
function formatCategoryClass($name) {
    return str_replace(' ', '', strtolower($name)); // "Home Accessories" → "homeaccessories"
}

$host = "localhost";
$user = "root";
$password = "";
$db = "productshow";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

// Category mapping
$categories = [
    'Clothing' => 1,
    'Bedding' => 2,
    'HomeAccessories' => 3
];

$products = [];

// Loop through each category
foreach ($categories as $categoryName => $categoryId) {
    $stmt = $conn->prepare("
        SELECT p.product_id, p.name, MIN(v.image) AS image
        FROM products p
        JOIN variants v ON p.product_id = v.product_id
        WHERE p.category_id = ?
        GROUP BY p.product_id, p.name
        LIMIT 3
    ");
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Store results under category name
    $products[$categoryName] = [];
    while ($row = $result->fetch_assoc()) {
        $products[$categoryName][] = $row;
    }
}

// Return JSON with 3 products for each category
// echo json_encode($products);


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
            <div class="collapse navbar-collapse" id="navbarSupportedContent10">
                <ul class="navbar-nav mx-auto my-2 my-lg-0">
                    <li class="nav-item d-flex align-items-center me-4">
                        <a class="nav-link active text-white fs-6 animate__animated animate__fadeInDown"
                            aria-current="page" href="index.php" data-i18n="nav_home">Home</a>
                    </li>
                    <li class="nav-item d-flex align-items-center me-4">
                        <a class="nav-link text-white animate__animated animate__fadeInDown" href="#"
                            data-i18n="nav_about">About</a>
                    </li>
                    <li class="nav-item d-flex align-items-center me-4">
                        <a class="nav-link text-white animate__animated animate__fadeInDown" href="product.php"
                            data-i18n="nav_products">Products</a>
                    </li>
                    <li class="nav-item d-flex align-items-center me-4">
                        <a class="nav-link text-white fs-6 animate__animated animate__fadeInDown" href="#"
                            data-i18n="nav_contact">Contact</a>
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
                    <h2 class="display-6 fw-bold text-primary" data-aos="zoom-in">
                        Cotton
                    </h2>
                    <p class="mb-0" data-aos="zoom-in">
                        Experience everyday elegance with our soft, breathable cotton
                        collection. Designed for comfort and crafted with care, these
                        pieces are perfect for casual outings, workdays, or relaxed
                        evenings.
                    </p>
                    <p class="d-inline-flex gap-1 m-0" data-aos="zoom-in">
                        <a class="fw-bold text-decoration-none d-block m-auto" data-bs-toggle="collapse"
                            href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <ul
                                class="text-justify dynamic-txts ps-0 lh-lg position-relative typing-text-width mx-auto">
                                <li class="list-unstyled position-absolute top-0">
                                    <span>Looking for something more luxurious?</span>
                                </li>
                                <li class="list-unstyled position-absolute top-0">
                                    <span>Explore our luxurious collection here<i
                                            class="fa-solid fa-angle-down"></i></span>
                                </li>
                            </ul>
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body bg-primary text-white">
                            Explore our silk collection — crafted with rich textures and
                            elegant designs, perfect for special occasions or when you want
                            to feel truly exquisite.<br />
                            <a class="btn btn-light text-primary silk-link-button mx-auto mt-3" href="silk.php">Silk</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown mb-5 d-inline-block">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-aos="fade-up"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Types
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="showCards('clothing')">Clothing</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="showCards('bedding')">Bedding</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="showCards('HomeAccessories')">Home
                            Accessories</a>
                    </li>
                </ul>
            </div>
            <h3 class="text-center fw-bold mb-5 text-primary" id="productTypeTitle" data-aos="fade-up">
                Clothing
            </h3>
            <!-- Card Sections -->
            <div class="row g-4">

                <div class="row g-4">
                    <?php foreach ($products as $categoryName => $categoryProducts): ?>
                    <?php foreach ($categoryProducts as $product): ?>
                    <a href="productDetails.php?product_id=<?php echo $product['product_id']; ?>"
                        class="col-md-4 mb-lg-0 mt-0 card-group <?php echo formatCategoryClass($categoryName); ?> <?php echo ($categoryName != 'Clothing') ? 'd-none' : ''; ?>">

                        <div class="card text-white border-0 justify-content-end position-relative"
                            data-aos="zoom-in-up">
                            <div class="ratio ratio-1x1">
                                <img class="img-fluid object-fit-cover"
                                    src="<?php echo htmlspecialchars($product['image']); ?>" />
                            </div>
                            <div class="position-absolute bottom-0 w-100 p-2 p-lg-4 bg-dark"
                                style="--bs-bg-opacity: 0.3">
                                <h5 class="fw-bold"><?php echo htmlspecialchars($product['name']); ?></h5>
                            </div>
                        </div>
                    </a>

                    <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>





            </div>
    </section>
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
    <!-- footer -->
    <footer class="py-4 text-primary">
        <!-- Changed background -->
        <div class="container">
            <div class="row g-4">
                <!-- Logo Column - Full width on mobile -->
                <div class="col-12 col-lg-3 mb-4 mb-lg-0" data-aos="fade-up">
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
                <div class="col-12 col-lg-8 offset-lg-1 row g-4">
                    <!-- Quick Links -->
                    <div class="col-6 col-md-4 mt-3">
                        <h4 class="h5 mb-3" data-aos="fade-up">Quick Links</h4>
                        <!-- Smaller heading -->
                        <ul class="list-unstyled" data-aos="fade-up">
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">Home</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">About</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">Product</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Useful Info -->
                    <div class="col-6 col-md-4 mt-3">
                        <h4 class="h5 mb-3" data-aos="fade-up">Useful Info</h4>
                        <ul class="list-unstyled" data-aos="fade-up">
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">Our Products</a>
                            </li>
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">Best Products</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Socials -->
                    <div class="col-12 col-md-4 mt-3">
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
    // Initialize AOS with default settings
    AOS.init({
        duration: 800, // Slightly faster animation
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

    // Set initial animations on page load
    document.addEventListener("DOMContentLoaded", function() {
        setStaggeredAnimations();
    });

    let visibleCount = 3;
    let currentCategory = "clothing";

    function showCards(category) {
        // Reset visible count on category switch
        visibleCount = 3;
        currentCategory = category;

        // Hide all cards
        document.querySelectorAll(".card-group").forEach(card => {
            card.classList.add("d-none");
        });

        // Show first 3 cards of selected category
        const selectedCards = document.querySelectorAll(`.${category.toLowerCase()}`);
        selectedCards.forEach((card, index) => {
            if (index < visibleCount) {
                card.classList.remove("d-none");
            }
        });

        // Update title
        const titleMap = {
            clothing: "Clothing",
            bedding: "Bedding",
            homeaccessories: "Home Accessories",

        };
        document.getElementById("productTypeTitle").textContent = titleMap[category.toLowerCase()] || "";
    }

    // Load More button logic
    function loadMore() {
        const cards = document.querySelectorAll(`.${currentCategory}`);
        for (let i = visibleCount; i < visibleCount + 3 && i < cards.length; i++) {
            cards[i].classList.remove("d-none");
        }
        visibleCount += 3;
    }

    // Run once when page loads (default clothing)
    document.addEventListener("DOMContentLoaded", () => {
        showCards("clothing");
    });
    </script>
</body>

</html>