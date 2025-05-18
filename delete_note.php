<?php
$conn = new mysqli("localhost", "root", "", "notesapp");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note_id = $_POST['note_id'];

    $stmt = $conn->prepare("DELETE FROM notes WHERE id = ?");
    $stmt->bind_param("i", $note_id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "failed";
    }
} else {
    echo "invalid";
}
?>
