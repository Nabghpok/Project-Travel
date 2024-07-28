<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $fromCountry = $_POST['fromCountry'];
    $toCountry = $_POST['toCountry'];
    $ticketType = $_POST['ticketType'];
    $departureDate = $_POST['departureDate'];
    $price = $_POST['price'];
    $cardType = $_POST['cardType'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];

    $sql = "INSERT INTO bookings (user_id, from_country, to_country, ticket_type, departure_date, price, card_type, card_number, expiry_date, cvv)
            VALUES ('$user_id', '$fromCountry', '$toCountry', '$ticketType', '$departureDate', '$price', '$cardType', '$cardNumber', '$expiryDate', '$cvv')";

    if ($conn->query($sql) === TRUE) {
        echo "New booking saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
