<?php
require 'connection.php';
$ID=$_POST['ID'];

$updateQuery = "UPDATE menuitem SET IsActive = 0 WHERE MenuItemID = ?";


$stmt = $conn->prepare($updateQuery);


$stmt->bind_param('i', $ID); 

if ($stmt->execute()) {
    echo "success";
} else {
    echo "Error updating record: " . $stmt->error;
}



?>