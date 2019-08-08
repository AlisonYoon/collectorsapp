<?php

require_once 'functions.php';

$item = (isset($_GET['item'])) ? $_GET['item'] : NULL;
$category = (isset($_GET['category'])) ? $_GET['category'] : 'all';
$price = (isset($_GET['price'])) ? $_GET['price'] : NULL;
$remaining = (isset($_GET['remaining'])) ? $_GET['remaining'] : NULL;
$request = generateRequest($category);
$db = connectDB();
$groceryItems = getData($db, $request);
$groceryItemsArray = processData($groceryItems);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grocery Items App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/styles.css">
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
                        <p>
                            <?php
                            if(!is_null($item) && $category && !is_null($price)  && !is_null($remaining)) {
                                if((int)$price > 0  && (int)$remaining > 0) {
                                    $inputValidation = inputValidation($db, $item, $category, $price, $remaining);
                                    $message = $item . ' added to database';
                                } else {
                                    $message = 'Please check : number only for price or remaining input, text only for item input.';
                                }
                                echo $message;
                            }
                            ?>
                        </p>
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
            <p>
                <?php
                    if(!is_null($item) && $category && !is_null($price) && !is_null($remaining)) {
//                        var_dump($remaining);
                        if((int)$price > 0 && (int)$remaining > 0) {
                            $inputValidation = inputValidation($db, $item, $category, $price, $remaining);
                            $message = $item . ' added to database';
                        } else {
                            $message = 'Please check : number only for price or remaining input, text only for item input.';
                        }
                        echo $message;
                    }
                ?>
            </p>
        </form>
    </section>
    <div class="data-table">
        <div class="data-table-heading">
            <ul>
                <li>Item</li>
                <li>Category</li>
                <li>Price(£)</li>
                <li>Remaining(%)</li>
            </ul>
        </div>
        <?php echo $groceryItemsArray; ?>
    </div>
</body>
</html>