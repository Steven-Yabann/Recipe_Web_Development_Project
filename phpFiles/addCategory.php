<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include_once "dbconnection.php";

    // Retrieve category name from the form submission
    $categoryName = $_POST["categoryName"];

    // Insert category name into the database
    $sql = "INSERT INTO categories (categoryName) VALUES (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$categoryName]);

    // Check if the insertion was successful
    if ($stmt->rowCount() > 0) {
        echo "Category added successfully.";
        header("Location: ..\htmlFiles\index.html");
    } else {
        echo "Error: Failed to add category.";
    }
} else {
    // Redirect back to the add category form if accessed directly
    header("Location: add_category_form.html");
    exit;
}
