<?php 
$activePage = "home";
include 'header.php';
include '../init.php';

$findEmail = new authentication(getDB());
if(isset($_SESSION['user_id'])){  
$email = $findEmail->getUserEmail($_SESSION['user_id']);
}
?>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <?php
  if(!isset($_SESSION['user_id'])){  
    echo " <h3 class=\"margin\">Welcome to cryptomanager</h3> ";
  }else{
    echo 
    "<h3 class=\"margin\">Welcome $email </h3>";
  }
  
  ?>
  
  <img src="../pictures/bitcoin1.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <h3>A group and individual portfolio manager</h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 r">
  <u><h2 class="margin text-center">How to use</h2></u>
  <div class="container">
    <p>(1) If you have not already, sign up and create an account</p>
    <p>(2) Personal investment tools can be found under "investments" tab. Use the buy and sell options to adjust your personal portfolio. The live value of your portfolio is then calculated</p>
    <p>(3) Create a group investment portfolio under the "admin" tab. Here you can also add/delete users from your group</p>
    <p>(4) Make adjustments to your group portfolio under the "myGroups" tab. Here transactions for each of your group members are displayed, along with the performance of all groups registered on the site</p>

  </div>
  
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
 