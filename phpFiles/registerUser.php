<?php
//check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include_once "dbconnection.php";

    //retrieve form data
    $userName = $_POST["userName"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $userCategory = $_POST["userCategory"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //check if a file is uploaded
    if(isset($_FILES["profilePicture"]) && $_FILES["profilePicture"]["error"] == 0){
        //file upload directory
        $targetDir = "uploads/";
        $fileName = basename($_FILES["profilePicture"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        //Moce the uploaded file to specified folder
        if(move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFilePath)){
            //insert user data into DB
            $checkSQL = "SELECT username FROM users where username = ?";
            $checkstmt = $pdo-> prepare($checkSQL);
            $checkstmt-> execute([$userName]);
            $name = $checkstmt->fetch(PDO::FETCH_ASSOC);

            if (!$name){
                $sql = "INSERT INTO users (username, firstName, lastName, email, userCategory, password, profilePicture) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo-> prepare($sql);
                $stmt-> execute([$userName, $firstName, $lastName, $email, $userCategory, $hashedPassword, $targetFilePath]);
                //Confirm if insertion was succesfull
                if($stmt-> rowCount() > 0){
                    echo "User registered succesfully";
                    header("Location: ..\htmlFiles\index.html");
                }else{
                    echo "Error: Failed to register user!";
                }
            }else{
                echo"Error: username exists";
            }


        }else{
            echo"Error: Failed to upload file!";
        }
    }else{
        echo"Error: No file has been uploaded!";
    }
}else{
    header("Location: registerPage.html");
    exit;
}