<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <form action="upload.php" id="uploadForm" method="POST" enctype="multipart/form-data" class="p-3">

        <div class="modal-body">

            <!-- Product Name -->
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter product name" required>
            </div>
            <label class="form-label d-block mb-2">Color</label>
            <div class="picker-container">
                <h3 class="mb-3">Pick a Color</h3>
                <input type="text" name="color" class="form-control form-control-color">

            </div>

            <label for="category">Categories:</label>
            <select name="category_name" id="category">
                <option value="Clothing">Clothing</option>
                <option value="Bedding">Bedding</option>
                <option value="Home Accessories">Home Accessories</option>
            </select>

            <!-- Size (Checkboxes) -->
            <div class="mb-3">
                <label class="form-label d-block mb-2">Size</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sizes[]" value="S" id="option1">
                    <label class="form-check-label" for="option1">S</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sizes[]" value="M" id="option2">
                    <label class="form-check-label" for="option2">M</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="sizes[]" value="L" id="option3">
                    <label class="form-check-label" for="option3">L</label>
                </div>
            </div>


            <!-- Key Features -->
            <div class="mb-3">
                <label class="form-label">Key Features</label>
                <div class="row g-2">
                    <div class="col-md-6"><input type="text" name="keyFeatures[]" class="form-control"
                            placeholder="Item 1">
                    </div>
                    <div class="col-md-6"><input type="text" name="keyFeatures[]" class="form-control"
                            placeholder="Item 2">
                    </div>
                    <div class="col-md-6"><input type="text" name="keyFeatures[]" class="form-control"
                            placeholder="Item 3">
                    </div>
                    <div class="col-md-6"><input type="text" name="keyFeatures[]" class="form-control"
                            placeholder="Item 4">
                    </div>
                    <div class="col-md-6"><input type="text" name="keyFeatures[]" class="form-control"
                            placeholder="Item 5">
                    </div>
                    <div class="col-md-6"><input type="text" name="keyFeatures[]" class="form-control"
                            placeholder="Item 6">
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Enter description"></textarea>
            </div>

            <!-- Specification Table -->
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
                <textarea name="careInstruction" class="form-control" rows="3"
                    placeholder="Enter care instructions"></textarea>
            </div>

            <!-- Image Upload -->
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
            </div>

        </div>

        <!-- Footer Buttons -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
    <script>
    const choice = new Choices('#color-select', {
        removeItemButton: true,
        tags: true
    });
    </script>
    <script>
    const colorPicker = document.getElementById('colorPicker');
    const colorPreview = document.getElementById('colorPreview');
    const colorCode = document.getElementById('colorCode');
    </script>


</body>

</html>