<?php
include("../conn/conn.php");
include("../conn/session.php");

function getProducts($categoryFilter = null, $searchTerm = null)
{
    global $conn;

    $productSql = "SELECT * FROM product";
    if ($categoryFilter) {
        $productSql .= " INNER JOIN category ON product.categoryid = category.categoryid WHERE category.categoryname = '$categoryFilter'";
    }
    if ($searchTerm) {
        if ($categoryFilter) {
            $productSql .= " AND";
        } else {
            $productSql .= " WHERE";
        }
        $productSql .= " productname LIKE '%$searchTerm%'";
    }

    return mysqli_query($conn, $productSql);
}

function getCategories()
{
    global $conn;

    $categorySql = "SELECT * FROM category";
    return mysqli_query($conn, $categorySql);
}

$categoryFilter = isset($_GET['sort']) ? $_GET['sort'] : null;
$searchTerm = isset($_GET['search']) ? $_GET['search'] : null;

$productResult = getProducts($categoryFilter, $searchTerm);
$categories = getCategories();


function isProductBooked($productId)
{
    global $conn;

    $ordersSql = "SELECT * FROM orders WHERE productid = $productId";
    $ordersResult = mysqli_query($conn, $ordersSql);

    return mysqli_num_rows($ordersResult) > 0;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Products</title>
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
                <li class="navbar-nav-list-item active"><a href="./browse_products.php" class="navbar-nav-list-item-link">BROWSE PRODUCTS</a></li>
                <li class="navbar-nav-list-item"><a href="./explore_shops.php" class="navbar-nav-list-item-link">EXPLORE SHOPS</a></li>
                <li class="navbar-nav-list-item"><a href="./about.php" class="navbar-nav-list-item-link">ABOUT</a></li>
                <li class="navbar-nav-list-item"><a href="./faq.php" class="navbar-nav-list-item-link">FAQ</a></li>
                <li class="navbar-nav-list-item"><a href="./contact.php" class="navbar-nav-list-item-link">CONTACT US</a></li>
            </ul>
            <div class="navbar-nav-search-button">
                <img src="../img/search.png" alt="" class="navbar-nav-search-button-image">
            </div>
            <div class="navbar-nav-login-button">
                <a href="/rentnepal/pages/profile.php">View Profile</a>
            </div>
        </nav>
        <!-- <div class="navbar-container-full-screen-search-bar">
            <input type="text" class="navbar-container-full-screen-search-bar-input">
            <img src="../img/search.png" alt="" class="navbar-container-full-screen-search-bar-image">
        </div> -->
    </section>
    <section class="main-content">
        <div class="main-content-sidebar">
            <h1 class="main-content-sidebar-head">FILTER</h1>
            <div class="main-content-sidebar-search">
                <div class="main-content-sidebar-search-head">Quick Search</div>
                <form action="" method="GET">
                    <input type="text" placeholder="Search Product" class="main-content-sidebar-search-input" name="search" value="<?= $searchTerm ?>">
                    <input type="hidden" name="sort" value="<?= $categoryFilter ?>">
                    <input type="submit" value="Search">
                </form>
            </div>
            <div class="main-content-sidebar-categories">
                <h1 class="main-content-sidebar-categories-head">Sort by Category</h1>
                <ul class="main-content-sidebar-categories-list">
                    <?php
                    while ($row = mysqli_fetch_assoc($categories)) {
                    ?>
                        <li class="main-content-sidebar-categories-list-item">
                            <a href="?sort=<?= $row['categoryname'] ?>"><?= ucfirst($row['categoryname']) ?></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <section class="browse-products">
            <div class="browse-products-top">
                <h1 class="browse-products-top-heading">
                    <?php
                    if (isset($_GET['sort'])) {
                        echo "CATEGORY: " . strtoupper($_GET['sort']);
                    } else {
                        echo "ALL PRODUCTS";
                    }
                    ?>
                </h1>
                <p class="browse-products-top-paragraph">See what is currently flooding the market with rentNepal!</p>
                <a href="./browse_products.html" class="browse-products-top-link">Shop More!</a>
            </div>
            <div class="browse-products-card-container">
                <div class="browse-products-card-container-inner">
                    <?php
                    if ($productResult) {
                        if (mysqli_num_rows($productResult) > 0) {
                            while ($row = mysqli_fetch_assoc($productResult)) {
                                $isBooked = isProductBooked($row['productid']);
                    ?>
                                <div class="browse-products-card-container-inner-card">
                                    <div class="browse-products-card-container-inner-card-content">
                                        <h1 class="browse-products-card-container-inner-card-content-heading">
                                            <?= $row['productname'] ?>
                                        </h1>
                                        <img src="../uploads/<?= $row['productimage'] ?>" alt="">
                                        <div class="browse-products-card-container-inner-card-content-rent-now">
                                            <span class="browse-products-card-container-inner-card-rent-now-span">
                                                From Rs. <?= $row['productprice'] ?>/day
                                            </span>
                                            <?php if ($isBooked) { ?>
                                                <a class="browse-products-card-container-inner-card-rent-now-link" style="pointer-events: none; opacity: 0.7;">Booked</a>
                                            <?php } else { ?>
                                                <a class="browse-products-card-container-inner-card-rent-now-link" onclick="bookProduct(<?= $row['productid'] ?>)">BOOK NOW</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {
                            echo "No product found.";
                        }
                    } else {
                        echo "Error fetching products: " . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </section>
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
    <section class="copyright">
        Copyright © <span class="date"></span> rentNepal. All Rights Reserved.
    </section>
    <script src="../js/navbar.js"></script>
    <!-- <script src="../js/search.js"></script> -->
    <script>
    function bookProduct(productId) {
        var confirmed = confirm("Are you sure you want to book this product?");

        if (confirmed) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "book_product.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert("Product booked successfully!");
                        location.reload();
                    } else {
                        alert("Failed to book the product: " + response.message);
                    }
                }
            };
            xhr.send("product_id=" + productId);
        }
    }
</script>

</body>

</html>