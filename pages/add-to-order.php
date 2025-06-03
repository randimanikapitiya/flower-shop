<?php
session_start();
include '../includes/header.php';
include '../includes/nav.php';
include '../config/db.php';

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;


$product = null;
if ($product_id > 0) {
    $stmt = $conn->prepare("SELECT id, name, sale_price FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}

?>
<div class="container">
    <h1 class="text-center my-5">Add to Order</h1>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h5 class="card-title">Order Form</h5>
                    <p class="card-text">Please fill out the form below to add items to your Order.</p>
                     <div class="modal-body">
                <?php if ($product): ?>
    <form action="../handlers/add_to_orders.php?id=<?php echo $product_id; ?>" method="POST">
        <h3 class="mb-4">Order Details</h3>
        
        
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" name="phone" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" value="LKR <?php echo number_format($product['sale_price'], 2); ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="delivery-date" class="form-label">Delivery Date</label>
            <input type="date" class="form-control" name="delivery_date" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Special Instructions</label>
            <textarea class="form-control" name="message" rows="3"></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="./categories.php" class="btn btn-outline-primary"><i class="fa fa-arrow-left me-2"></i>Back</a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-shopping-cart me-2"></i>Add to Order
            </button>
        </div>
    </form>
    <?php else: ?>
        <div class="alert alert-warning text-center">Product not found.</div>
    <?php endif; ?>
</div>  
                    
                </div>
            </div>

        </div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>

<!-- <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Add to Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="orderForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="delivery-date" class="form-label">Delivery Date</label>
                        <input type="date" class="form-control" id="delivery-date" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Special Instructions</label>
                        <textarea class="form-control" id="message" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="orderForm" class="btn btn-primary">Add to Cart</button>
            </div>
        </div>
    </div>
</div> -->