<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentnepal";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error Connection" . $conn->connect_error);
}