<?php
require "dbconnection.php";

$sql = "SELECT * FROM categories";
$stmt = $pdo -> prepare($sql);
$stmt -> execute();

?>