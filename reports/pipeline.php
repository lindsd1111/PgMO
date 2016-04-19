<?php 
  include('../includes/get_all_info.inc.php'); // Get information about the current phase of every project 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <title>ODEE Pipeline</title>

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
            <h1>ODEE Project Pipeline<span><a id="floatRight" class="btn btn-success" href="../index.php" role="button">Return to Home</a></span></h1>
            <br>
          </div>
        </div>
      </div>
    </section>

    <section>
        <div class="row mediumMargins">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <th>Name</th>
                <th>Project Manager</th>
                <th>Description</th>
                <th>Target Completion Date</th>
              </tr>
              
              <?php
                $numRows=$_SESSION['numRows'];
                for ($i=1; $i <= $numRows; $i++) { 
                  if ($phaseResults[$i]['phase_id'] == 1) {
                    echo '<tr><td>' . $projectResults[$i]['name'] . '</td><td>' . $projectResults[$i]['pm'] . '</td><td>' . $projectResults[$i]['description'] . '</td><td>' . $scheduleResults[$i]['target_finish'] . '</td></tr>';
                  } // end if
                } // end for
                
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