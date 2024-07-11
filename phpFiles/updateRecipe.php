<?php

require 'dbconnection.php';

// Handle form submission for updating the recipe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $recipeId = htmlspecialchars($_POST['recipeId']);
    $recipeName = htmlspecialchars($_POST['recipeName']);
    $categoryName = htmlspecialchars($_POST['categoryName']);
    $ingredients = htmlspecialchars($_POST['ingredients']);
    $cookingSteps = htmlspecialchars($_POST['cookingSteps']);

    
    $updateQuery = $pdo->prepare('UPDATE recipes SET recipeName = ?, categoryName = ?, ingredients = ?, cookingSteps = ? WHERE recipeId = ?');
    $success = $updateQuery->execute([
        $recipeName,
        $categoryName,
        $ingredients,
        $cookingSteps,
        $recipeId
    ]);

    if ($success) {
        header("Location: ../htmlFiles/viewRecipe.php?id=$recipeId");
        exit;
    } else {
        echo "Error updating recipe. Please try again.";
        
    }
} else {
    header("Location: ../htmlFiles/editRecipe.php?id=$recipeId");
    exit;
}
?>
