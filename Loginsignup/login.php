<?php
session_start();
require 'config.php'; // File to connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = $_POST['username'];
    $password = $_POST['password'];

    // Validate input
    if (!empty($username_or_email) && !empty($password)) {
        // Prepare SQL statement to select user by username or email
        $stmt = $conn->prepare("SELECT id, username, first_name, password FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username_or_email, $username_or_email);
        $stmt->execute();
        $stmt->store_result();

        // Check if user exists
        if ($stmt->num_rows > 0) {
            // Bind result variables
            $stmt->bind_result($id, $username, $first_name, $hashed_password);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashed_password)) {
                // Password is correct, start a new session
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;
                $_SESSION["first_name"] = $first_name;

                // Redirect to welcome page
                header("Location: welcome.php");
                exit();
            } else {
                // Display an error message if the password is not valid
                echo "The password you entered was not valid.";
            }
        } else {
            // Display an error message if username or email doesn't exist
            echo "No account found with that username or email.";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Please fill out both fields.";
    }

    // Close connection
    $conn->close();
}
