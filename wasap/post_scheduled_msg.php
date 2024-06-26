<?php
include "db.php";

if (isset($_POST['sendMsg']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username']; // Replace with actual user identifier if needed
    $messages = $_POST['textmessage'];
    $scheduleTime = $_POST['scheduleTime'];

    $sql = "INSERT INTO scheduled_messages (username, scheduled_msg, scheduled_time, status) VALUES (?, ?, ?, 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $messages, $scheduleTime);
    
    if ($stmt->execute()) {
       header('Location:chat_schedule.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
?>