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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <ul>
        <?php echo currentFilter($category) ?>
    </ul>
</header>

<section>
    <!--  Form for media query smaller screen  -->
    <div class="tabs">
        <div class="tab">
            <input type="checkbox" id="tab">
            <label class="tab-label" for="tab">Add a new item</label>
            <div class="tab-content">
                <form action="index.php" method="get">
                    <input type="text" name="item" placeholder="item" required>
                    <select name="category" required>
                        <option value="" disabled selected hidden>Category</option>
                        <option value="pantry">Pantry</option>
                        <option value="fridge">Fridge</option>
                        <option value="freezer">Freezer</option>
                        <option value="produce">Produce</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="text" name="price" placeholder="price (pence)" required>
                    <input type="text" name="remaining" placeholder="remaining (%)" required>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <!--  Media query form for smaller screen end   -->

    <form action="index.php" method="get" class="big-form">
        <p>Add a New Item</p>
        <input type="text" name="item" placeholder="item" required>
        <select name="category" required>
            <option value="" disabled selected hidden>Category</option>
            <option value="pantry">Pantry</option>
            <option value="fridge">Fridge</option>
            <option value="freezer">Freezer</option>
            <option value="produce">Produce</option>
            <option value="other">Other</option>
        </select>
        <input type="text" name="price" placeholder="price (pence)" required>
        <input type="text" name="remaining" placeholder="remaining (%)" required>
        <input type="submit" value="Submit">
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
