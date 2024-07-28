<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_to'] = 'flight_booking_form.php';
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_flight'])) {
    $from_country = $_POST['from_country'];
    $to_country = $_POST['to_country'];
    $ticket_type = $_POST['ticket_type'];
    $departure_date = $_POST['departure_date'];
    $price = $_POST['price'];
    $card_type = $_POST['card_type'];
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];

    $stmt = $conn->prepare("INSERT INTO bookings (user_id, from_country, to_country, ticket_type, departure_date, price, card_type, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssdssss", $user_id, $from_country, $to_country, $ticket_type, $departure_date, $price, $card_type, $card_number, $expiry_date, $cvv);
    $stmt->execute();
    $stmt->close();

    header('Location: booking_confirmation.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Book Your Flight</title>
</head>

<body>
    <h2>Book Your Flight</h2>
    <form method="post">
        <select name="from_country" required>
            <option value="">From Country</option>
            <option value="Singapore">Singapore</option>
            <option value="Nepal">Nepal</option>
            <option value="Indonesia">Indonesia</option>
            <option value="UK">UK</option>
            <option value="Spain">Spain</option>
            <option value="Egypt">Egypt</option>
            <option value="Dubai">Dubai</option>
        </select>
        <select name="to_country" required>
            <option value="">To Country</option>
            <option value="Singapore">Singapore</option>
            <option value="Nepal">Nepal</option>
            <option value="Indonesia">Indonesia</option>
            <option value="UK">UK</option>
            <option value="Spain">Spain</option>
            <option value="Egypt">Egypt</option>
            <option value="Dubai">Dubai</option>
        </select>
        <select name="ticket_type" required>
            <option value="">Ticket Type</option>
            <option value="Economy">Economy</option>
            <option value="Premium Economy">Premium Economy</option>
            <option value="Business">Business</option>
        </select>
        <input type="date" name="departure_date" required>
        <input type="hidden" name="price" value="100"> <!-- Calculate price dynamically as needed -->
        <select name="card_type" required>
            <option value="">Card Type</option>
            <option value="Master Card">Master Card</option>
            <option value="Visa Card">Visa Card</option>
            <option value="Discovery Card">Discovery Card</option>
        </select>
        <input type="text" name="card_number" placeholder="Card Number" maxlength="16" required>
        <input type="text" name="expiry_date" placeholder="Expiry Date (MM/YY)" required>
        <input type="text" name="cvv" placeholder="CVV" maxlength="3" required>
        <button type="submit" name="book_flight">Book Now</button>
    </form>
</body>

</html>