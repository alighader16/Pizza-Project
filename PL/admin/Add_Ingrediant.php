<?php
require 'connection.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Assuming you have form data, replace these with your actual form field names
        $ingredientName = $_POST['Ingrediant_Name'];

        // Your SQL query (corrected syntax)
        $sql = "INSERT INTO ingredient (Name) VALUES (?)";

        // Using prepared statement to avoid SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $ingredientName);
        
        // Execute the statement
        $stmt->execute();
        echo "success";
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        // Duplicate entry error
        echo "Error: Ingredient with the same name already exists!";
    } else {
        // Other database-related errors
        echo 'An unexpected error occurred.';
    }
}
?>
