<?php
   session_start();
require 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $rememberMe = isset($_POST['remember']) && $_POST['remember'] === 'yes' ? true : false;

    $query1 = $conn->prepare('Select * from customer where username=?');
    $query1->bind_param('s', $username);
    $query1->execute();
    $result1 = $query1->get_result();
    
    if ($result1->num_rows === 1) {
        $row = $result1->fetch_assoc();
        $hashedpassword = $row['password'];

        if (password_verify($password, $hashedpassword)) {
         
            $_SESSION['username'] = $username;
            
            if ($rememberMe) {
                $expiration = time() + 30 * 24 * 60 * 60; 
                setcookie("username", $username, $expiration, "/");
            }

            echo 'success';
        } else {
            echo 'Incorrect Password';
        }
    } else {
        echo "Username not found";
    }
}
?>
