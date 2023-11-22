<?php
require 'connection.php';
require 'admin_functions.php';
$categories = getCategories(); 

if ($categories) {
    foreach ($categories as $category) {
        echo '<tr>';
        echo '<td>' . $category['Name'] . '</td>';
        echo '<td>';
        echo '<a href="edit_category.php?id=' . $category['CategoryID'] . '" class="btn btn-secondary">Edit</a>';
        echo '<a href="delete_category.php?id=' . $category['CategoryID'] . '" class="btn btn-danger">Delete</a>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="2">No categories found</td></tr>';
}
?>
