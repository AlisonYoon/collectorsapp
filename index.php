<?php

require_once 'function.php';

//function call

$db = connectDB();
$groceryItems = getData($db);
$groceryItemsArray = processData($groceryItems);


?>
<!DOCTYPE html>
<html lang="eng">
<html>
<head>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <ul>
        <li><a href="">All</a></li>
        <li><a href="">Pantry</a></li>
        <li><a href="">Fridge</a></li>
        <li><a href="">Freezer</a></li>
        <li><a href="">Produce</a></li>
        <li><a href="">Other</a></li>
    </ul>
</header>
<section>
    <form action="index.php" method="get">
        <input type="text" name="item" placeholder="item">
        <select name="category">
            <option value="pantry">Pantry</option>
            <option value="fridge">Fridge</option>
            <option value="freezer">Freezer</option>
            <option value="produce">Produce</option>
            <option value="other">Other</option>
        </select>
        <input type="text" name="price" placeholder="price">
        <input type="text" name="remaining" placeholder="remaining">
        <input type="submit">
    </form>
</section>

<div class="table-heading">
    <ul>
        <li>Item</li>
        <li>Category</li>
        <li>Price(pence)</li>
        <li>Remaining(%)</li>
    </ul>
</div>

<?php
 echo $groceryItemsArray;
?>
</body>
</html>
