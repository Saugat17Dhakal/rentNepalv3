<?php
include("../conn/conn.php");
include("../conn/session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rentNepal - Profile</title>
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
                <li class="navbar-nav-list-item"><a href="./contact.php" class="navbar-nav-list-item-link">CONTACT US</a></li>
            </ul>
            <div class="navbar-nav-search-button">
                <img src="../img/search.png" alt="" class="navbar-nav-search-button-image">
            </div>
            <div class="navbar-nav-login-button">
                <a href="/pages/profile.html">View Profile</a>
            </div>
        </nav>
        <!-- <div class="navbar-container-full-screen-search-bar">
            <input type="text" class="navbar-container-full-screen-search-bar-input">
            <img src="../img/search.png" alt="" class="navbar-container-full-screen-search-bar-image">
        </div> -->
    </section>
    <section class="profile-main-content">
        <div class="profile-main-content-profile">
            <?php
            $userId = $_SESSION['userid'];
            $sql = "SELECT * FROM users WHERE userid = $userId;";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <h1 class="profile-main-content-profile-head">Personal Information</h1>
                    <span class="profile-main-content-profile-name">Name: <?= $row['username'] ?></span>
                    <span class="profile-main-content-profile-email">Email: <?= $row['useremail'] ?></span>
                    <span class="profile-main-content-profile-age">Age: 17</span>
                    <span class="profile-main-content-profile-location">Location: Sanobharyang, Swayambhunath, Kathmandu </span>
            <?php
                }

                if (mysqli_num_rows($result) == 0) {
                    echo "<span class='text-error' style='font-size: 2rem; margin: 0 1rem; text-align: center;'>No User Available For Now <br> Add Some!</span>";
                }
            } else {
                echo "<p>Error querying database: " . $conn->error . "</p>";
            }
            ?>
        </div>

        <style>
            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0, 0, 0);
                background-color: rgba(0, 0, 0, 0.4);
                padding-top: 60px;
            }

            .modal-content {
                background-color: #fefefe;
                margin: 5% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
            }

            .modal-content form {
                display: flex;
                flex-direction: column;
                align-items: center;
                row-gap: 15px;
            }

            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }
        </style>



        <!-- Add this button where you want it on your page -->
        <button onclick="openUploadModal()">Upload Item</button>

        <!-- The modal -->
        <div id="uploadModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeUploadModal()">&times;</span>
                <h2>Upload Product for Rent</h2>
                <form action="upload_product.php" method="post" enctype="multipart/form-data">
                    <label for="itemName">Item Name:</label>
                    <input type="text" id="productName" name="productName" required>

                    <label for="itemPrice">Item Price:</label>
                    <input type="number" id="productPrice" name="productPrice" required>

                    <label for="itemImage">Item Image:</label>
                    <input type="file" id="productImage" name="productImage" accept="image/*" required>

                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>

        <script>
            function openUploadModal() {
                document.getElementById('uploadModal').style.display = 'block';
            }

            function closeUploadModal() {
                document.getElementById('uploadModal').style.display = 'none';
            }
        </script>






        <div class="profile-main-content-orders">
            <h1 class="profile-main-content-orders-head">Your Orders</h1>
            <main>
                <?php
                $userId = $_SESSION['userid'];
                $sql = "SELECT orders.ordersid, product.productname, product.productimage, product.productprice
            FROM orders
            INNER JOIN product ON orders.productid = product.productid
            WHERE orders.userid = $userId";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                            <div class="profile-main-content-orders-order">
                                <div class="profile-main-content-orders-order-card active" id="cars">
                                    <div class="profile-main-content-orders-order-card-content">
                                        <h1 class="profile-main-content-orders-order-card-content-heading">
                                            <?= $row['productname'] ?>
                                        </h1>
                                        <img src="../uploads/<?= $row['productimage'] ?>" alt="">
                                        <div class="profile-main-content-orders-order-card-content-rent-now">
                                            <span class="profile-main-content-orders-order-card-rent-now-span">
                                                From Rs. <?= $row['productprice'] ?>/day
                                            </span>
                                            <a class="profile-main-content-orders-order-card-rent-now-link" onclick="cancelOrder(<?= $row['ordersid'] ?>)">
                                                CANCEL NOW
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    } else {
                        echo "No orders found.";
                    }
                } else {
                    echo "Error fetching orders: " . mysqli_error($conn);
                }
                mysqli_close($conn);
                ?>
            </main>

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
                    <li class="footer-container-columns-column-list-item"><a href="/pages/contact.html" class="footer-container-columns-column-list-item-link">Support Centre</a></li>
                    <li class="footer-container-columns-column-list-item"><a href="/pages/contact.html" class="footer-container-columns-column-list-item-link">Customer Support</a></li>
                    <li class="footer-container-columns-column-list-item"><a href="/pages/about.html" class="footer-container-columns-column-list-item-link">About</a></li>
                </ul>
            </div>
            <div class="footer-container-columns-column">
                <h1 class="footer-container-columns-column-head">Products</h1>
                <ul class="footer-container-columns-column-list">
                    <li class="footer-container-columns-column-list-item"><a href="/pages/browse_products.html" class="footer-container-columns-column-list-item-link">Browse Products</a></li>
                    <li class="footer-container-columns-column-list-item"><a href="/pages/explore_shops.html" class="footer-container-columns-column-list-item-link">Explore Shops</a></li>
                </ul>
            </div>
            <div class="footer-container-columns-column">
                <h1 class="footer-container-columns-column-head">Career</h1>
                <ul class="footer-container-columns-column-list">
                    <li class="footer-container-columns-column-list-item"><a href="/pages/tac.html" class="footer-container-columns-column-list-item-link">Terms and Conditions</a></li>
                    <li class="footer-container-columns-column-list-item"><a href="/pages/privacy.html" class="footer-container-columns-column-list-item-link">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-container-columns-column">
                <h1 class="footer-container-columns-column-head">Company</h1>
                <ul class="footer-container-columns-column-list">
                    <li class="footer-container-columns-column-list-item"><a href="/pages/insights/customercare.html" class="footer-container-columns-column-list-item-link">Browse Ads</a></li>
                    <li class="footer-container-columns-column-list-item"><a href="/pages/insights/supportcentre.html" class="footer-container-columns-column-list-item-link">Become a Partner</a></li>
                    <li class="footer-container-columns-column-list-item"><a href="/pages/about.html" class="footer-container-columns-column-list-item-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="copyright">
        Copyright © <span class="date"></span> rentNepal. All Rights Reserved.
    </section>
    <script src="../js/navbar.js"></script>
    <!-- <script src="../js/profile.js"></script> -->
    <script>
        function cancelOrder(orderId) {
            console.log(orderId);
            var confirmed = confirm("Are you sure you want to cancel this order?");

            if (confirmed) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "cancel_product.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert("Order cancelled successfully!");
                            location.reload();
                        } else {
                            alert("Failed to cancel the order: " + response.message);
                        }
                    }
                };
                xhr.send("order_id=" + orderId);
            }
        }
    </script>

</body>

</html>