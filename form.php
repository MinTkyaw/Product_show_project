<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Product Upload</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #eee9e6;
      color: #804e22;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .admin-card {
      background: white;
      border-radius: 1rem;
      padding: 2rem;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      border: 1px solid #ddd;
    }

    .admin-header {
      background: #804e22;
      color: white;
      padding: 1rem 2rem;
      border-radius: 1rem 1rem 0 0;
      font-weight: bold;
    }

    .form-label {
      font-weight: 600;
      color: #804e22;
    }

    .form-control:focus,
    .form-check-input:focus,
    select:focus {
      border-color: #996e42;
      box-shadow: 0 0 0 0.25rem rgba(153, 110, 66, 0.3);
    }

    .btn-primary {
      background-color: #804e22;
      border: none;
    }

    .btn-primary:hover {
      background-color: #996e42;
    }

    .btn-secondary {
      background-color: #aaa;
      border: none;
    }

    .color-preview {
      width: 100%;
      height: 60px;
      border-radius: 0.5rem;
      border: 2px solid #ced4da;
      margin-top: 1rem;
    }

    .picker-container {
      margin: 1rem 0;
      padding: 1rem;
      border: 1px solid #ddd;
      border-radius: 0.5rem;
      background: #fdfdfd;
    }
  </style>
</head>

<body>

  <div class="container my-5">
    <div class="admin-card">
      <div class="admin-header">Product Upload Form</div>
      <form action="upload.php" id="uploadForm" method="POST" enctype="multipart/form-data" class="p-3">

        <!-- Product Name -->
        <div class="mb-3">
          <label class="form-label">Product Name</label>
          <input type="text" name="product_name" class="form-control" placeholder="Enter product name" required>
        </div>

        <!-- Color Picker -->
        <label class="form-label d-block mb-2">Color</label>
        <input type="hidden" name="color" id="colorInput">
        <div class="picker-container">
          <input type="color" class="form-control form-control-color" id="colorPicker" value="#804e22">
          <div class="color-preview" id="colorPreview"></div>
          <div class="mt-2 fw-bold" id="colorCode">#804e22</div>
        </div>

        <!-- Category -->
        <div class="mb-3">
          <label for="category" class="form-label">Categories</label>
          <select name="category" id="category" class="form-select">
            <option value="Clothing">Clothing</option>
            <option value="Bedding">Bedding</option>
            <option value="Home Accessories">Home Accessories</option>
          </select>
        </div>

        <!-- Size -->
        <div class="mb-3">
          <label class="form-label">Size</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="size[]" value="S" id="option1">
            <label class="form-check-label" for="option1">S</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="size[]" value="M" id="option2">
            <label class="form-check-label" for="option2">M</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="size[]" value="L" id="option3">
            <label class="form-check-label" for="option3">L</label>
          </div>
        </div>

        <!-- Key Features -->
        <div class="mb-3">
          <label class="form-label">Key Features</label>
          <div class="row g-2">
            <div class="col-md-6"><input type="text" name="keyFeatures[]" class="form-control" placeholder="Item 1"></div>
            <div class="col-md-6"><input type="text" name="keyFeatures[]" class="form-control" placeholder="Item 2"></div>
            <div class="col-md-6"><input type="text" name="keyFeatures[]" class="form-control" placeholder="Item 3"></div>
            <div class="col-md-6"><input type="text" name="keyFeatures[]" class="form-control" placeholder="Item 4"></div>
          </div>
        </div>

        <!-- Description -->
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" rows="3" placeholder="Enter description"></textarea>
        </div>

        <!-- Specification -->
        <div class="mb-3">
          <label class="form-label">Specification</label>
          <div class="table-responsive">
            <table class="table table-bordered align-middle">
              <thead class="table-light">
                <tr>
                  <th>Material</th>
                  <th>Length</th>
                  <th>Fit</th>
                  <th>Weight</th>
                  <th>Country of Origin</th>
                  <th>Certification</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="text" name="material[]" class="form-control"></td>
                  <td><input type="text" name="length[]" class="form-control"></td>
                  <td><input type="text" name="fit[]" class="form-control"></td>
                  <td><input type="text" name="weight[]" class="form-control"></td>
                  <td><input type="text" name="country[]" class="form-control"></td>
                  <td><input type="text" name="certification[]" class="form-control"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Care Instruction -->
        <div class="mb-3">
          <label class="form-label">Care Instruction</label>
          <textarea name="care_instruction" class="form-control" rows="3" placeholder="Enter care instructions"></textarea>
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
          <label class="form-label">Upload Image</label>
          <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <!-- Footer -->
        <div class="d-flex justify-content-end gap-2">
          <button type="reset" class="btn btn-secondary">Cancel</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>

      </form>
    </div>
  </div>

  <script>
    const colorPicker = document.getElementById('colorPicker');
    const colorPreview = document.getElementById('colorPreview');
    const colorCode = document.getElementById('colorCode');
    const colorInput = document.getElementById('colorInput');

    colorPicker.addEventListener('input', () => {
      colorPreview.style.backgroundColor = colorPicker.value;
      colorCode.textContent = colorPicker.value;
      colorInput.value = colorPicker.value;
    });

    // Initialize
    colorPreview.style.backgroundColor = colorPicker.value;
    colorCode.textContent = colorPicker.value;
    colorInput.value = colorPicker.value;
  </script>

</body>
</html>
