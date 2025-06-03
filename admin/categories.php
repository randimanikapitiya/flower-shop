<?php
session_start();
require_once '../config/config.php';
require_once '../includes/db.php';

include 'includes/admin_header.php';
include 'includes/admin_nav.php';
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include 'includes/admin_sidebar.php'; ?>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Categories Management</h1>
                <a href="add-categories.php" class="btn btn-primary-custom">
                    <i class="fas fa-plus me-2"></i>Add New Category
                </a>
            </div>

            <!-- Category Stats -->
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="card card-stats shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-primary-custom rounded-circle p-3">
                                    <i class="fas fa-folder fa-fw text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="card-title mb-0">Total Categories</h6>
                                    <h2 class="mt-2 mb-0">12</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-success rounded-circle p-3">
                                    <i class="fas fa-check-circle fa-fw text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="card-title mb-0">Active</h6>
                                    <h2 class="mt-2 mb-0">10</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-warning rounded-circle p-3">
                                    <i class="fas fa-pause-circle fa-fw text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="card-title mb-0">Inactive</h6>
                                    <h2 class="mt-2 mb-0">2</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-info rounded-circle p-3">
                                    <i class="fas fa-layer-group fa-fw text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="card-title mb-0">Sub Categories</h6>
                                    <h2 class="mt-2 mb-0">5</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categories Table -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Products Count</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Roses</td>
                                    <td>Beautiful rose arrangements</td>
                                    <td><span class="badge bg-info">15</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary-custom" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="api/categories.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="category_id" value="1">
                    <div class="mb-3">
                        <label for="editCategoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="editCategoryName" name="name" value="Roses" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCategorySlug" class="form-label">Category Slug</label>
                        <input type="text" class="form-control" id="editCategorySlug" name="slug" value="roses" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCategoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editCategoryDescription" name="description" rows="3">Beautiful rose arrangements</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editCategoryStatus" class="form-label">Status</label>
                        <select class="form-select" id="editCategoryStatus" name="status" required>
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-custom">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/admin_footer.php'; ?>
