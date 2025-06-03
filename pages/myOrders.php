<?php   
session_start();
include '../includes/header.php';
include '../includes/nav.php';
include '../config/db.php'; 

if (!isset($_SESSION['user_id'])) {
    header('Location: ../pages/login.php');
    exit();
}   
$user_id = $_SESSION['user_id'];
$sql = "SELECT o.id, o.product_id, o.name, o.email, o.phone, o.delivery_date, o.message, p.name AS product_name, p.sale_price 
        FROM orders o 
        JOIN products p ON o.product_id = p.id 
        WHERE o.user_id = ?
        AND o.status = 'pending' 
        ORDER BY o.id DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();   
$result = $stmt->get_result();
?>

<div class="container">
    <h1 class="text-center my-5">My Orders</h1>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <?php if ($result && $result->num_rows > 0): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Delivery Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                <td>LKR <?php echo number_format($row['sale_price'], 2); ?></td>
                                <td><?php echo htmlspecialchars($row['delivery_date']); ?></td>
                                <td><span class="badge bg-success">Pending</span></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-info text-center">You have no orders yet.</div>
            <?php endif; ?>
        </div>
    </div>



