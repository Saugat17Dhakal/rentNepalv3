<?php
include("../conn/conn.php");
include("../conn/session.php");

function bookProduct($productId, $userId)
{
    global $conn;

    $insertOrderSql = "INSERT INTO orders (productid, userid) VALUES ($productId, $userId)";
    $updateProductSql = "UPDATE product SET order_count = order_count + 1 WHERE productid = $productId";

    mysqli_query($conn, $insertOrderSql);
    mysqli_query($conn, $updateProductSql);
}

function isProductBooked($productId)
{
    global $conn;

    $ordersSql = "SELECT * FROM orders WHERE productid = $productId";
    $ordersResult = mysqli_query($conn, $ordersSql);

    return mysqli_num_rows($ordersResult) > 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'];
    $userId = $_SESSION['userid'];

    if (!isProductBooked($productId)) {
        bookProduct($productId, $userId);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Product is already booked.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
