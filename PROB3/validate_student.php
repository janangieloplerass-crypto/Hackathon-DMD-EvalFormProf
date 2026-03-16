<?php
header('Content-Type: application/json');
require 'config.php';

$student_id = $_GET['id'] ?? '';
if (!preg_match('/^\d{4}-\d{2}-\d{5}$/', $student_id)) {
    echo json_encode(['exists' => false]);
    exit;
}

$stmt = $pdo->prepare("SELECT year, dept FROM students WHERE student_id = ?");
$stmt->execute([$student_id]);
$student = $stmt->fetch();

echo json_encode(['exists' => (bool)$student, 'year' => $student['year'] ?? '', 'dept' => $student['dept'] ?? '']);
?>

