<?php
// Database configuration
$server = "mysql:host=localhost:3307;dbname=recipeDatabase";
$dbUserName = "root";
$dbPassword = "";
//$dbName = "recipeDatabase";

// Attempt to connect to the database
try {
    $pdo = new PDO($server, $dbUserName, $dbPassword, array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
    
} catch (PDOException $e) {
    // Display error message if connection fails
    die("Error: Could not connect to the database. " . $e->getMessage());
}
