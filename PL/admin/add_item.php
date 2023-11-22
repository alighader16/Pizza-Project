
<?php
require 'connection.php';
require 'admin_functions.php';
$categories = getCategories();
$ingredients = getIngredients();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add item Page</title>
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
        <form id="addItemForm" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="title" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select class="form-select" name="category" id="category" required>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['Name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" name="image" id="image" required>
            </div>

            <div class="mb-3">
                <label>Available Ingredients:</label><br>
                <?php foreach ($ingredients as $ingredient) { ?>
                    <input type="checkbox" name="ingredients[]" value="<?php echo $ingredient['IngredientID']; ?>">
                    <?php echo $ingredient['Name']; ?><br>
                <?php } ?>
            </div>

            <div class="mb-3">
                <label>Variants:</label><br>
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="variants[]" value="small" id="variantSmall" data-price-input="small_price">
                    <label class="form-check-label" for="variantSmall">Small</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" name="small_price" placeholder="Price" disabled>
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="variants[]" value="medium" id="variantMedium" data-price-input="medium_price">
                    <label class="form-check-label" for="variantMedium">Medium</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" name="medium_price" placeholder="Price" disabled>
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="variants[]" value="large" id="variantLarge" data-price-input="large_price">
                    <label class="form-check-label" for="variantLarge">Large</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" name="large_price" placeholder="Price" disabled>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="alert alert-danger hide" id="form-error" role="alert"></div>
        <div class="alert alert-success hide" id="success" role="alert"></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#addItemForm').submit(function(event) {
                event.preventDefault()
                if (!$('#addItemForm')[0].checkValidity()) {
                    event.preventDefault();
                    $('#form-error').removeClass('hide').text('Please fill in all required fields.');
                } else {
                    // Perform AJAX request to Handle_addition.php
                    let formData = new FormData(this);
                    $.ajax({
                        url: 'Handle_addition.php',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            alert('success')
                            // Redirect to PL/admin/test.php
                            window.location.href = 'admin.php';

                        }
                    });
                }
            });

            $('[name="variants[]"]').change(function() {
                var priceInput = $('[name="' + $(this).data('price-input') + '"]');
                priceInput.prop('disabled', !$(this).prop('checked'));
            });
        });
    </script>
</body>
</html>
