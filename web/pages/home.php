<h1><i class="fa fa-tachometer"></i>Dashboard</h1>

<div><?php include 'widgets/time.php';?></div>

<section class="flex-cont">
  <div class="flex-cont flex-cont-col">
    <?php include 'widgets/temperature.php';?>
    <?php include 'widgets/humidity.php';?>
  </div>
  <?php include 'widgets/meteo.php';?>
</section>