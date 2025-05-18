<?php
header('Content-Type: application/json');
include "db.php";

if (!isset($_GET['user_id']) || empty($_GET['user_id'])) {
    echo json_encode(["error" => "Missing user_id"]);
    exit();
}

$user_id = intval($_GET['user_id']);

$sql = "SELECT id, title, content FROM notes WHERE user_id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(["error" => "Prepare failed: " . $conn->error]);
    exit();
}

$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$notes = [];

while ($row = $result->fetch_assoc()) {
    $notes[] = $row;
}

echo json_encode($notes);

$stmt->close();
$conn->close();
?>
