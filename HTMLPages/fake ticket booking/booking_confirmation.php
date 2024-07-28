<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM bookings WHERE user_id = ? ORDER BY booking_date DESC LIMIT 1");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$booking = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking Confirmed</title>
</head>

<body>
    <h2>Booking Confirmed</h2>
    <?php if ($booking) : ?>
        <p>Your flight is booked for <?= htmlspecialchars($booking['departure_date']) ?>.</p>
        <p>From: <?= htmlspecialchars($booking['from_country']) ?></p>
        <p>To: <?= htmlspecialchars($booking['to_country']) ?></p>
        <p>Ticket Type: <?= htmlspecialchars($booking['ticket_type']) ?></p>
        <p>Price: $<?= htmlspecialchars($booking['price']) ?></p>
    <?php else : ?>
        <p>No booking found.</p>
    <?php endif; ?>
</body>

</html>