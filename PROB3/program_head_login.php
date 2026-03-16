<?php
session_start();

$valid_accounts = [
    'ph001' => 'code123',
    'ph002' => 'secure456'
];

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $account_name = trim($_POST['account_name'] ?? '');
    $code = trim($_POST['code'] ?? '');
    
    if (isset($valid_accounts[$account_name]) && $valid_accounts[$account_name] === $code) {
        // Login successful
        $_SESSION['program_head_account'] = $account_name;
        $_SESSION['program_head_logged_in'] = true;
        header('Location: program_head.html');
        exit;
    } else {
        // Login failed
        header('Location: program_head_account.html?error=1');
        exit;
    }
} else {
    // Not POST request, redirect to account page
    header('Location: program_head_account.html');
    exit;
}
?>

