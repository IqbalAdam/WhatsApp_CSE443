<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $message = $_POST['message'];

    // Fetch offensive words
    $result = $conn->query("SELECT word FROM offensive_words");
    $offensive_words = array();
    while ($row = $result->fetch_assoc()) {
        $offensive_words[] = $row['word'];
    }

    // Censor offensive words
    foreach ($offensive_words as $word) {
        $message = str_ireplace($word, '****', $message);
    }

    // Insert message into database
    $stmt = $conn->prepare("INSERT INTO messages (username, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $message);
    $stmt->execute();

    echo "Message posted!";
}
?>
