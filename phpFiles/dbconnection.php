<?php
// Database configuration
$serverName = "localhost:3307";
$dbUserName = "root";
$dbPassword = "";
$dbName = "recipeDatabase";

// Attempt to connect to the database
try {
    $pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $dbUserName, $dbPassword, array(
        PDO::ATTR_PERSISTENT => true
    ));
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Display error message if connection fails
    die("Error: Could not connect to the database. " . $e->getMessage());
}
