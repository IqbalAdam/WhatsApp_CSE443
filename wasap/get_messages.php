<?php
include 'db.php';

$result = $conn->query("SELECT username, message, timestamp FROM messages ORDER BY timestamp DESC");

$messages = array();
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode($messages);
?>
