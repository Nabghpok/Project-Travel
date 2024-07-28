<?php
session_start();
include 'db.php'; // Include database connection

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    die("User is not logged in.");
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM bookings WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$bookings = array();
while ($row = $result->fetch_assoc()) {
    $bookings[] = $row;
}

$stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($bookings);
