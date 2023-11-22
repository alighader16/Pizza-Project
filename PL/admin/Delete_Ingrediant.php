<?php
require 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Ingrediant_ID = $_POST['Ingrediant_ID'];

    $query = "SELECT COUNT(*) AS row_count FROM menuitem_ingredient_has WHERE IngredientID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $Ingrediant_ID); 

    $stmt->execute();
    $stmt->bind_result($rowCount);

    $stmt->fetch();

    $stmt->close();

    if ($rowCount != 0) {
        echo 'This Ingredient is used in some menu items';
    } else {
        // Delete the ingredient since it's not used in any menu items
        $deleteQuery = "DELETE FROM ingredient WHERE IngredientID = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $Ingrediant_ID);

        // Execute the deletion statement
        $deleteStmt->execute();

        // Close the deletion statement
        $deleteStmt->close();

        echo 'success';
}
}
?>
