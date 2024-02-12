<?php
include("../conn/conn.php");
include("../conn/session.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['order_id'];

    $deleteOrderSql = "DELETE FROM orders WHERE ordersid = $orderId";
    $deleteOrderResult = mysqli_query($conn, $deleteOrderSql);

    if ($deleteOrderResult) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error deleting order.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
