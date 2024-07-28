<?php
session_start();
include('db_connect.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $duration = $_POST['duration'];
    $destination = $_POST['destination'];
    $target = "images/" . basename($image);

    // Handle file upload
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $query = "INSERT INTO packages (title, description, price, image, duration, destination) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$title, $description, $price, $image, $duration, $destination]);

        echo "Package added successfully!";
    } else {
        echo "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package</title>
</head>

<body>
    <h1>Add Package</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="5" required></textarea><br><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image"><br><br>

        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" required><br><br>

        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required><br><br>

        <input type="submit" value="Add Package">
    </form>
</body>

</html>