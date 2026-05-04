<?php
require_once 'config/database.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Edit Student</h1>
            <a href="index.php" class="back-link">← Back to List</a>
        </header>

        <div class="form-container">
            <form action="update.php" method="POST" class="form">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($student['id']); ?>">

                <div class="form-group">
                    <label for="full_name">Full Name *</label>
                    <input type="text" id="full_name" name="full_name" required maxlength="100" value="<?php echo htmlspecialchars($student['full_name']); ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required maxlength="100" value="<?php echo htmlspecialchars($student['email']); ?>">
                </div>

                <div class="form-group">
                    <label for="phone">Phone *</label>
                    <input type="tel" id="phone" name="phone" required maxlength="15" value="<?php echo htmlspecialchars($student['phone']); ?>">
                </div>

                <div class="form-group">
                    <label for="course">Course *</label>
                    <input type="text" id="course" name="course" required maxlength="100" value="<?php echo htmlspecialchars($student['course']); ?>">
                </div>

                <div class="form-group">
                    <label>Joined Date</label>
                    <input type="text" disabled value="<?php echo date('F d, Y h:i A', strtotime($student['created_at'])); ?>" class="disabled-input">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update Student</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>