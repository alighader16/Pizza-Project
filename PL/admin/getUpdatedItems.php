<?php
require 'connection.php';
require 'admin_functions.php';
$menuItems = getMenuItems(); 

if ($menuItems) {
    foreach ($menuItems as $menuItem) {
        echo '<tr>';
        echo '<td>' . $menuItem['Name'] . '</td>';
        echo '<td>';
        echo '<a href="edit_menuitem.php?id=' . $menuItem['MenuItemID'] . '" class="btn btn-secondary">Edit</a>';
        echo '<a href="delete_menuitem.php?id=' . $menuItem['MenuItemID'] . '" class="btn btn-danger">Delete</a>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="2">No menu items found</td></tr>';
}
?>
