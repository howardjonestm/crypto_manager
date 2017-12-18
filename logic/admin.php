<?php
include '../init.php';
session_start();

$groups = new groups(getDB());


$groupName = $_POST['groupName'];
$groupDescription = $_POST['groupDescription'];

$userID = $_SESSION['user_id'];

$groups->addgroup($groupName,$userID,$groupDescription);



header( 'Location: ../views/admin.php' );


?>