<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Home Page</title>
</head>

<body>

    <header>
        <nav>
            <h3>Global tour</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="../HTMLPages/about us/aboutus.php">About us</a></li>
                <li><a href="../HTMLPages/contact us/contactustestandcss.html">Contact</a></li>
                <?php if (isset($_SESSION['username'])) : ?>
                    <li>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></li>
                    <li><a href="../DatabaseValidation/logout.php">Logout</a></li>
                <?php else : ?>
                    <li><button id="toggleLoginSignup">Login / Sign Up</button></li>
                <?php endif; ?>
            </ul>
            <i class="bi bi-three-dots"></i>

            <div id="loginSignupPopup" class="popup">
                <div class="popup-content">
                    <span class="close-btn">&times;</span>

                    <!-- Login Form -->
                    <form id="loginForm" action="../DatabaseValidation/login.php" method="POST">
                        <h2>Login</h2>
                        <label for="loginUsername">Username:</label>
                        <input class="uname" type="text" id="loginUsername" name="username" required>

                        <label for="loginPassword">Password:</label>
                        <input class="uname" type="password" id="loginPassword" name="password" required>
                        <button type="submit">Login</button>
                        <p>Don't have an account? <a href="#" id="showSignupForm">Sign up here</a></p>
                    </form>

                    <!-- Signup Form -->
                    <form id="signupForm" class="form" action="../DatabaseValidation/signup.php" method="post" style="display: none;">
                        <h2>Sign Up</h2>
                        <div>
                            <label class="size" for="username">Username:</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div>
                            <label class="size" for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="first_name" required>
                        </div>
                        <div>
                            <label class="size" for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="last_name" required>
                        </div>
                        <div>
                            <label class="size" for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div>
                            <label class="size" for="country">Country:</label>
                            <input type="text" id="country" name="country" required>
                        </div>
                        <div>
                            <label class="size" for="password">Password:</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <div>
                            <label class="size" for="retypePassword">Retype Password:</label>
                            <input type="password" id="retypePassword" name="retypePassword" required>
                        </div>
                        <div>
                            <button type="submit">Sign Up</button>
                        </div>

                        <p>Already have an account? <a href="#" id="showLoginForm">Login here</a></p>
                    </form>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="cont_box">
                <h1>The right destination for you and your family</h1>
                <button>Start your search</button>
            </div>

            <div class="trip_bx">
                <div class="search_bx">
                    <div class="card">
                        <h4>Location<i class="bi bi-caret-down-fill"></i></h4>
                        <input type="text" placeholder=" Enter your destination">
                    </div>

                    <div class="card">
                        <h4>Date<i class="bi bi-caret-down-fill"></i></h4>
                        <input type="date">
                    </div>

                    <div class="card">
                        <h4>People</h4>
                        <input type="number" placeholder="How many people?">
                    </div>
                    <input type="button" value="Explore Now">
                </div>
                <div class="travel_bx">
                    <h4>Countries to travel</h4>
                    <div class="cards">
                        <div class="card">
                            <h3>NEPAL<img src="./images/360_F_107552252_hwWMQgc6GesgNGTFLBozFvo8p56feAPC.jpg" alt="">
                            </h3>
                            <img src="./images/360_F_239221224_ZspRhx9wK21O82bALOVfCJfH2ox2YgNx.jpg" alt="">
                            <div class="btn_city">
                                <a href="./readmorefornepal.html">Read Now</a>
                                <h5>Kathmandu<br><span>Rs20000</span></h5>
                            </div>
                        </div>
                        <div class="card">
                            <h3>UK<img src="./images/ukflag.png" alt=""></h3>
                            <img src="./images/tower bridge.jpeg" alt="">
                            <div class="btn_city">
                                <a href="./readmoreforuk.html">Read Now</a>
                                <h5>London<br><span>$9000</span></h5>
                            </div>
                        </div>
                        <div class="card">
                            <h3>SINGAPORE<img src="./images/singaporeflag.png" alt=""></h3>
                            <img src="./images/singaporeplace.jpeg" alt="">
                            <div class="btn_city">
                                <a href="./readmoreforsingapore.html">Read Now</a>
                                <h5>Singapore<br><span>$7000</span></h5>
                            </div>
                        </div>
                        <div class="card">
                            <h3>SWITZERLAND<img src="./images/switzerlandflag.png" alt=""></h3>
                            <img src="./images/switzerlandplace.jpeg" alt="">
                            <div class="btn_city">
                                <a href="./readmoreforswitzerland.html">Read Now</a>
                                <h5>Bern<br><span>$8000</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="offers">
        <h1>Best tour package offers</h1>
        <p>Choose your next destination</p>
        <div class="cards">
            <div class="card">
                <h3>Spain</h3>
                <div class="img_text">
                    <img src="./images/spainphoto" alt="">
                    <h4>Included:Air ticket, Hotel, Breakfast, tours and Airport transfer</h4>
                </div>
                <div class="cont_bx">
                    <div class="price">
                        <div class="heart_chat">
                            <i class="bi bi-heart-fill"><span>80000</span></i>
                            <i class="bi bi-chat-fill"><span>5000</span></i>
                        </div>
                        <div class="info_price">
                            <a href="./moreinfospain.html">More Info</a>
                            <h4>$3500</h4>
                        </div>
                    </div>
                    <div class="days"> 10 Days<br>Spain</div>
                </div>
            </div>

            <div class="card">
                <h3>Dubai</h3>
                <div class="img_text">
                    <img src="./images/dubaiphoto.jpeg" alt="">
                    <h4>Included:Air ticket, Hotel, Breakfast, tours and Airport transfer</h4>
                </div>
                <div class="cont_bx">
                    <div class="price">
                        <div class="heart_chat">
                            <i class="bi bi-heart-fill"><span>90000</span></i>
                            <i class="bi bi-chat-fill"><span>4500</span></i>
                        </div>
                        <div class="info_price">
                            <a href="./moreinfodubai.html">More Info</a>
                            <h4>$2500</h4>
                        </div>
                    </div>
                    <div class="days"> 10 Days<br>Dubai</div>
                </div>
            </div>

            <div class="card">
                <h3>Egypt</h3>
                <div class="img_text">
                    <img src="./images/egyptphoto.jpeg" alt="">
                    <h4>Included:Air ticket, Hotel, Breakfast, tours and Airport transfer</h4>
                </div>
                <div class="cont_bx">
                    <div class="price">
                        <div class="heart_chat">
                            <i class="bi bi-heart-fill"><span>80000</span></i>
                            <i class="bi bi-chat-fill"><span>5000</span></i>
                        </div>
                        <div class="info_price">
                            <a href="./moreinfoegypt.html">More Info</a>
                            <h4>$4000</h4>
                        </div>
                    </div>
                    <div class="days"> 10 Days<br>Egypt</div>
                </div>
            </div>

            <div class="card">
                <h3>Indonesia</h3>
                <div class="img_text">
                    <img src="./images/indonesiaphoto.jpeg" alt="">
                    <h4>Included:Air ticket, Hotel, Breakfast, tours and Airport transfer</h4>
                </div>
                <div class="cont_bx">
                    <div class="price">
                        <div class="heart_chat">
                            <i class="bi bi-heart-fill"><span>80000</span></i>
                            <i class="bi bi-chat-fill"><span>5000</span></i>
                        </div>
                        <div class="info_price">
                            <a href="./moreinfoindonesia.html">More Info</a>
                            <h4>$3500</h4>
                        </div>
                    </div>
                    <div class="days"> 10 Days<br>Indonesia</div>
                </div>
            </div>
        </div>
    </div>
    <div class="destination">
        <div class="des_bx">
            <h4>Our Destination</h4>
            <p>Choose your next Destination</p>
            <ul>
                <li>Uk</li>
                <li>Spain</li>
                <li>Dubai</li>
                <li>Indonesia</li>
                <li>Singapore</li>
                <li>Egypt</li>
                <li>Switzerland</li>
            </ul>
            <h5>Included:Air ticket, Hotel, Breakfast, tours and Airport transfer</h5>
            <button>MORE INFO</button>
        </div>
        <div class="img_bx">
            <img src="./images/imgplane.jpeg" alt="">
        </div>

    </div>



    <script src="index.js"></script>
</body>

</html>