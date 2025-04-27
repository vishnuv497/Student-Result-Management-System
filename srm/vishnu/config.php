<?php
// Database configuration
$servername = "localhost";     // Change if using a remote server
$username = "vishnu367";            // Your MySQL username
$password = "vishnu763";                // Your MySQL password
$dbname = "vvr"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully to the database!";
}

// Close the connection
$conn->close();
?>
