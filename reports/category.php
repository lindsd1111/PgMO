<?php 
  include('../includes/calc_categories.inc.php'); // Get information about the current phase of every project 

  // Need to create an array here for use in the highcharts javascript all the way at the end of this .php page
  $numCats=$_SESSION['numCats'];
  $catPercentHigh = array();
    for ($i=1; $i <= $numCats; $i++) { 
      $catPercentHigh[$i]=($catCount[$i] / $numCats) * 100;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <title>Portfolio Categories</title>

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
            <h1>ODEE Portfolio Categorizations<span><a id="floatRight" class="btn btn-success" href="../index.php" role="button">Return to Home</a></span></h1>
            <br>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-6 rightBorder category">
            <h2>Number of projects in each category</h2>
            <?php 
              $numCats=$_SESSION['numCats'];
              for ($i=1; $i <= $numCats; $i++) { 
                echo "<p>" . $eachCategoryName[$i] . " = " . $catCount[$i] . "</p>";
              }
            ?>
          </div>
          <div class="col-md-6">
            <!-- This inserts the highcharts piechart -->
            <div class="row">
                <div class="col-md-12">
                    <div id="countChart" style="min-width: 310px; max-width: 400px; height: 350px; margin: 0 auto"></div>
                </div>
            </div>
          </div>
        </div> <!-- row --> 
      <hr>
        <div class="row">
          <div class="col-md-6 rightBorder category">
            <h2>Percentage of projects in each category</h2>
            <?php 
              $numCats=$_SESSION['numCats'];
              for ($i=1; $i <= $numCats; $i++) { 
                $catPercent=($catCount[$i] / $numCats) * 100;
                echo "<p>" . $eachCategoryName[$i] . " = " . number_format((float)$catPercent, 2, '.', '') . "/%</p>";
              }
            ?>
          </div>
          <div class="col-md-6">
            <!-- This inserts the highcharts piechart -->
            <div class="row">
                <div class="col-md-12">
                    <div id="percentChart" style="min-width: 310px; max-width: 400px; height: 350px; margin: 0 auto"></div>
                </div>
            </div>
          </div>
        </div> <!-- row --> 
      <hr>
        <div class="row">
          <div class="col-md-6 rightBorder category">
            <h2>Number of (originally) estimated hours in each category</h2>
            <?php 
              $numCats=$_SESSION['numCats'];
              for ($i=1; $i <= $numCats; $i++) { 
                echo "<p>" . $eachCategoryName[$i] . " = hours will go here in the future</p>";
              }
            ?>
          </div>
          <div class="col-md-6">
            <h2>A pie chart will go here (below)</h2>
          </div>
        </div> <!-- row --> 
      </div> <!-- container -->
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
    <!-- Insert scripts for Highcharts -->
    <script src="../highcharts/js/highcharts.js"></script>
    <script src="../highcharts/js/highcharts-more.js"></script>
    <script src="../highcharts/js/modules/exporting.js"></script>
    <script src="../js/result.js"></script>

    <!-- Highcart script for creation of count column chart --> 
    <script>
    $(function () {
    $('#countChart').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Number of Projects per Category'
        },
        subtitle: {
            text: 'Mouse-over for details'
        },
        xAxis: {
            categories: [
                'Category'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Count'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: '<?php echo $eachCategoryName[1]; ?>',
            data: [<?php echo $catCount[1]; ?>]

        }, {
            name: '<?php echo $eachCategoryName[2]; ?>',
            data: [<?php echo $catCount[2]; ?>]

        }, {
            name: '<?php echo $eachCategoryName[3]; ?>',
            data: [<?php echo $catCount[3]; ?>]

        },  {
            name: '<?php echo $eachCategoryName[4]; ?>',
            data: [<?php echo $catCount[4]; ?>]

        }, {
            name: '<?php echo $eachCategoryName[5]; ?>',
            data: [<?php echo $catCount[5]; ?>]

        }, {
            name: '<?php echo $eachCategoryName[6]; ?>',
            data: [<?php echo $catCount[6]; ?>]

        }, {
            name: '<?php echo $eachCategoryName[7]; ?>',
            data: [<?php echo $catCount[7]; ?>]

        }]
    });
});
    </script>

    <!-- Highcart script for creation of percentages pie chart --> 
    <script>
        $(function () {

        $(document).ready(function () {

            // Build the chart
            $('#percentChart').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Categories by Percentage of Projects'
                },
                subtitle: {
                    text: 'Mouse-over for details'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Categories',
                    colorByPoint: true,
                    data: [{
                        name: '<?php echo $eachCategoryName[1]; ?>',
                        y: <?php echo $catPercentHigh[1]; ?>
                    }, {
                        name: '<?php echo $eachCategoryName[2]; ?>',
                        y: <?php echo $catPercentHigh[2]; ?>
                    }, {
                        name: '<?php echo $eachCategoryName[3]; ?>',
                        y: <?php echo $catPercentHigh[3]; ?>
                    }, {
                        name: '<?php echo $eachCategoryName[4]; ?>',
                        y: <?php echo $catPercentHigh[4]; ?>
                    }, {
                        name: '<?php echo $eachCategoryName[5]; ?>',
                        y: <?php echo $catPercentHigh[5]; ?>
                    }, {
                        name: '<?php echo $eachCategoryName[6]; ?>',
                        y: <?php echo $catPercentHigh[6]; ?>
                    }, {
                        name: '<?php echo $eachCategoryName[7]; ?>',
                        y: <?php echo $catPercentHigh[7]; ?>
                    }]
                }]
            });
        });
    });
    </script>
  </body>
</html>