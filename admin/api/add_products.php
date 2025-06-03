<?php
session_start();
include '../../config/db.php';

// Check if user is admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $category_id = intval($_POST['category']);
    $description = trim($_POST['description']);
    $sale_price = floatval($_POST['sale_price']);
    $stock = intval($_POST['stock']);
    $status = $_POST['status'];

    // File upload
    $image_name = null;
    if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../../assets/images/products/';
        $tmp_name = $_FILES['main_image']['tmp_name'];
        $original_name = basename($_FILES['main_image']['name']);
        $ext = pathinfo($original_name, PATHINFO_EXTENSION);

        // Unique filename
        $image_name = uniqid('prod_') . '.' . $ext;
        $destination = $upload_dir . $image_name;

        if (!move_uploaded_file($tmp_name, $destination)) {
            die("Image upload failed.");
        }
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO products (name, category_id, description, sale_price, stock, main_image, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisdiss", $name, $category_id, $description, $sale_price, $stock, $image_name, $status);

    if ($stmt->execute()) {
        header("Location: ../products.php?success=1");
        exit();
    } else {
        echo "Database insert failed: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}
?>
