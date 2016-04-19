
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <title>PgMO PPM Tracker</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>ODEE PgMO Portfolio Tracker</h1>
        <br>
        <h4>Looking over your shoulder since 2013</h4>
        <br>
        <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6 rightBorder">
          <h1>Choose a Project to Update</h1>
          <p>(Click on the project name)</p>
          <hr>
          <table class="table table-hover"> 
            <thead> 
              <tr> 
                <th>ID</th> 
                <th>Project Name</th> 
                <th>PM</th> 
              </tr>
            </thead> 
            <tbody> 
              <?php 
                include 'includes/get_projects.inc.php';
              ?>
            </tbody> 
          </table>
          
        </div> 

        <div class="col-md-6 reports">
          <h1>Choose a Report to Run</h1>
          <p>(Click on the icon)</p>
          <hr>
          <h4><a class="icon" href="reports/status.php"><span class="glyphicon glyphicon-ok" aria-hidden="true"></a> &nbsp;High Level Status</span></h4>
          <h4><a class="icon" href="reports/phase.php"><span class="glyphicon glyphicon-road" aria-hidden="true"></a> &nbsp;Portfolio by Phase</span></h4>
          <h4><a class="icon" href="reports/category.php"><span class="glyphicon glyphicon-knight" aria-hidden="true"></a> &nbsp;Portfolio by Category</span></h4>
          <h4><a class="icon" href="reports/pipeline.php"><span class="glyphicon glyphicon-time" aria-hidden="true"></a> &nbsp;Pipeline</span></h4>
          <h4><a class="icon" href="#"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></a> &nbsp;Timeline - Forthcoming</span></h4>
        </div> 
      </div> <!-- row --> 
      
      <?php include 'includes/footer.textonly.inc.php'; ?>

    </div> <!-- container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>