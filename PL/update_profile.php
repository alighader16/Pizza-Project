<?php
session_start();
require 'connection.php';

$newuser=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$main_user=$_SESSION['username'];
$update=$conn->prepare("UPDATE customer
SET username = ?, 
    email = ?, 
    phone = ?, 
    Address = ?
WHERE username = ?;
");
$update->bind_param('sssss',$newuser,$email,$phone,$address,$main_user);
if($update->execute()){
$_SESSION['username']=$newuser;
echo 'success';}
else 
echo 'Please choose a unique email or username';
