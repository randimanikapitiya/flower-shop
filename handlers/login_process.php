<?php
session_start();
include '../config/db.php'; // DB connection

// Get user input
$email = trim($_POST['email']);
$password = $_POST['password'];

// Validate
if (empty($email) || empty($password)) {
    echo "Email and password are required.";
    exit;
}

// Fetch user from database
$stmt = $conn->prepare("SELECT id, firstname, role, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $user['password'])) {
        // Store user data in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['firstname'];
        $_SESSION['user_role'] = $user['role'];

        // Redirect based on role
        if ($user['role'] === 'admin') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../pages/home.php");
        }
        exit;
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found with this email.";
}

$stmt->close();
$conn->close();
?>
