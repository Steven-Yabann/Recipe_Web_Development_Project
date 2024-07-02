<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

include "../phpFiles/dbconnection.php";
$userName = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userName]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="../cssSheets/profileDetails.css">
</head>
<body>
    <div id="profileContainer">
        <h1>User Details</h1>
        <?php if ($user['profilePicture']) {
            $userPfp = $user['profilePicture'];
            echo "<img src='../phpFiles/$userPfp' alt='Profile Picture' class='profile-pic'>";
        } else {
            echo "<img src='..\photos\defaultpfp.jpg' alt='Profile Picture' class='profile-pic'>";
        }
        ?>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['firstName']); ?></p>
        <p><strong>Last Name:</strong> <?php echo htmlspecialchars($user['lastName']); ?></p>

        <a href="index.php">Back to Home</a>
        <a href="..\phpFiles\logout.php">Sign Out</a>
    </div>
</body>
</html>
