<?php
// Include your database connection file and ensure session is started
require '../phpFiles/dbconnection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if userID is set in session
if (isset($_SESSION['username'])) {
    $userName = $_SESSION['username'];
} else {
    header("Location: ../htmlFiles/login.php");
    exit;
}

// Check if recipe ID is provided in the URL
if (isset($_GET['id'])) {
    $recipeId = $_GET['id'];
    
    $query = $pdo->prepare('SELECT * FROM recipes WHERE recipeId = ? AND recipeOwner = ?');
    $query->execute([$recipeId, $userName]);
    $recipe = $query->fetch(PDO::FETCH_ASSOC);

    if (!$recipe) {
        echo "Recipe not found or you don't have permission to edit this recipe.";
        exit;
    }
} else {
    echo "No recipe ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe: <?php echo htmlspecialchars($recipe['recipeName']); ?></title>
    <link rel="stylesheet" href="../cssSheets/editRecipeStyles.css">
</head>
<body>
    <?php include 'headerSection.php'; ?>

    <div class="container">
        <h1>Edit Recipe: <?php echo htmlspecialchars($recipe['recipeName']); ?></h1>
        <form action="../phpFiles/updateRecipe.php" method="POST" id="editForm">
            <input type="hidden" name="recipeId" value="<?php echo htmlspecialchars($recipe['recipeId']); ?>">
            
            <label for="recipeName">Recipe Name:</label>
            <input type="text" id="recipeName" name="recipeName" value="<?php echo htmlspecialchars($recipe['recipeName']); ?>"><br><br>

            <label for="categoryName">Category:</label>
            <input type="text" id="categoryName" name="categoryName" value="<?php echo htmlspecialchars($recipe['categoryName']); ?>"><br><br>

            <label for="ingredients">Ingredients:</label><br>
            <textarea id="ingredients" name="ingredients" rows="5"><?php echo htmlspecialchars($recipe['ingredients']); ?></textarea><br><br>

            <label for="cookingSteps">Cooking Steps:</label><br>
            <textarea id="cookingSteps" name="cookingSteps" rows="10"><?php echo htmlspecialchars($recipe['cookingSteps']); ?></textarea><br><br>

            <input type="submit" value="Update Recipe">
        </form>
    </div>

    <?php include 'footerSection.php'; ?>
</body>
</html>
