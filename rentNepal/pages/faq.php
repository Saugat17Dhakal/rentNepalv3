<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequently Asked Questions</title>
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
                <li class="navbar-nav-list-item active"><a href="./faq.php" class="navbar-nav-list-item-link">FAQ</a></li>
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
    <section class="frequently-asked-questions">
        <div class="frequently-asked-questions-top">
            <h1 class="frequently-asked-questions-top-heading">
                FREQUENTLY ASKED QUESTIONS
            </h1>
            <p class="frequently-asked-questions-top-paragraph">
                Have questions? We’re here to help. 
            </p>
        </div>
        <div class="frequently-asked-questions-main-content">
            <div class="frequently-asked-questions-main-content-question">
                <div class="accordion">
                    <h1 class="frequently-asked-questions-main-content-question-head">01. WHY MUST I MAKE PAYMENT IMMEDIATELY AT CHECKOUT?</h1>
                    <span class="accordion-opener">+</span>
                </div>
                <p class="frequently-asked-questions-main-content-question-para accordion-content">Sample ordering is on 'first-come-first-served' basis. To ensure that you get your desired samples, it is recommended that you make your payment within 60 minutes of checking out.</p>
            </div>
            <div class="frequently-asked-questions-main-content-question">
                <div class="accordion">
                    <h1 class="frequently-asked-questions-main-content-question-head">02. IS YOUR WEBSITE SECURE?</h1>
                    <span class="accordion-opener">+</span>
                </div>
                <p class="frequently-asked-questions-main-content-question-para accordion-content">Yep! On any page where we ask you to enter your address, phone number, or credit card information, we use secure socket layer (SSL) to encrypt the communication.</p>
            </div>
            <div class="frequently-asked-questions-main-content-question">
                <div class="accordion">
                    <h1 class="frequently-asked-questions-main-content-question-head">03. WHEN WILL MY ORDER SHIP?</h1>
                    <span class="accordion-opener">+</span>
                </div>
                <p class="frequently-asked-questions-main-content-question-para accordion-content">After your payment is verified, it takes up to 24 hours to process and ship your order. This does not include weekends or holidays. Purchases made after 11 am PST will not be shipped out until the next business day. If you order after 11 am PST on a Friday, your order will likely be shipped out on the following Monday.</p>
            </div>
            <div class="frequently-asked-questions-main-content-question">
                <div class="accordion">
                    <h1 class="frequently-asked-questions-main-content-question-head">04. HOW DO I MAKE PAYMENTS USING eSewa? HOW DOES IT WORK?</h1>
                    <span class="accordion-opener">+</span>
                </div>
                <p class="frequently-asked-questions-main-content-question-para accordion-content">eSewa is the easiest way to make payments online. While checking out your order, you will be redirected to the eSewa website. Be sure to fill in correct details for fast & hassle-free payment processing. After a successful eSewa payment, a payment advice will be automatically generated to cartsy.redq.io system for your order.
                </p>
            </div>
            <div class="frequently-asked-questions-main-content-question">
                <div class="accordion">
                    <h1 class="frequently-asked-questions-main-content-question-head">05. HOW MUCH DO DELIVERIES COST?</h1>
                    <span class="accordion-opener">+</span>
                </div>
                <p class="frequently-asked-questions-main-content-question-para accordion-content">There is a 5$ delivery fee if the order value is 50$ or more. If the order value is less than 50$, we charge BDT 10$ delivery fee.</p>
            </div>
        </div>
        <div class="frequently-asked-questions-bottom">
            <div>
                <p class="frequently-asked-questions-bottom-paragraph">
                    Didn’t get the answer? Drop your message
                </p>
            </div>
            <div class="move">
            <a href="./contact.html" class="frequently-asked-questions-bottom-head">
                Contact Us
            </a>
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
    <script src="../js/components/navbar.js"></script>
    <script src="../js/accordion.js"></script>
</body>
</html>