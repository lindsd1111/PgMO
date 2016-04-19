<?php
// first, connect to the DB
include 'database.php'; 

// GET LIST OF CATEGORY NAMES

		// prepare the query
		$sql = "SELECT category_name FROM `category_names`";

		// then execute the query
		$result=$db->query($sql);

		if($db->error){
			exit("There was an error");
		}

		// capture how many catetories there are to use below
		$numCats=$result->num_rows;
		$_SESSION['numCats']=$numCats;

		// write the results to an array for later use 
		$eachCategoryName = array();
		$i = 1;
		
		while($row = $result->fetch_assoc()) {
	        $eachCategoryName[$i] = $row["category_name"];
	        $i++;
	    }   

	    // create an array to hold calculations
		$catCount = array();
		for ($i=1; $i <= $numCats; $i++) { 
			$catCount[$i] = 0;
		}
		
// PROJECT DATA

	// prepare the query
	$sql = "SELECT * FROM `project`";

	// then execute the query
	$result=$db->query($sql);

	if($db->error){
		exit("There was an error");
	}

	// get the number of results / rows returned
	$numRows=$result->num_rows;
	$_SESSION['numRows']=$numRows;
	// echo "There were this many results: " . $numRows . "<br>";

	// save the restuls in a numbered array for later use
	$i=1;
	while ($array = $result->fetch_array()) {
		$projectResults[$i]['id']=$array['id'];
		$projectResults[$i]['name']=$array['name'];
		$projectResults[$i]['hours']=$array['hours'];
		$projectResults[$i]['category']=$array['category'];
		// calculate the totals
		$currentCategory=$projectResults[$i]['category'];
		if ($currentCategory!="") {
			$catCount[$currentCategory]++;
		}
		$i++;
	}
    
// Close the connection to the DB
$db->close();
	
?>