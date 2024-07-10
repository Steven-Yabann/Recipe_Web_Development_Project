<?php
require "..\phpFiles\dbconnection.php";

$sql = "SELECT * FROM users";
$stmt = $pdo-> prepare($sql);
$stmt-> execute();
