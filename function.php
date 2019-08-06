<?php
require_once 'db.php';

/**
 * getData function gets data from the DB
 * @param $db
 * @return mixed
 */
function getData(PDO $db, string $request):array {

    $db->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC);

    $sql = $db->prepare($request);
    $sql->execute();
    $groceryItems = $sql->fetchAll();

    return $groceryItems;
}

/**
 * generateRequest function was created for unit testing, it took some part from getData function
 * @param string $filter
 * @return string
 */
function generateRequest(string $filter = 'all'):string {
    $requestFilters = '';
    if ($filter !== 'all') {
        $requestFilters = ' WHERE `category` = "' . $filter . '";';
    }

    $request = 'SELECT `item`, `category`, `price`, `remaining` FROM `grocery_item`'.$requestFilters;
    return $request;
}
/**
 * processData function takes return value of getData function and returns all data from DB in HTML unit
 * @param $groceryItems
 * @return string
 */
function processData(array $groceryItems):string {
    $itemRow= '';
    foreach($groceryItems as $item) {
        $itemRow .= '<div><ul><li>' . $item["item"] . '</li><li>' . $item['category'] . '</li><li>' . $item['price'] . '</li><li>' . $item['remaining'] . '</li></ul></div>';
    }
    return $itemRow;
}



?>