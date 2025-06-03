<?php
session_start();
include '../config/db.php';


if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../pages/login.php');
    exit();
}

include 'includes/admin_header.php';
include 'includes/admin_nav.php';
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include 'includes/admin_sidebar.php'; ?>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Add New Product</h1>
                <a href="products.php" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Products
                </a>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!-- Add Product Form -->
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <form action="api/add_products.php" method="POST" enctype="multipart/form-data">
                                <!-- Basic Information -->
                                <div class="card mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary-custom">Basic Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label for="productName" class="form-label">Product Name</label>
                                            <input type="text" class="form-control form-control-lg" id="productName" 
                                                   name="name" required placeholder="Enter product name">
                                            <small class="text-muted">Choose a descriptive name for your product</small>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <label for="productCategory" class="form-label">Category</label>
                                                <?php
                                                    // Fetch categories from the database
                                                    $category_query = "SELECT id, name FROM categories";
                                                    $category_result = mysqli_query($conn, $category_query);
                                                ?>
                                                <select class="form-select" id="productCategory" name="category" required>
                                                    <option value="" disabled selected>Select category</option>
                                                    <?php if ($category_result && mysqli_num_rows($category_result) > 0): ?>
                                                        <?php while ($row = mysqli_fetch_assoc($category_result)): ?>
                                                            <option value="<?php echo htmlspecialchars($row['id']); ?>">
                                                                <?php echo htmlspecialchars($row['name']); ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    <?php else: ?>
                                                        <option value="" disabled>No categories found</option>
                                                    <?php endif; ?>
                                                    

                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="productStatus" class="form-label">Status</label>
                                                <select class="form-select" id="productStatus" name="status" required>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                    <option value="out_of_stock">Out of Stock</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="productDescription" class="form-label">Description</label>
                                            <textarea class="form-control" id="productDescription" name="description" 
                                                      rows="4" required placeholder="Enter product description"></textarea>
                                            <small class="text-muted">Provide a detailed description of the product</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pricing and Inventory -->
                                <div class="card mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary-custom">Pricing & Inventory</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            
                                            <div class="col-md-6">
                                                <label for="productSalePrice" class="form-label"> Price (LKR)</label>
                                                <input type="number" class="form-control" id="productSalePrice" 
                                                       name="sale_price" step="0.01">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <label for="productStock" class="form-label">Stock Quantity</label>
                                                <input type="number" class="form-control" id="productStock" 
                                                       name="stock" required>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <!-- Images -->
                                <div class="card mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary-custom">Product Images</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label for="productMainImage" class="form-label">Main Image</label>
                                            <input type="file" class="form-control" id="productMainImage" 
                                                   name="main_image" accept="image/*" required>
                                            <small class="text-muted">Recommended size: 800x800 pixels</small>
                                        </div>

                                          <!-- Preview Card -->
                    <div class="card shadow-sm">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary-custom">
                                <i class="fas fa-eye me-2"></i>Category Preview
                            </h6>
                        </div>
                        <div class="card-body text-center">
                            <div class="preview-image mb-3">
                                <img src="../assets/images/products/placeholder.jpg" class="img-fluid rounded" alt="Category Preview">
                            </div>
                            <h5 class="preview-name mb-2">Category Name</h5>
                            <p class="preview-description text-muted small mb-0">Category description will appear here</p>
                        </div>
                    </div>
                                    </div>
                                </div>
                                
                                <div class="border-top pt-4 mt-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary-custom btn-lg w-100">
                                                <i class="fas fa-save me-2"></i>Save Product
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="products.php" class="btn btn-outline-secondary btn-lg w-100">
                                                <i class="fas fa-times me-2"></i>Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Help Card -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary-custom">
                                <i class="fas fa-info-circle me-2"></i>Product Tips
                            </h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-3">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Use high-quality product images
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Write detailed product descriptions
                                </li>
                                <li class="mb-3">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Set competitive prices
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Keep inventory updated
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Image Guidelines -->
                    <div class="card shadow-sm">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary-custom">
                                <i class="fas fa-image me-2"></i>Image Guidelines
                            </h6>
                        </div>
                        <div class="card-body">
                            <p class="small mb-3">For best results, use images that are:</p>
                            <ul class="small text-muted mb-0">
                                <li>At least 800x800 pixels</li>
                                <li>Well-lit and in focus</li>
                                <li>Show the product clearly</li>
                                <li>Have a white or light background</li>
                                <li>Less than 2MB in size</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include 'includes/admin_footer.php'; ?>
