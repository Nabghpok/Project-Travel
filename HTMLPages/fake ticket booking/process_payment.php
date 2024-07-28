<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract submitted data
    $fromCountry = $_POST['fromCountry'];
    $toCountry = $_POST['toCountry'];
    $ticketType = $_POST['ticketType'];
    $departureDate = $_POST['departureDate'];
    $price = $_POST['price'];

    // Here you can add code to process the payment, e.g., using a payment gateway API
    // After processing the payment, you might want to store the booking details in the database

    // For demonstration, we simply display the booking details
    echo '<h1>Payment Successful</h1>';
    echo '<p>Thank you for your booking!</p>';
    echo '<p>From Country: ' . htmlspecialchars($fromCountry) . '</p>';
    echo '<p>To Country: ' . htmlspecialchars($toCountry) . '</p>';
    echo '<p>Ticket Type: ' . htmlspecialchars($ticketType) . '</p>';
    echo '<p>Departure Date: ' . htmlspecialchars($departureDate) . '</p>';
    echo '<p>Price: $' . number_format($price, 2) . '</p>';
}
