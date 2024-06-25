<?php
// Define server and database connection parameters
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "chat_app";      

// Create a new connection to the MySQL database using the defined parameters
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    // If there is a connection error, output the error and stop the script
    die("Connection failed: " . $conn->connect_error);
}
?>
