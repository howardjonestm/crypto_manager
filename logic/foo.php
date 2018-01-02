<?php
include '../init.php';
session_start();

$group = new groupPortfolioAnalytics(getDB());
//var_dump($group->returnEthBalance("12121"));
$groupsList = $group->returnGroupPerformance();

var_dump($groupsList);


?>







