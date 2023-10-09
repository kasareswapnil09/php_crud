<?php
require 'db.php';

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM tasks WHERE id=$id";
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
    <title>Delete Task</title>
</head>
<body>
    <h2>Confirm Deletion</h2>
    <p>Are you sure you want to delete the following task?</p>
    <strong>Title:</strong> <?php echo $row['title']; ?><br>
    <strong>Description:</strong> <?php echo $row['description']; ?><br><br>
    <form method="POST">
        <button type="submit">Delete Task</button>
    </form>
</body>
</html>
