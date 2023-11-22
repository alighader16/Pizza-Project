<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Check if the title is unique
    $checkTitleQuery = "SELECT * FROM menuitem WHERE Title = '$title'";
    $result = $conn->query($checkTitleQuery);

    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Error: Title must be unique.']);
        exit();
    }

    // Continue with adding the menu item
    $categoryId = $_POST['category'];

    // Create a directory if it doesn't exist
    $directoryPath = '../img/menu-items';
    if (!is_dir($directoryPath)) {
        mkdir($directoryPath, 0755, true);
    }

    // Handle image upload
    $imagePath = $directoryPath . '/' . $_FILES['image']['name'];

    if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
        $imagePath ='img/menu-items' . '/' . $_FILES['image']['name'];
        // Add menu item to the database
        $addMenuItemQuery = "INSERT INTO menuitem (Title, Description, IsActive, CategoryID, DefaultPrice, Discount, Rating, IsFeatured) VALUES ('$title', '$description', 1, '$categoryId', '{$_POST['small_price']}', 0, 0, 0)";

        if ($conn->query($addMenuItemQuery) === TRUE) {
            $menuItemId = $conn->insert_id;

            // Add image path to menuitemimage table
            $addImageQuery = "INSERT INTO menuitemimage (MenuItemID, Image) VALUES ('$menuItemId', '$imagePath')";

            if ($conn->query($addImageQuery) === TRUE) {

                // Add ingredients to menuitem_ingredient_has table
                if (isset($_POST['ingredients']) && is_array($_POST['ingredients'])) {
                    foreach ($_POST['ingredients'] as $ingredientId) {
                        $addIngredientQuery = "INSERT INTO menuitem_ingredient_has (MenuItemID, IngredientID) VALUES ('$menuItemId', '$ingredientId')";
                        $conn->query($addIngredientQuery);
                    }
                }

                // Add variants to the variant table
                if (isset($_POST['variants']) && is_array($_POST['variants'])) {
                    foreach ($_POST['variants'] as $variant) {
                        $variantTitle = ucfirst($variant); // Assuming the variant title is the same as the value
                        $variantPrice = isset($_POST[$variant . '_price']) ? $_POST[$variant . '_price'] : null;

                        $addVariantQuery = "INSERT INTO variant (Title, Price, MenuItemID) VALUES ('$variantTitle', '$variantPrice', '$menuItemId')";
                        $conn->query($addVariantQuery);
                    }
                }

                echo json_encode(['status' => 'success', 'message' => 'Menu item added successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error adding image to the database: ' . $conn->error]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error adding menu item to the database: ' . $conn->error]);
        }
        
        // Close the database connection
        $conn->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error: Failed to move uploaded file.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: Invalid request method.']);
}
?>
