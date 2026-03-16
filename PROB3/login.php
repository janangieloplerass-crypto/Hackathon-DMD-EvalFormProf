<?php
session_start();

$valid_username = 'admin';
$valid_password = '123';

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    if ($username === $valid_username && $password === $valid_password) {
        // Login successful
        $_SESSION['program_head_logged_in'] = true;
        header('Location: program_head.html');
        exit;
    } else {
        // Login failed
        header('Location: login.html?error=1');
        exit;
    }
} else {
    // Not POST request, redirect to login
    header('Location: login.html');
    exit;
}
?>

