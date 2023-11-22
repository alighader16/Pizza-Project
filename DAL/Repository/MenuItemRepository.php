<?php
include __DIR__ . "/../config.php";
include __DIR__ . "/../Models/MenuItem.php";
include __DIR__ . "/../Models/Ingredient.php";
include __DIR__ . "/../Models/Variant.php";
include __DIR__ . "/../Repository/IngredientRepository.php";
include __DIR__ . "/../Repository/VariantRepository.php";

function getMenuItems($query)
{
    global $conn;
    $result = mysqli_query($conn, $query); //this is line 12

    if (!$result) {
        return array();
    }

    $menu_items = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $menu_item = new MenuItem();
        $menu_item->title = ($row['Title']);
        $menu_item->menuitem_id = ($row['MenuItemID']);
        $menu_item->default_price = ($row['DefaultPrice']);
        $menu_item->description = ($row['Description']);
        $menu_item->discount = ($row['Discount']);
        $menu_item->rating = ($row['Rating']);
        $menu_item->is_active = ($row['IsActive']);
        $menu_item->is_featured = ($row['IsFeatured']);
        $menu_item->image = ($row['Image']);
        $menu_item = getIngredientsOfMenuItem($menu_item);
        $menu_item = getVariantsOfMenuItem($menu_item);
        $menu_item->query = ($query);
        $menu_items[] = $menu_item;
    }

    mysqli_free_result($result);

    return $menu_items;
}
function getActiveMenuItems()
{
    $query = "SELECT * FROM menuitem m 
    INNER JOIN menuitemimage i 
    ON m.MenuItemID = i.MenuItemID 
    WHERE m.IsActive = 1 ;";
    return getMenuItems($query);
}


function getDeletedMenuItems()
{
    $query = "SELECT * FROM menuitem m 
    INNER JOIN menuitemimage i 
    ON m.MenuItemID = i.MenuItemID 
    WHERE m.IsActive = 0 ;";
    return getMenuItems($query);
}



function getFeaturedMenuItems()
{
    $query = "SELECT * FROM menuitem m 
    INNER JOIN menuitemimage i 
    ON m.MenuItemID = i.MenuItemID 
    WHERE m.IsActive = 1 
    AND m.IsFeatured = 1 
    LIMIT 3;";
    return getMenuItems($query);
}


function getMenuItemsByCategory($category, $name)
{
    $query = "SELECT * FROM menuitem m 
    INNER JOIN menuitemimage i ON m.MenuItemID = i.MenuItemID 
    INNER JOIN category c ON c.Name = '$category' AND m.Title != '$name'
    WHERE m.IsActive = 1 
    LIMIT 3;";
    return getMenuItems($query);
}

function getMenuItemById($id)
{
    $query = "SELECT m.*, c.Name AS CategoryName, i.Image
    FROM MenuItem m
    INNER JOIN Category c ON c.CategoryID = m.CategoryID 
    INNER JOIN MenuItemImage i ON m.MenuItemID = i.MenuItemID
    WHERE m.MenuItemID = ? ;";
    global $conn;
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id); //line 79
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result) {
        die("Error executing SQL query: " . $stmt->error);
    }
    while ($row = $result->fetch_assoc()) { {
            $menu_item = new MenuItem();
            $menu_item->title = ($row['Title']);
            $menu_item->menuitem_id = ($row['MenuItemID']);
            $menu_item->default_price = ($row['DefaultPrice']);
            $menu_item->description = ($row['Description']);
            $menu_item->discount = ($row['Discount']);
            $menu_item->rating = ($row['Rating']);
            $menu_item->category = ($row["CategoryName"]);
            $menu_item->image = ($row['Image']);
            $menu_item = getIngredientsOfMenuItem($menu_item);
            $menu_item = getVariantsOfMenuItem($menu_item);
            return $menu_item;
        }
    }

}

if (isset($_GET['action'])) {
    $menuService = new MenuItemService();
    if ($_GET['action'] === 'getMenuItems') {
        $menuService->getActiveMenuItems();
        header('Content-Type: application/json');
        echo json_encode($menuItems);
    }
}



?>