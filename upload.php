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
$product_name     = $_POST['name'] ?? '';
$category_name    = trim($_POST['category_name'] ?? '');
$designColor      = $_POST['color'] ?? '';
$care_instruction = $_POST['careInstruction'] ?? '';
$description      = $_POST['description'] ?? '';

// Sizes (checkboxes / select)
$sizes = $_POST['sizes'] ?? []; // directly read the array


// Key features
$key_features       = $_POST['keyFeatures'] ?? [];
$key_features_json  = json_encode($key_features, JSON_UNESCAPED_UNICODE);

// Specifications
$material      = $_POST['material'] ?? [];
$length        = $_POST['length'] ?? [];
$fit           = $_POST['fit'] ?? [];
$weight        = $_POST['weight'] ?? [];
$country       = $_POST['country'] ?? [];
$certification = $_POST['certification'] ?? [];

$spec = [];
for ($i = 0; $i < count($material); $i++) {
    $spec[] = [
        'material'      => $material[$i] ?? '',
        'length'        => $length[$i] ?? '',
        'fit'           => $fit[$i] ?? '',
        'weight'        => $weight[$i] ?? '',
        'country'       => $country[$i] ?? '',
        'certification' => $certification[$i] ?? ''
    ];
}
$spec_json = json_encode($spec, JSON_UNESCAPED_UNICODE);

// ----------------------
// 3. Get category_id
// ----------------------
$cat_stmt = $conn->prepare("
    SELECT category_id FROM categories 
    WHERE REPLACE(category_name, ' ', '') = REPLACE(?, ' ', '')
");
$cat_stmt->bind_param("s", $category_name);
$cat_stmt->execute();
$cat_stmt->bind_result($category_id);
if (!$cat_stmt->fetch()) {
    echo json_encode(['success' => false, 'message' => 'Invalid category selected.']);
    exit;
}
$cat_stmt->close();

// ----------------------
// 4. Insert into products
// ----------------------
$stmt = $conn->prepare("
    INSERT INTO products 
    (category_id, name, keyFeatures, description, specification, careInstruction)
    VALUES (?, ?, ?, ?, ?, ?)
");
$stmt->bind_param(
    "isssss",
    $category_id,
    $product_name,
    $key_features_json,
    $description,
    $spec_json,
    $care_instruction
);

if (!$stmt->execute()) {
    echo json_encode(['success' => false, 'message' => 'Product insert failed: ' . $stmt->error]);
    $stmt->close();
    $conn->close();
    exit;
}

$product_id = $conn->insert_id;
$stmt->close();

// ----------------------
// 5. Handle image upload
// ----------------------
$image_filename = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $original_name = basename($_FILES['image']['name']); // Keep original file name
    $new_name = $original_name; 


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


    $upload_path = "C:/xampp/htdocs/Product_show_project/" . $category_folder . $new_name;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
        $image_filename = $category_folder . $new_name;
    }
}

// ----------------------
// 6. Insert into variants
// ----------------------
// if (!empty($sizes)) {
//     $variant_stmt = $conn->prepare("
//         INSERT INTO variants (product_id, size, designColor, image)
//         VALUES (?, ?, ?, ?)
//     ");

//     foreach ($sizes as $size) {
//         $variant_stmt->bind_param("isss", $product_id, $size, $designColor, $image_filename);
//         if (!$variant_stmt->execute()) {
//             error_log("Variant insert failed: " . $variant_stmt->error);
//         }
//     }
//     $variant_stmt->close();
// }
if (!empty($sizes)) {
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
}



// ----------------------
// 7. Success
// ----------------------
echo json_encode(['success' => true, 'message' => 'Product and variants saved successfully.']);

$conn->close();
?>