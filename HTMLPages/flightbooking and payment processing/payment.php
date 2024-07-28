<?php
session_start();
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user is logged in
    if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
        die("User is not logged in. Please log in and try again.");
    }

    $fromCountry = $_POST['fromCountry'];
    $toCountry = $_POST['toCountry'];
    $ticketType = $_POST['ticketType'];
    $departureDate = $_POST['departureDate'];
    $price = $_POST['price'];
    $cardType = $_POST['cardType'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];
    $user_id = $_SESSION['user_id']; // Get the user ID from session

    // Validate card number
    $isValidCard = false;
    if ($cardType == 'masterCard' && preg_match("/^5[0-9]{15}$/", $cardNumber)) {
        $isValidCard = true;
    } elseif ($cardType == 'visa' && preg_match("/^4[0-9]{15}$/", $cardNumber)) {
        $isValidCard = true;
    } elseif ($cardType == 'discover' && preg_match("/^6[0-9]{15}$/", $cardNumber)) {
        $isValidCard = true;
    }

    // Validate expiry date
    $currentDate = new DateTime();
    $expiryDateObj = DateTime::createFromFormat('m/y', $expiryDate);
    if ($expiryDateObj > $currentDate && $isValidCard) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO bookings (user_id, from_country, to_country, ticket_type, departure_date, price, card_type, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssissss", $user_id, $fromCountry, $toCountry, $ticketType, $departureDate, $price, $cardType, $cardNumber, $expiryDate, $cvv);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Your flight is booked for the selected date.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid card details. Please check and try again.";
    }

    $conn->close();
}
