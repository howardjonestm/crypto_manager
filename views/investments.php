<?php 
$activePage = "investments";
include 'header.php';
include '../init.php';
?>

<?php   
 
 $auth = new authentication(getDB());
 $portfolio = new portfolio(getDB());

if (!isset($_SESSION['user_id'])) {
	//Not logged in, send to login page.
	echo "<p>Please login to access this feature<p>";
}
else{
  //Check we have the right user
	$logged_in = $auth->checkSession();
	
	if(empty($logged_in)){
		//Bad session, ask to login
		$auth->logout();
		echo "<p>There was a problem finding connecting to your portfolio, please contact a network administrator<p>";
  }
else {
		//User is logged in, show the page
?>


<div class="row w-85 mx-auto">
  
  <div class="col-sm">
  <form class="form-signin" action="../logic/personalInvestment.php" method="post">
  <p class= "text-success"><?php echo $_SESSION['invesmentCompleted']; $_SESSION['invesmentCompleted']=""; ?></p>
      <h3 class="form-signin-heading">Bitcoin</h3>
      <select class="custom-select col" id="btcBuySell" name="btcBuySell">
        <option selected>Option</option>
        <option value="buy">Buy</option>
        <option value="sell">Sell</option>
      </select>
      <label for="bitcoinQuantity" class="sr-only">Quantity</label>
      <input type="number" step="any" id="bitcoinQuantity" class="form-control" name="bitcoinQuantity" placeholder="Quantity" autofocus>
      
      <br>

      <h3 class="form-signin-heading">Ethereum</h3>
      <select class="custom-select col" id="ethBuySell" name="ethBuySell">
        <option selected>Option</option>
        <option value="buy">Buy</option>
        <option value="sell">Sell</option>
      </select>
      <label for="ethereumQuantity" class="sr-only">Quantity</label>
      <input type="number" step="any" id="ethereumQuantity" class="form-control" name="ethereumQuantity" placeholder="Quantity" autofocus>
      <button class="btn btn-l btn-primary btn-block" type="submit">Submit</button>

  </form>
</div>
<div class="col-sm">
<div class="coinmarketcap-currency-widget" data-currency="bitcoin" data-base="GBP" ></div>
<div class="coinmarketcap-currency-widget" data-currency="ethereum" data-base="GBP" ></div>
</div>

</div>


<div class="row w-70 mx-auto">


  <?php
  $userID = $_SESSION['user_id'];
  $balanceArray = $portfolio->retrieveBalance($userID);
  ?>

  <br><br><br>
  <p>Your current bitcoin holdings are worth: <?php echo $balanceArray['btc'] ?> btc</p><br>
  <p>At current market value, these are worth: £££</p><br><br>
  <p>Your current ethereum holdings are worth: <?php echo $balanceArray['eth'] ?> etc</p><br>
  <p>At current market value, these are worth: £££</p>
</div>

       

  <?php include 'footer.php'; }} ?>