<?php
session_start();
include '../includes/header.php';
include '../includes/nav.php';
include '../config/db.php';

$category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM products WHERE category_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container">
    <h1 class="text-center my-5">Products</h1>
    <div class="row">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card fade-in">
                        <img src="../assets/images/products/<?php echo htmlspecialchars($row['main_image']); ?>" class="card-img-center" alt="<?php echo htmlspecialchars($row['name']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                            <div class="price mb-2">LKR <?php echo number_format($row['sale_price'], 2); ?></div>
                            <p class="mb-1"><strong>Stock:</strong> <?php echo (int)$row['stock']; ?></p>
                            <p class="mb-3"><strong>Status:</strong> <?php echo htmlspecialchars($row['status']); ?></p>
                            <div class="d-grid gap-2">
                                <a href="add-to-cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p>No products found in this category.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
include '../includes/footer.php';
?>
