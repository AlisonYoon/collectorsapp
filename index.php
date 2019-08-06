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

</head>
<body>
<p style="color: red"> lalalalal</p>


<?php
 echo $groceryItemsArray;
?>
</body>
</html>
