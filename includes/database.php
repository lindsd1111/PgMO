<?php
// connect to db
// first, instantiate MySQLi class
// then provide connetion information in this order: server, user name, PW, DB name
// so, in this case: localhost, root, PW, cars
// tip: use "@" to block the error report (keep users from seeing it)
// remember: if the connection was successful, then the connect_error will be null
// so, we check to see if the conect_error actually has something in it, in which case the connection failed and we want to see the error that was returned
// note: if we did get an error, then we want to terminate the program right away with "exit"

/* $db = new mysqli("localhost","root","","car");
if($db->connect_error){
	exit("cannot connect to databse");
}
// this will show us the result of our attempt to connect; success = "null"
var_dump($db->connect_error); */

// important: you put the "@" sign to block the error report
// like this: $db = @new mysqli...

$db = new mysqli();
$result = @$db->connect("localhost", "root", "UdemyUdemy", "pgmo");
// var_dump($result);

?>