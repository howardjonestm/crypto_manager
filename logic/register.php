<?php
include '../init.php';
session_start();

$newEmail = $_POST['newEmail'];
$newPassword = $_POST['newPassword'];

$auth = new authentication(getDB());
$balance = new portfolio(getDB());



if(!$auth->checkExists($newEmail)){

$auth->createUser($newEmail, $newPassword);
$auth->login($newEmail, $newPassword);
$balance->addUser($_SESSION['user_id']);

}

if (isset($_SESSION['user_id'])) {
	//logged in, send to index page.
	header( 'Location: ../views/index.php' );
} else{
	$_SESSION['registererror'] = "Unfortunately this email is unavailable";	
	header( 'Location: ../views/loginpage.php' );
}


?>