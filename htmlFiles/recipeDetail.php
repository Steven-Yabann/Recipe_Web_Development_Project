<?php
require '../phpFiles/dbconnection.php';

if (isset($_GET['id'])) {
    $recipeId = $_GET['id'];
    $query = $pdo->prepare('SELECT * FROM recipes WHERE recipeId = :recipeId');
    $query->execute(['recipeId' => $recipeId]);
    $recipe = $query->fetch(PDO::FETCH_ASSOC);

    if ($recipe) {
        $recipeName = $recipe['recipeName'];
        $recipeOwner = $recipe['recipeOwner'];
        $ingredients = $recipe['ingredients'];
        $cookingSteps = $recipe['cookingSteps'];
        $recipeImage = $recipe['recipeImage'];
        $categoryName = $recipe['categoryName'];
    } else {
        echo "Recipe not found!";
        exit;
    }
} else {
    echo "No recipe ID provided!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\cssSheets\recipeDetailsCssSheet.css">
    <link rel="stylesheet" href="..\cssSheets\headerSection.css">
    <link rel="stylesheet" href="..\cssSheets\footerSection.css">
    <title><?php echo htmlspecialchars($recipeName); ?></title>
</head>
<body>
    <?php include 'headerSection.php';?>

    <section class="recipeDetailSection">
        <h1><?php echo $recipeName; ?></h1>
        <div class="recipeDetailContainer">
            <img src="../phpFiles/<?php echo $recipeImage; ?>" alt="<?php echo $recipeName; ?>" class="recipeDetailImage">
            <div class="recipeDetailInfo">
                <h2>Recipe Owner: <?php echo $recipeOwner; ?></h2>
                <h3>Category: <?php echo $categoryName; ?></h3>
                <h3>Ingredients:</h3>
                <ul class="ingredientsList">
                    <?php 
                    $ingredientsArray = explode("\n", $ingredients);
                    foreach ($ingredientsArray as $ingredient) {
                        echo "<li>" . $ingredient . "</li>";
                    }
                    ?>
                </ul>
                <h3>Cooking Steps:</h3>
                <ol class="cookingStepsList">
                    <?php 
                    $stepsArray = explode("\n", $cookingSteps);
                    foreach ($stepsArray as $step) {
                        echo "<li>" . $step . "</li>";
                    }
                    ?>
                </ol>
            </div>
        </div>
    </section>

    <?php include 'footerSection.php';?>
</body>
</html>
