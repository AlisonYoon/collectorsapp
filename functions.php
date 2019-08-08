<?php
require_once 'db.php';

/**
 * getData function gets data from the DB
 * @param $db
 * @return array
 */
function getData(PDO $db, string $request):array {

    $db->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

    $sql = $db->prepare($request);
    $sql->execute();
    $groceryItems = $sql->fetchAll();

    return $groceryItems;
}

/**
 * generateRequest function takes $filter as param and returns a query to retrieve data from DB. It was created for unit testing, it took some part from getData function
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
        $itemRow .= '<div class="item-row"><ul><li><span>Item</span>' . $item['item'] . '</li><li class="' .$item["category"] . '-row">' . $item['category'] . '</li><li><span>Price(£)</span>£' . $item['price']/100 . '</li><li><span>Remaining(%)</span>' . $item['remaining'] . '%</li></ul></div>';
    }
    return $itemRow;
}

/**
 * currentFilter takes $category($category = (isset($_GET['category'])) ? $_GET['category'] : 'all';) as parameter and returns HTML tag to display currently-applied filter on the page
 * @param $category
 * @return string
 */
function currentFilter(string $category):string {
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
        default:
            return ("<li><a class=\"all current\" href=\"index.php?category=all\">All</a></li>
        <li><a class=\"pantry\" href=\"index.php?category=pantry\">Pantry</a></li>
        <li><a class=\"fridge\" href=\"index.php?category=fridge\">Fridge</a></li>
        <li><a class=\"freezer\" href=\"index.php?category=freezer\">Freezer</a></li>
        <li><a class=\"produce\" href=\"index.php?category=produce\">Produce</a></li>
        <li><a class=\"other\" href=\"index.php?category=other\">Other</a></li>");
    }

    function inputValidation(string $item, string $category, int $price, int $remaining)
    {
        if($_GET['item']) {
            if(is_string($item) && is_string($category) && is_numeric($price) && is_numeric($price) ) {
                $insertToDB = 'INSERT INTO `grocery_item` (`item`, `category`, `price`, `remaining`) VALUES (`item`, `category`, `price`, `remaining`)';
                return $insertToDB;
            } else {
                $errorMsg = '<p>Please type in string values in \'item\' and \'category\' fields, number value in \'price\' and \'remaining\' fields.</p>';
                return $errorMsg;
            }
        }
    }
}