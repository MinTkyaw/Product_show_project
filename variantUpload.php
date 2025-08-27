<?php
header('Content-Type: application/json');

// ----------------------
// 1. DB connection
// ----------------------
$conn = new mysqli("localhost", "root", "", "productshow");
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit;
}

// ----------------------
// 2. Collect form data
// ----------------------
$product_id       = $_POST['product_id'] ?? 0;  // existing product_id must be provided
$designColor      = $_POST['color'] ?? '';
$sizes            = $_POST['sizes'] ?? []; // array of sizes

$category_name = trim($_POST['category_name'] ?? '');
$product_id    = $_POST['product_id'] ?? 0;
$sizes         = $_POST['sizes'] ?? []; // array of sizes
$designColor   = $_POST['color'] ?? '';

// ----------------------
// 3. Handle image upload
// ----------------------
$image_filename = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $original_name = basename($_FILES['image']['name']);
    $new_name = $original_name;

    // Determine folder based on category
switch (strtolower(str_replace(' ', '', $category_name))) {
    case 'bedding':
        $category_folder = "img/bedding/";
        break;
    case 'clothing':
        $category_folder = "img/clothing/";
        break;
    default:
        $category_folder = "img/HomeAccessories/";
        break;
}

// Full upload path
$upload_dir = "C:/xampp/htdocs/Product_show_project/" . $category_folder;

// Make sure folder exists
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$upload_path = $upload_dir . $new_name;


    if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
        $image_filename = $category_folder . $new_name;
    }
}

// ----------------------
// 4. Insert into variants
// ----------------------
if (!empty($sizes) && $product_id > 0) {
    $variant_stmt = $conn->prepare("
        INSERT INTO variants (product_id, size, designColor, image)
        VALUES (?, ?, ?, ?)
    ");
    
    if (!$variant_stmt) {
        echo json_encode(['success'=>false,'message'=>'Prepare failed: '.$conn->error]);
        exit;
    }

    foreach ($sizes as $size) {
        $variant_stmt->bind_param("isss", $product_id, $size, $designColor, $image_filename);
        if (!$variant_stmt->execute()) {
            echo json_encode(['success'=>false,'message'=>'Variant insert failed: '.$variant_stmt->error]);
            exit;
        }
    }
    $variant_stmt->close();

    echo json_encode(['success' => true, 'message' => 'Variants saved successfully.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Missing product_id or sizes.']);
}

$conn->close();
?>