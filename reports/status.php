<?php 
  include('../includes/get_all_info.inc.php'); // Get information for each card / project
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <title>Project Status</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">

  </head>

  <body>
    
    <section>
      <div class="top-banner">
        <div class="row mediumMargins">
          <div class="col-md-12">
            <h1>High Level Project Status<span><a id="floatRight" class="btn btn-success" href="../index.php" role="button">Return to Home</a></span></h1>
            <br>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <?php
          $numRows=$_SESSION['numRows'];
          for ($i=1; $i <= $numRows; $i++) { 
            // check to see if we need to add the row div
            $rowCheck = $i % 3;
            // echo $rowCheck;
            if ($rowCheck==1) {
              echo '<div class="row">';
            }
            // open the col and thumbail and caption divs
            echo '<div class="col-md-4 cards">';
            echo '<div class="thumbnail">';
            echo '<div class="caption">';
            echo '<h3>Project: ' . $projectResults[$i]['name'] . '</h3>';
            echo '<h4>PM: ' . $projectResults[$i]['pm'] . '</h4>';

            // change background color based if target_finish != est_finish
            if (strtotime($scheduleResults[$i]['target_finish']) == strtotime($scheduleResults[$i]['est_finish'])) {
              $color = "black";
            } else {
              $color = "yellow";
            }
            echo '<p class="' . $color . '">&nbsp;Estimated Finish: &nbsp;' . substr($scheduleResults[$i]['est_finish'], 0, -9) . '</p>';
            // change background color based on PM status
            if ($statusResults[$i]['pm_status']==1) {
              $color="red";
            } elseif ($statusResults[$i]['pm_status']==2 ) {
              $color="orange";
            } elseif ($statusResults[$i]['pm_status']==3) {
              $color="yellow";
            } elseif ($statusResults[$i]['pm_status']==4) {
              $color="chartreuse";
            } elseif ($statusResults[$i]['pm_status']==5) {
              $color="green";
            } else {
              $color="grayText";
            }

            echo '<p class="' . $color . '">&nbsp;PM Status Score: ' . $statusResults[$i]['pm_status'] . '</p>';
            
            // change background color based on Stakeholder status
            if ($statusResults[$i]['stake_status']==1) {
              $color="red";
            } elseif ($statusResults[$i]['stake_status']==2) {
              $color="orange";
            } elseif ($statusResults[$i]['stake_status']==3) {
              $color="yellow";
            } elseif ($statusResults[$i]['stake_status']==4) {
              $color="chartreuse";
            } elseif ($statusResults[$i]['stake_status']==5) {
              $color="green";
            } else {
              $color="grayText";
            }
            echo '<p class="' . $color . '">&nbsp;Stakeholder Status Score: ' . $statusResults[$i]['stake_status'] . '</p>';

           // change background color based on LCI status
            if ($statusResults[$i]['lind_status']==1) {
              $color="red";
            } elseif ($statusResults[$i]['lind_status']==2) {
              $color="orange";
            } elseif ($statusResults[$i]['lind_status']==3) {
              $color="yellow";
            } elseif ($statusResults[$i]['lind_status']==4) {
              $color="chartreuse";
            } elseif ($statusResults[$i]['lind_status']==5) {
              $color="green";
            } else {
              $color="grayText";
            }
            echo '<p class="' . $color . '">&nbsp;Lindstedt Confidence Index: ' . $statusResults[$i]['lind_status'] . '</p>';

            echo '<p><em>Summary:</em><br>' . $statusResults[$i]['exec_sum'] . '</p>';
            // close divs
            echo '</div></div></div>';
            // check and close the row div
            if ($rowCheck==0) {
              echo '</div>';
            } 
          }
        ?>
      </div> <!-- Container -->
    </section>


    <?php include '../includes/footer.textonly.inc.php'; ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>