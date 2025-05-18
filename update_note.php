<?php
$conn = new mysqli("localhost", "root", "", "notesapp");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note_id = $_POST['note_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $content, $note_id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "failed";
    }
} else {
    echo "invalid";
}
?>
