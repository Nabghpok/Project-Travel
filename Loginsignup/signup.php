<?php
require 'config.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $fn = $_POST['first_name'];
    $ln = $_POST['last_name'];
    $c = $_POST['country'];
    $email = $_POST['email'];
    $password = $_POST['password'];




    // Validate input
    if (!empty($username) && !empty($password) && !empty($email)) {
        // Check if the username and email already exist
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Username or email already exists
            echo "This username or email is already taken.";
        } else {
            // Insert new user into the database
            $stmt = $conn->prepare("INSERT INTO users (username,first_name, last_name, country, email, password) VALUES (?, ?, ?, ?, ?, ?)");
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $stmt->bind_param("ssssss", $username, $fn, $ln, $c, $email, $hashed_password);

            if ($stmt->execute()) {
                // Registration successful, redirect to login page
                header("location: login.html");
                exit(); // Add this line to stop further execution
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        $stmt->close();
    } else {
        echo "Please fill out both fields.";
    }

    $conn->close();
}
