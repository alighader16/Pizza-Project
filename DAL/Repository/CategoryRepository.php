<?php 

include __DIR__."/../config.php";
include __DIR__."/../Models/MenuItem.php";
include __DIR__."/../Models/Ingredient.php";
include __DIR__."/../Models/Variant.php";
include __DIR__."/../Repository/IngredientRepository.php";
include __DIR__."/../Repository/VariantRepository.php";
include __DIR__."/../Models/Category.php";

function getCategories($query){
    global $conn;
    $result = mysqli_query($conn, $query);

    if (!$result) {
        return array();
    }

    $categories = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $category = new Category();
        $category->name = ($row['Name']);
        $category->menuitem_id = ($row['CategoryID']);
        $category->is_active = ($row['IsActive']);  
        $categories[] = $category;
    }

    mysqli_free_result($result);

    return $categories;
}
// get all menu items
function getActiveCategories()
{
    $query = "SELECT * FROM Category WHERE IsActive = 1";
    return getCategories($query);
}


function getDeletedCategories()
{
    $query = "SELECT * FROM Category WHERE IsActive = 0";
    return getCategories($query);
}



?>