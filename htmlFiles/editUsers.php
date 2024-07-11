<?php
// Fetch users for the dropdown and handle form submission
require '../phpFiles/userConn.php';

$user = [
    'userId' => '',
    'username' => '',
    'email' => '',
    'firstName' => '',
    'lastName' => ''
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $stmt = $pdo->prepare("SELECT username, email, firstName, lastName FROM users WHERE userId = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        $user = [
            'userId' => '',
            'username' => '',
            'email' => '',
            'firstName' => '',
            'lastName' => ''
        ];
    } else {
        $user['userId'] = $userId;
    }
}

// Fetch all users for the dropdown menu
$stmt = $pdo->query("SELECT userId, username FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\cssSheets\formDetails.css">
    <link rel="stylesheet" href="..\cssSheets\headerSection.css">
    <link rel="stylesheet" href="..\cssSheets\footerSection.css">
    <title>Edit User</title>
</head>
<body>
    <?php include 'headerSection.php'; ?>
    <div id="Form">
        <h2>Select User</h2>
        <form method="POST">
            <select name="userId" id="usernameSearch" onchange="this.form.submit()">
                <option value="">Select a user</option>
                <?php foreach ($users as $usernameSearch): ?>
                    <option value="<?= htmlspecialchars($usernameSearch["userId"]) ?>" <?= isset($userName) && $userName == $usernameSearch["userId"] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($usernameSearch["username"]) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>

        <h2>Edit User Information</h2>
        <form action="../phpFiles/updateUsers.php" method="post">
            <input type="hidden" name="userId" value="<?= htmlspecialchars($user['userId']) ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?= htmlspecialchars($user['firstName']) ?>" required><br>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="<?= htmlspecialchars($user['lastName']) ?>" required><br>
            <input type="submit" value="Update">
        </form>
    </div>
    <?php include 'footerSection.php'; ?>
</body>
</html>
