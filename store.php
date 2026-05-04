<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: create.php');
    exit;
}

$full_name = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$course = trim($_POST['course'] ?? '');

if (
    empty($full_name) ||
    empty($email) ||
    empty($phone) ||
    empty($course)
) {
    header('Location: create.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: create.php');
    exit;
}

try {
    $stmt = $pdo->prepare(
        "INSERT INTO students (full_name, email, phone, course) VALUES (?, ?, ?, ?)"
    );

    $stmt->execute([$full_name, $email, $phone, $course]);

    header('Location: index.php?success=created');
    exit;

} catch (PDOException $e) {
    die("Error adding student: " . $e->getMessage());
}
?>