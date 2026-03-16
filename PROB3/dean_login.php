<?php
session_start();

$valid_accounts = [
    'd001' => 'dean123'
];

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $account_name = trim($_POST['account_name'] ?? '');
    $code = trim($_POST['code'] ?? '');
    
    if (isset($valid_accounts[$account_name]) && $valid_accounts[$account_name] === $code) {
        // Login successful
        $_SESSION['dean_account'] = $account_name;
        $_SESSION['dean_logged_in'] = true;
        header('Location: dean.html');
        exit;
    } else {
        // Login failed
        header('Location: dean_account.html?error=1');
        exit;
    }
} else {
    // Not POST request, redirect to login page
    header('Location: dean_account.html');
    exit;
}
?>

