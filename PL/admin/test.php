
<?php
require 'connection.php';
require 'admin_functions.php';
$categories = getCategories();
$menuItems= getMenuItems();
$ingredients = getIngredients();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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
    <h1 class="text-center">Admin Page - Pizza Palace</h1>
    <div class="container">

        <h2>Categories</h2>
        <table id="categoriesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                    <tr>
                        <td><?php echo $category['Name']; ?></td>
                        <td>
                            <a href="edit_category.php?id=<?php echo $category['CategoryID'];?>"  data-name="<?php echo $category['Name']; ?>" class="btn btn-secondary editCategory" data-id="<?php echo $category['CategoryID']; ?>">Edit</a>
                            <a href="delete_category.php?id=<?php echo $category['CategoryID']; ?>" class="btn btn-danger deleteCategory" data-id="<?php echo $category['CategoryID']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="text-center add_action">
            <input type="text" id="newCategory" placeholder="New Category Name">
            <button class="btn add-button" id="addCategoryBtn">Add New Category</button>
        </div>
        <div class="alert alert-danger hide" id='error' role="alert">
            
        </div>
        <div class="alert alert-danger hide" id='delete-error' role="alert">
            
        </div>
      

      <div class="modal" id="editCategoryModal" tabindex="-1">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm">
                    <div class="mb-3">
                        <label for="categoryID" class="form-label">Category ID:</label>
                        <input type="text" class="form-control" name="CID" id="categoryID" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="newCategoryName" class="form-label">New Category Name:</label>
                        <input type="text" class="form-control" name="name" id="newCategoryName">
                    </div>
                    <button id="submitEditCategory" class="btn btn-primary">Submit</button>
                </form>
                <div class="alert alert-danger hide" id='form-error' role="alert">
        
                 </div>
                <div class="alert alert-success hide" id='success' role="alert">
                    Category updated successfully!
                </div>
            </div>
        </div>
    </div>
