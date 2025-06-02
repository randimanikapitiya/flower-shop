<?php
include '../includes/header.php';
include '../includes/nav.php';
?>

<div class="auth-wrapper">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h2 class="mb-0"><i class="fas fa-user-circle me-2"></i>Login</h2>
                    </div>
                    <div class="card-body p-5">
                        <form action="login_process.php" method="POST" class="needs-validation" novalidate>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback">Please enter your password.</div>
                            </div>
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                            </div>
                        </form>
                        <div class="text-center mt-4">
                            <p class="mb-2">Forgot your password? <a href="#" class="text-primary">Reset it here</a></p>
                            <p class="mb-0">Don't have an account? <a href="register.php" class="text-primary">Register now</a></p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <p class="text-muted">Or sign in with</p>
                    <div class="social-login">
                        <a href="#" class="btn btn-outline-dark me-2"><i class="fab fa-google me-2"></i>Google</a>
                        <a href="#" class="btn btn-outline-dark"><i class="fab fa-facebook-f me-2"></i>Facebook</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';
?>