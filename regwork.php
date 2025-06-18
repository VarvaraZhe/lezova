<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    
    $stmt = $db->prepare("SELECT users_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    if ($stmt->get_result()->num_rows > 0) {
        header("Location: reg.php?error=email");
        exit;
    }
    
    $stmt = $db->prepare("INSERT INTO users (name, email, phone, login, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $login, $password);
    
    if ($stmt->execute()) {
        $_SESSION['users_id'] = $stmt->insert_id;
        $_SESSION['email'] = $email;
        header("Location: auto.php");
    } else {
        die("Ошибка регистрации");
    }
}