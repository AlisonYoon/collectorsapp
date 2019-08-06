<?php

require_once 'function.php';

//function call
$category = (isset($_GET['category'])) ? $_GET['category'] : 'all';
$request = generateRequest($category);
$db = connectDB();
$groceryItems = getData($db, $request);
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
<!--        <li><a class="all" href="index.php?category=all">All</a></li>-->
<!--        <li><a class="pantry" href="index.php?category=pantry">Pantry</a></li>-->
<!--        <li><a class="fridge" href="index.php?category=fridge">Fridge</a></li>-->
<!--        <li><a class="freezer" href="index.php?category=freezer">Freezer</a></li>-->
<!--        <li><a class="produce" href="index.php?category=produce">Produce</a></li>-->
<!--        <li><a class="other" href="index.php?category=other">Other</a></li>-->
        <?php echo currentFilter($category) ?>
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
<div class="table">
    <div class="table-heading">
        <ul>
            <li>Item</li>
            <li>Category</li>
            <li>Price(pence)</li>
            <li>Remaining(%)</li>
        </ul>
    </div>

        <?php echo $groceryItemsArray; ?>
</div>
</body>
</html>
