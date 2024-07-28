<?php
session_start();
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO admins (username, password_hash, email, role) VALUES (?, ?, ?, 'admin')";
    $stmt = $pdo->prepare($query);

    try {
        $stmt->execute([$username, $password_hash, $email]);
        echo "Admin registered successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
</head>

<body>
    <h1>Admin Signup</h1>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Sign Up">
    </form>
    <p><a href="login.php">Already have an account? Log in here.</a></p>
</body>

</html>