<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM bookings WHERE user_id = ? ORDER BY booking_date DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$bookings = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Booking History</title>
</head>

<body>
    <h2>Booking History</h2>
    <?php if ($bookings) : ?>
        <ul>
            <?php foreach ($bookings as $booking) : ?>
                <li>
                    From: <?= htmlspecialchars($booking['from_country']) ?>,
                    To: <?= htmlspecialchars($booking['to_country']) ?>,
                    Ticket Type: <?= htmlspecialchars($booking['ticket_type']) ?>,
                    Departure Date: <?= htmlspecialchars($booking['departure_date']) ?>,
                    Price: $<?= htmlspecialchars($booking['price']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No bookings found.</p>
    <?php endif; ?>
</body>

</html>