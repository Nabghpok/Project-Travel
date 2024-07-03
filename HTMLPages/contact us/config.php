<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Change this if you have a different username
$password = ""; // Change this if you have a different password
$dbname = "travelersdetails";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
