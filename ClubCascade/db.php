<?php
$host = "localhost";
$user = "root";
$pass = ""; // default is empty in XAMPP
$db = "mywebsite_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
