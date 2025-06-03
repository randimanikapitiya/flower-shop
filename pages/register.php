<?php
include '../includes/header.php';
include '../includes/nav.php';
?>

<?php
include '../config/db.php';
?>

<div class="auth-wrapper">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h2 class="mb-0"><i class="fas fa-user-plus me-2"></i>Create Account</h2>
                    </div>
                    <div class="card-body p-5">
                        <form action="../handlers/register_process.php" method="POST" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                                    </div>
                                    <div class="invalid-feedback">Please enter your first name.</div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                                    </div>
                                    <div class="invalid-feedback">Please enter your last name.</div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>

                            <div class="mb-4">
                                <label for="phone" class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="invalid-feedback">Please enter your phone number.</div>
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
                                <div class="invalid-feedback">Password must be at least 8 characters long.</div>
                            </div>

                            <div class="mb-4">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                </div>
                                <div class="invalid-feedback">Passwords do not match.</div>
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
                                </label>
                                <div class="invalid-feedback">You must agree to our terms and conditions.</div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Create Account</button>
                            </div>
                        </form>
                        <div class="text-center mt-4">
                            <p class="mb-0">Already have an account? <a href="login.php" class="text-primary">Sign in here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';
?>