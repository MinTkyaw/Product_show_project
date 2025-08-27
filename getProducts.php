<?php
header('Content-Type: application/json');

$host = "localhost";
$user = "root";
$password = "";
$db = "productshow";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

$category_name = $_GET['category'] ?? 'clothing';

// Map category names to category IDs
$categories = [
    'Clothing' => 1,
    'Bedding' => 2,
    'HomeAccessories' => 3
];

$category_id = $categories[$category_name] ?? 1;

// Fetch 3 products with their first variant image
$stmt = $conn->prepare("
    SELECT p.product_id, p.name, v.image 
    FROM products p
    JOIN variants v ON p.product_id = v.product_id
    WHERE p.category_id = ?
    GROUP BY p.product_id
    LIMIT 3
");
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode($products);

?>