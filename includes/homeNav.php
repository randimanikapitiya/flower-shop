<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="home.php">BloomingBeauty</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/register.php">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
