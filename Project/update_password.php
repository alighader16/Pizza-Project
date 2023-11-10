<?php
require 'connection.php';
session_start();
$username=$_SESSION['username'];
$oldpassword=$_POST['old_password'];
$currentpassword=$_POST['current-password'];
$newpassword=$_POST['new-password'];

if(password_verify($currentpassword, $oldpassword)){
    $hashedpassword=password_hash($newpassword, PASSWORD_DEFAULT);
    $query=$conn->prepare('Update Customer set password=? where username=?');
    $query->bind_param('ss',$hashedpassword,$username);
    $query->execute();
    echo 'success';
}
else{
    echo 'The password you entered is incorrect';
    exit;
}