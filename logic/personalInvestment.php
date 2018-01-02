<?php
//ideally need to check session on this page for security

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
        case "option":
            $adjustment = 0;
            break;
    }
    return $adjustment;

}

//bitcoin form data
$btcBuySell = $_POST["btcBuySell"];
$btcQuantity = $_POST["bitcoinQuantity"];

//Etherum for data 
$ethBuySell = $_POST["ethBuySell"];
$ethQuantity = $_POST["ethereumQuantity"];

//Calculate portfolio adjustments
$btcAdjustment = adjustment($btcBuySell,$btcQuantity);
$ethAdjustment = adjustment($ethBuySell,$ethQuantity);

$userID = $_SESSION['user_id'];


$balanceEdit = new portfolio(getDB());
$balanceEdit->portfolioAdjustment($btcAdjustment, $ethAdjustment, $userID);


$_SESSION['invesmentCompleted']="Your changes have been made";
header( 'Location: ../views/investments.php' );

?>