<?php
include("../conn/conn.php");
include("../conn/session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userid'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];

    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($_FILES["productImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["productImage"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["productImage"]["size"] > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO product (productname, productprice, productimage, categoryid, order_count)
                    VALUES ('$productName', '$productPrice', '" . basename($_FILES["productImage"]["name"]) . "', 1, 0)";
            if (mysqli_query($conn, $sql)) {
                echo "Product uploaded successfully.";
            } else {
                echo "Error uploading Product: " . mysqli_error($conn);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "Invalid request.";
}
?>
