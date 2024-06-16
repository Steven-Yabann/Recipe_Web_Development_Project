<?php
$serverName = "localhost:3307";
$dbUserName = "root";
$dbPassword = "";
$dbName = "recipeDatabase";

// Create connection
$conn = new mysqli($serverName, $dbUserName, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch categories from the database
$sql = "SELECT categoryName FROM categories";
$result = $conn->query($sql);
$categories = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
} 
else {
    $categories = null;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\cssSheets\loginPageStyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Add Recipe</title>
</head>
<body background="..\photos\Green wallpaper.jpg">
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
                if ($categories) {
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
</body>
</html>
