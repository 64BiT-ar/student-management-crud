<?php
require_once 'config/database.php';

$students = $pdo->query('SELECT * FROM students ORDER BY created_at DESC')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Student Management System</h1>
            <p>Add, edit, and manage student records</p>
        </header>

        <div class="content">
            <div class="action-bar">
                <a href="create.php" class="btn btn-primary">+ Add Student</a>
            </div>

            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    <?php 
                    if ($_GET['success'] == 'created') echo 'Student added successfully.';
                    elseif ($_GET['success'] == 'updated') echo 'Student updated successfully.';
                    elseif ($_GET['success'] == 'deleted') echo 'Student deleted successfully.';
                    ?>
                </div>
            <?php endif; ?>

            <?php if (empty($students)): ?>
                <div class="alert alert-info">No students found. <a href="create.php">Add a student</a></div>
            <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Course</th>
                            <th>Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($student['id']); ?></td>
                                <td><?php echo htmlspecialchars($student['full_name']); ?></td>
                                <td><?php echo htmlspecialchars($student['email']); ?></td>
                                <td><?php echo htmlspecialchars($student['phone']); ?></td>
                                <td><?php echo htmlspecialchars($student['course']); ?></td>
                                <td><?php echo date('M d, Y', strtotime($student['created_at'])); ?></td>
                                <td class="actions">
                                    <a href="edit.php?id=<?php echo $student['id']; ?>" class="btn btn-edit">Edit</a>
                                    <a href="delete.php?id=<?php echo $student['id']; ?>" class="btn btn-delete" onclick="return confirm('Delete this student?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>