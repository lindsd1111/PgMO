<?php 
  include('../includes/get_all_info.inc.php'); // Get information about the current phase of every project 
  $numRows=$_SESSION['numRows'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <title>Portfolio by Phase</title>

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
            <h1>Portolio of ODEE Projects by Phase Gate<span><a id="floatRight" class="btn btn-success" href="../index.php" role="button">Return to Home</a></span></h1>
            <h3>Note: Does NOT include projects in the pipeline or archived projects.</h3>
            <br>
          </div>
        </div>
      </div>
    </section>

    <section>
        <div class="row mediumMargins">
          <h3>Total Number of Projects in this Table: <?php echo "$numRows"; ?></h3>
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <th>Initiate</th>
                <th>Initiate Approvals</th>
                <th>Plan</th>
                <th>Plan Approvals</th>
                <th>Execute</th>
                <th>Close</th>
              </tr>
              
              <?php
                for ($i=1; $i <= $numRows; $i++) { 
                  switch ($phaseResults[$i]['phase_id']) {
                    case '1':
                      echo "<tr><td><strong>" . $projectResults[$i]['name'] . "</strong> - " . $projectResults[$i]['pm'] . "<br>Estimated Finish: " . substr($scheduleResults[$i]['est_finish'], 0, -9) . "</td><td></td><td></td><td></td><td></td><td></td></tr>";
                      break;
                    case '2':
                      echo "<tr><td></td><td><strong>" . $projectResults[$i]['name'] . "</strong> - " . $projectResults[$i]['pm'] . "<br>Estimated Finish: " . substr($scheduleResults[$i]['est_finish'], 0, -9) . "</td><td></td><td></td><td></td><td></td></tr>";
                      break;
                    case '3':
                      echo "<tr><td></td><td><strong>" . $projectResults[$i]['name'] . "</strong> - " . $projectResults[$i]['pm'] . "<br>Estimated Finish: " . substr($scheduleResults[$i]['est_finish'], 0, -9) . "</td><td></td><td></td><td></td><td></td></tr>";
                      break;
                    case '4':
                      echo "<tr><td></td><td></td><td><strong>" . $projectResults[$i]['name'] . "</strong> - " . $projectResults[$i]['pm'] . "<br>Estimated Finish: " . substr($scheduleResults[$i]['est_finish'], 0, -9) . "</td><td></td><td></td><td></td></tr>";
                      break;
                    case '5':
                      echo "<tr><td></td><td></td><td></td><td><strong>" . $projectResults[$i]['name'] . "</strong> - " . $projectResults[$i]['pm'] . "<br>Estimated Finish: " . substr($scheduleResults[$i]['est_finish'], 0, -9) . "</td><td></td><td></td></tr>";
                      break;
                    case '6':
                      echo "<tr><td></td><td></td><td></td><td></td><td><strong>" . $projectResults[$i]['name'] . "</strong> - " . $projectResults[$i]['pm'] . "<br>Estimated Finish: " . substr($scheduleResults[$i]['est_finish'], 0, -9) . "</td><td></td></tr>";
                      break;
                    case '7':
                      echo "<tr><td></td><td></td><td></td><td></td><td></td><td><strong>" . $projectResults[$i]['name'] . "</strong> - " . $projectResults[$i]['pm'] . "<br>Estimated Finish: " . substr($scheduleResults[$i]['est_finish'], 0, -9) . "</td></tr>";
                      break;
                    default:
        
                      break;
                  }
                  
                }
                
              ?>
            </table>
        </div> <!-- row -->

    </section>

    <br><br>
   
    <footer>
      <?php include('../includes/footer.textonly.inc.php'); ?> <!-- Insert the footer from a separate file -->
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>