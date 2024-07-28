<?php
session_start();
// Include database connection
include('db_connect.php');

// Check if user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control Panel</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Admin Control Panel</h1>
    <nav>
        <a href="add_post.php">Add Post</a>
        <a href="add_package.php">Add Package</a>
        <a href="logout.php">Logout</a>
    </nav>
    <main>
        <h2>Welcome, Admin</h2>
        <!-- Dashboard Content -->
    </main>
</body>

</html>