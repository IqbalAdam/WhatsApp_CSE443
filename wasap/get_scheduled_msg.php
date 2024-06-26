<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
include "db.php";

while(true) {
    // Get the current time
    $now = date("Y-m-d H:i:s");

    // Retrieve scheduled messages that are due
    $sql = "SELECT id, username, scheduled_msg, scheduled_time FROM scheduled_messages WHERE status = 'pending'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $now);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        if ($row['scheduled_time'] == $now) {
            // Here you would send the message (e.g., by inserting it into the chat table)
            $sendMessageSql = "INSERT INTO messages (username, message, timestamp) VALUES (?, ?, ?)";
            $sendMessageStmt = $conn->prepare($sendMessageSql);
            $sendMessageStmt->bind_param("sss", $row['username'], $row['scheduled_msg'], $now);
            $sendMessageStmt->execute();

            // Update the status of the scheduled message to 'sent'
            $updateSql = "UPDATE scheduled_messages SET status = 'sent' WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("i", $row['id']);
            $updateStmt->execute();
        }
    }

    // Close statements
    $stmt->close();
    $sendMessageStmt->close();
    $updateStmt->close();

    // Sleep for 60 seconds before checking again
    sleep(60);
}

?>