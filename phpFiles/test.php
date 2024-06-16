<?php
require "dbconnection.php";

$sql = "SELECT * FROM users";
$stmt = $pdo-> prepare($sql);
$stmt-> execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DisplayUsers</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
<h2>Data from Database</h2>

<table>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>First name</th>
        <th>Last name</th>
    </tr>
    <?php
    if ($stmt->rowCount() > 0){
        $data = $stmt-> fetchAll(PDO::FETCH_ASSOC);
        //print_r($data);
        foreach($data as $users){
            echo "<tr>";
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
</body>
</html>
