<?php 
$activePage = "investments";
include 'header.php';
include '../init.php';
?>
<div class="container">
<div class="custombg1 container-fluid padding1 bg-1">

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
  <h4 class="investmentdark borderrounding4 padding3">Make a personal portfolio adjustment</h4>
    <form class="form-signin borderrounding" action="../logic/personalInvestment.php" method="post" id="adjustments">
    <p class= "blacktext"><?php echo $_SESSION['invesmentCompleted']; $_SESSION['invesmentCompleted']=""; ?></p>
        <h3 class="form-signin-heading blacktext">Bitcoin</h3>       
        
        <select class="form-control" id="btcBuySell" name="btcBuySell">
          <option value="option">Option</option>
          <option value="buy">Buy</option>
          <option value ="sell">Sell</option>       
        </select>
      
        <label for="bitcoinQuantity" class="sr-only">Quantity</label>
        <input type="number" step="any" id="bitcoinQuantity" class="form-control" name="bitcoinQuantity" placeholder="Quantity" autofocus>
        
        <br>

        <h3 class="form-signin-heading blacktext">Ethereum</h3>
        <select class="form-control" id="ethBuySell" name="ethBuySell">
          <option value="option">Option</option>
          <option value="buy">Buy</option>
          <option value="sell">Sell</option>
        </select>
        <label for="ethereumQuantity" class="sr-only">Quantity</label>
        <input type="number" step="any" id="ethereumQuantity" class="form-control" name="ethereumQuantity" placeholder="Quantity" autofocus>
        <button class="btn btn-l investmentdark btn-block" type="submit">Submit</button>

    </form>
  </div>

  <div class="col-md-6 borderrounding3 padding2">
  <h4 class="investmentdark borderrounding4 padding3">Portfolio value</h4>
  <?php
  $userID = $_SESSION['user_id'];
  $balanceArray = $portfolio->retrieveBalance($userID);

  //retrieve current btc/eth price data 
$url = "https://api.coinmarketcap.com/v1/ticker/";
$json = file_get_contents($url);
$data = json_decode($json, TRUE);
$btc_current_price=(double)($data[0]['price_usd']);
$eth_current_price=(double)($data[2]['price_usd']);

  ?>

  <p class="blacktext">You are currently holding <?php echo $balanceArray['btc'] ?> btc</p>
  <p class="blacktext">At market value, these are worth: <span class="investmentgreen"><?php echo "$".(double)($balanceArray['btc'])*$btc_current_price;?></span></p>
  <p class="blacktext">You are currently holding <?php echo $balanceArray['eth'] ?> eth</p>
  <p class="blacktext">At market value, these are worth: <span class="investmentgreen"><?php echo "$".(double)($balanceArray['eth'])*$eth_current_price; ?></span></p>
</div>



</div>
<div class="col-md-6 custombg1 borderrounding3 padding1">
<div class="coinmarketcap-currency-widget bg-3" data-currency="bitcoin" data-base="GBP" ></div>
<div class="coinmarketcap-currency-widget bg-3" data-currency="ethereum" data-base="GBP" ></div>

</div>





       
</div>
</div>
  <?php include 'footer.php'; }} ?>
