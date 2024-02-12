<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Shops</title>
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
                <li class="navbar-nav-list-item active"><a href="./explore_shops.php" class="navbar-nav-list-item-link">EXPLORE SHOPS</a></li>
                <li class="navbar-nav-list-item"><a href="./about.php" class="navbar-nav-list-item-link">ABOUT</a></li>
                <li class="navbar-nav-list-item"><a href="./faq.php" class="navbar-nav-list-item-link">FAQ</a></li>
                <li class="navbar-nav-list-item"><a href="./contact.php" class="navbar-nav-list-item-link">CONTACT US</a></li>
            </ul>
            <div class="navbar-nav-search-button">
                <img src="../img/search.png" alt="" class="navbar-nav-search-button-image">
            </div>
            <?php
            if (!isset($_SESSION['userid'])) {
            ?>
                <div class="navbar-nav-login-button">
                    <a href="./pages/login.php">SIGN IN</a>
                </div>
            <?php
            } else {
            ?>
                <div class="navbar-nav-login-button">
                    <a href="./pages/profile.php">View Profile</a>
                </div>
            <?php
            }
            ?>
        </nav>
        <!-- <div class="navbar-container-full-screen-search-bar">
            <input type="text" class="navbar-container-full-screen-search-bar-input">
            <img src="../img/search.png" alt="" class="navbar-container-full-screen-search-bar-image">
        </div> -->
    </section>
    <section class="explore-shops-main-content">
        <div class="explore-shops-main-content-top">
            <h1 class="explore-shops-main-content-top-heading">
                Explore Shops!
            </h1>
            <p class="explore-shops-main-content-top-paragraph">
                Explore the most popular shops in rentNepal!
            </p>
        </div>
        <div class="explore-shops-main-content-card-container">
            <div class="explore-shops-main-content-card-container-card">
                <img src="../img/shops/nike.svg" alt="" class="explore-shops-main-content-card-container-card-image">
                <span class="explore-shops-main-content-card-container-card-content">Nike</span>
                <a href="#" class="explore-shops-main-content-card-container-card-button">Explore Shop!</a>
            </div>
            <div class="explore-shops-main-content-card-container-card">
                <img src="../img/shops/adidas.png" alt="" class="explore-shops-main-content-card-container-card-image">
                <span class="explore-shops-main-content-card-container-card-content">Adidas</span>
                <a href="#" class="explore-shops-main-content-card-container-card-button">Explore Shop!</a>
            </div>
            <div class="explore-shops-main-content-card-container-card">
                <img src="../img/shops/newbalance.png" alt="" class="explore-shops-main-content-card-container-card-image">
                <span class="explore-shops-main-content-card-container-card-content">New Balance</span>
                <a href="#" class="explore-shops-main-content-card-container-card-button">Explore Shop!</a>
            </div>
            <div class="explore-shops-main-content-card-container-card">
                <img src="../img/shops/kookaburra.png" alt="" class="explore-shops-main-content-card-container-card-image">
                <span class="explore-shops-main-content-card-container-card-content">Kookaburra</span>
                <a href="#" class="explore-shops-main-content-card-container-card-button">Explore Shop!</a>
            </div>
            <div class="explore-shops-main-content-card-container-card">
                <img src="../img/shops/calvinklein.png" alt="" class="explore-shops-main-content-card-container-card-image">
                <span class="explore-shops-main-content-card-container-card-content">Calvin Klein</span>
                <a href="#" class="explore-shops-main-content-card-container-card-button">Explore Shop!</a>
            </div>
            <div class="explore-shops-main-content-card-container-card">
                <img src="../img/shops/emporio-armani.svg" alt="" class="explore-shops-main-content-card-container-card-image">
                <span class="explore-shops-main-content-card-container-card-content">Emporio Armani</span>
                <a href="#" class="explore-shops-main-content-card-container-card-button">Explore Shop!</a>
            </div>
            <div class="explore-shops-main-content-card-container-card">
                <img src="../img/shops/brioni.svg" alt="" class="explore-shops-main-content-card-container-card-image">
                <span class="explore-shops-main-content-card-container-card-content">Brioni</span>
                <a href="#" class="explore-shops-main-content-card-container-card-button">Explore Shop!</a>
            </div>
            <div class="explore-shops-main-content-card-container-card">
                <img src="../img/shops/lamborghini.svg" alt="" class="explore-shops-main-content-card-container-card-image">
                <span class="explore-shops-main-content-card-container-card-content">Lamborghini</span>
                <a href="#" class="explore-shops-main-content-card-container-card-button">Explore Shop!</a>
            </div>
        </div>
    </section>
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
                        <li class="footer-container-columns-column-list-item"><a href="./contact.html" class="footer-container-columns-column-list-item-link">Support Centre</a></li>
                        <li class="footer-container-columns-column-list-item"><a href="./contact.html" class="footer-container-columns-column-list-item-link">Customer Support</a></li>
                        <li class="footer-container-columns-column-list-item"><a href="./about.html" class="footer-container-columns-column-list-item-link">About</a></li>
                    </ul>
                </div>
                <div class="footer-container-columns-column">
                    <h1 class="footer-container-columns-column-head">Products</h1>
                    <ul class="footer-container-columns-column-list">
                        <li class="footer-container-columns-column-list-item"><a href="./browse_products.html" class="footer-container-columns-column-list-item-link">Browse Products</a></li>
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
    <script src="../js/navbar.js"></script>
    <script src="../js/search.js"></script>
</body>
</html>