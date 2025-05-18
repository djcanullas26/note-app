<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notesapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_POST['user_id'];
$title = $_POST['title'];
$content = $_POST['content'];

$sql = "INSERT INTO notes (user_id, title, content) VALUES ('$user_id', '$title', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
?>
