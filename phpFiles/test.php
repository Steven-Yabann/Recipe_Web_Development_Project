<?php
require "dbconnection.php";

$sql = "SELECT * FROM categories";
$stmt = $pdo-> prepare($sql);
$stmt-> execute();


if ($stmt->rowCount() > 0){
    $dataTwo = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    // foreach($data as $category){
    //     foreach($category as $name){
    //         print_r($name);
    //     }
    // }
    print_r($dataTwo);
}
?>
