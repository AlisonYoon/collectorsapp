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
<h1>Grocery Items</h1>


<?php
 echo $groceryItemsArray;
?>
</body>
</html>
