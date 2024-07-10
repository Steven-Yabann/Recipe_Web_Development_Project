<?php 
   // session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\cssSheets\mainIndex.css">
    <link rel="stylesheet" href="..\cssSheets\headerSection.css">
    <link rel="stylesheet" href="..\cssSheets\footerSection.css">
    <title>Recipe Page</title>
</head>
<body>
    <?php include 'headerSection.php';?>

    <section class="headlineSector">
        <div id="headline">
            <div class="headlineText">
                <h1>It's not just food, it's an experience!</h1>
                <h3>"Flavor Fusion: Unleash Culinary Creativity with Our Delectable Recipes
                    Dive into a World of Irresistible Flavors and Inspired Cooking Adventures!"</h3>
                    <form  class="searchForm">
                        <input type="text" id="recipeSearch" placeholder="Search for recipe" >
                        <input type="submit" name="search" id="search">
                    </form>
            </div>
            <div class="headlineImage">
                <img id="headlineImg" src="..\photos\a9ea7be1-c805-48a3-8193-5bf2849d3b8e.jpeg" alt="food">
            </div>
        </div>
    </section>

    <section class="benefitsSection">
        <h2>Welcome!</h2>
        <div class="benefitsDiv">
                <p>
                    Come join me on a tasty trip around the globe! I've gathered recipes from Africa, Asia, and Australia that are bursting with flavor and tradition. Think savory Moroccan tagine, spicy Thai curry, and cozy Aussie meat pies. Cooking these recipes not only fills your kitchen with delightful aromas but also introduces you to new culinary techniques and ingredients.
                    <br> Plus, sharing these dishes with your loved ones creates memorable moments and brings everyone together. Let's dive into this delicious journey together, celebrating different flavors and the joy of cooking. Come along and let's explore the world through food, one yummy recipe at a time!
                    <br>By exploring diverse cuisines, you'll expand your cooking skills and develop a deeper appreciation for different cultures. Let's dive into this delicious journey together, celebrating different flavors and the joy of cooking. Come along and let's explore the world through food, one yummy recipe at a time!
                </p>
            </div>
    </section>
    
    <section id="recipes" class="foodCards">
        <h1 class="recipeHeader">Top Recipes of the Day!</h1>
        <div class="cardRow">   
            <?php
                require '../phpFiles/recipeConn.php';
                if ($recipesData->rowCount() > 0){
                    $recipes = $recipesData->fetchAll(PDO::FETCH_ASSOC);
                    foreach($recipes as $recipe){
                        $recipePfp = $recipe['recipeImage'];
                        $recipeName = $recipe['recipeName'];
                        $recipeId = $recipe['recipeId']; // Add recipe ID to create a unique link
                        echo "<a href='recipeDetail.php?id=".$recipeId."' class='cardLink'>"; // Wrap the card in a link
                        echo "<div class=\"card001\">";
                            echo "<img class=\"cardImg001\" src='..\phpFiles\\". $recipePfp. "' alt='".$recipeName."'>";
                            echo "<div class=\"container001\">";
                                echo "<h4>".$recipeName."</h4>";
                            echo "</div>";
                        echo "</div>";
                        echo "</a>";
                    }
                }
            ?>  
        </div>
    </section>


    <section class="custReviewSect">
        <h1>Customer Reviews</h1>
        <div class="cardReviewDiv">
            <div id="card1" class="reviewCard">
                <h3>Excellent!</h3>
                <p class="rating">&star; &star; &star; &star; &star;</p>
                <p>Discovering this website has been a game-changer for my family dinners! As a busy mom, finding delicious and easy recipes that everyone enjoys can be a challenge. 
                But with the diverse range of options on this site, I've been able to delight my family's taste buds with dishes from around the world.</p>
                <h3>Leah Morino</h3>
                <h4>USA</h4>
            </div>
            <div id="card2" class="reviewCard">
                <h3>Very Good!</h3>
                <p class="rating">&star; &star; &star; &star; &star;</p>
                <p>This website has become my after-work oasis! As a bachelor navigating the kitchen solo, cooking can feel daunting.
                 But with the help of these recipes, I've unlocked a whole new world of culinary possibilities.</p>
                 <h3>Dave Santan</h3>
                 <h4>England</h4>
            </div>
            <div id="card3" class="reviewCard">
                <h3>Amazing!</h3>
                <p class="rating">&star; &star; &star; &star; &star;</p>
                <p>This website is my culinary companion on my journey through culinary school! As a student honing my skills in the kitchen, 
                I rely on this treasure trove of recipes to broaden my culinary horizons.</p>
                <h3>Lucia</h3>
                <h4>Angola</h4>
            </div>
        </div>
    </section>

    <section id="aboutMe" class="websiteOwnerSect">
        <h1>Who am I ?</h1>
        <div class="chefDiv">
            <div id="chefNote">
                <p>Hello, fellow food enthusiasts! I'm Chef Yabann, a globetrotting culinary explorer on a mission to bring the world's flavors to your plate. With a passion for both adventure and delicious cuisine, 
                    I've journeyed far and wide, learning from diverse cultures and culinary traditions. <br> <br>Now, through my website, I'm thrilled to share the incredible delicacies I've discovered along the way. 
                    From the aromatic spices of Morocco to the tantalizing tastes of Thailand and beyond, join me as we embark on a culinary voyage like no other. Get ready to tantalize your taste buds and expand your culinary horizons!
                </p>
            </div>
            <img id="chefImg" src="..\photos\WhatsApp Image 2024-05-06 at 20.56.05_efc19889.jpg" alt="Chef Yabann">
        </div>
    </section>

    <?php include 'footerSection.php';  ?>    
</body>
</html>