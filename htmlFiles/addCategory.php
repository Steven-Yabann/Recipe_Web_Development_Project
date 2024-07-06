<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\cssSheets\formDetails.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="..\cssSheets\headerSection.css">
    <link rel="stylesheet" href="..\cssSheets\footerSection.css">
    <title>Add Category</title>
</head>
<body>
    <?php include 'headerSection.php';?>
    <div id="categoryForm">
        <img  id= "logoImg" src="..\photos\Premium Vector _ Spoon fork and plate vector icon symbol illustration restaurant logo design.jpeg" alt="Chef's Work Logo">
        <form action="..\phpFiles\addCategory.php" method="post">
            <label for="categoryName">Category Name:</label>
            <input type="text" id="categoryName" name="categoryName" placeholder="Category name" required>
            <input type="submit" value="Add Category">
        </form>
    </div>
    <?php include 'footerSection.php';  ?>
</body>
</html>
