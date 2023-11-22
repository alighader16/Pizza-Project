<?php
require 'connection.php';
$CID = $_POST['CID'];
$query = $conn->prepare('SELECT COUNT(*) as row_count FROM menuitem WHERE CategoryID = ?');
$query->bind_param('s', $CID);
$query->execute();
$result = $query->get_result();


$row = $result->fetch_assoc();
$count = $row['row_count'];
if($count!=0){
    echo 'This Category is used in some menuitems';
}
else{
            $update = $conn->prepare('UPDATE category SET IsActive = 0 WHERE CategoryID = ?');
            $update->bind_param('s', $CID);
            $update->execute();

            echo 'success';
}



?>