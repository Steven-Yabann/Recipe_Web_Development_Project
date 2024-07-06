<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $userName = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    $userCategory = isset($_SESSION['userCategory']) ? $_SESSION['userCategory'] : null;
    $userPfp = isset($_SESSION['userpfp']) ? $_SESSION['userpfp'] : null;
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\cssSheets\headerSection.css">
    <title>Recipe Page</title>
</head>
<body>
    <section id="home" class="navBarSection">
        <div class="navBar">
            <a href="index.php">
                <img id="NavImg" src="..\photos\Premium Vector _ Spoon fork and plate vector icon symbol illustration restaurant logo design.jpeg" alt="Chef's Work Logo">
            </a>
            <h4 class="heading">Chef's Work</h4>
            <ul class="navLinks">
                <li><a href="index.php#recipes">Recipes</a></li>
                <li><a href="index.php#aboutMe">About</a></li>
                <?php if(!$userName){
                    echo "<li><a href='loginPage.html'>Login</a></li>";
                }
                ?>
                <?php if($userCategory == 1){
                    echo "<li><a href='addCategory.php'>Add Category</a></li>";
                }
                ?>
                <?php if($userCategory == 1){
                    echo "<li><a href='dispUsers.php'>Users table</a></li>";
                }
                ?>  
                <?php if($userCategory == 3){
                    echo "<li><a href='recipeSubmission.php'>Add recipe</a></li>";
                }
                ?> 
                <?php if($userName){
                    echo "<a href='userProfilePage.php'><li class='userName'>$userName</li></a>";
                } 
                ?>
                <?php if($userPfp){
                    echo "<img id='NavImg' src='..\phpFiles\\$userPfp' alt='Profile Picture'>";
                }
                ?> 
                
            </ul>
        </div>
    </section>