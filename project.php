<?php 
session_start();

if (isset($_GET["id"])){
  $_SESSION['projectID']=$_GET["id"];
}

if ($_POST) {
  // print_r($_POST);
  include 'includes/updateTable.inc.php';
}

// get the most recent information about this project from the DB
include 'includes/get_project_info.inc.php'; 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Project Update Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>
    <div class="container">
      <div class="jumbotron">
        <div class="row">
          <div class="col-md-12">
            <h1><?php echo $array['name'] . " project"; ?></h1>
            <h2>Update Information about your Project</h2>
            <br>
            <h4>(Note: This page is meant to be functional, not pretty.) <a id="floatRight" class="btn btn-success" href="index.php" role="button">Return to Home</a></h4>

          </div>
        </div>
      </div> <!-- jumbotron -->
<!-- PROJECT DATA FIELDS -->
      <div class="row">
        <div class="col-md-4 rightBorder">
          <h1>Project</h1>
          <hr>
          <!--  IMPORTANT: We are UPDATING this entry, not creating a NEW entry when saving to the DB -->
          <form id="project" method="post" action="">
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $array['id']; ?>">
            <div class="form-group">
              <label for="name">Project Name</label>
              <input type="text" class="form-control" name="name" id="name" value="<?php echo $array['name']; ?>">
            </div>
            <div class="form-group">
              <label for="pm">Project Manager</label>
              <input type="text" class="form-control" name="pm" id="pm" value="<?php echo $array['pm']; ?>">
            </div>
            <div class="form-group">
              <label for="description">Brief Description</label>
              <textarea class="form-control" rows="2" name="description" id="description"><?php echo $array['description']; ?></textarea>
            </div>
            <div class="form-group">
              <label for="hours">Estimated Hours</label>
              <input type="number" class="form-control" name="hours" id="hours" value="<?php echo $array['hours']; ?>">
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control" name="category" id="category">
                <?php 
                  // figure out the current category choice (it's an integer)
                  $currentCategory = $array['category'];
                  for ($i=1; $i <= 8; $i++) {
                    if ($currentCategory == $i) {
                      echo "<option selected>" . $eachCategoryName[$i] . "</option>";
                    } else {
                      echo "<option>" . $eachCategoryName[$i] . "</option>";
                    } // end if
                   
                  } // end for
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="fType">Finish Type</label>
              <select class="form-control" name="finish_type" id="finish_type">
                <?php 
                  // Need to tidy this up so that the $array['finish_type'] is not displayed twice in the list
                  switch ($array['finish_type']) {
                    case 'Unmovable':
                      echo "<option selected>Unmovable</option>";
                      echo "<option>Beneficial</option>";
                      echo "<option>Flexible</option>";
                      break;

                    case 'Beneficial':
                      echo "<option>Unmovable</option>";
                      echo "<option selected>Beneficial</option>";
                      echo "<option>Flexible</option>";
                      break;
                    
                    default:
                      echo "<option>Unmovable</option>";
                      echo "<option>Beneficial</option>";
                      echo "<option selected>Flexible</option>";
                      break;
                  }
                ?>
              </select>
            </div>
            <button type="submit" name="project" class="btn btn-default">Update</button>
          </form>
        </div> 


<!-- PHASE GATE FIELDS --> 
        <div class="col-md-4 rightBorder">
          <h1>Phase Gate</h1>
          <hr>
          <form id="phase" method="post" action="">
            <div class="form-group">
              <label for="phase_id">Current Phase Gate</label>
              <select class="form-control" name="phase_id" id="phase_id">
                <?php 
                  // figure out the current phase choice (it's an integer)
                  $currentPhase = $phaseGateArray['phase_id'];
                  for ($i=0; $i < 9; $i++) {
                    if ($currentPhase == $i) {
                      echo "<option selected>" . $eachPhaseName[$i] . "</option>";
                    } else {
                      echo "<option>" . $eachPhaseName[$i] . "</option>";
                    } // end if
                   
                  } // end for
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="next_phase_name">Next Phase Gate</label>
              <!-- Note: This is a calculated field that does not pull or write to the DB -->
              <!-- Reminder: We check to make sure that the current phase is not Archive else we'd get an error here-->
              <input readonly type="text" class="form-control" name="next_phase_name" id="next_phase_name" value="<?php $i = $phaseGateArray['phase_id']+1; if ($i<9) {echo $eachPhaseName[$i];}; ?>">
              
            </div>
            <div class="form-group">
              <label for="next_phase_date">Next Phase Approval Submission Date</label>
              <input type="datetime" class="form-control" name="next_phase" id="next_phase" value="<?php echo $phaseGateArray['next_phase']; ?>">
            </div>
            <div class="form-group">
              <label for="notes">Tracking Notes</label>
              <textarea class="form-control" rows="4" name="notes" id="notes"><?php echo $phaseGateArray['notes']; ?></textarea>
            </div>
            <!-- Important: We do NOT want to write this field back to the database.  We only want to display the most recent update.-->
            <div class="form-group">
              <label for="updated">Status Last Updated on:</label>
              <input readonly type="datetime" class="form-control" id="updated" value="<?php echo $phaseGateArray['updated']; ?>">
            </div>
            <button type="submit" name="phase" class="btn btn-default">Update</button>
          </form>
        </div> 

