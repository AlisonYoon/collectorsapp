<?php
require_once 'db.php';

function getData($db) {
    $db->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC);

    $sql = $db->prepare('SELECT `item`, `category`, `price`, `remaining` FROM `grocery_item`');
    $sql->execute();
    $groceryItems = $sql->fetchAll();

    return $groceryItems;
}

function processData($groceryItems) {
    $itemRow= '';
    foreach($groceryItems as $item) {
        $itemRow .= '<div><ul><li>' . $item["item"] . '</li><li>' . $item['category'] . '</li><li>' . $item['price'] . '</li><li>' . $item['remaining'] . '</li></ul></div>';
    }
    return $itemRow;
}

?>