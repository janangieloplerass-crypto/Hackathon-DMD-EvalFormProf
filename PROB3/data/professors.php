<?php
header('Content-Type: application/json');
require '../config.php';

$dept = $_GET['dept'] ?? '';
if (empty($dept)) {
    echo json_encode([]);
    exit;
}

$stmt = $pdo->prepare("SELECT id, name FROM professors WHERE dept = ?");
$stmt->execute([$dept]);
$profs = $stmt->fetchAll();

echo json_encode($profs);
?>
