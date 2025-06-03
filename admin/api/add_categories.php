<?php
session_start();
include '../../config/db.php'; // Adjust if needed
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = $_POST['status'];
    $showInMenu = isset($_POST['show_in_menu']) ? 1 : 0;
    $showInHome = isset($_POST['show_in_home']) ? 1 : 0;

    $imagePath = null;

    // Handle Image Upload
    $image_name = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../assets/images/categories/';
        $imageTmp = $_FILES['image']['tmp_name'];
        $original_name = basename($_FILES['image']['name']);
        $ext = pathinfo($original_name, PATHINFO_EXTENSION);

        // Unique filename
        $image_name = uniqid('prod_') . '.' . $ext;
        $destination = $uploadDir . $image_name;

        if (!move_uploaded_file($imageTmp, $destination)) {
            die("Image upload failed.");
        }
    }

    // Insert query
    $sql = "INSERT INTO categories (name, description, status, image, show_in_menu, show_in_home)
            VALUES ('$name', '$description', '$status', '$image_name', $showInMenu, $showInHome)";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = 'Category added successfully.';
        header('Location: ../categories.php');
        exit();
    } else {
        $_SESSION['error'] = 'Error adding category: ' . mysqli_error($conn);
        header('Location: ../add-categories.php');
        exit();
    }
} else {
    header('Location: ../add-categories.php');
    exit();
}
