<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Tour</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            padding: 0 20px;
            font-size: 24px;
        }

        .nav {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nav li {
            margin: 0 15px;
        }

        .nav a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
            transition: background-color 0.3s, color 0.3s;
        }

        .nav a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        .btn-container {
            margin-right: 20px;
        }

        .nav button {
            background-color: #f0f0f0;
            color: #333;
            border: none;
            padding: 10px 15px;
            font-size: 18px;
            cursor: pointer;
            margin: 0 5px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .nav button:hover {
            background-color: #ccc;
        }

        .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 24px;
            margin-right: 20px;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header h1 {
                width: 100%;
                text-align: center;
                padding: 10px 0;
            }

            .menu-toggle {
                display: block;
                position: absolute;
                top: 10px;
                right: 20px;
            }

            .nav {
                flex-direction: column;
                width: 100%;
                display: none;
                background-color: #333;
            }

            .nav.active {
                display: flex;
            }

            .nav li {
                margin: 10px 0;
                width: 100%;
                text-align: center;
            }

            .nav a {
                display: block;
                width: 100%;
                padding: 15px 0;
            }

            .btn-container {
                margin: 10px 0;
                width: 100%;
                display: flex;
                justify-content: center;
            }

            .nav button {
                width: 45%;
                margin: 0 5px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Global Tour and Travel</h1>
        <span class="menu-toggle">&#9776;</span>
        <ul class="nav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../about us/aboutus.php">About US</a></li>
            <li><a href="../contact us/contactustestandcs.php">Contact Us</a></li>
            <!-- <li class="btn-container">
                <button onclick="location.href='index.php#loginForm'">Login</button>
                <button onclick="location.href='../HTMLPages/index.php?action=signup'">Signup</button>
            </li> -->
        </ul>
    </div>
    <script>
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.nav').classList.toggle('active');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const nav = document.querySelector('.nav');
            const menuToggle = document.querySelector('.menu-toggle');
            if (!nav.contains(event.target) && !menuToggle.contains(event.target)) {
                nav.classList.remove('active');
            }
        });

        // Close menu when window is resized above mobile breakpoint
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                document.querySelector('.nav').classList.remove('active');
            }
        });
    </script>
</body>

</html>