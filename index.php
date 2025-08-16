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
    <!-- <nav class="navbar navbar-expand-lg bg-primary nav-shadow pt-0 fixed-top">
        <div class="container justify-content-between">
            <a class="navbar-brand text-white icon-text animate__animated animate__fadeInDown d-flex align-items-center"
                href="index.php
          "><img src="img/Zarifa-logo.svg" alt="zarifa-logo" class="navbar-brand-logo" /><span>Zarifa</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-white align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active text-white fs-6 animate__animated animate__fadeInDown"
                            aria-current="page" href="#" data-i18n="nav_home"><i
                                class="fa-solid fa-house nav-icons-padding"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white animate__animated animate__fadeInDown" href="#"
                            data-i18n="nav_about"><i class="fa-solid fa-circle-info nav-icons-padding"></i>About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white animate__animated animate__fadeInDown" href="#"
                            data-i18n="nav_products"><i class="fa-solid fa-shop nav-icons-padding"></i>Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-6 animate__animated animate__fadeInDown" href="#"
                            data-i18n="nav_contact"><i
                                class="fa-solid fa-address-book nav-icons-padding"></i>Contact</a>
                    </li>
                    <li class="nav-item"></li>
                </ul>
            </div>
            <button id="langSwitch" class="btn btn-sm btn-light">
                <span class="english-text">မြန်မာ</span>
                <span class="myanmar-text hidden">English</span>
            </button>
        </div>
    </nav> -->
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
            <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto my-4 my-lg-0 ">
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
                </ul>
                <button id="langSwitch" class="btn btn-light text-primary animate__animated animate__fadeInDown animate__delay-06s">
                    <span class="english-text">မြန်မာ</span>
                    <span class="myanmar-text hidden">English</span>
                </button>
            </div>
        </div>
    </nav>


    <!-- <br /><br />
    <section class="bg-primary py-2">
      <div class="container">
        <div class="row gx-4 align-items-center">
          <div class="col-md-6">
            <div class="me-md-2 me-lg-5">
              <img
                src="img/hero-section-illustration.svg"
                alt="Myanmar Couple"
                class="img-fluid rounded-3"
              />
            </div>
          </div>
          <div class="col-md-6">
            <div class="ms-md-2 ms-lg-5 mt-5 mt-md-0">
              <h1
                id="hero-title"
                class="display-5 text-center fw-bolder text-light myanmar-font-size"
                data-i18n="hero_title"
              >
                Let’s carry the beauty of <br />
                <span class="text-dark">Myanmar culture</span><br />
                into the future.
              </h1>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <br />
    <section class="w-100 bg-cover hero-section__height overflow-hidden animate__animated animate__fadeIn" style="background-image: url(img/hero-section-bg.svg)">
        <div class="container">
            <h1 id="hero-title" class="fw-bolder w-50 myanmar-font-size position-absolute top-25 pt-5 display-4 animate__animated animate__fadeInDown .animate__delay-02s"
                style="color:#303a52"
                data-i18n="hero_title">
                Let’s carry the beauty of<br />
                <span class="text-dark">Myanmar culture</span><br />
                into the future.
            </h1>
            <img src="img/dance-girl.svg" alt="" class="main-img" />
        </div>
    </section>
    <!-- about us Section  -->
    <section class="py-5" id="about-link">
        <div class="container">
            <div class="row gx-4 align-items-center justify-content-between">
                <div class="col-md-6 order-1 order-md-1">
                    <div class="mt-3 mt-md-0 me-md-3 me-lg-5 " data-aos="fade-right">
                        <h2 id="about-title" class="display-6 fw-bold text-primary" data-i18n="about_title">
                            About Us
                        </h2>
                        <p class="lh-lg mb-2" data-i18n="about_desc">
                            At <b class="text-primary">Zarifa</b>, our collections blend the
                            softness of pure cotton with the elegance of authentic silk -
                            perfect for everyday comfort and graceful living. Ethically
                            made.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 order-2 order-md-2">
                    <div class="row gx-2 gx-lg-3">
                        <div class="col-6" data-aos="flip-up">
                            <img class="img-fluid rounded-3 nav-shadow" src="./img/cotton-tower.svg"
                                alt="Zarifa product" />
                        </div>
                        <div class="col-6" data-aos="flip-right">
                            <img class="img-fluid rounded-3 nav-shadow" src="./img/silk-pajama.svg"
                                alt="Zarifa product" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features -->
    <section class="py-5 mt-md-5 bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center text-center mb-3">
                <div class="col-lg-8 col-xl-7">
                    <h2 id="feature-title" class="display-6 fw-bold" data-aos="zoom-in-up" data-i18n="our_features">
                        Our Features
                    </h2>
                    <br />
                </div>
            </div>
            <div class="row g-4 g-md-5">
                <div class="col-md-6 col-xl-4" data-aos="zoom-in-up">
                    <div class="d-flex align-items-center mb-3 mb-md-4">
                        <div class="text-primary">
                            <i class="fa-solid fa-star text-white icon-font-size"></i>
                        </div>
                        <h5 id="feature-quality-title" class="fw-bold ms-2 mb-0" data-i18n="feature_quality">
                            Premium Fabric Quality
                        </h5>
                    </div>
                    <p data-i18n="feature_quality_desc">
                        We use only the finest natural fibers, ensuring comfort,
                        breathability, and luxurious texture in every product.
                    </p>
                </div>
                <div class="col-md-6 col-xl-4" data-aos="zoom-in-up">
                    <div class="d-flex align-items-center mb-3 mb-md-4">
                        <div class="text-primary">
                            <i class="fa-solid fa-palette text-white icon-font-size"></i>
                        </div>
                        <h5 id="feature-color-title" class="fw-bold ms-2 mb-0" data-i18n="feature_color">
                            Vibrant, Lasting Colors
                        </h5>
                    </div>
                    <p data-i18n="feature_color_desc">
                        Our dyes are rich, fade-resistant, and safe on skin - preserving
                        the beauty of each item wash after wash.
                    </p>
                </div>
                <div class="col-md-6 col-xl-4" data-aos="zoom-in-up">
                    <div class="d-flex align-items-center mb-3 mb-md-4">
                        <div class="text-primary">
                            <i class="fa-solid fa-user-check text-white icon-font-size"></i>
                        </div>
                        <h5 id="feature-handmade-title" class="fw-bold ms-2 mb-0" data-i18n="feature_handmade">
                            Handcrafted & Ethically Made
                        </h5>
                    </div>
                    <p data-i18n="feature_handmade_desc">
                        Many of our products are handcrafted by skilled artisans,
                        supporting sustainable livelihoods and traditional craftsmanship.
                    </p>
                </div>
                <div class="col-md-6 col-xl-4" data-aos="zoom-in-up">
                    <div class="d-flex align-items-center mb-3 mb-md-4">
                        <div class="text-primary">
                            <i class="fa-solid fa-seedling text-white icon-font-size"></i>
                        </div>
                        <h5 id="feauter-eco-title" class="fw-bold ms-2 mb-0" data-i18n="feature_eco">
                            Eco-Conscious Materials
                        </h5>
                    </div>
                    <p data-i18n="feature_eco_desc">
                        Our cotton is sustainably sourced, and our packaging is minimal
                        and recyclable - because fashion should respect nature too.
                    </p>
                </div>
                <div class="col-md-6 col-xl-4" data-aos="zoom-in-up">
                    <div class="d-flex align-items-center mb-3 mb-md-4">
                        <div class="text-primary">
                            <i class="fa-solid fa-soap text-white icon-font-size"></i>
                        </div>
                        <h5 id="feature-soft-title" class="fw-bold ms-2 mb-0" data-i18n="feature_soft">
                            Soft & Skin-Friendly
                        </h5>
                    </div>
                    <p data-i18n="feature_soft_desc">
                        Hypoallergenic and gentle on the skin, perfect for sensitive users
                        including babies and those with skin conditions.
                    </p>
                </div>
                <div class="col-md-6 col-xl-4" data-aos="zoom-in-up">
                    <div class="d-flex align-items-center mb-3 mb-md-4">
                        <div class="text-primary">
                            <i class="fa-solid fa-ruler text-white icon-font-size"></i>
                        </div>
                        <h5 id="feature-fit-title" class="fw-bold ms-2 mb-0" data-i18n="feature_fit">
                            Tailored Fit & Comfort
                        </h5>
                    </div>
                    <p data-i18n="feature_fit_desc">
                        Thoughtfully designed sizes and cuts ensure a flattering fit and
                        day-long comfort.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- our products -->
    <section class="py-5" id="product-link">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-2 mx-4" data-aos="fade-down">
                <h2 id="products-title" class="display-6 fw-bold m-0" data-i18n="products_title">
                    Our Products
                </h2>
                <a href="productTest.php" class="btn px-4 btn-primary text-white" data-i18n="products_more">See More</a>
            </div>
            <div id="profileCarousel" class="carousel slide" data-bs-ride="carousel" data-aos="zoom-in-up">
                <!-- Indicators at the top -->
                <div class="carousel-indicators position-relative mb-2">
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true"></button>
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="2"></button>
                </div>

                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-5 col-lg-4 ">
                                <!-- Wider image column -->
                                <img src="./img/bedding/double1.jpg" class="img-fluid rounded shadow-sm object-fit-cover "
                                    alt="Jane Smith" style="aspect-ratio: 1/1;"/>
                            </div>
                            <div class=" col-md-7 col-lg-6">
                                <!-- Wider content column -->
                                <div class="card-body ms-md-5 mt-3 mt-md-0">
                                    <h4 class="fw-bold m-0 mb-4" data-i18n="product_p1_title">Double Bedsheet</h4>
                                    <p class="" data-i18n="product_p1_para">
                                        Add a touch of royal elegance to your bedroom with this traditional Jaipuri
                                        print bedsheet. Crafted from soft, breathable cotton, it features a beautiful
                                        motif of elephants and intricate patterns, bringing a rich, cultural aesthetic
                                        to your home.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-5 col-lg-4">
                                <img src="./img/HomeAccessories/coverBlue.png" class="img-fluid rounded shadow-sm object-fit-cover"
                                    alt="Mike Johnson" style="aspect-ratio: 1/1;"/>
                            </div>
                            <div class=" col-md-7 col-lg-6">
                                <div class="card-body ms-md-5 mt-3 mt-md-0">
                                    <h4 class="fw-bold m-0 mb-4" data-i18n="product_p2_title">
                                        Blue Cushion
                                    </h4>
                                    <p class="" data-i18n="product_p2_para">
                                        Elevate your home decor with our exquisite silk decorative cushion. This elegant
                                        cushion is crafted from
                                        high-quality silk, offering a luxurious feel and a touch of cultural
                                        sophistication. Perfect for adding a pop of color and texture to your sofa, bed,
                                        or armchair.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-5 col-lg-4 ">
                                <img src="./img/clothing/paso1.webp" class="img-fluid rounded shadow-sm object-fit-cover"
                                    alt="Sarah Williams" style="aspect-ratio: 1/1;"/>
                            </div>
                            <div class="col-md-7 col-lg-6">
                                <div class="card-body ms-md-5 mt-3 mt-md-0">
                                    <h4 class="fw-bold m-0 mb-4" data-i18n="product_p3_title">
                                        Black Pusoe
                                    </h4>
                                    <p class="" data-i18n="product_p3_para">
                                        Experience the timeless beauty of the traditional Myanmar Pusoe, crafted in elegant black with a handwoven Ikat design. Made from soft, comfortable fabric with refined patterns, it is perfect for ceremonial wear, stylish daily outfits, or as a meaningful gift.
                                    </p>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls at Bottom -->
                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-primary mx-2" type="button" data-bs-target="#profileCarousel"
                        data-bs-slide="prev">
                        <i class="fa-solid fa-angle-left text-white"></i>
                    </button>
                    <button class="btn btn-primary mx-2" type="button" data-bs-target="#profileCarousel"
                        data-bs-slide="next">
                        <i class="fa-solid fa-angle-right text-white"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- our location -->
    <section class="py-5 bg-primary text-white " id="location-link">
        <div class="container-fluid p-lg-0">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6">
                    <div class="col-lg-8 mx-auto" data-aos="zoom-in">
                        <h2 id="contact-title" class="display-5 fw-bold" data-i18n="contact_title">
                            Contact Us
                        </h2>
                        <p data-i18n="contact_para">
                            For any inquiries about our premium cotton and silk collections,
                            customer support, or wholesale opportunities, we’d love to hear
                            from you!
                        </p>
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input class="form-control bg-light" data-i18n-placeholder="legend_name"
                                            placeholder="Your name" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input class="form-control bg-light" data-i18n-placeholder="legend_email"
                                            placeholder="Your email" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea class="form-control bg-light" data-i18n-placeholder="legend_message"
                                            placeholder="Your message" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="d-grid rounded-2">
                                        <button class="btn btn-light text-primary" data-i18n="send_message"
                                            type="submit">
                                            Send message
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="zoom-in">
                    <div class="mt-5 mt-lg-0 w-75 mx-auto">
                        <img alt="" class="img-fluid" src="img/3d-view-map.jpg" />
                    </div>
                </div>
            </div>
        </div>
    </section>
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
</body>

</html>