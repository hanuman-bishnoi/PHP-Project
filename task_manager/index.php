<?php include('config/db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Task Manager</h1>
        
        <!-- Create Task Form -->
        <form method="POST" action="tasks/create.php" class="mb-4">
            <div class="mb-3">
                <input type="text" name="title" class="form-control" placeholder="Task title" required>
            </div>
            <div class="mb-3">
                <textarea name="description" class="form-control" placeholder="Task description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Task</button>
        </form>

        <!-- Task List -->
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['title']}</td>
                            <td>{$row['description']}</td>
                            <td>{$row['created_at']}</td>
                            <td>
                                <a href='tasks/update.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                                <a href='tasks/delete.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>