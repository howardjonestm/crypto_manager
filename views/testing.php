<?php
$url = "https://api.coinmarketcap.com/v1/ticker/";
$json = file_get_contents($url);
$data = json_decode($json, TRUE);
$btc_current_price=(float)($data[0]['price_usd']);


?>