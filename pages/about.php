<?php
include '../includes/header.php';
include '../includes/nav.php';
?>

<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <h1 class="display-4 mb-4">Our Story</h1>
            <p class="lead">Welcome to our flower shop! Since 2010, we've been creating beautiful floral arrangements that bring joy and color to life's special moments.</p>
            <p>Our passion for flowers drives us to source the freshest blooms and create stunning arrangements that exceed our customers' expectations. Every bouquet tells a unique story and carries a special message.</p>
        </div>
        <div class="col-md-6">
            <img src="../assets/images/banner/hero-banner.jpg" alt="Our Shop" class="img-fluid rounded shadow">
        </div>
    </div>

    <div class="row my-5">
        <div class="col-md-4 text-center mb-4">
            <div class="p-4 bg-light rounded-3 h-100">
                <i class="fas fa-hand-holding-heart fa-3x text-primary mb-3"></i>
                <h3>Our Mission</h3>
                <p>To create beautiful floral experiences that celebrate life's special moments and bring joy to our customers.</p>
            </div>
        </div>
        <div class="col-md-4 text-center mb-4">
            <div class="p-4 bg-light rounded-3 h-100">
                <i class="fas fa-leaf fa-3x text-primary mb-3"></i>
                <h3>Sustainability</h3>
                <p>We're committed to sustainable practices, working with eco-friendly suppliers and reducing our environmental impact.</p>
            </div>
        </div>
        <div class="col-md-4 text-center mb-4">
            <div class="p-4 bg-light rounded-3 h-100">
                <i class="fas fa-award fa-3x text-primary mb-3"></i>
                <h3>Quality</h3>
                <p>We guarantee the freshness of our flowers and ensure each arrangement meets our high standards.</p>
            </div>
        </div>
    </div>

    <div class="row align-items-center my-5">
        <div class="col-md-6 order-md-2">
            <h2 class="mb-4">Our Expert Florists</h2>
            <p>Our team of experienced florists brings creativity and expertise to every arrangement. With years of experience and a deep passion for floristry, they create stunning designs that capture the perfect mood for any occasion.</p>
            <ul class="list-unstyled">
                <li><i class="fas fa-check text-success me-2"></i> Professional certification</li>
                <li><i class="fas fa-check text-success me-2"></i> Years of experience</li>
                <li><i class="fas fa-check text-success me-2"></i> Attention to detail</li>
                <li><i class="fas fa-check text-success me-2"></i> Creative design approach</li>
            </ul>
        </div>
        <div class="col-md-6 order-md-1">
            <img src="../assets/images/products/mixed.jpg" alt="Our Florists" class="img-fluid rounded shadow">
        </div>
    </div>

    <div class="text-center my-5">
        <h2 class="mb-4">Ready to Order?</h2>
        <p class="lead">Let us help you create the perfect floral arrangement for your special occasion.</p>
        <a href="../pages/products.php" class="btn btn-primary btn-lg">View Our Collection</a>
    </div>
</div>

<?php
include '../includes/footer.php';
?>