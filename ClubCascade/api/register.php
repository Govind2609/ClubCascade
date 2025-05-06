<?php
header('Content-Type: application/json');
include("../db.php"); // Assumes db.php is one level up from /api

$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$password = $_POST['password'] ?? '';

if (!$email || !$phone || !$password) {
    echo json_encode(["success" => false, "message" => "All fields are required."]);
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (email, phone, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $phone, $hashedPassword);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Signup successful!"]);
} else {
    echo json_encode(["success" => false, "message" => "Signup failed: " . $conn->error]);
}

$conn->close();
?>
