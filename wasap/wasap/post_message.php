<?php
// Include the database connection file
include 'db.php'; 

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    // Get the username from the POST request
    $username = $_POST['username']; 
    // Get the message from the POST request
    $message = $_POST['message']; 

    // Fetch offensive words from the database
    $result = $conn->query("SELECT word FROM offensive_words");
    $offensive_words = array();
    while ($row = $result->fetch_assoc()) {
        // Add each offensive word to the array
        $offensive_words[] = $row['word']; 
    }

    // Censor offensive words in the message
    foreach ($offensive_words as $word) {
        // Replace offensive words with '****'
        $message = str_ireplace($word, '****', $message);
    }

    // Insert the sanitized message into the database
    $stmt = $conn->prepare("INSERT INTO messages (username, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $message);
    $stmt->execute(); 

    // Output a confirmation message
    echo "Message posted!"; 
}
?>
