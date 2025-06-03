<?php
session_start();
include '../includes/header.php';
include '../includes/nav.php';
?>
 
  <div class="hero-banner" style="background: linear-gradient(rgba(172, 23, 84, 0.7), rgba(229, 56, 136, 0.7)), url('assets/images/banner/hero-banner.jpg') center/cover;">
    <div class="hero-content">
        <h1 class="display-4 fw-bold text-white" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Welcome to Our Flower Shop</h1>
        <p class="lead text-white mb-4" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">Your one-stop shop for beautiful flower bouquets and arrangements</p>
        <!-- <a href="pages/products.php" class="btn btn-light btn-lg" style="background: rgba(255,255,255,0.95); color: var(--primary); backdrop-filter: blur(5px);">
            <i class="fas fa-seedling me-2"></i>Explore Our Collection
        </a> -->
        <?php if (isset($_SESSION['user_id'])): ?>
    <a href="pages/products.php" class="btn btn-light btn-lg" style="background: rgba(255,255,255,0.95); color: var(--primary); backdrop-filter: blur(5px);">
            <i class="fas fa-seedling me-2"></i>Explore Our Collection
        </a>
<?php else: ?>
    <a href="pages/register.php" class="btn btn-light btn-lg" style="background: rgba(255,255,255,0.95); color: var(--primary); backdrop-filter: blur(5px);">
            <i class="fas fa-seedling me-2"></i>Explore Our Collection
        </a>
<?php endif; ?>
    </div>
</div>

<div class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-md-6">
            <div class="banner-image-left" style="background: url('assets/images/banner/spring-collection.jpg') center/cover;">
                <div class="banner-content text-center p-5">
                    <h2 class="text-white mb-3">Spring Collection</h2>
                    <p class="text-white mb-4">Discover our fresh seasonal arrangements</p>
                    <?php if (isset($_SESSION['user_id'])): ?>
    <a href="pages/products.php" class="btn btn-primary">Order Now</a>
<?php else: ?>
    <a href="pages/register.php" class="btn btn-primary">Order Now</a>
<?php endif; ?>


                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="banner-image-right" style="background: url('assets/images/banner/wedding-flowers.jpg') center/cover;">
                <div class="banner-content text-center p-5">
                    <h2 class="text-white mb-3">Wedding Flowers</h2>
                    <p class="text-white mb-4">Make your special day unforgettable</p>
                    <?php if (isset($_SESSION['user_id'])): ?>
    <a href="pages/products.php" class="btn btn-primary">Order Now</a>
<?php else: ?>
    <a href="pages/register.php" class="btn btn-primary">Order Now</a>
<?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h2 class="text-center my-5">Featured Bouquets</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card fade-in">
                <img src="assets/images/products/roses-bouquet.jpg" class="card-img-top" alt="Red Roses Bouquet">
                <div class="card-body">
                    <h5 class="card-title">Romantic Red Roses</h5>
                    <p class="card-text">A classic arrangement of premium red roses.</p>
                    <div class="price mb-3">$49.99</div>
                    <!-- <a href="pages/products.php" class="btn btn-outline-primary">View Details</a>
                    <a href="pages/register.php" class="btn btn-primary">Order Now</a> -->
                    <?php if (isset($_SESSION['user_id'])): ?>
    <a href="pages/products.php" class="btn btn-primary">Order Now</a>
<?php else: ?>
    <a href="pages/register.php" class="btn btn-primary">Order Now</a>
<?php endif; ?>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fade-in">
                <img src="assets/images/products/mixed-bouquet.jpg" class="card-img-top" alt="Spring Mix Bouquet">
                <div class="card-body">
                    <h5 class="card-title">Spring Symphony</h5>
                    <p class="card-text">A vibrant mix of seasonal spring flowers.</p>
                    <div class="price mb-3">$39.99</div>
                    <!-- <a href="pages/products.php" class="btn btn-outline-primary">View Details</a>
                    <a href="pages/register.php" class="btn btn-primary">Order Now</a> -->
                    <?php if (isset($_SESSION['user_id'])): ?>
    <a href="pages/products.php" class="btn btn-primary">Order Now</a>
<?php else: ?>
    <a href="pages/register.php" class="btn btn-primary">Order Now</a>
<?php endif; ?>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card fade-in">
                <img src="assets/images/products/lilies-bouquet.jpg" class="card-img-top" alt="White Lilies Bouquet">
                <div class="card-body">
                    <h5 class="card-title">Pure Elegance</h5>
                    <p class="card-text">Stunning white lilies and delicate greenery.</p>
                    <div class="price mb-3">$44.99</div>
                    <a href="pages/products.php" class="btn btn-outline-primary">View Details</a>
                    <a href="pages/register.php" class="btn btn-primary">Order Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 mb-5">
        <h3>Why Choose Us?</h3>
        <div class="row mt-4">
            <div class="col-md-4">
                <i class="fas fa-truck fs-1 text-primary mb-3" style="color: var(--primary) !important;"></i>
                <h4>Free Delivery</h4>
                <p>Same day delivery for local orders</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-seedling fs-1 text-primary mb-3" style="color: var(--primary) !important;"></i>
                <h4>Fresh Flowers</h4>
                <p>Hand-picked daily from local gardens</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-heart fs-1 text-primary mb-3" style="color: var(--primary) !important;"></i>
                <h4>100% Satisfaction</h4>
                <p>Guaranteed fresh for up to 7 days</p>
            </div>
        </div>
    </div>
</div>

<div class="parallax-section" style="background: linear-gradient(rgba(172, 23, 84, 0.8), rgba(229, 56, 136, 0.8)), url('assets/images/banner/parallax-banner.jpg') fixed center/cover;">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-8 mx-auto text-center text-white">
                <h2 class="display-4 mb-4 fw-bold" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Special Occasions</h2>
                <p class="lead mb-4" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">Make every moment memorable with our custom flower arrangements</p>
                <a href="pages/contact.php" class="btn btn-light btn-lg" style="background: rgba(255,255,255,0.9); color: var(--primary); backdrop-filter: blur(5px);">Get a Custom Quote</a>
            </div>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';
?>