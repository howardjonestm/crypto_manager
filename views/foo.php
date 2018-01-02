<?php 
$activePage = "investments";
include 'header.php';
include '../init.php';
?>
<div class="custombg1">

<?php   
 
 $auth = new authentication(getDB());
 $portfolio = new portfolio(getDB());

if (!isset($_SESSION['user_id'])) {
	//Not logged in, send to login page.
	echo "<p class=\"blacktext\">Please login to access this feature<p>";
}
else{
  //Check we have the right user
	$logged_in = $auth->checkSession();
	
	if(empty($logged_in)){
		//Bad session, ask to login
		$auth->logout();
		echo "<p>There was a problem connecting to your portfolio, please contact a network administrator<p>";
  }
else {
		//User is logged in, show the page
?>


<div class="row">
  
  <div class="col-md-6  borderrounding2 padding1">
    <form class="form-signin borderrounding" action="../logic/personalInvestment.php" method="post">
    <p class= "blacktext"><?php echo $_SESSION['invesmentCompleted']; $_SESSION['invesmentCompleted']=""; ?></p>
        <h3 class="form-signin-heading blacktext">Bitcoin</h3>
        <select class="custom-select" id="btcBuySell" name="btcBuySell">
          <option selected>Option</option>
          <option value="buy">Buy</option>
          <option value="sell">Sell</option>
        </select>
        <label for="bitcoinQuantity" class="sr-only">Quantity</label>
        <input type="number" step="any" id="bitcoinQuantity" class="form-control" name="bitcoinQuantity" placeholder="Quantity" autofocus>
        
        <br>

        <h3 class="form-signin-heading blacktext">Ethereum</h3>
        <select class="custom-select" id="ethBuySell" name="ethBuySell">
          <option selected>Option</option>
          <option value="buy">Buy</option>
          <option value="sell">Sell</option>
        </select>
        <label for="ethereumQuantity" class="sr-only">Quantity</label>
        <input type="number" step="any" id="ethereumQuantity" class="form-control" name="ethereumQuantity" placeholder="Quantity" autofocus>
        <button class="btn btn-l btn-primary btn-block" type="submit">Submit</button>

    </form>
  </div>
<div class="col-md-6 custombg1 padding1">
<div class="coinmarketcap-currency-widget bg-3 " data-currency="bitcoin" data-base="GBP" ></div>
<div class="coinmarketcap-currency-widget bg-3" data-currency="ethereum" data-base="GBP" ></div>
</div>
</div>

<div class="row">
<div class="col-md-6 borderrounding3 padding1">

  <?php
  $userID = $_SESSION['user_id'];
  $balanceArray = $portfolio->retrieveBalance($userID);
  ?>

  <p class="blacktext">Your current bitcoin holdings are worth: <?php echo $balanceArray['btc'] ?> btc</p><br>
  <p class="blacktext">At current market value, these are worth: £££</p><br>
  <p class="blacktext">Your current ethereum holdings are worth: <?php echo $balanceArray['eth'] ?> etc</p><br>
  <p class="blacktext">At current market value, these are worth: £££</p>
</div>
<div class="col-md-6"></div>
</div>

       
</div>
  <?php include 'footer.php'; }} ?>
