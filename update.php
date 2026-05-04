<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = (int) ($_POST['id'] ?? 0);
$full_name = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$course = trim($_POST['course'] ?? '');

if ($id <= 0) {
    header('Location: index.php');
    exit;
}

if (
    empty($full_name) ||
    empty($email) ||
    empty($phone) ||
    empty($course)
) {
    header('Location: edit.php?id=' . $id);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: edit.php?id=' . $id);
    exit;
}

try {
    $stmt = $pdo->prepare(
        'UPDATE students SET full_name = ?, email = ?, phone = ?, course = ? WHERE id = ?'
    );

    $stmt->execute([$full_name, $email, $phone, $course, $id]);

    header('Location: index.php?success=updated');
    exit;

} catch (PDOException $e) {
    die('Error updating student: ' . $e->getMessage());
}
?>