<!-- SCHEDULE FIELDS --> 
        <div class="col-md-4">
          <h1>Schedule</h1>
          <hr>
          <form id="schedule" method="post" action="">
            <div class="form-group">
              <label for="start">Start Date</label>
              <input type="datetime" class="form-control" name="start" id="start" value="<?php echo $scheduleArray['start']; ?>">
            </div>
            <div class="form-group">
              <label for="finish">Target Finish Date</label>
              <input type="datetime" class="form-control" name="finish" id="finish" value="<?php echo $scheduleArray['target_finish']; ?>">
            </div>
            <div class="form-group">
              <label for="baseline_finish">Baseline Finish Date</label>
              <input type="datetime" class="form-control" name="baseline_finish" id="baseline_finish" value="<?php echo $scheduleArray['baseline_finish']; ?>">
            </div>
            <div class="form-group">
              <label for="est_finish">Estimated Actual Finish Date</label>
              <input type="datetime" class="form-control" name="est_finish" id="est_finish" value="<?php echo $scheduleArray['est_finish']; ?>">
            </div>
            <button type="submit" name="schedule" class="btn btn-default">Update</button>
          </form>
        </div>
      </div> <!-- row --> 
<!-- NEW ROW -->
      <hr>
      <div class="row">
<!-- DELIVERAVBLES COUNTS FIELDS --> 
        <div class="col-md-3 rightBorder">
          <h1>Deliverable Counts</h1>
          <hr>
          <form id="deliver_count" method="post" action="">
            <div class="form-group">
              <label for="hours">Total Number of Deliverables</label>
              <input type="number" class="form-control" name="total" id="total" value="<?php echo $deliverCountArray['total']; ?>">
            </div>
            <div class="form-group">
              <label for="complete">Total Number of Completed Deliverables</label>
              <input type="number" class="form-control" name="complete" id="complete" value="<?php echo $deliverCountArray['complete']; ?>">
            </div>
            <div class="form-group">
              <!-- Note: This is calculated field; we will not write it back to the DB -->
              <label for="late">Total Number of Remaining Deliverables</label>
              <input readonly type="number" class="form-control" name="late" id="late" value="<?php echo $deliverCountArray['total']-$deliverCountArray['complete']; ?>">
            </div>
            <div class="form-group">
              <label for="late">Total Number of Late Deliverables</label>
              <input type="number" class="form-control" name="late" id="late" value="<?php echo $deliverCountArray['late']; ?>">
            </div>
            <!-- Important: We do NOT want to write this field back to the database.  We only want to display the most recent update.-->
            <div class="form-group">
              <label for="updated">Status Last Updated on:</label>
              <input readonly type="datetime" class="form-control" id="updated" value="<?php echo $deliverCountArray['updated']; ?>">
            </div>
            <button type="submit" name="deliver_count" class="btn btn-default">Update</button>
          </form>
        </div> 

