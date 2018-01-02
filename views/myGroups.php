<?php 
$activePage = "myGroups";
include '../init.php';
include 'header.php';

$userID = $_SESSION['user_id'];

$group = new groups(getDB());

$groupsList = $group->getGroups($userID);

if (!isset($_SESSION['user_id'])) {
	//Not logged in, send to login page.
	echo "<p>Please login to access this feature<p>";
}
else{

?>

<div class="container">
  <div class="row bg-1 padding2">
  <div class="col-md-6 borderrounding2">

  <form action="../logic/myGroups.php" method="post">

  <div class="form-group">
    <label for="sel1">Select group:</label>
    <select class="form-control" id="groupName" name="groupName" onchange="show>

  <?php 
  foreach($groupsList as $value){
      echo "<option>$value</option>";
  }
  ?>
  </select>
  <strong>Select action</strong>

    <p class= "text-success"><?php echo $_SESSION['invesmentCompleted']; $_SESSION['invesmentCompleted']=""; ?></p>
        <h3 class="form-signin-heading">Bitcoin</h3>
        <select class="form-control col" id="btcBuySell" name="btcBuySell">
          <option selected>Option</option>
          <option value="buy">Buy</option>
          <option value="sell">Sell</option>
        </select>
        <label for="bitcoinQuantity" class="sr-only">Quantity</label>
        <input type="number" step="any" id="bitcoinQuantity" class="form-control" name="bitcoinQuantity" placeholder="Quantity" autofocus>
        
        <br>

        <h3 class="form-signin-heading">Ethereum</h3>
        <select class="form-control col" id="ethBuySell" name="ethBuySell">
          <option selected>Option</option>
          <option value="buy">Buy</option>
          <option value="sell">Sell</option>
        </select>
        <label for="ethereumQuantity" class="sr-only">Quantity</label>
        <input type="number" step="any" id="ethereumQuantity" class="form-control" name="ethereumQuantity" placeholder="Quantity" autofocus>
        <button class="btn btn-l btn-primary btn-block" type="submit">Submit</button>

  </form>

  </div>

  </div>

  <div class="col-md-6">
  <p>Investment history will go here</p>
  </div>
  

</div>


<div class="col-md-6 col-md-offset-3 bg-2">
<h3 class="blacktext">Groups portfolio info</h3>

</div>
</div>

<?php include 'footer.php'; } ?>