<?php
require_once 'db.php';

/**
 * getData function gets data from the DB
 * @param $db
 * @return mixed
 */
function getData($db, $filter = 'all') {
    $requestFilters = '';
    if ($filter !== 'all') {
        $requestFilters = ' WHERE `category` = "' . $filter . '";';
    }

    $db->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC);

    $sql = $db->prepare('SELECT `item`, `category`, `price`, `remaining` FROM `grocery_item`'.$requestFilters);
    $sql->execute();
    $groceryItems = $sql->fetchAll();

    return $groceryItems;
}

/**
 * processData function takes return value of getData function and returns all data from DB in HTML unit
 * @param $groceryItems
 * @return string
 */
function processData($groceryItems) {
    $itemRow= '';
    foreach($groceryItems as $item) {
        $itemRow .= '<div><ul><li>' . $item["item"] . '</li><li>' . $item['category'] . '</li><li>' . $item['price'] . '</li><li>' . $item['remaining'] . '</li></ul></div>';
    }
    return $itemRow;
}



?>