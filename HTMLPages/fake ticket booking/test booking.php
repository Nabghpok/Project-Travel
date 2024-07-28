<?php
// Start the session to pass data between pages
session_start();
$basePrice = 100;
$priceIncrements = array(
    'Economy' => 0,
    'Premium Economy' => 50,
    'Business' => 100
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Flight</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const ticketPrices = {
                'Economy': 100,
                'Premium Economy': 150,
                'Business': 200
            };

            const fromCountry = document.getElementById('fromCountry');
            const toCountry = document.getElementById('toCountry');
            const ticketType = document.getElementById('ticketType');
            const departureDate = document.getElementById('departureDate');
            const priceDisplay = document.getElementById('price');
            const bookNowBtn = document.getElementById('bookNowBtn');

            function updatePrice() {
                const type = ticketType.value;
                const price = ticketPrices[type] || 0;
                priceDisplay.textContent = `Price: $${price.toFixed(2)}`;
                bookNowBtn.disabled = !fromCountry.value || !toCountry.value || !type || !departureDate.value;
            }

            ticketType.addEventListener('change', updatePrice);
            fromCountry.addEventListener('change', updatePrice);
            toCountry.addEventListener('change', updatePrice);
            departureDate.addEventListener('change', updatePrice);
        });
    </script>
</head>

<body>
    <div class="container">
        <h1>Book Your Flight</h1>
        <form action="payment.php" method="post">
            <div class="form-group">
                <label for="fromCountry">From Country</label>
                <select name="fromCountry" id="fromCountry" required>
                    <option value="">Select Country</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="UK">UK</option>
                    <option value="Spain">Spain</option>
                    <option value="Egypt">Egypt</option>
                    <option value="Dubai">Dubai</option>
                </select>
            </div>
            <div class="form-group">
                <label for="toCountry">To Country</label>
                <select name="toCountry" id="toCountry" required>
                    <option value="">Select Country</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="UK">UK</option>
                    <option value="Spain">Spain</option>
                    <option value="Egypt">Egypt</option>
                    <option value="Dubai">Dubai</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ticketType">Ticket Type</label>
                <select name="ticketType" id="ticketType" required>
                    <option value="">Select Ticket Type</option>
                    <option value="Economy">Economy</option>
                    <option value="Premium Economy">Premium Economy</option>
                    <option value="Business">Business</option>
                </select>
            </div>
            <div class="form-group">
                <label for="departureDate">Departure Date</label>
                <input type="date" name="departureDate" id="departureDate" required>
            </div>
            <div class="form-group">
                <div id="price" class="price">Price: $0.00</div>
            </div>
            <button type="submit" class="btn" id="bookNowBtn" disabled>Book Now</button>
        </form>
    </div>
</body>

</html>