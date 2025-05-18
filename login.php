<?php
require "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT id, password FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        echo $row['id']; // send back user ID
    } else {
        echo "invalid";
    }
} else {
    echo "not_found";
}
?>
