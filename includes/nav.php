

<!-- filepath: flower-shop/includes/nav.php -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: var(--secondary);">
    <div class="container">
        <a class="navbar-brand" href="/flower-shop/index.php">
            <i class="fas fa-seedling me-2" style="color: var(--primary);"></i> Flower Shop
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../pages/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/categories.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/contact.php">Contact Us</a>
                </li>
            </ul>
            <div class="d-flex">
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <span class="navbar-text me-3">
                        Hello, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?>
                    </span>
                    <a href="../handlers/logout.php" class="btn btn-primary">Logout</a>
<?php else: ?>
    <a class="btn btn-outline-primary me-2" href="/flower-shop/pages/login.php">Login</a>
                <a class="btn btn-primary" href="/flower-shop/pages/register.php">Register</a>
<?php endif; ?>
            </div>
        </div>
    </div>
</nav>