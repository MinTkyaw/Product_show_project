<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "productshow";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product ID from URL
$product_id = $_GET['product_id'] ?? 0;

// Fetch product
$product_sql = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
$product_sql->bind_param("i", $product_id);
$product_sql->execute();
$product_result = $product_sql->get_result();
$product = $product_result->fetch_assoc();

if (!$product) {
    echo "Product not found!";
    exit;
}

// Fetch variants for this product
$variant_sql = $conn->prepare("SELECT * FROM variants WHERE product_id = ?");
$variant_sql->bind_param("i", $product_id);
$variant_sql->execute();
$variant_result = $variant_sql->get_result();
$variants = $variant_result->fetch_all(MYSQLI_ASSOC);

?>