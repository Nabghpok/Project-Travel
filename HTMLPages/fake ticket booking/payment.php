<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fromCountry = $_POST['fromCountry'];
    $toCountry = $_POST['toCountry'];
    $ticketType = $_POST['ticketType'];
    $departureDate = $_POST['departureDate'];

    $basePrice = 100;
    $priceIncrements = array(
        'Economy' => 0,
        'Premium Economy' => 50,
        'Business' => 100
    );

    $price = $basePrice + $priceIncrements[$ticketType];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Payment Page</h1>
        <p>From Country: <?php echo htmlspecialchars($fromCountry); ?></p>
        <p>To Country: <?php echo htmlspecialchars($toCountry); ?></p>
        <p>Ticket Type: <?php echo htmlspecialchars($ticketType); ?></p>
        <p>Departure Date: <?php echo htmlspecialchars($departureDate); ?></p>
        <p>Price: $<?php echo number_format($price, 2); ?></p>
        <form action="process_payment.php" method="post">
            <input type="hidden" name="fromCountry" value="<?php echo htmlspecialchars($fromCountry); ?>">
            <input type="hidden" name="toCountry" value="<?php echo htmlspecialchars($toCountry); ?>">
            <input type="hidden" name="ticketType" value="<?php echo htmlspecialchars($ticketType); ?>">
            <input type="hidden" name="departureDate" value="<?php echo htmlspecialchars($departureDate); ?>">
            <input type="hidden" name="price" value="<?php echo number_format($price, 2); ?>">
            <button type="submit" class="btn">Proceed to Payment</button>
        </form>
    </div>
</body>

</html>