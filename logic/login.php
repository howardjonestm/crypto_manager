<?php
include '../init.php';
session_start();

$Email = $_POST['email'];
$Password = $_POST['inputPassword'];

$auth = new authentication(getDB());

$auth->login($Email, $Password);

if(isset($_SESSION['user_id'])){
    header ('Location: ../views/index.php');
}
else{
    $_SESSION['loginerror'] = "There was a problem with your login details, please try again";
    header ('Location: ../views/loginpage.php');  
}

?>

