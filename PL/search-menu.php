<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include __DIR__ . '/../DAL/Repository/MenuItemRepository.php';

    $searchInput = isset($_POST["search-input"]) ? $_POST["search-input"] : '';
    $sortOption = isset($_POST["sort"]) ? $_POST["sort"] : 'None';
    $excludeOption = isset($_POST["exclude"]) ? $_POST["exclude"] : 'None';
    $categoryOption = isset($_POST["category"]) ? $_POST["category"] : 'All';

    $sql = "SELECT m.*, i.Image
            FROM menuitem m
            INNER JOIN menuitemimage i ON m.MenuItemID = i.MenuItemID
            WHERE m.IsActive = 1";

    if ($categoryOption !== 'All') {
        $sql .= " AND m.CategoryID IN (SELECT CategoryID FROM category WHERE Name = '$categoryOption') ";
    }

    // Add conditions based on form input
    if ($searchInput !== '') {
        $sql .= " AND (m.Title LIKE '%$searchInput%' OR m.Description LIKE '%$searchInput%') ";
    }

    
    if ($excludeOption !== 'None') {
        // Modify the query to exclude menu items having the specified ingredient
        $sql .= " AND m.MenuItemID NOT IN (
                    SELECT mh.MenuItemId
                    FROM menuitem_ingredient_has mh
                    INNER JOIN ingredient ing ON mh.IngredientID = ing.IngredientID
                    WHERE ing.Name = '$excludeOption'
                )";
    }

    if ($sortOption !== 'None') {
        if ($sortOption === 'priceASC') {
            $sql .= " ORDER BY m.DefaultPrice ASC";
        } elseif ($sortOption === 'priceDesc') {
            $sql .= " ORDER BY m.DefaultPrice DESC";
        } elseif ($sortOption === 'rating') {
            $sql .= " ORDER BY m.Rating DESC";
        }
    }


    // Get menu items
    $menu_items = getMenuItems($sql);

    // Check if there are results
    if (count($menu_items) > 0) {
        // Encode the array as JSON and send it to the client
        echo json_encode($menu_items);
    } else {
        // If no results, send an empty JSON array
        echo json_encode([]);
    }
}
?>