<?php
session_start();
include '../config/db.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    die('User not logged in.');
}

$user_id = $_SESSION['user_id'];

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form inputs
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $delivery_date = $_POST['delivery_date'];
    $message = trim($_POST['message']);

    // Basic validation
    if (empty($product_id) || empty($name) || empty($email) || empty($phone) || empty($delivery_date)) {
        die('All required fields must be filled.');
    }

    // Prepare and execute insert query
    $sql = "INSERT INTO orders (product_id, user_id, name, email, phone, delivery_date, message)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("iisssss", $product_id, $user_id, $name, $email, $phone, $delivery_date, $message);

    if ($stmt->execute()) {
        header("Location: ../pages/myOrders.php");
        exit();
    } else {
        die("Order insertion failed: " . $stmt->error);
    }
}
?>
