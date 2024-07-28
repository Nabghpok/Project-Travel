<!-- index.html -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking System</title>
    <link rel="stylesheet" href="./singaporehotel.css">
</head>

<body>
    <header>
        <h1>Hotel Booking System</h1>
    </header>
    <main>
        <section class="search-form">
            <h2>Search for a Room</h2>
            <form>
                <label for="checkin">Check-in:</label>
                <input type="date" id="checkin" name="checkin">
                <label for="checkout">Check-out:</label>
                <input type="date" id="checkout" name="checkout">
                <label for="room-type">Room Type:</label>
                <select id="room-type" name="room-type">
                    <option value="normal">Normal Room</option>
                    <option value="ac">AC Room</option>
                    <option value="deluxe">Deluxe Room</option>
                </select>
                <button type="submit">Search</button>
            </form>
        </section>
        <section class="room-list">
            <h2>Available Rooms</h2>
            <ul id="room-list">
                <li class="normal-room">
                    <h3>Normal Room</h3>
                    <img src="./readmoresingaporeimage/singaporehotel21.jpeg">
                    <p>Single bed, non-AC</p>
                    <p>Price: ₹60 per night</p>
                    <button class="book-now">Book Now</button>
                </li>
                <li class="ac-room">
                    <h3>AC Room</h3>
                    <img src="./readmoresingaporeimage/singaporehotel22.jpeg">
                    <p>Double bed, AC</p>
                    <p>Price: ₹100 per night</p>
                    <button class="book-now">Book Now</button>
                </li>
                <li class="deluxe-room">
                    <h3>Deluxe Room</h3>
                    <img src="./readmoresingaporeimage/singaporehotel23.jpeg">
                    <p>King-size bed, AC, luxury amenities</p>
                    <p>Price: ₹140 per night</p>
                    <button class="book-now">Book Now</button>
                </li>
            </ul>
        </section>
        <section class="booking-form">
            <h2>Book a Room</h2>
            <form>
                <label for="room-number">Room Number:</label>
                <input type="text" id="room-number" name="room-number" readonly>
                <label for="guest-name">Guest Name:</label>
                <input type="text" id="guest-name" name="guest-name">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone">
                <button type="submit">Book Now</button>
            </form>
        </section>
    </main>
    <script src="script.js"></script>
    <?php include '../HTMLPages/global footer/footer.php'; ?>
</body>

</html>