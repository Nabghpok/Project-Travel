<?php include '../Globalheader/header.php'; ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $message = $conn->real_escape_string($_POST['message']);

    // Check if the same email, phone, and message already exist
    $check_sql = "SELECT * FROM contact_messages WHERE email='$email' AND phone='$phone' AND message='$message'";
    $result = $conn->query($check_sql);

    if ($result && $result->num_rows > 0) {
        // Message already exists
        $response['message'] = "You have already sent this message.";
    } else {
        // Insert new message
        $sql = "INSERT INTO contact_messages (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

        if ($conn->query($sql) === TRUE) {
            $response['success'] = true;
            $response['message'] = "Your message has been sent successfully!";
        } else {
            $response['message'] = "Failed to save your message. Error: " . $conn->error;
        }
    }
}

$conn->close();
echo json_encode($response);
