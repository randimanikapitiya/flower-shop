<?php
session_start();
include '../includes/header.php';
include '../includes/nav.php';
include '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
if ($_SESSION['user_role'] !== 'admin') {
    header('Location: ../pages/403.php');
    exit();
}

// Fetch order data
$sql = "SELECT 
            o.id AS order_id,
            u.firstname AS customer_name,
            p.name AS product_name,
            p.main_image,
            p.sale_price,
            o.product_id,
            o.status,
            o.created_at,
            o.delivery_date
        FROM orders o
        JOIN users u ON o.user_id = u.id
        JOIN products p ON o.product_id = p.id
        ORDER BY o.created_at DESC";

$result = $conn->query($sql);
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include 'includes/admin_sidebar.php'; ?>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Orders Management</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-download me-2"></i>Export
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-print me-2"></i>Print
                        </button>
                    </div>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Products</th>
                <th>Price</th>
                <th>Order Status</th>
                <th>Ordered Date</th>
                <th>Delivery Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="../assets/images/products/<?php echo htmlspecialchars($row['main_image']); ?>" alt="Product" class="rounded-circle me-2" width="32">
                                <?php echo htmlspecialchars($row['customer_name']); ?>
                            </div>
                        </td>
                        <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                        <td>LKR <?php echo number_format($row['sale_price'] , 2); ?></td>
                        <td>
                            <span class="badge bg-<?php echo ($row['status'] === 'paid') ? 'success' : 'secondary'; ?>">
                                <?php echo ucfirst($row['status']); ?>
                            </span>
                        </td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                        <td><?php echo htmlspecialchars($row['delivery_date']); ?></td>
                        <td>
                            <div class="btn-group">
                                <form method="post" action="view_order.php" style="display:inline;">
                                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </form>
                                <form method="post" action="mark_delivered.php" style="display:inline;">
                                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <form method="post" action="cancel_order.php" style="display:inline;">
                                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">No orders found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>




<?php include 'includes/admin_footer.php'; ?>
