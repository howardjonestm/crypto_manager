<?php
include '../init.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
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
</head>
<body>

<?php
$q = $_GET['q'];


$transactions = new groupPortfolioAnalytics(getDB());
$transactionArray=$transactions->returnTransaction($q);



echo "<table>
<tr>
<th>Email</th>
<th>Timestamp</th>
<th>Eth adj</th>
<th>Btc adj</th>
<th>Eth value</th>
<th>btc value</th>
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

?>
</body>
</html>