<?php
require "..\phpFiles\dbconnection.php";

$sql = "SELECT * FROM recipes";
$recipesData = $pdo-> prepare($sql);
$recipesData-> execute();
