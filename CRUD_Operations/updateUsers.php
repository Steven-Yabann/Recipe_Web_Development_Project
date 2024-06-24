<?php
require "..\phpFiles\dbconnection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userId = $_POST['userId'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    echo $userId;
    echo $username;
    echo $email;
    echo $firstName;
    echo $lastName;


    $sql = 'UPDATE users SET username = ?, firstName = ?, lastName = ?, email = ? WHERE userId = ?';
    $stmt = $pdo-> prepare($sql);
    $stmt-> execute([$username, $firstName, $lastName, $email, $userId]);

    if($stmt-> rowCount()){
        echo 'User information updated successfully.';
        header('Location: dispUsers.php');
    }else{
        echo 'Failed to update user information.';
    }
}else{
    echo 'Invalid request.';
}