<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8" />

    <link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />
    <link rel="stylesheet" href="bower_components/weather-icons/css/weather-icons.min.css" />
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css" />

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/moment/min/moment.min.js"></script>
    <script src="bower_components/highcharts/highcharts.js"></script>
    <script src="bower_components/highcharts/highcharts-more.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/widgets.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/onload.js"></script>

    <title>Domus</title>

  </head>

  <body>

    <header class="flex-cont flex-cont-left">
      <i class="fa fa-home fa-lg"></i>
      <span>Domus</span>
    </header>

    <div class="page-wrapper">

      <?php
        if (isset($_GET["page"]) && !empty($_GET["page"])) {
          include 'pages/' . $_GET["page"] . '.php';
        } else {
          include 'pages/home.php';
        }
      ?>

    </div>

    <footer>
      <p>Here is my footer.</p>
    </footer>

  </body>

</html>