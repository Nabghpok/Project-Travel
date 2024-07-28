<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

// Database connection
include('db_connect.php');

// Function to upload image
function uploadImage($inputName)
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES[$inputName]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES[$inputName]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        return "File is not an image.";
    }

    // Check file size
    if ($_FILES[$inputName]["size"] > 500000) {
        return "Sorry, your file is too large.";
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        return "Sorry, there was an error uploading your file.";
    }
}

// Add post
if (isset($_POST['add_post'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $image = uploadImage('post_image');

    if (strpos($image, 'uploads/') === 0) {
        $stmt = $pdo->prepare("INSERT INTO posts (title, content, author, image) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$title, $content, $author, $image])) {
            $success_message = "Post added successfully.";
        } else {
            $error_message = "Error: Could not add post.";
        }
    } else {
        $error_message = $image; // Error message from uploadImage function
    }
}

// Add package
if (isset($_POST['add_package'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
    $destination = $_POST['destination'];
    $image = uploadImage('package_image');

    if (strpos($image, 'uploads/') === 0) {
        $stmt = $pdo->prepare("INSERT INTO packages (title, description, price, image, duration, destination) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$title, $description, $price, $image, $duration, $destination])) {
            $success_message = "Package added successfully.";
        } else {
            $error_message = "Error: Could not add package.";
        }
    } else {
        $error_message = $image; // Error message from uploadImage function
    }
}

// Fetch posts
$posts = [];
$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch packages
$packages = [];
$stmt = $pdo->query("SELECT * FROM packages ORDER BY created_at DESC");
$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .tab {
            display: none;
        }

        .tab-button {
            margin-right: 10px;
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .tab-button:hover {
            background-color: #0056b3;
        }

        form {
            margin-bottom: 20px;
        }

        input,
        textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="file"] {
            border: none;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .post,
        .package {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            background-color: white;
            border-radius: 4px;
        }

        img {
            max-width: 200px;
            display: block;
            margin-top: 10px;
        }

        .success-message,
        .error-message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>

<body>
    <h1>Admin Dashboard</h1>
    <button class="tab-button" onclick="openTab('posts')">Manage Posts</button>
    <button class="tab-button" onclick="openTab('packages')">Manage Packages</button>
    <a href="admin_login.php?logout=1"><button>Logout</button></a>

    <?php if (isset($success_message)) : ?>
        <div class="success-message"><?php echo htmlspecialchars($success_message); ?></div>
    <?php endif; ?>

    <?php if (isset($error_message)) : ?>
        <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
    <?php endif; ?>

    <div id="posts" class="tab">
        <h2>Add New Post</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Post Title" required>
            <textarea name="content" placeholder="Post Content" required></textarea>
            <input type="text" name="author" placeholder="Author" required>
            <input type="file" name="post_image" accept="image/*" required>
            <button type="submit" name="add_post">Add Post</button>
        </form>

        <h2>Existing Posts</h2>
        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                <p><?php echo htmlspecialchars($post['content']); ?></p>
                <p>Author: <?php echo htmlspecialchars($post['author']); ?></p>
                <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="Post Image">
                <p>Created: <?php echo htmlspecialchars($post['created_at']); ?></p>
                <p>Updated: <?php echo htmlspecialchars($post['updated_at']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="packages" class="tab">
        <h2>Add New Package</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Package Title" required>
            <textarea name="description" placeholder="Package Description" required></textarea>
            <input type="number" name="price" placeholder="Price" step="0.01" required>
            <input type="text" name="duration" placeholder="Duration" required>
            <input type="text" name="destination" placeholder="Destination" required>
            <input type="file" name="package_image" accept="image/*" required>
            <button type="submit" name="add_package">Add Package</button>
        </form>

        <h2>Existing Packages</h2>
        <?php foreach ($packages as $package) : ?>
            <div class="package">
                <h3><?php echo htmlspecialchars($package['title']); ?></h3>
                <p><?php echo htmlspecialchars($package['description']); ?></p>
                <p>Price: $<?php echo htmlspecialchars($package['price']); ?></p>
                <p>Duration: <?php echo htmlspecialchars($package['duration']); ?></p>
                <p>Destination: <?php echo htmlspecialchars($package['destination']); ?></p>
                <img src="<?php echo htmlspecialchars($package['image']); ?>" alt="Package Image">
                <p>Created: <?php echo htmlspecialchars($package['created_at']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        function openTab(tabName) {
            var tabs = document.getElementsByClassName("tab");
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
        }

        // Open the posts tab by default
        openTab('posts');
    </script>
</body>

</html>