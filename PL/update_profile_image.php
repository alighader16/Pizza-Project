<?php
require 'connection.php';

session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    if (isset($_FILES['profileImage']) && !empty($_FILES['profileImage']['name'])) {
        $uploadDirectory = 'uploads/';
        $tempFile = $_FILES['profileImage']['tmp_name'];
        $targetFile = $uploadDirectory . basename($_FILES['profileImage']['name']);

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageFileType, $allowedExtensions)) {
            if (move_uploaded_file($tempFile, $targetFile)) {
                $storage = 'uploads/' . basename($_FILES['profileImage']['name']);

                
                $sql = "UPDATE customer SET image = ? WHERE username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ss', $storage, $username);
                if ($stmt->execute()) {
                    echo 'success';
                } else {
                    echo 'Error updating profile picture in the database.';
                }
            } else {
                echo 'Error uploading the file.';
            }
        } else {
            echo 'Invalid file format. Allowed formats: ' . implode(', ', $allowedExtensions);
        }
    } else {
        echo 'Profile image file not provided.';
    }
} else {
    echo 'User not logged in.';
}
?>