<!-- DELIVERAVBLES FIELDS --> 
        <div class="col-md-6 rightBorder">
          <h1>Deliverables</h1>
          <hr>
          <form id="deliver_notes" method="post" action="">
            <div class="form-group">
              <label for="recent_deliverables">Three Most Recent Completed Deliverables</label>
              <input type="text" class="form-control" name="recent_1" id="recent_1" value="<?php echo $deliverNotesArray['recent_1']; ?>">
              <input type="text" class="form-control" name="recent_2" id="recent_2" value="<?php echo $deliverNotesArray['recent_2']; ?>">
              <input type="text" class="form-control" name="recent_3" id="recent_3" value="<?php echo $deliverNotesArray['recent_3']; ?>">
            </div>
            <div class="form-group">
              <label for="next_deliverables">Next Three Key Deliverables</label>
              <input type="text" class="form-control" name="next_1" id="next_1" value="<?php echo $deliverNotesArray['next_1']; ?>">
              <input type="text" class="form-control" name="next_2" value="<?php echo $deliverNotesArray['next_2']; ?>">
              <input type="text" class="form-control" name="next_3" value="<?php echo $deliverNotesArray['next_3']; ?>">
            </div>
            <div class="form-group">
              <label for="late_deliverables">Indicate any Late Deliverables</label>
              <input type="text" class="form-control" name="late_1" id="late_1" value="<?php echo $deliverNotesArray['late_1']; ?>">
              <input type="text" class="form-control" name="late_2" id="late_2" value="<?php echo $deliverNotesArray['late_2']; ?>">
              <input type="text" class="form-control" name="late_3" id="late_3" value="<?php echo $deliverNotesArray['late_3']; ?>">
            </div>
            <!-- Important: We do NOT want to write this field back to the database.  We only want to display the most recent update.-->
            <div class="form-group">
              <label for="updated">Status Last Updated on:</label>
              <input readonly type="datetime" class="form-control" id="updated" value="<?php echo $deliverNotesArray['updated']; ?>">
            </div>
            <button type="submit" name="deliver_notes" class="btn btn-default">Update</button>
          </form>
        </div> 
<!-- STATUS FIELDS --> 
        <div class="col-md-3">
          <h1>Status</h1>
          <hr>
          <form id="status" method="post" action="">
            <div class="form-group">
              <label for="pm_status"><?php echo $array['pm']; ?> Status Score</label>
              <select class="form-control" name="pm_status" id="pm_status">
                <?php 
                  // figure out the current phase choice (it's an integer
                    $currentStatus = $statusArray['pm_status'];
                    for ($i=1; $i <= 8; $i++) {
                      if ($currentStatus == $i) {
                        echo "<option selected>" . $statusArray['pm_status'] . "</option>";
                      } else {
                        echo "<option>" . $i . "</option>";
                      } // end if
                    } // end for
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="stake_status">Stakeholder Status Score</label>
              <select class="form-control" name="stake_status" id="stake_status">
                <?php 
                  // figure out the current phase choice (it's an integer)
                  $currentStatus = $statusArray['stake_status'];
                  for ($i=1; $i <= 8; $i++) {
                    if ($currentStatus == $i) {
                      echo "<option selected>" . $statusArray['stake_status'] . "</option>";
                    } else {
                      echo "<option>" . $i . "</option>";
                    } // end if
                  } // end for
                ?>
              </select>
            </div>
              <div class="form-group">
              <label for="lind_status">Lindstedt Confidence Index (LCI)</label>
              <select class="form-control" name="lind_status" id="lind_status">
                <?php 
                  // figure out the current phase choice (it's an integer)
                  $currentStatus = $statusArray['lind_status'];
                  for ($i=1; $i <= 8; $i++) {
                    if ($currentStatus == $i) {
                      echo "<option selected>" . $statusArray['lind_status'] . "</option>";
                    } else {
                      echo "<option>" . $i . "</option>";
                    } // end if
                  } // end for
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exec_sum">Current Executive Status</label>
              <textarea class="form-control" rows="7" name="exec_sum" id="exec_sum"><?php echo $statusArray['exec_sum']; ?></textarea>
            </div>
            <!-- Important: We do NOT want to write this field back to the database.  We only want to display the most recent update.-->
            <div class="form-group">
              <label for="updated">Status Last Updated on:</label>
              <input readonly type="datetime" class="form-control" name="updated" id="updated" value="<?php echo $statusArray['updated']; ?>">
            </div>
            <button type="submit" name="status" class="btn btn-default">Update</button>
          </form>
        </div>
      </div> <!-- row --> 

      <hr>
      <div class="row">
        <div class="col-md-1 col-md-offset-10">
          <a class="btn btn-success" href="index.php" role="button">Return to Home</a>
        </div>
      </div>

      <?php include 'includes/footer.textonly.inc.php'; ?>


  </div> <!-- container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
