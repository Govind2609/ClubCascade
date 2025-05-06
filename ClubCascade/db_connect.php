<?php
// Database connection details
$servername = "localhost"; // or "127.0.0.1"
$username = "root"; // your MySQL username (default is "root")
$password = ""; // your MySQL password (empty if not set)
$database = "campusbuzz"; // the name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    // If connection fails, display error
    die("Connection failed: " . $conn->connect_error);
} else {
    // If connection is successful, display success message
    echo "Connected successfully!";
}

// Close the connection
$conn->close();
?>
