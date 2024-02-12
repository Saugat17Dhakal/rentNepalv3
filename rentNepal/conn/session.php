<?php
session_start();

if (!isset($_SESSION['userid'])) {
    header("Location: /rentnepal/pages/login.php");
    exit();
}

// Logout logic
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: /rentnepal/pages/login.php");
    exit();
}