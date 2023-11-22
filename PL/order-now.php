<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }

    $orderDetails = $_POST['orderDetails'];
    $cartItems = $_POST['cartItems'];
    $test = $_SESSION['username'];

    try {
        $orderRef = $orderDetails['orderRef'];
        $totalPrice = $orderDetails['finalPrice'];
        $address = $orderDetails['address'];
        $phone = $orderDetails['phone'];
        $username = $_SESSION['username'];

        // Start a transaction
        $conn->begin_transaction();

        // Insert order details into CustomerOrder table
        $insertOrder = $conn->prepare("INSERT INTO CustomerOrder (OrderRef, TotalPrice, Address, PhoneNumber, CustomerID) VALUES (?, ?, ?, ?, (SELECT ID FROM customer WHERE username = ?))");
        $insertOrder->bind_param("sdssi", $orderDetails['orderRef'], $orderDetails['finalPrice'], $orderDetails['address'], $orderDetails['phone'], $_SESSION['username']);
        $insertOrder->execute();

        // Get the last inserted CustomerOrderId
        $customerOrderId = $conn->insert_id;

        // Insert each cart item into CustomerOrderItem table
        $insertItem = $conn->prepare("INSERT INTO CustomerOrderItem (Name, UnitPrice, Quantity, CustomerOrderId) VALUES (?, ?, ?, ?)");

        foreach ($cartItems as $item) {
            $insertItem->bind_param("sddi", $item['name'], $item['unitPrice'], $item['quantity'], $customerOrderId);
            $insertItem->execute();
        }

        // Commit the transaction
        $conn->commit();

        $insertOrder->close();
        $insertItem->close();

        $conn->close();

        echo 'success';
    } catch (Exception $e) {
        // An error occurred, rollback the transaction
        $conn->rollback();

        // Handle or log the exception
        http_response_code(500);
        echo 'Internal Server Error';
    }
} else {
    http_response_code(400);
    echo 'Bad Request';
}
?>