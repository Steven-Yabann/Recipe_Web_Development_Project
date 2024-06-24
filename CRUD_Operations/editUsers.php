<?php 
    require_once "..\phpFiles\dbconnection.php";
    $sql = "SELECT * FROM users";
    $stmt = $pdo-> prepare($sql);
    $stmt -> execute();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Users</title>
        <link rel="stylesheet" href="..\cssSheets\loginPageStyle.css">
    </head>
    <body>
        <div id="Form">
            <h1>Edit user Details</h1>
            <form action="fetchUser.php" method="POST">
                <select name="username" id="username">
                    <?php 
                    if ($stmt -> rowCount() > 0){
                        $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                        foreach($data as $username){
                            echo '<option value="' .htmlspecialchars($username["userId"]). '">' . htmlspecialchars($username["username"]).'</option>';
                        }
                    }
                    ?>
                </select>
                <button>Search</button>
            </form>
            <form action="editUser.php" method="POST">
                <?php
                echo''; 
                ?> 
            </form>
        </div>
    </body>
</html>