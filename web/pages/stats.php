<?php

  include_once "DatabaseHandler.class.php";

  date_default_timezone_set('UTC');

  if (isset($_GET["target"]) && !empty($_GET["target"])) {
    $target = $_GET["target"];
  } else {
    $target = "temperature";
  }
  $dimensions = array();
  $dimensions["temperature"] = "Temperature";
  $dimensions["humidity"] = "Humidity";

  $sql = "SELECT DATE(TIMESTAMP) AS DATE, MIN(VALUE) AS MIN, MAX(VALUE) AS MAX, AVG(VALUE) AS AVG FROM TEMPERATURE GROUP BY DATE(TIMESTAMP);";//TODO add table here

  $columns = array("DATE", "MIN", "MAX", "AVG");
  $dbOutput = DatabaseHandler::executeSelect($sql, $columns);
  $ranges = array();
  $averages = array();
  foreach($dbOutput as $rowIndex => $row) {
    $dateUTC = strtotime($row["DATE"]) * 1000;
    array_push($ranges, array($dateUTC, floatval($row["MIN"]), floatval($row["MAX"])));
    array_push($averages, array($dateUTC, floatval($row["AVG"])));
  }

?>

<script type="text/javascript">
  var ranges = <?php echo(json_encode($ranges)); ?>;
  var averages = <?php echo(json_encode($averages)); ?>;
</script>

<h1><i class="fa fa-area-chart"></i>Statistics</h1>

<section class="container">
  <div id="filters" class="top-container flex-cont flex-cont-sa">
    <h2>
      <i class="fa fa-filter"></i>
      <span>Filters</span>
    </h2>
    <div>
      <label for="dimension">Show:</label>
      <select id="dimension">
        <?php
          foreach ($dimensions as $key => $value) {
            $option = "<option value='{$key}'";
            if ($key === $target) {
              $option .= " selected";
            }
            $option .= ">{$value}</option>";
            echo($option);
          }
        ?>
      </select>
    </div>
  </div>
  <div id="chart-cont"></div>
</section>