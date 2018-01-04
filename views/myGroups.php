<?php 
$activePage = "myGroups";
include '../init.php';
include 'header.php';





if (!isset($_SESSION['user_id'])) {
	//Not logged in, send to login page.
	echo "<p class=\"blacktext\">Please login to access this feature<p>";
}
else{

$userID = $_SESSION['user_id'];
$group = new groups(getDB());
$groupsList = $group->getGroups($userID);

?>

<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>

<div class="container">
  <div class="row bg-1 padding2 borderrounding8">
  <div class="col-md-6 borderrounding2">

  <form action="../logic/myGroups.php" method="post">

  <div class="form-group">
    <label for="sel1">Select group:</label>
    <select class="form-control" id="groupName" name="groupName" onchange="getTransactions(this.value); displayPerformance(this.value)">

  <?php 
  echo "<option selected>Select</option>";
  foreach($groupsList as $value){
      echo "<option>$value</option>";
  }
  ?>
  </select>
  

    <p class= "text-success"><?php if(isset($_SESSION['invesmentCompleted'])){echo $_SESSION['invesmentCompleted'];} $_SESSION['invesmentCompleted']=""; ?></p>
    <strong>Make changes</strong>
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
  <h4 class="investmentdark borderrounding4 padding3">Group transaction history</h4>
  <div id="getTrans"><b>Please select a group</b></div>
  </div>
  

</div>


<div class="col-md-12 borderrounding2 bg-2">
<center><h3 class="padding3 borderrounding7">Performance of all groups (may take a moment to load)</h3><center>




<div id="displayPerformance"><b>Please select a group</b></div>

</div>
</div>

<?php include 'footer.php'; } ?>