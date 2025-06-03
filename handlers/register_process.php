<?php
include '../config/db.php'; // DB connection

// Sanitize & get POST data
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Simple validations
$errors = [];

if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
    $errors[] = "All fields are required.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

if ($password !== $confirm_password) {
    $errors[] = "Passwords do not match.";
}

if (strlen($password) < 8) {
    $errors[] = "Password must be at least 8 characters.";
}

if (!isset($_POST['terms'])) {
    $errors[] = "You must accept the terms.";
}

if (!empty($errors)) {
    // Redirect back or show error
    echo "<h4>Registration Failed:</h4><ul>";
    foreach ($errors as $e) echo "<li>" . htmlspecialchars($e) . "</li>";
    echo "</ul>";
    exit;
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, phone, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstname, $lastname, $email, $phone, $hashed_password);

// Execute
if ($stmt->execute()) {
    header("Location: ../pages/login.php?register=success");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
