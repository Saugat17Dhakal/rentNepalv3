<?php
session_start();
if (isset($_SESSION['userid'])) {
    // Redirect to login page if not logged in
    header("Location: /aestheticrentnepal/rentnepal");
    exit();
}
include("../conn/conn.php");

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $useremail = filter_input(INPUT_POST, 'useremail', FILTER_VALIDATE_EMAIL);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $userpassword = filter_input(INPUT_POST, 'userpassword', FILTER_SANITIZE_STRING);

    if (!$useremail) {
        $errors['useremail'] = "Invalid email format";
    }

    if (empty($username)) {
        $errors['username'] = "Username is required";
    }

    if (strlen($_POST['userpassword']) < 8) {
        $errors['userpassword'] = "Password must be at least 8 characters long";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO users(useremail, username, userpassword) VALUES (?, ?, ?);");
        $stmt->bind_param("sss", $useremail, $username, $userpassword);

        if ($stmt->execute()) {
            echo "<script>alert('Registration Successful!'); location.replace('login.php')</script>";
            exit();
        } else {
            $errors['database'] = "Error Registering User!";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register to rentNepal</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <section class="navbar-container">
        <div class="responsive-logo-container">
            <img src="../img/logo.png" alt="" class="responsive-logo-container-image">
        </div>
        <div class="hamburger-open-close">
            &#9776;
        </div>
        <nav class="navbar-nav">
            <div class="navbar-nav-logo-container">
                <img src="../img/logo.png" alt="" class="navbar-nav-logo-container-image">
            </div>
            <ul class="navbar-nav-list">
                <li class="navbar-nav-list-item"><a href="./../index.php" class="navbar-nav-list-item-link">HOME</a></li>
                <li class="navbar-nav-list-item"><a href="./browse_products.php" class="navbar-nav-list-item-link">BROWSE PRODUCTS</a></li>
                <li class="navbar-nav-list-item"><a href="./explore_shops.php" class="navbar-nav-list-item-link">EXPLORE SHOPS</a></li>
                <li class="navbar-nav-list-item active"><a href="./about.php" class="navbar-nav-list-item-link">ABOUT</a></li>
                <li class="navbar-nav-list-item"><a href="./faq.php" class="navbar-nav-list-item-link">FAQ</a></li>
                <li class="navbar-nav-list-item"><a href="./contact.php" class="navbar-nav-list-item-link">CONTACT US</a></li>
            </ul>
            <div class="navbar-nav-search-button">
                <img src="../img/search.png" alt="" class="navbar-nav-search-button-image">
            </div>
            <div class="navbar-nav-login-button">
                <a href="./login.html">REGISTER</a>
            </div>
        </nav>
        <!-- <div class="navbar-container-full-screen-search-bar">
            <input type="text" class="navbar-container-full-screen-search-bar-input">
            <img src="../img/search.png" alt="" class="navbar-container-full-screen-search-bar-image">
        </div> -->
    </section>
    <div class="login-container">
        <h3 class="login-container-heading">
            Register to rentNepal!
        </h3>
        <form action="register.php" method="post" class="inputs">
            <input placeholder="Username" type="text" name="username">
            <span class="text-error"><?= isset($errors['username']) ? $errors['username'] : '' ?></span><br>
            <input placeholder="Enter your Email" type="email" name="useremail">
            <span class="text-error"><?= isset($errors['useremail']) ? $errors['useremail'] : '' ?></span><br>
            <input placeholder="Enter your password" type="password" name="userpassword">
            <span class="text-error"><?= isset($errors['userpassword']) ? $errors['userpassword'] : '' ?></span><br>
            <button type="submit">Register</button>
        </form>
        <?php if (isset($errors['database'])) : ?>
                    <div class="text-error"><?= $errors['database'] ?></div>
                <?php endif; ?>
        <span class="or-text">OR</span>
        <div class="platforms">
            <button>
                <img src="../img/google.png" alt="">
                <span class="platforms-span">Continue with Google!</span>
            </button>
            <button>
                <img src="../img/microsoft.png" alt="">
                <span class="platforms-span">Continue with Microsoft!</span>
            </button>
            <button>
                <img src="../img/apple.png" alt="">
                <span class="platforms-span">Continue with Apple!</span>
            </button>
        </div>
        <div class="cant-login">
            <a href="login.php">Already Have an Account?</a>
        </div>
    </div>
    <section class="footer-container">
        <div class="footer-container-rentnepal">
            <img class="footer-container-rentnepal-image" src="../img/logo.png" alt="">
            <p>A proper business solution to your day to day needs. </p>
            <div class="social-media">
                <a href="#">
                    <img src="../img/socialmedia/facebook.png" alt="">
                </a>
                <a href="#">
                    <img src="../img/socialmedia/instagram.png" alt="">
                </a>
                <a href="#">
                    <img src="../img/socialmedia/twitterx.png" alt="">
                </a>
            </div>
        </div>
            <div class="footer-container-columns">
                <div class="footer-container-columns-column">
                    <h1 class="footer-container-columns-column-head">Insights</h1>
                    <ul class="footer-container-columns-column-list">
                        <li class="footer-container-columns-column-list-item"><a href="./insights/customercare.html" class="footer-container-columns-column-list-item-link">Support Centre</a></li>
                        <li class="footer-container-columns-column-list-item"><a href="./insights/supportcentre.html" class="footer-container-columns-column-list-item-link">Customer Support</a></li>
                        <li class="footer-container-columns-column-list-item"><a href="./about.html" class="footer-container-columns-column-list-item-link">About</a></li>
                    </ul>
                </div>
                <div class="footer-container-columns-column">
                    <h1 class="footer-container-columns-column-head">Products</h1>
                    <ul class="footer-container-columns-column-list">
                        <li class="footer-container-columns-column-list-item"><a href="./individual_listings.html" class="footer-container-columns-column-list-item-link">Browse Products</a></li>
                        <li class="footer-container-columns-column-list-item"><a href="./explore_shops.html" class="footer-container-columns-column-list-item-link">Explore Shops</a></li>
                    </ul>
                </div>
                <div class="footer-container-columns-column">
                    <h1 class="footer-container-columns-column-head">Career</h1>
                    <ul class="footer-container-columns-column-list">
                        <li class="footer-container-columns-column-list-item"><a href="./tac.html" class="footer-container-columns-column-list-item-link">Terms and Conditions</a></li>
                        <li class="footer-container-columns-column-list-item"><a href="./privacy.html" class="footer-container-columns-column-list-item-link">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-container-columns-column">
                    <h1 class="footer-container-columns-column-head">Company</h1>
                    <ul class="footer-container-columns-column-list">
                        <li class="footer-container-columns-column-list-item"><a href="./insights/customercare.html" class="footer-container-columns-column-list-item-link">Browse Ads</a></li>
                        <li class="footer-container-columns-column-list-item"><a href="./insights/supportcentre.html" class="footer-container-columns-column-list-item-link">Become a Partner</a></li>
                        <li class="footer-container-columns-column-list-item"><a href="./about.html" class="footer-container-columns-column-list-item-link">Contact</a></li>
                    </ul>
                </div>
            </div>
    </section>
    <script src="../js/components/navbar.js"></script>
</body>
</html>