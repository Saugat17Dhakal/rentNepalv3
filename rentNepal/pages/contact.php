<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
                <li class="navbar-nav-list-item"><a href="./about.php" class="navbar-nav-list-item-link">ABOUT</a></li>
                <li class="navbar-nav-list-item"><a href="./faq.php" class="navbar-nav-list-item-link">FAQ</a></li>
                <li class="navbar-nav-list-item active"><a href="./contact.php" class="navbar-nav-list-item-link">CONTACT US</a></li>
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
    <section class="contact-us-container">
        <div class="contact-us-container-left">
            <h1 class="contact-us-container-left-heading">
                Contact Us!
            </h1>
            <p class="contact-us-container-left-paragraph">
                Fill out the contact form, our team will contact you shortly!
            </p>
            <div class="contact-us-container-left-list">
                <div class="phone">
                    <img src="../img/contacts/phone.png" alt="">
                    <span>+977 9837181927</span>
                </div>
                <div class="email">
                    <img src="../img/contacts/email.png" alt="">
                    <span>rentnepal304@gmail.com</span>
                </div>
                <div class="location">
                    <img src="../img/contacts/location.png" alt="">
                    <span>Maitighar, Kathmandu, Nepal</span>
                </div>
            </div>
        </div>
        <div class="contact-us-container-right">
            <form id="contactForm" class="contact-us-container-right-form">
                <p class="firstname">
                  <label>First Name</label>
                  <input type="text" name="firstname" id="firstname" required placeholder="Enter first name">
                </p>
                <p class="lastname">
                  <label>Last Name</label>
                  <input type="text" name="lastname" id="lastname" placeholder="Enter Last Name">
                </p>
                <p class="email">
                  <label>Email Address</label>
                  <input type="email" name="email" id="email" required placeholder="Enter email">
                </p>
                <p class="phone">
                  <label>Phone Number</label>
                  <input type="text" name="phone" id="phone" placeholder="Enter phone number">
                </p>
                <p class="message">
                  <label>Message</label>
                  <textarea name="message" rows="5" id="message" placeholder="Enter your message"></textarea>
                </p>
                <p class="button">
                  <button type="submit">Submit</button>
                </p>
              </form>
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
    <section class="copyright">
        Copyright © <span class="date"></span> rentNepal. All Rights Reserved.
    </section>
    <script src="../js/components/navbar.js"></script>
</body>
</html>