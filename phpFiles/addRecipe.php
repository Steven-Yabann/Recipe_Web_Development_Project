<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$userName = isset($_SESSION['username']) ? $_SESSION['username'] : null;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include_once "dbconnection.php";

    // Retrieve form data
    $recipeName = $_POST["recipeName"];
    $recipeOwner = $userName;
    $ingredients = $_POST["ingredients"];
    $cookingSteps = $_POST["cookingSteps"];
    $category = $_POST["category"];

    echo $recipeName. "\n";
    echo $recipeOwner. "\n";
    echo $ingredients. "\n";
    echo $cookingSteps. "\n";
    echo $category. "\n";

    // File upload handling for recipe image
    $targetDir = "recipeImages/"; // Directory where uploaded images will be stored
    $recipeImage = $targetDir . basename($_FILES["recipeImage"]["name"]);

    // Check if a file is uploaded
    if (!empty($_FILES["recipeImage"]["tmp_name"]) && is_uploaded_file($_FILES["recipeImage"]["tmp_name"])) {
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["recipeImage"]["tmp_name"], $recipeImage)) {
            //Check if username exists
            $checkSQL = "SELECT username FROM users where username = ?";
            $checkstmt = $pdo-> prepare($checkSQL);
            $checkstmt-> execute([$recipeOwner]);
            $user = $checkstmt->fetch(PDO::FETCH_ASSOC);

            if($user){
                // Insert recipe data into the database
                $sql = "INSERT INTO recipes (recipeName, recipeOwner, ingredients, cookingSteps, recipeImage, categoryName) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$recipeName, $recipeOwner, $ingredients, $cookingSteps, $recipeImage, $category]);
                
                // Check if the insertion was successful
                if ($stmt->rowCount() > 0) {
                    echo "Recipe added successfully.";
                    header("location: ..\htmlFiles\index.php");
                } else {
                    echo "Error: Failed to add recipe.";
                }
            }
            else{
                echo"Error: No Username found!";
            }
        }else{
        die("Error: Failed to upload file.");
    }
    } else {
        die("Error: No file uploaded.");
    }
    
} else {
    // Redirect back to the add recipe form if accessed directly
    header("Location: ..\htmlFiles\index.php");
    exit;
}
?>
