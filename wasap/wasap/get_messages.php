<?php
// Include the database connection file
include 'db.php';

// Execute a query to select username, message, and timestamp from the messages table, ordered by timestamp in descending order
$result = $conn->query("SELECT username, message, timestamp FROM messages ORDER BY timestamp DESC");

// Initialize an empty array to hold the messages
$messages = array();

// Fetch each row from the result set and add it to the messages array
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

// Encode the messages array as JSON and output it
echo json_encode($messages);
?>
