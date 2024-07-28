<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adams & Butler</title>
    <style>
        /* Global Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }

        /* Header Styles */
        .header {
            max-width: 100%;
            max-height: 100px;
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        .header a {
            color: #fff;
            text-decoration: none;
        }

        /* Navigation Styles */
        .nav {
            background-color: #444;
            padding: 1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
        }

        .nav li {
            margin-right: 20px;
        }

        .nav a {
            color: #fff;
            text-decoration: none;
        }

        /* Main Content Styles */
        .main {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .main section {
            background-color: #fff;
            padding: 2em;
            margin: 20px;
            flex: 1 1 calc(33.33% - 40px);
            box-sizing: border-box;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
            margin-top: 20px;
        }

        footer p {
            margin: 5px 0;
        }

        /* Responsive Design */
        @media only screen and (max-width: 1200px) {
            .main section {
                flex: 1 1 calc(50% - 40px);
            }
        }

        @media only screen and (max-width: 768px) {
            .nav {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav ul {
                flex-direction: column;
            }

            .nav li {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .main section {
                flex: 1 1 calc(50% - 40px);
            }
        }

        @media only screen and (max-width: 480px) {
            .main section {
                flex: 1 1 100%;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>Global Tour</h1>
    </header>
    <nav class="nav">
        <ul>
            <li><a href="../contact us/contactus.php">CONTACT US</a></li>
            <li><a href="#">TAILORED EXPERIENCES</a></li>
            <!-- <li><a href="#">DESTINATIONS</a></li>
            <li><a href="#">PRIVATE RENTALS</a></li>
            <li><a href="#">NEWS & PRESS</a></li> -->
            <li><a href="../about us/aboutus.php">ABOUT US</a></li>
        </ul>
    </nav>
    <main class="main">
        <section>
            <h2>Ireland</h2>
            <p>Castles</p>
            <p>All</p>
        </section>
        <section>
            <h2>UK</h2>
            <p>Estates</p>
            <p>Press</p>
        </section>
        <section>
            <h2>Africa</h2>
            <p>Villas & Houses</p>
            <p>News</p>
        </section>
        <!-- Add more sections here -->
    </main>
    <footer>
        <p>&copy; 2024 Global Tour</p>
        <p>Terms & Conditions | Sustainability Policy | Privacy Policy</p>
    </footer>
</body>

</html>