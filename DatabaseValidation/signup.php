
<?php

require 'config.php'; // Include database connection

$response = array("success" => false); // Initialize response

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $fn = $_POST['first_name'];
    $ln = $_POST['last_name'];
    $c = $_POST['country'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Remove trailing //

    // Validate input
    if (!empty($username) && !empty($password) && !empty($email)) {
        // Check if the username and email already exist
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        if ($stmt === false) {
            $response["message"] = "Database error: Failed to prepare statement.";
        } else {
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                // Username or email already exists
                $response["message"] = "This username or email is already taken.";
            } else {
                // Insert new user into the database
                $stmt = $conn->prepare("INSERT INTO users (username, first_name, last_name, country, email, password) VALUES (?, ?, ?, ?, ?, ?)"); // Add closing parenthesis
                if ($stmt === false) {
                    $response["message"] = "Database error: Failed to prepare insert statement.";
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
                    $stmt->bind_param("ssssss", $username, $fn, $ln, $c, $email, $hashed_password);

                    if ($stmt->execute()) {
                        // Registration successful
                        $response["success"] = true;
                    } else {
                        $response["message"] = "Something went wrong. Please try again later.";
                    }
                }
            }

            $stmt->close();
        }
    } else {
        $response["message"] = "Please fill out all fields.";
    }

    $conn->close();
}

echo json_encode($response); // Return JSON response
?>