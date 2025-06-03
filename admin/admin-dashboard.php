<?php
session_start();
include '../config/db.php';


// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../pages/login.php');
    exit();
}

include 'includes/admin_header.php';
include 'includes/admin_nav.php';

include '../config/db.php';

// Total Orders
$order_result = $conn->query("SELECT COUNT(*) AS total FROM orders");
$total_orders = $order_result->fetch_assoc()['total'];

// Total Products
$product_result = $conn->query("SELECT COUNT(*) AS total FROM products");
$total_products = $product_result->fetch_assoc()['total'];

// Total Users
$user_result = $conn->query("SELECT COUNT(*) AS total FROM users");
$total_users = $user_result->fetch_assoc()['total'];

// Total Categories
$category_result = $conn->query("SELECT COUNT(*) AS total FROM categories");
$total_categories = $category_result->fetch_assoc()['total'];

$sql = "SELECT o.id AS order_id, u.firstname AS customer_name, 
               GROUP_CONCAT(p.name SEPARATOR ', ') AS products,
               o.product_id, o.status, o.created_at 
        FROM orders o
        JOIN users u ON o.user_id = u.id
        JOIN products p ON o.product_id = p.id
        GROUP BY o.id, o.product_id, o.status, o.created_at, u.firstname
        ORDER BY o.created_at DESC
        LIMIT 2";

$result = $conn->query($sql);

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
                        <h2 class="mt-2 mb-0"><?php echo $total_orders; ?></h2>
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
                        <i class="fa-light fa-flower fa-fw text-white"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="card-title mb-0">Total Products</h6>
                        <h2 class="mt-2 mb-0"><?php echo $total_products; ?></h2>
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
                        <h2 class="mt-2 mb-0"><?php echo $total_users; ?></h2>
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
                        <i class="fa-regular fa-list fa-fw text-white"></i>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="card-title mb-0">Categories</h6>
                        <h2 class="mt-2 mb-0"><?php echo $total_categories; ?></h2>
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
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
<?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['order_id']; ?></td>
        <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
        <td><?php echo htmlspecialchars($row['products']); ?></td>
        <td>
            <?php
            // Fetch price for the product in this order
            $productId = $row['product_id'];
            $price = 0;
            $totalResult = $conn->query("SELECT sale_price FROM products WHERE id = $productId LIMIT 2");
            if ($totalResult && $totalResult->num_rows > 0) {
                $price = $totalResult->fetch_assoc()['sale_price'];
            }
            ?>
            LKR<?php echo number_format($price, 2); ?>
        </td>
        <td>
            <?php if ($row['status'] === 'Delivered'): ?>
                <span class="badge bg-success">Delivered</span>
            <?php elseif ($row['status'] === 'Processing'): ?>
                <span class="badge bg-warning text-dark">Processing</span>
            <?php elseif ($row['status'] === 'Cancelled'): ?>
                <span class="badge bg-danger">Cancelled</span>
            <?php else: ?>
                <span class="badge bg-secondary"><?php echo $row['status']; ?></span>
            <?php endif; ?>
        </td>
        <td><?php echo $row['created_at']; ?></td>
        <td>
            <form method="post" action="view-order.php" style="display:inline;">
                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                <button class="btn btn-sm btn-primary-custom" type="submit">View</button>
            </form>
        </td>
    </tr>
<?php endwhile; ?>
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
            </div>
        </main>
    </div>
</div>

<?php include 'includes/admin_footer.php'; ?>