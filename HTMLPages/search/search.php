<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelersdetails";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['from_country']) && isset($_GET['to_country'])) {
    $from_country = $_GET['from_country'];
    $to_country = $_GET['to_country'];

    $sql = "SELECT * FROM bookings WHERE from_country LIKE '%$from_country%' AND to_country LIKE '%$to_country%'";
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    echo json_encode($data);
}

$conn->close();
