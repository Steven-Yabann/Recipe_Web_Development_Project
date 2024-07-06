<?php
require "../phpFiles/dbconnection.php";

$sql = "SELECT * FROM categories";
$stmt = $pdo -> prepare($sql);
$stmt -> execute();


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\cssSheets\formDetails.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="..\cssSheets\headerSection.css">
    <link rel="stylesheet" href="..\cssSheets\footerSection.css">
    <title>Add Recipe</title>
</head>
<body background="..\photos\Green wallpaper.jpg">
    <?php include 'headerSection.php';?>
    <div id="Form"> 
        <form action="..\phpFiles\addRecipe.php" method="post" enctype="multipart/form-data">
            <img id="logoImg" src="..\photos\Premium Vector _ Spoon fork and plate vector icon symbol illustration restaurant logo design.jpeg" alt="Chef's Work Logo">
            <h1>Add Recipe</h1>
            <label for="recipeName">Recipe Name:</label>
            <input type="text" id="recipeName" name="recipeName" placeholder="Recipe Name" required>
            
            <label for="recipeOwner">Recipe Owner Username</label>
            <input type="text" name="recipeOwner" id="recipeOwner" placeholder="Recipe Owner Name" required>
            
            <label for="ingredients">Ingredients:</label>
            <textarea id="ingredients" name="ingredients" placeholder="Ingredients" required></textarea>
            
            <label for="cookingSteps">Cooking procedure</label>
            <textarea name="cookingSteps" id="cookingSteps" placeholder="Cooking steps" required></textarea>
            
            <label for="recipeImage">Recipe Image:</label>
            <input type="file" id="recipeImage" name="recipeImage" accept="image/*">
            
            <label for="category">Category:</label>
            <select id="category" name="category">
                <?php
                if ($stmt -> rowCount() > 0) {
                    $categories = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                    print_r($categories);
                    foreach ($categories as $category) {
                        echo '<option value="' . htmlspecialchars($category['categoryName']) . '">' . htmlspecialchars($category['categoryName']) . '</option>';
                    }
                } else {
                    echo '<option value="">No categories found</option>';
                }
                ?>
                <option value="Rice">Rice</option>
            </select>
            <input type="submit" value="Add Recipe">
        </form>
    </div>
    <?php include 'footerSection.php';  ?>
</body>
</html>
