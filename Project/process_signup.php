<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $plainPassword = $_POST['password']; 
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $Address = $_POST['Address'];
    $birthdate = $_POST['birthdate'];

    // Check if an image file is provided
    if (isset($_FILES['profilePhoto']) && !empty($_FILES['profilePhoto']['name'])) {
        $uploadDirectory = 'uploads/';
        
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        $tempFile = $_FILES['profilePhoto']['tmp_name'];
        $targetFile = $uploadDirectory . basename($_FILES['profilePhoto']['name']);

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageFileType, $allowedExtensions)) {
            if (move_uploaded_file($tempFile, $targetFile)) {
                $imageSource = 'uploads/' . basename($_FILES['profilePhoto']['name']);
            } else {
                echo "Error uploading the file.";
                exit;
            }
        } else {
            echo "Invalid file format. Allowed formats: " . implode(', ', $allowedExtensions);
            exit;
        }
    } else {
        // If no image file is provided, set a default image source
        $imageSource = 'uploads/user.png';
    }

    $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

    $sql = "INSERT INTO customer (username, image, name, password, email, phone, Address, birthdate) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssss', $username, $imageSource, $name, $hashedPassword, $email, $phone, $Address, $birthdate);
    $stmt->execute();

    echo "Success";
}
?>
