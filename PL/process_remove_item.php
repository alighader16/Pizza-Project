<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];

    // if(!isset($_SESSION['username'])){
    //     header("Location:login.php");
    //     exit();
    // }

    // Check if the index is valid
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);

        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>