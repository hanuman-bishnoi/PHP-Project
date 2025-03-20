<?php
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $task = $conn->query("SELECT * FROM tasks WHERE id=$id")->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $stmt = $conn->prepare("UPDATE tasks SET title=?, description=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $description, $id);
    $stmt->execute();
    
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Task</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $task['id'] ?>">
            <div class="mb-3">
                <input type="text" name="title" class="form-control" value="<?= $task['title'] ?>" required>
            </div>
            <div class="mb-3">
                <textarea name="description" class="form-control"><?= $task['description'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
</body>
</html>