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
                <h1 class="h2">Add New Category</h1>
                <a href="categories.php" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Categories
                </a>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!-- Add Category Form -->
                    
<div class="card shadow-sm">
    <div class="card-body">
        <form action="api/add_categories.php" method="POST" enctype="multipart/form-data"> 
            <div class="mb-4">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control form-control-lg" id="categoryName" name="name" required 
                       placeholder="Enter category name">
                <small class="text-muted">Choose a clear and descriptive name for the category</small>
            </div>

            <div class="mb-4">
                <label for="categoryDescription" class="form-label">Description</label>
                <textarea class="form-control" id="categoryDescription" name="description" rows="4" 
                          placeholder="Enter category description"></textarea>
                <small class="text-muted">Provide a brief description of what this category includes</small>
            </div>

            
            <div class="mb-4">
                <label for="categoryStatus" class="form-label">Status</label>
                <select class="form-select" id="categoryStatus" name="status" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="categoryImage" class="form-label w-50">Category Image</label>
                <input type="file" class="form-control" id="categoryImage" name="image" accept="image/*">
                <small class="text-muted">Recommended size: 800x600 pixels</small>
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

            <div class="mb-4">
                <label class="form-label d-block">Display Options</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="showInMenu" name="show_in_menu" value="1" checked>
                    <label class="form-check-label" for="showInMenu">Show in Menu</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="showInHome" name="show_in_home" value="1">
                    <label class="form-check-label" for="showInHome">Feature on Homepage</label>
                </div>
            </div>

            <div class="border-top pt-4 mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary-custom btn-lg w-100">
                            <i class="fas fa-save me-2"></i>Save Category
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a href="categories.php" class="btn btn-outline-secondary btn-lg w-100">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


                </div>
            </div>
        </main>
    </div>
</div>

<?php include 'includes/admin_footer.php'; ?>
