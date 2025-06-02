<?php
session_start();
require_once '../config/config.php';
require_once '../includes/db.php';

// Check if user is logged in and is admin
// if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
//     header('Location: ../pages/login.php');
//     exit();
// }

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
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="card card-stats shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 bg-primary-custom rounded-circle p-3">
                                    <i class="fas fa-shopping-cart fa-fw text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="card-title mb-0">Total Orders</h6>
                                    <h2 class="mt-2 mb-0">150</h2>
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
                                    <i class="fas fa-flower fa-fw text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="card-title mb-0">Total Products</h6>
                                    <h2 class="mt-2 mb-0">45</h2>
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
                                <div class="flex-shrink-0 bg-warning rounded-circle p-3">
                                    <i class="fas fa-envelope fa-fw text-white"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="card-title mb-0">New Messages</h6>
                                    <h2 class="mt-2 mb-0">18</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="card shadow-sm mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary-custom">Recent Orders</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Products</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1234</td>
                                    <td>John Doe</td>
                                    <td>Red Roses Bouquet</td>
                                    <td>$49.99</td>
                                    <td><span class="badge bg-success">Delivered</span></td>
                                    <td>2025-06-03</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary-custom">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#1235</td>
                                    <td>Jane Smith</td>
                                    <td>Spring Mix</td>
                                    <td>$39.99</td>
                                    <td><span class="badge bg-warning text-dark">Processing</span></td>
                                    <td>2025-06-03</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary-custom">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary-custom">Quick Actions</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="products.php" class="btn btn-primary-custom">
                                    <i class="fas fa-plus me-2"></i>Add New Product
                                </a>
                                <a href="orders.php" class="btn btn-outline-primary">
                                    <i class="fas fa-list me-2"></i>View All Orders
                                </a>
                                <a href="messages.php" class="btn btn-outline-primary">
                                    <i class="fas fa-envelope me-2"></i>Check Messages
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary-custom">System Status</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Orders Processing</span>
                                    <span>70%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary-custom" style="width: 70%"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Storage Usage</span>
                                    <span>45%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" style="width: 45%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Customer Response Rate</span>
                                    <span>85%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-info" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include 'includes/admin_footer.php'; ?>