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
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Users Management</h1>
                <button class="btn btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="fas fa-user-plus me-2"></i>Add New User
                </button>
            </div>

            <!-- User Stats -->
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="card card-stats shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-primary-custom rounded-circle p-3">
                                    <i class="fas fa-users fa-fw text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="card-title mb-0">Total Users</h6>
                                    <h2 class="mt-2 mb-0">250</h2>
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
                                    <i class="fas fa-user-check fa-fw text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="card-title mb-0">Active Users</h6>
                                    <h2 class="mt-2 mb-0">220</h2>
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
                                    <i class="fas fa-user-clock fa-fw text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="card-title mb-0">New This Month</h6>
                                    <h2 class="mt-2 mb-0">25</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-danger rounded-circle p-3">
                                    <i class="fas fa-user-lock fa-fw text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="card-title mb-0">Inactive Users</h6>
                                    <h2 class="mt-2 mb-0">30</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users Table -->
            <div class="card shadow-sm">
                <div class="card-header py-3 bg-light">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">All Roles</option>
                                <option value="admin">Admin</option>
                                <option value="customer">Customer</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search users...">
                                <button class="btn btn-primary-custom" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Joined Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="rounded-circle bg-primary-custom text-white p-2" style="width: 35px; height: 35px; text-align: center;">
                                                    JD
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0">John Doe</h6>
                                                <small class="text-muted">Customer</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>john@example.com</td>
                                    <td><span class="badge bg-info">Customer</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>2025-05-01</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-primary-custom" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
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

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="api/users.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role" required>
                            <option value="customer">Customer</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-custom">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/admin_footer.php'; ?>
