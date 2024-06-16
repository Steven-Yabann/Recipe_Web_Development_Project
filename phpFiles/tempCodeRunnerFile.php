<?php
echo "<select id='category' name='category'>";
    while($categories = $stmt-> fetchAll(PDO::FETCH_ASSOC)){
        foreach($categories as $category){
            echo "<option value='{$category['categoryID']}'> {$category['categoryName']} </option>";
            print_r($category);
        }
    }