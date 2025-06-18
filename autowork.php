<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $admin = "admin@admin.admin";

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if (!$user) {
        header("Location: auto.php?error=user");
        exit;
    }

    if (!$password) {
        header("Location: auto.php?error=password");
        exit;
    }

    $_SESSION['users_id'] = $user['users_id'];
    $_SESSION['email'] = $email;

    header("Location: " . ($email == $admin ? "admin.php" : "profile.php"));
    exit;
}