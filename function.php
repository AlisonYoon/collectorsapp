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

function currentFilter($category) {
    switch($category) {
        case 'all':
            return ("<li><a class=\"all current\" href=\"index.php?category=all\">All</a></li>
        <li><a class=\"pantry\" href=\"index.php?category=pantry\">Pantry</a></li>
        <li><a class=\"fridge\" href=\"index.php?category=fridge\">Fridge</a></li>
        <li><a class=\"freezer\" href=\"index.php?category=freezer\">Freezer</a></li>
        <li><a class=\"produce\" href=\"index.php?category=produce\">Produce</a></li>
        <li><a class=\"other\" href=\"index.php?category=other\">Other</a></li>");
        break;
        case 'pantry':
            return ("<li><a class=\"all\" href=\"index.php?category=all\">All</a></li>
        <li><a class=\"pantry current\" href=\"index.php?category=pantry\">Pantry</a></li>
        <li><a class=\"fridge\" href=\"index.php?category=fridge\">Fridge</a></li>
        <li><a class=\"freezer\" href=\"index.php?category=freezer\">Freezer</a></li>
        <li><a class=\"produce\" href=\"index.php?category=produce\">Produce</a></li>
        <li><a class=\"other\" href=\"index.php?category=other\">Other</a></li>");
        break;
        case 'fridge':
            return ("<li><a class=\"all\" href=\"index.php?category=all\">All</a></li>
        <li><a class=\"pantry\" href=\"index.php?category=pantry\">Pantry</a></li>
        <li><a class=\"fridge current\" href=\"index.php?category=fridge\">Fridge</a></li>
        <li><a class=\"freezer\" href=\"index.php?category=freezer\">Freezer</a></li>
        <li><a class=\"produce\" href=\"index.php?category=produce\">Produce</a></li>
        <li><a class=\"other\" href=\"index.php?category=other\">Other</a></li>");
        break;
        case 'freezer':
            return ("<li><a class=\"all\" href=\"index.php?category=all\">All</a></li>
        <li><a class=\"pantry\" href=\"index.php?category=pantry\">Pantry</a></li>
        <li><a class=\"fridge\" href=\"index.php?category=fridge\">Fridge</a></li>
        <li><a class=\"freezer current\" href=\"index.php?category=freezer\">Freezer</a></li>
        <li><a class=\"produce\" href=\"index.php?category=produce\">Produce</a></li>
        <li><a class=\"other\" href=\"index.php?category=other\">Other</a></li>");
        break;
        case 'produce':
            return ("<li><a class=\"all\" href=\"index.php?category=all\">All</a></li>
        <li><a class=\"pantry\" href=\"index.php?category=pantry\">Pantry</a></li>
        <li><a class=\"fridge\" href=\"index.php?category=fridge\">Fridge</a></li>
        <li><a class=\"freezer\" href=\"index.php?category=freezer\">Freezer</a></li>
        <li><a class=\"produce current\" href=\"index.php?category=produce\">Produce</a></li>
        <li><a class=\"other\" href=\"index.php?category=other\">Other</a></li>");
        break;
        case 'other':
            return ("<li><a class=\"all\" href=\"index.php?category=all\">All</a></li>
        <li><a class=\"pantry\" href=\"index.php?category=pantry\">Pantry</a></li>
        <li><a class=\"fridge\" href=\"index.php?category=fridge\">Fridge</a></li>
        <li><a class=\"freezer\" href=\"index.php?category=freezer\">Freezer</a></li>
        <li><a class=\"produce\" href=\"index.php?category=produce\">Produce</a></li>
        <li><a class=\"other current\" href=\"index.php?category=other\">Other</a></li>");
        break;
    }
}

?>