<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: /rentnepal/pages/login.php");
    exit();
}

include("./conn/conn.php");

function getTrendingProducts($limit = 5)
{
    global $conn;

    $sql = "SELECT product.*, COUNT(orders.ordersid) as order_count
            FROM product
            LEFT JOIN orders ON product.productid = orders.productid
            GROUP BY product.productid
            ORDER BY order_count DESC
            LIMIT $limit";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return [];
    }
}

$trendingProducts = getTrendingProducts(5);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rentNepal</title>
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <section class="navbar-container">
        <div class="responsive-logo-container">
            <img src="./img/logo.png" alt="" class="responsive-logo-container-image">
        </div>
        <div class="hamburger-open-close">
            &#9776;
        </div>
        <nav class="navbar-nav">
            <div class="navbar-nav-logo-container">
                <img src="./img/logo.png" alt="" class="navbar-nav-logo-container-image">
            </div>
            <ul class="navbar-nav-list">
                <li class="navbar-nav-list-item active"><a href="index.php" class="navbar-nav-list-item-link">HOME</a></li>
                <li class="navbar-nav-list-item"><a href="./pages/browse_products.php" class="navbar-nav-list-item-link">BROWSE PRODUCTS</a></li>
                <li class="navbar-nav-list-item"><a href="./pages/explore_shops.php" class="navbar-nav-list-item-link">EXPLORE SHOPS</a></li>
                <li class="navbar-nav-list-item"><a href="./pages/about.php" class="navbar-nav-list-item-link">ABOUT</a></li>
                <li class="navbar-nav-list-item"><a href="./pages/faq.php" class="navbar-nav-list-item-link">FAQ</a></li>
                <li class="navbar-nav-list-item"><a href="./pages/contact.php" class="navbar-nav-list-item-link">CONTACT US</a></li>
            </ul>
            <div class="navbar-nav-search-button">
                <img src="./img/search.png" alt="" class="navbar-nav-search-button-image">
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
                <div style="cursor: pointer;" title="Logout" class="navbar-nav-login-button">
                    <form action="index.php" method="get">
                        <input type="hidden" name="logout">
                        <button type="submit">
                            <svg style="vertical-align: middle;" fill="none" height="36" viewBox="0 0 24 24" width="36" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 16L21 12M21 12L17 8M21 12L7 12M13 16V17C13 18.6569 11.6569 20 10 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H10C11.6569 4 13 5.34315 13 7V8" stroke="#374151" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </button>
                    </form>
                </div>
            <?php
            }
            ?>
        </nav>
        <!-- <div class="navbar-container-full-screen-search-bar">
            <input type="text" class="navbar-container-full-screen-search-bar-input">
            <img src="./img/search.png" alt="" class="navbar-container-full-screen-search-bar-image">
        </div> -->
    </section>
    <section class="main-section">
        <div class="navigation-buttons">
            <div class="main-section-prev">
                &#8592;
            </div>
            <div class="main-section-next">
                &#8594;
            </div>
        </div>
        <div class="sliders">
            <div class="slide-1 active slider">
                <div class="main-image">
                    <img src="./img/bannerone.png" alt="">
                </div>
                <div class="content">
                    <h1 class="main-section-heading">
                        MAKE YOUR RIDE EASY & FAST WITH rentNepal
                    </h1>
                    <p class="main-section-description">
                        More than 40,000 private bike rentals and bareboat
                        near your location to get best ride experience.
                    </p>
                    <div class="button-container">
                        <a href="/rentnepal/pages/browse_products.php" class="main-section-button">
                            Rent Now!
                        </a>
                    </div>
                </div>
            </div>
            <div class="slide-2 slider">
                <div class="main-image">
                    <img src="./img/bannertwo.png" alt="">
                </div>
                <div class="content">
                    <h1 class="main-section-heading">
                        MAKE YOUR RUN EASY & COMFORTABLE WITH rentNepal
                    </h1>
                    <p class="main-section-description">
                        More than 10,000 sportswear rentals and fitness shops
                        near your location to get the best sporting experience.
                    </p>
                    <div class="button-container">
                        <a href="#" class="main-section-button">
                            Rent Now!
                        </a>
                    </div>
                </div>
            </div>
            <div class="slide-3 slider">
                <div class="main-image">
                    <img src="./img/bannerthree.png" alt="">
                </div>
                <div class="content">
                    <h1 class="main-section-heading">
                        MAKE YOUR RIDE EASY, FAST & COMFORTABLE WITH rentNepal
                    </h1>
                    <p class="main-section-description">
                        More than 5,000 private bike rentals
                        near your location to get best cycle ride experience.
                    </p>
                    <div class="button-container">
                        <a href="#" class="main-section-button">
                            Rent Now!
                        </a>
                    </div>
                </div>
            </div>
            <div class="slide-4 slider">
                <div class="main-image">
                    <img src="./img/bannerfour.png" alt="">
                </div>
                <div class="content">
                    <h1 class="main-section-heading">
                        MAKE YOUR TREK ONE TO REMEMBER WITH rentNepal
                    </h1>
                    <p class="main-section-description">
                        More than 50,000 private trekking rentals services
                        near your location to get best ride experience.
                    </p>
                    <div class="button-container">
                        <a href="#" class="main-section-button">
                            Rent Now!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how-rent-nepal-works">
        <h1 class="how-rent-nepal-works-heading">
            How rentNepal Works?
        </h1>
        <p class="how-rent-nepal-works-paragraph">
            The proper business solution for your day-to-day needs.
        </p>
        <div class="how-rent-nepal-works-card-containers">
            <div class="how-rent-nepal-works-card-containers-card">
                <div class="how-rent-nepal-works-card-containers-card-image-container">
                    <img src="./img/howRentNepalWorks/location-icon.svg" alt="">
                </div>
                <div class="how-rent-nepal-works-card-containers-card-content">
                    <h1 class="how-rent-nepal-works-card-containers-card-content-head">
                        SEARCH LOCATION
                    </h1>
                    <p class="how-rent-nepal-works-card-containers-card-content-para">
                        Provide us with your location so that we can search the nearest shop or individual to you.
                    </p>
                </div>
            </div>
            <div class="how-rent-nepal-works-card-containers-card">
                <div class="how-rent-nepal-works-card-containers-card-image-container">
                    <img src="./img/howRentNepalWorks/atm-card-icon.svg" alt="">
                </div>
                <div class="how-rent-nepal-works-card-containers-card-content">
                    <h1 class="how-rent-nepal-works-card-containers-card-content-head">
                        SELECT DATE AND TIME
                    </h1>
                    <p class="how-rent-nepal-works-card-containers-card-content-para">
                        Select date and time according to your ease and convinience.
                    </p>
                </div>
            </div>
            <div class="how-rent-nepal-works-card-containers-card">
                <div class="how-rent-nepal-works-card-containers-card-image-container">
                    <img src="./img/howRentNepalWorks/briefcase-icon.svg" alt="">
                </div>
                <div class="how-rent-nepal-works-card-containers-card-content">
                    <h1 class="how-rent-nepal-works-card-containers-card-content-head">
                        RENT!
                    </h1>
                    <p class="how-rent-nepal-works-card-containers-card-content-para">
                        The final step is to finally rent it, the seller will deliver it to you and you can use it for the agreed time.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <h1 class="why-choose-us">
        Why should you choose rentNepal?
    </h1>
    <section class="why-you-should-choose-us">
        <div class="why-you-should-choose-us-image-container">
            <img src="./img/whypeoplechooseus.svg" alt="">
        </div>
        <div class="why-you-should-choose-us-content">
            <span class="why-you-should-choose-us-content-span">WHY YOU SHOULD CHOOSE RENT NEPAL</span>
            <h1 class="why-you-should-choose-us-content-head">WHY PEOPLE LOVE TO USE rentNepal</h1>
            <div class="why-you-should-choose-us-content-para">
                Proper Business solution for your developing business strategies and corporation
            </div>
            <div class="why-you-should-choose-us-content-list">
                <div class="why-you-should-choose-us-content-list-item">
                    <img src="./img/01.svg" alt="">
                    <p>
                        Proper Business solution for your developing business strategies and corporation
                    </p>
                </div>
                <div class="why-you-should-choose-us-content-list-item">
                    <img src="./img/02.svg" alt="">
                    <p>
                        Proper Business solution for your developing business strategies and corporation
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="trending-products">
        <div class="trending-products-top">
            <h1 class="trending-products-top-heading">TRENDING PRODUCTS</h1>
            <p class="trending-products-top-paragraph">See what is currently flooding the market with rentNepal!</p>
            <a href="./pages/browse_products.php" class="trending-products-top-link">Shop More!</a>
        </div>
        <div class="trending-products-card-container">
            <div class="navigations">
                <div class="prev navigation">&#8592;</div>
                <div class="next navigation">&#8594;</div>
            </div>
            <div class="trending-products-card-container-inner">
                <?php
                foreach ($trendingProducts as $product) {
                ?>
                    <div class="trending-products-card-container-inner-card">
                        <div class="trending-products-card-container-inner-card-content">
                            <h1 class="trending-products-card-container-inner-card-content-heading">
                                <?= $product['productname'] ?>
                            </h1>
                            <img src="./uploads/<?= $product['productimage'] ?>" alt="">
                            <div class="trending-products-card-container-inner-card-content-rent-now">
                                <span class="trending-products-card-container-inner-card-rent-now-span">
                                    From Rs. <?= $product['productprice'] ?>/day
                                </span> <br>
                                <span class="trending-products-card-container-inner-card-rent-now-span">
                                    Order Count: <?= $product['order_count'] ?>/day
                                </span>
                                <a href="/rentnepal/pages/browse_products.php" class="trending-products-card-container-inner-card-rent-now-link">
                                    BOOK NOW
                                </a>
                            </div>
                        </div>
                    </div>

                <?php
                }

                mysqli_close($conn);
                ?>

            </div>
    </section>
    <section class="trending-products trending-products-next">
        <div class="trending-products-top">
            <h1 class="trending-products-top-heading">BEST IN VALUE</h1>
            <p class="trending-products-top-paragraph">Explore the products with the best value in rentNepal!</p>
            <a href="./pages/browse_products.php" class="trending-products-top-link">Shop More!</a>
        </div>
        <div class="trending-products-card-container">
            <div class="navigations">
                <div class="prev navigation">&#8592;</div>
                <div class="next navigation">&#8594;</div>
            </div>
            <div class="trending-products-card-container-inner">
                <div class="trending-products-card-container-inner-card">
                    <div class="trending-products-card-container-inner-card-content">
                        <h1 class="trending-products-card-container-inner-card-content-heading">
                            Lamborghini Gellardo 1
                        </h1>
                        <img src="./img/slider.png" alt="">
                        <div class="trending-products-card-container-inner-card-content-rent-now">
                            <span class="trending-products-card-container-inner-card-rent-now-span">
                                From Rs. 800/day
                            </span>
                            <a href="#" class="trending-products-card-container-inner-card-rent-now-link">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
                <div class="trending-products-card-container-inner-card">
                    <div class="trending-products-card-container-inner-card-content">
                        <h1 class="trending-products-card-container-inner-card-content-heading">
                            Lamborghini Titan
                        </h1>
                        <img src="https://turbo.redq.io/wp-content/uploads/2023/06/Group-48095922-600x383.png" alt="">
                        <div class="trending-products-card-container-inner-card-content-rent-now">
                            <span class="trending-products-card-container-inner-card-rent-now-span">
                                From Rs. 800/day
                            </span>
                            <a href="#" class="trending-products-card-container-inner-card-rent-now-link">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
                <div class="trending-products-card-container-inner-card">
                    <div class="trending-products-card-container-inner-card-content">
                        <h1 class="trending-products-card-container-inner-card-content-heading">
                            Lamborghini Hyperion
                        </h1>
                        <img src="https://turbo.redq.io/wp-content/uploads/2023/06/Group-48095924-1-600x383.png" alt="">
                        <div class="trending-products-card-container-inner-card-content-rent-now">
                            <span class="trending-products-card-container-inner-card-rent-now-span">
                                From Rs. 800/day
                            </span>
                            <a href="#" class="trending-products-card-container-inner-card-rent-now-link">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
                <div class="trending-products-card-container-inner-card">
                    <div class="trending-products-card-container-inner-card-content">
                        <h1 class="trending-products-card-container-inner-card-content-heading">
                            Lamborghini Aventador
                        </h1>
                        <img src="https://turbo.redq.io/wp-content/uploads/2023/06/Group-48095929-600x382.png" alt="">
                        <div class="trending-products-card-container-inner-card-content-rent-now">
                            <span class="trending-products-card-container-inner-card-rent-now-span">
                                From Rs. 800/day
                            </span>
                            <a href="#" class="trending-products-card-container-inner-card-rent-now-link">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
                <div class="trending-products-card-container-inner-card">
                    <div class="trending-products-card-container-inner-card-content">
                        <h1 class="trending-products-card-container-inner-card-content-heading">
                            Lamborghini Huracan
                        </h1>
                        <img src="https://turbo.redq.io/wp-content/uploads/2023/06/Group-48095925-600x383.png" alt="">
                        <div class="trending-products-card-container-inner-card-content-rent-now">
                            <span class="trending-products-card-container-inner-card-rent-now-span">
                                From Rs. 800/day
                            </span>
                            <a href="#" class="trending-products-card-container-inner-card-rent-now-link">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
                <div class="trending-products-card-container-inner-card">
                    <div class="trending-products-card-container-inner-card-content">
                        <h1 class="trending-products-card-container-inner-card-content-heading">
                            Thundertrail Lightning X2
                        </h1>
                        <img src="https://turbo.redq.io/bike/wp-content/uploads/sites/8/2023/07/product-img-1-600x383.webp" alt="">
                        <div class="trending-products-card-container-inner-card-content-rent-now">
                            <span class="trending-products-card-container-inner-card-rent-now-span">
                                From Rs. 800/day
                            </span>
                            <a href="#" class="trending-products-card-container-inner-card-rent-now-link">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
                <div class="trending-products-card-container-inner-card">
                    <div class="trending-products-card-container-inner-card-content">
                        <h1 class="trending-products-card-container-inner-card-content-heading">
                            SwiftRide Zephyr 5000
                        </h1>
                        <img src="https://turbo.redq.io/bike/wp-content/uploads/sites/8/2023/07/product-img-4-600x383.webp" alt="">
                        <div class="trending-products-card-container-inner-card-content-rent-now">
                            <span class="trending-products-card-container-inner-card-rent-now-span">
                                From Rs. 800/day
                            </span>
                            <a href="#" class="trending-products-card-container-inner-card-rent-now-link">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
                <div class="trending-products-card-container-inner-card">
                    <div class="trending-products-card-container-inner-card-content">
                        <h1 class="trending-products-card-container-inner-card-content-heading">
                            The SCOTT Bike Foil RC Ultimate
                        </h1>
                        <img src="https://turbo.redq.io/bike/wp-content/uploads/sites/8/2023/07/product-img-5-600x383.webp" alt="">
                        <div class="trending-products-card-container-inner-card-content-rent-now">
                            <span class="trending-products-card-container-inner-card-rent-now-span">
                                From Rs. 800/day
                            </span>
                            <a href="#" class="trending-products-card-container-inner-card-rent-now-link">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
                <div class="trending-products-card-container-inner-card">
                    <div class="trending-products-card-container-inner-card-content">
                        <h1 class="trending-products-card-container-inner-card-content-heading">
                            Black by Vera Wang
                        </h1>
                        <img src="./img/coat2.png" alt="">
                        <div class="trending-products-card-container-inner-card-content-rent-now">
                            <span class="trending-products-card-container-inner-card-rent-now-span">
                                From Rs. 800/day
                            </span>
                            <a href="#" class="trending-products-card-container-inner-card-rent-now-link">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
                <div class="trending-products-card-container-inner-card">
                    <div class="trending-products-card-container-inner-card-content">
                        <h1 class="trending-products-card-container-inner-card-content-heading">
                            Calvin Klein Premium Tuxedo
                        </h1>
                        <img src="./img/coat.png" alt="">
                        <div class="trending-products-card-container-inner-card-content-rent-now">
                            <span class="trending-products-card-container-inner-card-rent-now-span">
                                From Rs. 800/day
                            </span>
                            <a href="#" class="trending-products-card-container-inner-card-rent-now-link">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
                <div class="trending-products-card-container-inner-card">
                    <div class="trending-products-card-container-inner-card-content">
                        <h1 class="trending-products-card-container-inner-card-content-heading">
                            Lamborghini Gellardo 11
                        </h1>
                        <img src="./img/slider.png" alt="">
                        <div class="trending-products-card-container-inner-card-content-rent-now">
                            <span class="trending-products-card-container-inner-card-rent-now-span">
                                From Rs. 800/day
                            </span>
                            <a href="#" class="trending-products-card-container-inner-card-rent-now-link">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
                <div class="trending-products-card-container-inner-card">
                    <div class="trending-products-card-container-inner-card-content">
                        <h1 class="trending-products-card-container-inner-card-content-heading">
                            Lamborghini Gellardo 12
                        </h1>
                        <img src="./img/slider.png" alt="">
                        <div class="trending-products-card-container-inner-card-content-rent-now">
                            <span class="trending-products-card-container-inner-card-rent-now-span">
                                From Rs. 800/day
                            </span>
                            <a href="#" class="trending-products-card-container-inner-card-rent-now-link">
                                BOOK NOW
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="what-clients-say-about-us">
        <div class="what-clients-say-about-us-top">
            <h1 class="what-clients-say-about-us-top-heading">
                What Clients Say About Us!
            </h1>
            <p class="what-clients-say-about-us-top-paragraph">
                See what our customers think about us!
            </p>
        </div>
        <div class="what-clients-say-about-us-cards-container">
            <div class="what-clients-say-about-us-cards-container-card">
                <div class="what-clients-say-about-us-cards-container-card-image">
                    <img src="https://xsgames.co/randomusers/assets/avatars/male/74.jpg" alt="">
                </div>
                <div class="what-clients-say-about-us-cards-container-card-content">
                    <h1 class="what-clients-say-about-us-cards-container-card-content-head">
                        Peter Colson, Customer
                    </h1>
                    <div class="stars-container">
                        &#9733; &#9733; &#9733; &#9733; &#9733;
                    </div>
                    <p class="what-clients-say-about-us-cards-container-card-content-para">
                        rentNepal is exactly what I've been looking for.
                    </p>
                </div>
            </div>
            <div class="what-clients-say-about-us-cards-container-card">
                <div class="what-clients-say-about-us-cards-container-card-image">
                    <img src="https://xsgames.co/randomusers/assets/avatars/male/75.jpg" alt="">
                </div>
                <div class="what-clients-say-about-us-cards-container-card-content">
                    <h1 class="what-clients-say-about-us-cards-container-card-content-head">
                        Clint Eastwood, Customer
                    </h1>
                    <div class="stars-container">
                        &#9733; &#9733; &#9733; &#9733;
                    </div>
                    <p class="what-clients-say-about-us-cards-container-card-content-para">
                        I love anything that I rent from rentNepal!
                    </p>
                </div>
            </div>
            <div class="what-clients-say-about-us-cards-container-card">
                <div class="what-clients-say-about-us-cards-container-card-image">
                    <img src="https://xsgames.co/randomusers/assets/avatars/female/45.jpg" alt="">
                </div>
                <div class="what-clients-say-about-us-cards-container-card-content">
                    <h1 class="what-clients-say-about-us-cards-container-card-content-head">
                        Ivan Flow, Customer
                    </h1>
                    <div class="stars-container">
                        &#9733; &#9733; &#9733; &#9733; &#9733;
                    </div>
                    <p class="what-clients-say-about-us-cards-container-card-content-para">
                        rentNepal is a game-changer. Instead of drowning in an endless chain of emails, there is clear and easy accountability meaning tasks actually get done!
                    </p>
                </div>
            </div>
            <div class="what-clients-say-about-us-cards-container-card">
                <div class="what-clients-say-about-us-cards-container-card-image">
                    <img src="https://xsgames.co/randomusers/assets/avatars/male/77.jpg" alt="">
                </div>
                <div class="what-clients-say-about-us-cards-container-card-content">
                    <h1 class="what-clients-say-about-us-cards-container-card-content-head">
                        Charles Patterson, Seller
                    </h1>
                    <div class="stars-container">
                        &#9733; &#9733; &#9733; &#9733; &#9733;
                    </div>
                    <p class="what-clients-say-about-us-cards-container-card-content-para">
                        With rentNepal, communication between all of us is far more efficient. A game changer.
                    </p>
                </div>
            </div>
        </div>
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
                <a href="./pages/contact.php" class="frequently-asked-questions-bottom-head">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
    <section class="need-helping-renting-online">
        <p>
            Need Help Renting Online? +977 9837181927
        </p>
    </section>
    <section class="footer-container">
        <div class="footer-container-rentnepal">
            <img class="footer-container-rentnepal-image" src="./img/logo.png" alt="">
            <p>A proper business solution to your day to day needs. </p>
            <div class="social-media">
                <a href="#">
                    <img src="./img/socialmedia/facebook.png" alt="">
                </a>
                <a href="#">
                    <img src="./img/socialmedia/instagram.png" alt="">
                </a>
                <a href="#">
                    <img src="./img/socialmedia/twitterx.png" alt="">
                </a>
            </div>
        </div>
        <div class="footer-container-columns">
            <div class="footer-container-columns-column">
                <h1 class="footer-container-columns-column-head">Insights</h1>
                <ul class="footer-container-columns-column-list">
                    <li class="footer-container-columns-column-list-item"><a href="./pages/insights/customercare.php" class="footer-container-columns-column-list-item-link">Support Centre</a></li>
                    <li class="footer-container-columns-column-list-item"><a href="./pages/insights/supportcentre.php" class="footer-container-columns-column-list-item-link">Customer Support</a></li>
                    <li class="footer-container-columns-column-list-item"><a href="./pages/about.php" class="footer-container-columns-column-list-item-link">About</a></li>
                </ul>
            </div>
            <div class="footer-container-columns-column">
                <h1 class="footer-container-columns-column-head">Products</h1>
                <ul class="footer-container-columns-column-list">
                    <li class="footer-container-columns-column-list-item"><a href="./pages/individual_listings.php" class="footer-container-columns-column-list-item-link">Browse Products</a></li>
                    <li class="footer-container-columns-column-list-item"><a href="./pages/explore_shops.php" class="footer-container-columns-column-list-item-link">Explore Shops</a></li>
                </ul>
            </div>
            <div class="footer-container-columns-column">
                <h1 class="footer-container-columns-column-head">Career</h1>
                <ul class="footer-container-columns-column-list">
                    <li class="footer-container-columns-column-list-item"><a href="./pages/tac.php" class="footer-container-columns-column-list-item-link">Terms and Conditions</a></li>
                    <li class="footer-container-columns-column-list-item"><a href="./pages/privacy.php" class="footer-container-columns-column-list-item-link">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-container-columns-column">
                <h1 class="footer-container-columns-column-head">Company</h1>
                <ul class="footer-container-columns-column-list">
                    <li class="footer-container-columns-column-list-item"><a href="./pages/insights/customercare.php" class="footer-container-columns-column-list-item-link">Browse Ads</a></li>
                    <li class="footer-container-columns-column-list-item"><a href="./pages/insights/supportcentre.php" class="footer-container-columns-column-list-item-link">Become a Partner</a></li>
                    <li class="footer-container-columns-column-list-item"><a href="./pages/about.php" class="footer-container-columns-column-list-item-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="copyright">
        Copyright © <span class="date"></span> rentNepal. All Rights Reserved.
    </section>
    <script src="./js/main.js"></script>
    <script src="./js/navbar.js"></script>
    <script src="./js/slider.js"></script>
    <script src="./js/carousel.js"></script>
    <script src="./js/accordion.js"></script>
</body>

</html>