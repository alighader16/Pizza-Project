<?php

$hostname = "localhost";     
$username = "root"; 
$password = "";
$database = "pizzadb";      

$conn = new mysqli($hostname, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>