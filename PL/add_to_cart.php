<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemName = $_POST['name'];
    $defaultPrice = $_POST['defaultPrice'];
    $imageLink = $_POST['imageLink'];
    $variantName = $_POST['variantName'];
    $quantity = $_POST['quantity'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $itemExists = false;

    foreach ($_SESSION['cart'] as $cartItem) {
        if (
            $cartItem['name'] === $itemName &&
            $cartItem['defaultPrice'] === $defaultPrice &&
            $cartItem['imageLink'] === $imageLink &&
            $cartItem['variantName'] === $variantName &&
            $cartItem['quantity'] === $quantity
        ) {
            $itemExists = true;
            break;
        }
    }

    if ($itemExists) {
        echo 'error'; 
    } else {
        $cartItem = array(
            'name' => $itemName,
            'defaultPrice' => $defaultPrice,
            'imageLink' => $imageLink,
            'variantName' => $variantName,
            'quantity' => $quantity
        );

        $_SESSION['cart'][] = $cartItem;

        echo 'success';
    }
} else {
    echo 'error';
}
?>
