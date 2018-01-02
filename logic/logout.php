<?php 
include '../init.php';
session_start();
$auth = new authentication(getDB());
$auth->logout();

header( 'Location: ../views/index.php' );


?>