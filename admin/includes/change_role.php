<?php

session_start();
include '../../config/db.php';
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../pages/login.php');
    exit();
}

// Prevent user from changing their own role
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? null;
    $new_role = $_POST['role'] ?? null;

    // Ensure valid input
    if ($user_id && in_array($new_role, ['admin', 'user'])) {
        // Prevent changing your own role
        if ($_SESSION['user_id'] == $user_id) {
            header("Location: ../admin/users.php?error=cannot-change-own-role");
            exit();
        }

        $stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
        $stmt->bind_param("si", $new_role, $user_id);

        if ($stmt->execute()) {
            header("Location: ../users.php?success=role-updated");
        } else {
            header("Location: ../admin/users.php?error=update-failed");
        }

        $stmt->close();
    } else {
        header("Location: ../admin/users.php?error=invalid-input");
    }
} else {
    header("Location: ../admin/users.php");
}
exit();
