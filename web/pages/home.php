<h1><i class="fa fa-tachometer"></i>Dashboard</h1>

<div></div>

<section class="flex-cont">
  <div class="flex-cont flex-cont-col">
    <?php include 'widgets/temperature.php';?>
    <?php include 'widgets/humidity.php';?>
    <?php include 'widgets/weight.php';?>
  </div>
  <div class="flex-cont flex-cont-col">
      <?php include 'widgets/time.php';?>
      <?php include 'widgets/meteo.php';?>
  </div>
</section>