<?php

function getIngredients()
{
    global $conn;
    $query = "SELECT * FROM ingredient;";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        return array();
    }

    $ingredients = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $ingredient = new Ingredient();
        $ingredient->name = ($row['Name']);
        $ingredient->ingredient_id = ($row['IngredientID']);
        $ingredient->added_price = ($row['AddedPrice']);
        $ingredients[] = $ingredient;
    }

    mysqli_free_result($result);

    return $ingredients;
}


function getIngredientById($id)
{
    $query = "SELECT * FROM ingredient WHERE IngredientID = ? ;";
    global $conn;
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) { {
            $ingredient = new Ingredient();
            $ingredient->ingredient_id = ($row['IngredientID']);
            $ingredient->name = ($row['Name']);
            $ingredient->added_price = ($row['added_price']);

            return $ingredient;
        }
    }
}

function getIngredientsOfMenuItem($MenuItem)
{
    global $conn;
    $query = "SELECT * FROM menuitem_ingredient_has  j
    INNER JOIN ingredient i ON i.IngredientID = j.IngredientID 
    WHERE j.MenuItemId = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $MenuItem->menuitem_id);
    $stmt->execute();

    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $MenuItem->ingredients[] = $row["Name"];
    }

    mysqli_free_result($result);

    return $MenuItem;
}
?>