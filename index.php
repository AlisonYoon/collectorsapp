<?php

$db = new PDO('mysql:host=192.168.20.20; dbname=collectorsapp', 'root', '');
$db->setAttribute(
    PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM `grocery_item`';
$sql = $db->prepare('SELECT * FROM `grocery_item`;');
$sql->execute();
$groceryItem = $sql->fetchAll();

//var_dump($groceryItem);

foreach($groceryItem as $item) {
    echo $item["item"] . ' | ' . $item['category'] . ' | ' . $item['price'] . ' | ' . $item['remaining'];
    echo '<br>';
}



?>
<!DOCTYPE html>
<html lang="eng">
<html>
<head>

</head>
<body>
    <form action="index.php" method="get">

    </form>
</body>
</html>
