<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include_once "dbconnection.php";

    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare and execute SQL query to check login credentials
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Login successful
        echo "Login successful. Welcome, " . $user['username'] . "!";
        header("Location: ..\htmlFiles\index.html");
    } else {
        // Login failed
        echo "Invalid email or password. Please try again.";
        //header("Location: ..\htmlFiles\registerPage.html");
    }
} else {
    // Redirect back to the login page if accessed directly
    header("Location: ..\htmlFiles\index.html");
    exit;
}
