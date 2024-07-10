<?php
// Include your database connection file and ensure session is started
require '../phpFiles/dbconnection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if userID is set in session
if (isset($_SESSION['username'])) {
    $userName = $_SESSION['username'];

    // Query to fetch recipes owned by the logged-in user
    $query = $pdo->prepare('SELECT * FROM recipes WHERE recipeOwner = ?');
    $query->execute([$userName]);
    $recipes = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Redirect to login if userID is not set
    header("Location: ../htmlFiles/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Recipes</title>
    <link rel="stylesheet" href="../cssSheets/viewRecipeStyles.css">
</head>
<body>
    <?php include 'headerSection.php'; ?>

    <div class="container">
        <div class="headlineSector">
            <div id="headline">
                <div class="headlineText">
                    <h1>My Recipes</h1>
                    <h3>Welcome, <?php echo htmlspecialchars($userName); ?>!</h3>
                </div>
                <div class="headlineImage">
                </div>
            </div>
        </div>

        <div class="recipes-list">
            <?php foreach ($recipes as $recipe): ?>
                <div class="recipe-item">
                    <h2><?php echo htmlspecialchars($recipe['recipeName']); ?></h2>
                    <div class="links">
                        <a href="viewRecipe.php?id=<?php echo $recipe['recipeId']; ?>" class="view-link">View Recipe</a>
                        <a href="editRecipe.php?id=<?php echo $recipe['recipeId']; ?>" class="edit-link">Edit Recipe</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include 'footerSection.php'; ?>
</body>
</html>
