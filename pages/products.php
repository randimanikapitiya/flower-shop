<?php
include '../includes/header.php';
include '../includes/nav.php';
?>

<div class="container">
    <h1 class="text-center my-5">Our Collection</h1>
    
    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                <button class="btn btn-outline-primary mx-2 active">All</button>
                <button class="btn btn-outline-primary mx-2">Roses</button>
                <button class="btn btn-outline-primary mx-2">Mixed Bouquets</button>
                <button class="btn btn-outline-primary mx-2">Seasonal</button>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Product 1 -->
        <div class="col-md-4 mb-4">
            <div class="card fade-in">
                <img src="../assets/images/products/roses.jpg" class="card-img-top" alt="Red Roses Bouquet">
                <div class="card-body">
                    <h5 class="card-title">Romantic Red Roses</h5>
                    <p class="card-text">A classic arrangement of premium red roses.</p>
                    <div class="price mb-3">$49.99</div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal">Order Now</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product 2 -->
        <div class="col-md-4 mb-4">
            <div class="card fade-in">
                <img src="../assets/images/products/mixed.jpg" class="card-img-top" alt="Spring Mix Bouquet">
                <div class="card-body">
                    <h5 class="card-title">Spring Symphony</h5>
                    <p class="card-text">A vibrant mix of seasonal spring flowers.</p>
                    <div class="price mb-3">$39.99</div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal">Order Now</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product 3 -->
        <div class="col-md-4 mb-4">
            <div class="card fade-in">
                <img src="../assets/images/products/lilies.jpg" class="card-img-top" alt="White Lilies Bouquet">
                <div class="card-body">
                    <h5 class="card-title">Pure Elegance</h5>
                    <p class="card-text">Stunning white lilies and delicate greenery.</p>
                    <div class="price mb-3">$44.99</div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal">Order Now</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Products -->
        <div class="col-md-4 mb-4">
            <div class="card fade-in">
                <img src="../assets/images/products/mixed.jpg" class="card-img-top" alt="Seasonal Mix">
                <div class="card-body">
                    <h5 class="card-title">Summer Breeze</h5>
                    <p class="card-text">Bright and cheerful summer flowers.</p>
                    <div class="price mb-3">$34.99</div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal">Order Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Place Your Order</h5>
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
                <button type="submit" form="orderForm" class="btn btn-primary">Place Order</button>
            </div>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';
?>

<?php
include '../includes/footer.php';
?>