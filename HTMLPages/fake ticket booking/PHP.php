<?php
// Create a connection to the database
 $servername="localhost";
 $username="user";
 $password="";
 $dbname="detail";
$conn = mysqli_connect("localhost", "username", "password", "dbname");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_country = $_POST["from-country"];
    $to_country = $_POST["to-country"];
    $departure_date = $_POST["departure-date"];
    $return_date = $_POST["return-date"];
    $ticket_type = $_POST["ticket-type"];

    $sql = "INSERT INTO flights (from_country, to_country, departure_date, return_date, ticket_type) VALUES ('$from_country', '$to_country', '$departure_date', '$return_date', '$ticket_type')";
    mysqli_query($conn, $sql);
}

// Display data from the database
$sql = "SELECT * FROM flights";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "From Country: " . $row["from_country"] . "<br>";
        echo "To Country: " . $row["to_country"] . "<br>";
        echo "Departure Date: " . $row["departure_date"] . "<br>";
        echo "Return Date: " . $row["return_date"] . "<br>";
        echo "Ticket Type: " . $row["ticket_type"] . "<br><br>";
    }
} else {
    echo "No flights booked yet.";
}

// Close connection
mysqli_close($conn);
?>

<!-- HTML form -->
<html>
<head>
    <title>Flight Booking</title>
</head>
<body>
    <div class="container">
        <h2>Book a Flight</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="form-group">
                <label for="from-country" class="label">From Country:</label>
                <select id="from-country" class="input-field" name="from-country">
                    <option value="Nepal">Nepal</option>
                    <option value="Singapore">Singapore</option>
                    <option value="UK">UK</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Spain">Spain</option>
                    <option value="Dubai">Dubai</option>
                    <option value="Egypt">Egypt</option>
                    <option value="Indonesia">Indonesia</option>
                    <!-- Add more options here -->
                </select>
            </div>
            <div class="form-group">
                <label for="to-country" class="label">To Country:</label>
                <select id="to-country" class="input-field" name="to-country">
                    <option value="Singapore">Singapore</option>
                    <option value="Nepal">Nepal</option>
                    <option value="UK">UK</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Spain">Spain</option>
                    <option value="Dubai">Dubai</option>
                    <option value="Egypt">Egypt</option>
                    <option value="Indonesia">Indonesia</option>
                    <!-- Add more options here -->
                </select>
            </div>
            <div class="form-group">
                <label for="departure-date" class="label">Departure Date:</label>
                <input type="date" id="departure-date" class="input-field" name="departure-date">
            </div>
            <div class="form-group">
                <label for="return-date" class="label">Return Date:</label>
                <input type="date" id="return-date" class="input-field" name="return-date">
            </div>
            <div class="form-group">
                <label for="ticket-type" class="label">Ticket Type:</label>
                <select id="ticket-type" class="input-field" name="ticket-type">
                    <option value="Economy">Economy</option>
                    <option value="Premium Economy">Premium Economy</option>
                    <option value="Business">Business</option>
                    <!-- Add more options here -->
                </select>
            </div>
            <div class="form-group">
                <p class="ticket-price">$800</p>
                <button class="button" type="submit">Book Now</button>
            </div>
          
        </form>
    </div>
</body>
</html>