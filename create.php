<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Add New Student</h1>
            <a href="index.php" class="back-link">← Back to List</a>
        </header>

        <div class="form-container">
            <form action="store.php" method="POST" class="form">
                <div class="form-group">
                    <label for="full_name">Full Name *</label>
                    <input type="text" id="full_name" name="full_name" required maxlength="100">
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required maxlength="100">
                </div>

                <div class="form-group">
                    <label for="phone">Phone *</label>
                    <input type="tel" id="phone" name="phone" required maxlength="15" placeholder="555-0000">
                </div>

                <div class="form-group">
                    <label for="course">Course *</label>
                    <input type="text" id="course" name="course" required maxlength="100" placeholder="e.g. Computer Science">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Add Student</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>