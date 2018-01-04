<?php
include '../init.php';
session_start();
?>


<?php
$q = $_GET['q'];


$transactions = new groupPortfolioAnalytics(getDB());
$transactionArray=$transactions->returnTransaction($q);

if($q=="Select"){
    echo "<b>Please select a group</b>";
}
else{

echo "<table>
<tr>
<th>Email</th>
<th>Timestamp</th>
<th>Eth adj</th>
<th>Btc adj</th>
<th>Eth price</th>
<th>btc price</th>
</tr>";


foreach($transactionArray as $row){
    echo "<tr>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['timestamp'] . "</td>";
    echo "<td>" . $row['eth_change'] . "</td>";
    echo "<td>" . $row['btc_change'] . "</td>";
    echo "<td>" . $row['eth_market_value'] . "</td>";
    echo "<td>" . $row['btc_market_value'] . "</td>";
    echo "</tr>";
}
echo "</table>";

;}?>
