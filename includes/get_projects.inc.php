<?php
// first, connect to the DB
require_once("includes/database.php");

// prepare the query
$sql = "SELECT * FROM `project`";

// then execute the query
$result=$db->query($sql);

if($db->error){
	exit("There was an error");
}

// echo out the restuls in a table
while ($array = $result->fetch_array()) {
	$projectID = $array['id'];
	echo '<tr>';
	echo '<td>' . $projectID . '</td>';
	echo '<td><a href="project.php?id=' . $projectID . '">' . $array['name'] . '</a></td>';
	echo '<td>' . $array['pm'] . '</td>';
	echo '<tr>';
}

// Clear the results of the query 
$result->free();

// Disconnect from the DB
$db->close();
?>