</div>










        
        <h2>All Menu Items</h2>
    <table class="table table-bordered table-striped" id="items">
        <thead>
            <tr>
               
                <th>Item Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menuItems as $item) { ?>
                <tr>
                    
                    <td><?php echo $item['Title']; ?></td>
                    <td>
                        <a href="edit_item.php?id=<?php echo $item['MenuItemID']; ?>" class="btn btn-secondary">Edit</a>
                        <a href="delete_item.php?id=<?php echo $item['MenuItemID']; ?>" class="btn btn-danger deletedItems" data-id="<?php echo $item['MenuItemID']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="text-center add_action">
        <a href="add_item.php" class="btn add-button">
            <i class="fas fa-plus"></i> Add New Item
        </a>
    </div>



    
 <h2>Ingredients</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Ingredient Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="Ingredients_table">
                <?php foreach ($ingredients as $ingredient) { ?>
                    <tr>
                        <td><?php echo $ingredient['Name']; ?></td>
                        <td>
                            <a class="btn btn-secondary Edit_Ingrediant_button"  ingredient-name="<?php echo $ingredient['Name']; ?>" ingrediant_id="<?php echo $ingredient['IngredientID']?>">Edit</a>
                            <a class="btn btn-danger Delete_Ingrediant_button" ingrediant_id="<?php echo $ingredient['IngredientID']?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="text-center add_action">
            <input type="text" id="newIngrediant" placeholder="New Ingrediant Name">
            <button class="btn add-button" id="add_Ingrediant_button">Add New Ingrediant</button>
        </div>
        <div class="alert alert-danger hide" id='error_ingrediant' role="alert">
            
        </div>
        <div class="alert alert-danger hide" id='delete-error' role="alert">
            
        </div>
        
        <div class="modal" id="editIngredientModal" tabindex="-1">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Ingredient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editIngredientForm">
                    <div class="mb-3">
                        <label for="categoryID" class="form-label">Ingredient ID:</label>
                        <input type="text" class="form-control" name="IngredientID" id="IngredientID" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="newCategoryName" class="form-label">New Ingredient Name:</label>
                        <input type="text" class="form-control" name="edited_ingredient_name" id="new_Ingredient_Name">
                    </div>
                    <button id="submitEditCategory" class="btn btn-primary">Submit</button>
                </form>
                <div class="alert alert-danger hide" id='ingredient-form-error' role="alert">
        
                 </div>
                <div class="alert alert-success hide" id='edit-success' role="alert">
                    Ingredient updated successfully!
                </div>
            </div>
        </div>





</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
$(document).ready(function() {
    // Add Category Code
    $('#addCategoryBtn').click(function() {
        const newCategoryName = $('#newCategory').val();
        if ($('#newCategory').val() === "") {
            $('#error').removeClass('hide').addClass('show').text('Please Enter a category name');
            return;
        }
        $('#error').removeClass('show').addClass('hide').text('');

        $.ajax({
            url: 'addcategory.php',
            method: 'POST',
            data: { categoryName: newCategoryName },
            success: function(response) {
                if (response === 'unique') {
                    console.log('success');
                    
                    $.ajax({
                        url: 'getUpdatedCategories.php',
                        method: 'GET',
                        success: function(updatedCategories) {
                            $('#categoriesTable tbody').html(updatedCategories);
                        },
                        error: function(xhr, status, error) {
                            console.log("Error: " + error);
                        }
                    });
                    location.reload()
                } else {
                    $('#error').removeClass('hide').addClass('show').text(response);
                }
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        });
    });
//Edit Category Code
$('.editCategory').click(function(e) {
    e.preventDefault();
    
    let currentName = $(this).attr('data-name');
    let CID = $(this).attr('data-id');

    $('#categoryID').val(CID);
    $('#newCategoryName').val(currentName);

    $("#editCategoryModal").modal('show');

    $('#editCategoryForm').submit(function(event) {
        event.preventDefault();

        let newName = $('#newCategoryName').val();

        if (newName === currentName || newName.trim() === '') {
            $('#form-error').text("Please provide a different non-empty name");
            $('#form-error').addClass('show').removeClass('hide');
        } else {
            $('#form-error').addClass('hide').removeClass('show');
            let formData = $(this).serialize();

            $.ajax({
                url: 'edit_category.php',
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response === 'success') {
                        $('#success').show()
                        $.ajax({
                            url: 'getUpdatedCategories.php',
                            method: 'GET',
                            success: function(updatedCategories) {
                                $('#categoriesTable tbody').html(updatedCategories);
                            },
                            error: function(xhr, status, error) {
                                console.log("Error: " + error);
                            }
                        });
                        $("#editCategoryModal").modal('hide');
                        location.reload()

                    } else {
                        $('#form-error').text(response);
                        $('#form-error').addClass('show').removeClass('hide');
                    }
                }
            });
        }
    });
});
//Delete Category
$('.deleteCategory').click(function(event){
event.preventDefault()
let CID=$(this).attr('data-id')
$.ajax({
    url:'deletecategory.php',
    method:'POST',
    data:{'CID':CID},
    success:function(response){
        if(response==='success'){
            $('#delete-error').removeClass('show')
            $('#delete-error').addClass('hide')
            $('#delete-error').text('')
            console.log(response)
            $.ajax({
                 url: 'getUpdatedCategories.php',
                 method: 'GET',
                 success: function(updatedCategories) {
                 $('#categoriesTable tbody').html(updatedCategories);
                            },
                            error: function(xhr, status, error) {
                                console.log("Error: " + error);
                            }
                        });
                        location.reload()
        }
        else{
            $('#delete-error').removeClass('hide')
            $('#delete-error').addClass('show')
            $('#delete-error').text(response)

            //failed to delete
        }
    }

})
})
//End


//Update Ingredients
function update_ingredients(){
    $.ajax({
        url: 'admin_functions.php',
        method: 'GET',
        data: { action: 'update_Ingrediants'},
        success: function(data) {   
            console.log(data); 
            $('#Ingredients_table').empty();
            $('#Ingredients_table').append(data); 
            $("#newIngrediant").val("");
        },         
        error: function(xhr, status, error) {
            console.log("Error: " + error);
        }
    });
}
// Add Ingrediant
$('#add_Ingrediant_button').click(function(){
    let new_ingrediant_name=$("#newIngrediant").val();
    //In case the name input is empty
    if ( new_ingrediant_name === "") {
        $('#error_ingrediant').removeClass('hide').addClass('show').text('Please Enter an Ingrediant name');
        return;
    }
    $('#error_ingrediant').removeClass('show').addClass('hide').text('');

    $.ajax({
            url: 'Add_Ingrediant.php',
            method: 'POST',
            data: { Ingrediant_Name: new_ingrediant_name },
            success: function(response) {
                if (response === 'success') {
                    update_ingredients();
                } else {
                    $('#error_ingrediant').removeClass('hide').addClass('show').text(response);
                }
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        });
})
//Delete Ingrediant
$(document).on("click", ".Delete_Ingrediant_button", function() {
    let Ingrediant_ID = $(this).attr('ingrediant_id');
    $.ajax({
        url: 'Delete_Ingrediant.php',
        method: 'POST',
        data: { Ingrediant_ID: Ingrediant_ID },
        success: function(response) {
            if (response === 'success') {
                update_ingredients();
            } else {
                $('#error_ingrediant').removeClass('hide').addClass('show').text(response);
                console.log("Error: " + response);
            }
        },
        error: function(xhr, status, error) {
            console.log("Error: " + error);
        }
    });
});

//Edit Ingrediant
let current_name;
$(document).on("click", ".Edit_Ingrediant_button", function() {
    current_name = $(this).attr('ingredient-name');
    let id = $(this).attr('ingrediant_id');

    $('#IngredientID').val(id);
    $('#new_Ingredient_Name').val(current_name);

   $("#editIngredientModal").modal('show');   
})
    $('#editIngredientForm').submit(function(event){
        event.preventDefault();
        
        let newName = $('#new_Ingredient_Name').val();
        console.log(newName);
        if (newName.trim() === '') {
            $('#ingredient-form-error').text("Please provide a different non-empty name");
            $('#ingredient-form-error').addClass('show').removeClass('hide');
        }
        else if(newName === current_name){
            $('#ingredient-form-error').text("Please provide a different name");
            $('#ingredient-form-error').addClass('show').removeClass('hide');
        }
        else {
            $('#ingredient-form-error').addClass('hide').removeClass('show');
            let formData = $(this).serialize();
            $.ajax({
                url: 'Edit_Ingrediant.php',
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response === 'success') {
                        $('#edit-success').show()
                        update_ingredients();
                        $("#editIngredientModal").modal('hide');
                        $('#edit-success').hide();
                    } else {

                        $('#ingredient-form-error').text(response);
                        $('#ingredient-form-error').addClass('show').removeClass('hide');

                    }
                }
            });
        }
    })
//Menu Items


    $('.deletedItems').click(function(event){
        event.preventDefault()
        let ID=$(this).attr('data-id')
        console.log(ID);
        $.ajax({
            url:'remove_item.php',
            method:'POST',
            data:{'ID':ID},
            success:function(response){
                if(response==='success'){

                    $.ajax({
                        url: 'getUpdatedItems.php',
                        method: 'GET',
                        success: function(updatedItems) {
                            $('#items tbody').html(updatedItems);
                        },
                        error: function(xhr, status, error) {
                            console.log("Error: " + error);
                        }
                    });
                    location.reload()





                    
                }
                
                


            }


        })
    })
});














    


</script>
</body>
</html>
