<?php
include 'dbconnection.php';
try{
    $sql = 'SELECT categoryID, categoryName FROM categories';
    $stmt = $pdo-> prepare($sql);
    $stmt-> execute();

    while($categories = $stmt-> fetchAll(PDO::FETCH_ASSOC)){
        foreach($categories as $category){
            print_r($category);
        }
    }
        
}catch(PDOException $e){
    die("Error: " . $e-> getMessage());
}
