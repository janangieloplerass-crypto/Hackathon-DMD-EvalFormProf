<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

$student_id = trim($_POST['student_id'] ?? '');
$year = trim($_POST['year'] ?? '');
$department = trim($_POST['department'] ?? '');
$professor = trim($_POST['professor'] ?? '');
$metric1 = (int)($_POST['metric1'] ?? 0);
$metric2 = (int)($_POST['metric2'] ?? 0);
$metric3 = (int)($_POST['metric3'] ?? 0);
$rater_type = trim($_POST['rater_type'] ?? '');

// Validate
$metrics_valid = $metric1 >= 1 && $metric1 <= 5 && $metric2 >= 1 && $metric2 <= 5 && $metric3 >= 1 && $metric3 <= 5;
$general_valid = $metrics_valid && !empty($department) && !empty($professor) && !empty($rater_type);

if (!$general_valid || ($rater_type === 'student' && (!preg_match('/^\\d{4}-\\d{2}-\\d{5}$/', $student_id) || empty($student_id)))) {
    die('Invalid input!');
}

// Session check for dean/program head
if (in_array($rater_type, ['dean', 'program_head']) && (!isset($_SESSION['dean_logged_in']) || $_SESSION['dean_logged_in'] !== true)) {
    header('Location: index.html');
    exit;
}

// Insert evaluation
$stmt = $pdo->prepare("INSERT INTO evaluations (student_id, year, dept, professor, metric1, metric2, metric3, rater_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$student_id ?: null, $year ?: null, $department, $professor, $metric1, $metric2, $metric3, $rater_type]);

echo '<!DOCTYPE html>
<html>
<head><title>Success</title></head>
<body>
<h1>Evaluation Submitted Successfully!</h1>
<p>Rater Type: ' . htmlspecialchars($rater_type) . ', Student ID: ' . ($student_id ? htmlspecialchars($student_id) : 'N/A') . '</p>
<a href="index.html">Back to Home</a>
</body>
</html>';
?>

