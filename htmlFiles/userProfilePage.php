<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}   
$userName = isset($_SESSION['username']) ? $_SESSION['username'] : null;

include "../phpFiles/dbconnection.php";
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
    <link rel="stylesheet" href="..\cssSheets\headerSection.css">
    <link rel="stylesheet" href="..\cssSheets\footerSection.css">
</head>
<body>
    <?php include 'headerSection.php';?>
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
    <?php include 'footerSection.php';  ?>
</body>
</html>
