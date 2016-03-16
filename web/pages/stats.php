<?php
  if (isset($_GET["target"]) && !empty($_GET["target"])) {
    $target = $_GET["target"];
  } else {
    $target = "temperature";
  }
  $dimensions = array();
  $dimensions["temperature"] = "Temperature";
  $dimensions["humidity"] = "Humidity";
?>

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