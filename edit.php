<?php
require 'db.php';

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];

    $sql = "UPDATE tasks SET title='$title', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    }
}

$sql = "SELECT * FROM tasks WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h2>Edit Task</h2>
    <form method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br><br>
        <label for="description">Description:</label>
        <textarea name="description" rows="4" required><?php echo $row['description']; ?></textarea><br><br>
        <button type="submit">Update Task</button>
    </form>
</body>
</html>
