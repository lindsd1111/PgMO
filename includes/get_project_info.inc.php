<?php
// first, connect to the DB
include 'includes/database.php'; 

$currentProjID = $_SESSION['projectID'];

// PROJECT DATA

	// prepare the query
	$sql = "SELECT * FROM `project`
	WHERE project.id = $currentProjID";

	// then execute the query
	$result=$db->query($sql);

	if($db->error){
		exit("There was an error");
	}

	// save the restuls to a new array 
	$array = $result->fetch_array(); 

// SCHEDULE DATA

	// prepare the query
	$sql = "SELECT * FROM `schedule`
	WHERE schedule.proj_id = $currentProjID
	ORDER BY `updated` DESC
	LIMIT 1";

	// then execute the query
	$result=$db->query($sql);

	if($db->error){
		exit("There was an error");
	}

	// save the restuls to a new array 
	$scheduleArray = $result->fetch_array(); 

// PHASE GATE DATA

	// prepare the query
	$sql = "SELECT * FROM `phase_gate`
	WHERE phase_gate.proj_id = $currentProjID
	ORDER BY `updated` DESC
	LIMIT 1";

	// then execute the query
	$result=$db->query($sql);

	if($db->error){
		exit("There was an error");
	}

	// save the restuls to a new array 
	$phaseGateArray = $result->fetch_array(); 

// STATUS DATA

	// prepare the query
	$sql = "SELECT * FROM `status`
	WHERE status.proj_id = $currentProjID
	ORDER BY `updated` DESC
	LIMIT 1";

	// then execute the query
	$result=$db->query($sql);

	if($db->error){
		exit("There was an error");
	}

	// save the restuls to a new array 
	$statusArray = $result->fetch_array(); 

// DELIVERABLES COUNT DATA

	// prepare the query
	$sql = "SELECT * FROM `deliver_count`
	WHERE deliver_count.proj_id = $currentProjID
	ORDER BY `updated` DESC
	LIMIT 1";

	// then execute the query
	$result=$db->query($sql);

	if($db->error){
		exit("There was an error");
	}

	// save the restuls to a new array 
	$deliverCountArray = $result->fetch_array(); 

// DELIVERABLES NOTES DATA

	// prepare the query
	$sql = "SELECT * FROM `deliver_notes`
	WHERE deliver_notes.proj_id = $currentProjID
	ORDER BY `updated` DESC
	LIMIT 1";

	// then execute the query
	$result=$db->query($sql);

	if($db->error){
		exit("There was an error");
	}

	// save the restuls to a new array 
	$deliverNotesArray = $result->fetch_array(); 

// SPECIAL DATA AND CONFIGURATIONS

	// GET LIST OF PHASE NAMES

		// prepare the query
		$sql = "SELECT phase_name FROM `phase_names`";

		// then execute the query
		$result=$db->query($sql);

		if($db->error){
			exit("There was an error");
		}

		// echo "Total rows retrieved: " . $result->num_rows . "<br>";

		$eachPhaseName = array();
		$i = 0;
		// save the restuls to a new array 
		while($row = $result->fetch_assoc()) {
	        // echo "id: " . $row["id"]. " - Phase Name: " . $row["phase_name"]. "<br>";
	        $eachPhaseName[$i] = $row["phase_name"];
	        $i++;
	    }

	// GET LIST OF CATEGORY NAMES

		// prepare the query
		$sql = "SELECT category_name FROM `category_names`";

		// then execute the query
		$result=$db->query($sql);

		if($db->error){
			exit("There was an error");
		}

		$eachCategoryName = array();
		$i = 1;
		// save the restuls to a new array 
		while($row = $result->fetch_assoc()) {
	        $eachCategoryName[$i] = $row["category_name"];
	        $i++;
	    }   
    
// Close the connection to the DB
$db->close();
	
?>