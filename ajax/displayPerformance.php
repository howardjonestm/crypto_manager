<?php
include '../init.php';
session_start();

$q = $_GET['q'];
$activeGroup = $q;



$performance = new groupPortfolioAnalytics(getDB());
$performance->returnGroupPerformance($activeGroup);

echo "<br><br>"
?>