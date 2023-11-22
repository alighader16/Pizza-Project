<?php
require 'connection.php';
require 'admin_functions.php';
$ID=$_GET['id'];

$items = getItems($ID);
$categories = getCategories();
$ingredients = getIngredients();



?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit item Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .alert{
            margin-top:10px;
            margin-bottom:10px;   
        }
        body {
            background-color: #fffbf6;
            background-image: url("../img/background.jpg");
        }
        .container {
            padding: 50px;
        }
       
        .add-button {
            background-color: #FF5733;
            color: white;
            border: none;
        }
        .add-button:hover {
            background-color: #E2492E;
        }
        .hide{
            display:none;
        }
        .show{
            display:block;
        }
        th{
            background-color: #ff9100 !important;
            color: white !important;
            font-size: 1.2rem;
        }
        td{
            background-color: white !important;
        }

        table, th, td {
            border: 2px solid #194648 !important; /* Set the color and width of the outside border */
        }
         h1{
            background-color: #ff9100;
            color: white;
            padding: 10px;
            font-weight: bold;
            line-height: 1.2;
            border-radius: 80px;
            width: 80%;
            margin: auto;
            margin-top: 50px;
         }
         .container h2{
            text-align:center;
            margin-bottom: 20px;
         }
         .add_action{
            margin-bottom:50px;
            display: flex;
            justify-content: center;
         }
         input[type="text"]{
            border-radius: 6px;
            padding: 4px;
            margin-right: 30px;
         }
         .add-button{
            background-color: #ff9100;
            color:white;
            font-weight: bold;
         }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit/Add Menu Item</h2>
        <form id="editItemForm">
            <!-- Add your form elements for title, description, price, discount, etc. -->
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <!-- Add other form elements -->

            <!-- Category dropdown -->
            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select class="form-select" name="category" id="category">
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['Name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Image upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <!-- Checkboxes for available ingredients -->
            <div class="mb-3">
                <label>Available Ingredients:</label><br>
                <?php foreach ($ingredients as $ingredient) { ?>
                    <input type="checkbox" name="ingredients[]" value="<?php echo $ingredient['IngredientID']; ?>">
                    <?php echo $ingredient['Name']; ?><br>
                <?php } ?>
            </div>

<!-- Checkboxes for fixed variants -->
<!-- Checkboxes for fixed variants -->
<div class="mb-3">
    <label>Variants:</label><br>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="variants[]" value="small" id="variantSmall">
        <label class="form-check-label" for="variantSmall">
            Small
        </label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="text" class="form-control" name="small_price" placeholder="Price">
        </div>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="variants[]" value="medium" id="variantMedium">
        <label class="form-check-label" for="variantMedium">
            Medium
        </label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="text" class="form-control" name="medium_price" placeholder="Price">
        </div>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="variants[]" value="large" id="variantLarge">
        <label class="form-check-label" for="variantLarge">
            Large
        </label>
        <div class="input-group">
            <span class="input-group-text">$</span>
            <input type="text" class="form-control" name="large_price" placeholder="Price">
        </div>
    </div>
</div>

            <!-- Add other form elements -->

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="alert alert-danger hide" id="form-error" role="alert"></div>
        <div class="alert alert-success hide" id="success" role="alert"></div>
    </div>

    <!-- Add your scripts, including jQuery and your custom script -->
    <script>
$(document).ready(function() {
    $('#editItemForm').submit(function(event) {
        event.preventDefault();
        // Add your form submission logic using AJAX
    });
});
</script>

</body>
</html>
