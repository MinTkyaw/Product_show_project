<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="node_modules/aos/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand text-white" href="index.php">Zarifa</a>
        </div>
    </nav>

    <section class="py-5 mt-5">
        <div class="container text-center">
            <h3 id="productTypeTitle" class="text-primary mb-4">Clothing</h3>

            <div class="dropdown mb-4">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Types
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="showCards('clothing')">Clothing</a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="showCards('bedding')">Bedding</a>
                    </li>
                    <li><a class="dropdown-item" href="javascript:void(0)" onclick="showCards('homeAccessories')">Home
                            Accessories</a></li>
                </ul>
            </div>

            <div id="product-cards" class="row g-4">
                <!-- Product cards will be dynamically loaded here -->
            </div>
        </div>
    </section>

    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="node_modules/aos/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 800,
        once: false,
        mirror: true
    });

    function animateTitleChange(newTitle) {
        const titleElement = document.getElementById("productTypeTitle");
        titleElement.style.opacity = 0;
        setTimeout(() => {
            titleElement.textContent = newTitle;
            titleElement.style.opacity = 1;
        }, 300);
    }

    function showCards(category) {
        fetch(`getProducts.php?category=${category}`)
            .then(res => res.json())
            .then(products => {
                const container = document.getElementById('product-cards');
                container.innerHTML = '';

                products.forEach(product => {
                    const card = document.createElement('div');
                    card.className = 'col-md-4';
                    card.innerHTML = `
                            <div class="card" data-aos="zoom-in-up">
                                <img src="${product.image}" class="img-fluid object-fit-cover" alt="${product.name}">
                                <div class="card-body">
                                    <h5 class="fw-bold">${product.name}</h5>
                                </div>
                            </div>
                        `;
                    container.appendChild(card);
                });

                animateTitleChange({
                    clothing: "Clothing",
                    bedding: "Bedding",
                    homeAccessories: "Home Accessories"
                } [category] || "Products");

                AOS.refresh();
            })
            .catch(err => console.error(err));
    }

    // Load default category on page load
    document.addEventListener('DOMContentLoaded', () => {
        showCards('clothing');
    });
    </script>
</body>

</html>