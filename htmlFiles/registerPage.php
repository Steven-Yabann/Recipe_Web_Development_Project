<?php
    require "..\phpFiles\dbconnection.php";
    $sql = "SELECT * FROM usercategory";
    $stmt = $pdo-> prepare($sql);
    $stmt -> execute();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\cssSheets\formDetails.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Register user</title>
</head>
<body background="..\photos\Wallpaper.jpg">
    <div id="Form">
         <img  id= "logoImg" src="..\photos\Premium Vector _ Spoon fork and plate vector icon symbol illustration restaurant logo design.jpeg" alt="Chef's Work Logo">
         <h1>Welcome To Our Website</h1>
         <h2>Please fill in your details</h2>
           <form action="..\phpFiles\registerUser.php" method="post" enctype="multipart/form-data">
            <label for="userName">User name</label>
            <input type="text" name="userName" placeholder="Your username" required>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" placeholder="Your first name" required>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" placeholder="Your last name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Your email" required>
            <label for="userCategory">Category</label>
            <select name="userCategory" id="userCategory">
                <?php 
                if ($stmt-> rowCount() > 0){
                    $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                    foreach($data as $userCategory){
                        if($userCategory["userCategory"] != "Admin"){
                            echo '<option value="' . htmlspecialchars($userCategory['ID']) . '">' . htmlspecialchars($userCategory['userCategory']) . '</option>';
                        }
                    }
                }
                else{
                    echo "No data is found";
                }
                ?>
            </select>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Your password" required>
            <label for="ProfilePicture">Profile picture</picture></label>
            <input type="file" name="profilePicture" id="profilePicture" accept="image/*">
            <input type="submit" id="SignIn" value="Sign up">
            <input type="submit" value="Sign in with Google" id="googleSignIn">
            <h4>Already have an account?<a class="registration" href="loginPage.html">Sign in</a></h4>
         </form>
     </div>
 </body>
</html>