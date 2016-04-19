<?php
// first, connect to the DB
include 'database.php'; 

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
		$projectResults[$i]['pm']=$array['pm'];
		$projectResults[$i]['description']=$array['description'];
		$projectResults[$i]['hours']=$array['hours'];
		$projectResults[$i]['finish_type']=$array['finish_type'];
		$projectResults[$i]['updated']=$array['updated'];
		$i++;
	}

// SCHEDULE DATA

	for ($i=1; $i <= $numRows ; $i++) { 
		// prepare the query to run project by project 
		$sql = "SELECT * FROM `schedule`
		WHERE proj_id=$i
		ORDER BY `updated` DESC
		LIMIT 1";

		// then execute the query
		$result=$db->query($sql);

		if($db->error){
			exit("There was an error");
		}

		// save the restuls in a numbered array for later use
		$array = $result->fetch_array();
			$scheduleResults[$i]['proj_id']=$array['proj_id'];
			$scheduleResults[$i]['start']=$array['start'];
			$scheduleResults[$i]['target_finish']=$array['target_finish'];
			$scheduleResults[$i]['est_finish']=$array['est_finish'];
			$scheduleResults[$i]['baseline_finish']=$array['baseline_finish'];
			$scheduleResults[$i]['updated']=$array['updated'];

	} // end for

// PHASE GATE DATA

	for ($i=1; $i <= $numRows ; $i++) { 
		// prepare the query to run project by project 
		$sql = "SELECT * FROM `phase_gate`
		WHERE proj_id=$i
		ORDER BY `updated` DESC
		LIMIT 1";

		// then execute the query
		$result=$db->query($sql);

		if($db->error){
			exit("There was an error");
		}

		// save the restuls in a numbered array for later use
		
		$array = $result->fetch_array();
			$phaseResults[$i]['proj_id']=$array['proj_id'];
			$phaseResults[$i]['phase_id']=$array['phase_id'];
			$phaseResults[$i]['next_phase']=$array['next_phase'];
			$phaseResults[$i]['notes']=$array['notes'];
			$phaseResults[$i]['updated']=$array['updated'];
		
	} // end for

// STATUS DATA

	for ($i=1; $i <= $numRows ; $i++) { 
		// prepare the query to run project by project 
		$sql = "SELECT * FROM `status`
		WHERE proj_id=$i
		ORDER BY `updated` DESC
		LIMIT 1";

		// then execute the query
		$result=$db->query($sql);

		if($db->error){
			exit("There was an error");
		}

		// save the restuls in a numbered array for later use
		
		$array = $result->fetch_array();
			$statusResults[$i]['proj_id']=$array['proj_id'];
			$statusResults[$i]['pm_status']=$array['pm_status'];
			$statusResults[$i]['stake_status']=$array['stake_status'];
			$statusResults[$i]['lind_status']=$array['lind_status'];
			$statusResults[$i]['exec_sum']=$array['exec_sum'];
			$statusResults[$i]['updated']=$array['updated'];
		
	} // end for

// DELIVERABLES COUNT DATA

	for ($i=1; $i <= $numRows ; $i++) { 
		// prepare the query to run project by project 
		$sql = "SELECT * FROM `deliver_count`
		WHERE proj_id=$i
		ORDER BY `updated` DESC
		LIMIT 1";

		// then execute the query
		$result=$db->query($sql);

		if($db->error){
			exit("There was an error");
		}

		// save the restuls in a numbered array for later use
		
		$array = $result->fetch_array();
			$countResults[$i]['proj_id']=$array['proj_id'];
			$countResults[$i]['total']=$array['total'];
			$countResults[$i]['complete']=$array['complete'];
			$countResults[$i]['late']=$array['late'];
			$countResults[$i]['updated']=$array['updated'];
		
	} // end for

// DELIVERABLES NOTES DATA

	for ($i=1; $i <= $numRows ; $i++) { 
		// prepare the query to run project by project 
		$sql = "SELECT * FROM `deliver_notes`
		WHERE proj_id=$i
		ORDER BY `updated` DESC
		LIMIT 1";

		// then execute the query
		$result=$db->query($sql);

		if($db->error){
			exit("There was an error");
		}

		// save the restuls in a numbered array for later use
		
		$array = $result->fetch_array();
			$deliverResults[$i]['proj_id']=$array['proj_id'];
			$deliverResults[$i]['recent_1']=$array['recent_1'];
			$deliverResults[$i]['recent_2']=$array['recent_2'];
			$deliverResults[$i]['recent_3']=$array['recent_3'];
			$deliverResults[$i]['next_1']=$array['next_1'];
			$deliverResults[$i]['next_2']=$array['next_2'];
			$deliverResults[$i]['next_3']=$array['next_3'];
			$deliverResults[$i]['late_1']=$array['late_1'];
			$deliverResults[$i]['late_2']=$array['late_2'];
			$deliverResults[$i]['late_3']=$array['late_3'];
			$deliverResults[$i]['updated']=$array['updated'];
		
	} // end for

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