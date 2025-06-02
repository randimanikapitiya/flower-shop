<?php
include '../includes/header.php';
include '../includes/nav.php';
?>

<div class="contact-banner" style="background: linear-gradient(rgba(172, 23, 84, 0.7), rgba(229, 56, 136, 0.7)), url('../assets/images/banner/parallax-banner.jpg') center/cover; padding: 60px 0; margin-bottom: 40px;">
    <div class="container">
        <h1 class="text-center text-white mb-4">Contact Us</h1>
        <p class="text-center text-white lead">We'd Love to Hear from You</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-7 mb-4">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="card-title mb-4" style="color: var(--primary);">Send us a Message</h3>
                    <form action="contact.php" method="post" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="">Select a subject</option>
                                <option value="order">Order Inquiry</option>
                                <option value="wedding">Wedding Flowers</option>
                                <option value="custom">Custom Arrangement</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100" style="background: var(--primary);">
                            <i class="fas fa-paper-plane me-2"></i>Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card shadow-sm mb-4">
                <div class="card-body p-4">
                    <h3 class="card-title mb-4" style="color: var(--primary);">Contact Information</h3>
                    <div class="d-flex mb-3">
                        <i class="fas fa-map-marker-alt text-primary me-3 mt-1" style="color: var(--primary) !important;"></i>
                        <div>
                            <h5 class="mb-1">Visit Our Store</h5>
                            <p class="mb-0">123 Flower Street<br>Garden City, GC 12345</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-phone text-primary me-3 mt-1" style="color: var(--primary) !important;"></i>
                        <div>
                            <h5 class="mb-1">Phone</h5>
                            <p class="mb-0"><a href="tel:+1234567890" class="text-decoration-none">+1 (234) 567-890</a></p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-envelope text-primary me-3 mt-1" style="color: var(--primary) !important;"></i>
                        <div>
                            <h5 class="mb-1">Email</h5>
                            <p class="mb-0"><a href="mailto:info@flowershop.com" class="text-decoration-none">info@flowershop.com</a></p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fas fa-clock text-primary me-3 mt-1" style="color: var(--primary) !important;"></i>
                        <div>
                            <h5 class="mb-1">Business Hours</h5>
                            <p class="mb-0">Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="card-title mb-4" style="color: var(--primary);">Quick Links</h3>
                    <div class="d-grid gap-2">
                        <a href="register.php" class="btn btn-outline-primary" style="color: var(--primary); border-color: var(--primary);">
                            <i class="fas fa-user-plus me-2"></i>Create an Account
                        </a>
                        <a href="products.php" class="btn btn-outline-primary" style="color: var(--primary); border-color: var(--primary);">
                            <i class="fas fa-shopping-cart me-2"></i>View Our Products
                        </a>
                        <a href="#" class="btn btn-outline-primary" style="color: var(--primary); border-color: var(--primary);">
                            <i class="fas fa-heart me-2"></i>Special Offers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/contact.js"></script>

<?php
include '../includes/footer.php';
?>