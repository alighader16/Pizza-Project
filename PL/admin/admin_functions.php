<?php
require 'connection.php';
function getVariants() {
    global $conn;
    $sql = "SELECT * FROM variant";
    $result = $conn->query($sql);

    $variants = [];
    while ($row = $result->fetch_assoc()) {
        $variants[] = $row;
    }
    
   
    return $variants;
}
function getCategories() {
    global $conn;
$sql = "SELECT CategoryID, Name FROM category where IsActive=1";
    $result = $conn->query($sql);

    $categories = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
    } else {
       
    }
    return $categories;
}
//function 


function getMenuItems() {
    global $conn;
    $sql = "SELECT * FROM menuitem where IsActive=1";
    $result = $conn->query($sql);

    $menuItems = [];
    while ($row = $result->fetch_assoc()) {
        $menuItems[] = $row;
    }
    
   
    return $menuItems;
}


function getIngredients() {
    global $conn;
    $sql = "SELECT IngredientID, Name FROM ingredient";
    $result = $conn->query($sql);

    $ingredients = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ingredients[] = $row;
        }
    } else {
        echo "0 results";
    }

    
    return $ingredients;
}

if (isset($_GET['action']) && $_GET['action'] == 'update_Ingrediants') {
    $Ingrediants = getIngredients();
    
    foreach ($Ingrediants as $Ingredient) {
        echo "<tr>";
        echo "<td>" . $Ingredient['Name'] . "</td>";
        echo '<td>
        <a class="btn btn-secondary Edit_Ingrediant_button" ingredient-name ="'.$Ingredient['Name'].'"ingrediant_id="' . $Ingredient['IngredientID'] . '">Edit</a>
        <a class="btn btn-danger Delete_Ingrediant_button" ingrediant_id="' . $Ingredient['IngredientID'] . '">Delete</a>';
        echo "</tr>";
    }
}   
?>

