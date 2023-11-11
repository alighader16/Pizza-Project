
<?php 
    $servername = "localhost";
    $username="root";
    $password="";
    $database = "pizzadb";
    $conn = new mysqli($servername, $username, $password, $database);
    if($conn === NULL){
        die("Connection failed: ". $conn->connect_error);
    }else{
    }
?>