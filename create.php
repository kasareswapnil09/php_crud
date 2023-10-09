<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];

    $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <h2>Create Task</h2>
    <form method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br><br>
        <label for="description">Description:</label>
        <textarea name="description" rows="4" required></textarea><br><br>
        <button type="submit">Create Task</button>
    </form>
</body>
</html>
