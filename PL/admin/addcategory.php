<?php
require 'connection.php';

$Name = $_POST['categoryName'];

$query = $conn->prepare("INSERT INTO category (Name, IsActive) VALUES (?, 1)");
$query->bind_param('s', $Name);

try {
    if ($query->execute()) {
        echo 'unique';
    } else {
        echo 'The category name you entered must be unique. It can be an existing or deleted category.';
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() === 1062) {
        echo 'The category name you entered must be unique. It can be an existing or deleted category.';
    } else {
        echo 'An unexpected error occurred.';
    }
}
?>
