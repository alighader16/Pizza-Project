<?php
require 'connection.php';
$CID = $_POST['CID'];
$name = $_POST['name'];

if ($name === '' || $name === null) {
    echo 'Name cannot be empty';
} else {
    $query = $conn->prepare('SELECT COUNT(*) as row_count FROM category WHERE Name = ?');
    $query->bind_param('s', $name);
    $query->execute();
    $result = $query->get_result();

    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row['row_count']; 

        if ($count === 0) {
            $update = $conn->prepare('UPDATE category SET Name = ? WHERE CategoryID = ?');
            $update->bind_param('si', $name, $CID);
            $update->execute();

            echo 'success';
        } else {
            // Name already exists
            echo 'Name already exists, cannot be added';
        }
    } else {
        echo 'Query failed';
    }
}
?>
