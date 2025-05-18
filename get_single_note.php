<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "notesapp");

if (isset($_GET['note_id'])) {
    $note_id = $_GET['note_id'];

    $stmt = $conn->prepare("SELECT title, content FROM notes WHERE id = ?");
    $stmt->bind_param("i", $note_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($note = $result->fetch_assoc()) {
        echo json_encode($note);
    } else {
        echo json_encode(["error" => "Note not found"]);
    }
} else {
    echo json_encode(["error" => "Missing note_id"]);
}
?>
