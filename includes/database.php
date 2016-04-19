<?php
// connect to db

// this will show us the result of our attempt to connect; success = "null"
var_dump($db->connect_error); */

$db = new mysqli();
$result = @$db->connect("localhost", "root", "passwordhere", "pgmo");
// var_dump($result);

?>
