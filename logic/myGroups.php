<?php
include '../init.php';
session_start();

function adjustment($buySell,$quantity){
    
        switch ($buySell) {
            case "buy":
                $adjustment = $quantity;
                break;
            case "sell":
                $adjustment = -$quantity;
                break;
            case "Option":
                $adjustment = 0;
                break;
        }
        return $adjustment;
    
    }

//retrieve current btc/eth price data 
$url = "https://api.coinmarketcap.com/v1/ticker/";
$json = file_get_contents($url);
$data = json_decode($json, TRUE);
$btc_current_price=$data[0]['price_usd'];
$eth_current_price=$data[1]['price_usd'];

//calculate portfolio adjustments
$btcBuySell = $_POST["btcBuySell"];
$btcQuantity = $_POST["bitcoinQuantity"];
$ethBuySell = $_POST["ethBuySell"];
$ethQuantity = $_POST["ethereumQuantity"];
$btc_adjustment=adjustment($btcBuySell,$btcQuantity);
$eth_adjustment=adjustment($ethBuySell,$ethQuantity);

//Generate timestamp
date_default_timezone_set('UTC');
$date = date_create();
$time = date_timestamp_get($date);

//Retrieve user email
$emailRetrieve = new authentication(getDB());
$email = $emailRetrieve->getUserEmail($_SESSION['user_id']);

$groupName = $_POST['groupName'];


//insert transaction record 
$transaction = new groups(getDb());
$transaction->insertTransaction($groupName, $email, $time, $eth_adjustment, 
$btc_adjustment, $eth_current_price, $btc_current_price);


$_SESSION['invesmentCompleted']="Your changes have been made";
header( 'Location: ../views/myGroups.php' );

?>