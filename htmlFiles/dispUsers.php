<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DisplayUsers</title>
    <link rel="stylesheet" href="..\cssSheets\tableStyle.css">
    <link rel="stylesheet" href="..\cssSheets\headerSection.css">
    <link rel="stylesheet" href="..\cssSheets\footerSection.css">
</head>
<body>
    <?php include 'headerSection.php';?>
    <div id="mainDiv"> 
        <h2>Data from Database</h2>
        <table>
            <tr id="header">
                <th>Username</th>
                <th>Email</th>
                <th>First name</th>
                <th>Last name</th>
            </tr>
            <?php
        require '../phpFiles/userConn.php';
        if ($stmt->rowCount() > 0){
            $data = $stmt-> fetchAll(PDO::FETCH_ASSOC);
            //print_r($data);
            foreach($data as $users){
                echo "<tr id='data'>";
                echo "<td>". $users["username"]. "</td>";
                echo "<td>". $users["email"]. "</td>";
                echo "<td>". $users["firstName"]. "</td>";
                echo "<td>". $users["lastName"]. "</td>";
                echo "</tr>";
            }
        }
        else {
            echo "<tr><td colspan='3'>No results found</td></tr>";
        }
        ?>
        </table>
        <a href="editUsers.php">
            <button>Edit Profiles</button>
        </a>
    </div>
    <?php include 'footerSection.php';?>
</body>
</html>
