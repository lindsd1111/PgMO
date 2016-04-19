<?php

// Connect to the DB
include 'includes/database.php'; 

/*
You will NOT get a new object when you are updating a table
If everything is fine, you get TRUE; else you get FALSE
Also, you might want to use LIMIT just as a  way to limit the damage to your table if you did something wrong
*/

if (isset($_POST['project'])) {
	// We need to figure out just the number of the category and strip out the rest
	$catNo = substr($_POST['category'],0,1);
	
	$postValues = array($_POST['id'], $_POST['name'], $_POST['pm'], $_POST['description'], $_POST['hours'], $catNo, $_POST['finish_type']);

	$sql = "UPDATE `project` 
	SET `name`='$postValues[1]', `pm`='$postValues[2]', `description`='$postValues[3]', `hours`='$postValues[4]',
	`category`='$postValues[5]', `finish_type`='$postValues[6]', `updated`=CURRENT_TIMESTAMP
	WHERE `id`='$postValues[0]'";

	$result=$db->query($sql);
	if($result===true) {
		echo "Update successful.";
	} else {
		echo "Something went wrongo.";
	}

} elseif (isset($_POST['schedule'])) {
	$postValues = array($_SESSION['projectID'], $_POST['start'], $_POST['finish'], $_POST['est_finish'], $_POST['baseline_finish']);

	$sql = "INSERT INTO `pgmo`.`schedule` (`id`, `proj_id`, `start`, `target_finish`, `est_finish`, `baseline_finish`, `updated`) 
		VALUES (NULL, '$postValues[0]', '$postValues[1]', '$postValues[2]', '$postValues[3]', '$postValues[4]', CURRENT_TIMESTAMP)";

	$result=$db->query($sql);
	if($result===true) {
		echo "Update successful.";
	} else {
		echo "Something went wrongo.";
	}

} elseif (isset($_POST['phase'])) {
	$postValues = array($_SESSION['projectID'], $_POST['phase_id'], $_POST['next_phase'], $_POST['notes']);

	$sql = "INSERT INTO `pgmo`.`phase_gate` (`id`, `proj_id`, `phase_id`, `next_phase`, `notes`, `updated`) 
	VALUES (NULL, '$postValues[0]', '$postValues[1]', '$postValues[2]', '$postValues[3]', CURRENT_TIMESTAMP)";

	$result=$db->query($sql);
	if($result===true) {
		echo "Update successful.";
	} else {
		echo "Something went wrongo.";
	}

} elseif (isset($_POST['status'])) {
	$postValues = array($_SESSION['projectID'], $_POST['pm_status'], $_POST['stake_status'], $_POST['lind_status'], $_POST['exec_sum']);

	$sql = "INSERT INTO `pgmo`.`status` (`id`, `proj_id`, `pm_status`, `stake_status`, `lind_status`, `exec_sum`, `updated`) 
	VALUES (NULL, '$postValues[0]', '$postValues[1]', '$postValues[2]', '$postValues[3]', '$postValues[4]', CURRENT_TIMESTAMP)";

	$result=$db->query($sql);
	if($result===true) {
		echo "Update successful.";
	} else {
		echo "Something went wrongo.";
	}

} elseif (isset($_POST['deliver_notes'])) {
	$postValues = array($_SESSION['projectID'], $_POST['recent_1'], $_POST['recent_2'], $_POST['recent_3'], $_POST['next_1'], $_POST['next_2'], $_POST['next_3'], $_POST['late_1'], $_POST['late_2'], $_POST['late_3']);

	$sql = "INSERT INTO `pgmo`.`deliver_notes` (`id`, `proj_id`, `recent_1`, `recent_2`, `recent_3`, `next_1`, `next_2`, `next_3`, `late_1`, `late_2`, `late_3`, `updated`) VALUES (NULL, '$postValues[0]', '$postValues[1]', '$postValues[2]', '$postValues[3]', '$postValues[4]', '$postValues[5]', '$postValues[6]', '$postValues[7]', '$postValues[8]', '$postValues[9]', CURRENT_TIMESTAMP)";

	$result=$db->query($sql);
	if($result===true) {
		echo "Update successful.";
	} else {
		echo "Something went wrongo.";
	}

} elseif (isset($_POST['deliver_count'])) {
	$postValues = array($_SESSION['projectID'], $_POST['total'], $_POST['complete'], $_POST['late']);

	$sql = "INSERT INTO `pgmo`.`deliver_count` (`id`, `proj_id`, `total`, `complete`, `late`, `updated`) 
	VALUES (NULL, '$postValues[0]', '$postValues[1]', '$postValues[2]', '$postValues[3]', CURRENT_TIMESTAMP)";

	$result=$db->query($sql);
	if($result===true) {
		echo "Update successful.";
	} else {
		echo "Something went wrongo.";
	}

} else {
	echo "Nothing was submitted this time";
}

// Disconnect from the DB
$db->close();

?>


