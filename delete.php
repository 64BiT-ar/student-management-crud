<?php
require_once 'config/database.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int)$_GET['id'];

$stmt = $pdo->prepare('SELECT id FROM students WHERE id = ?');
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('DELETE FROM students WHERE id = ?');
$stmt->execute([$id]);

header('Location: index.php?success=deleted');
exit;
?>
