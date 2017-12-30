<?php 
$activePage = "home";
include 'header.php';
?>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Welcome to cryptomanager</h3>
  <img src="../pictures/bitcoin1.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <h3>A group and individual portfolio manager</h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">About</h3>
  <p>Cryptomanager is a bespoke cryptocurrency portfolio management tool. It allows the realtime tracking of personal etherem and bitcoin portfolios, in addition to group managed investments </p>
  <p>
    <span class="glyphicon glyphicon-arrow-right"></span><kbd>Insert welcome here</kbd><span class="glyphicon glyphicon-arrow-left"></span>
  </p>
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">Features</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <p>Track portfolio with realtime pricing</p>
      <img src="../pictures/bitcoin1.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>Administer groups to monitor portfolio progress collectively</p>
      <img src="../pictures/bitcoin2.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>Site is in beta stage, in-depth analytics to be added</p>
      <img src="../pictures/ethereum.png" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
  </div>
</div>

<?php include 'footer.php' ?>
 