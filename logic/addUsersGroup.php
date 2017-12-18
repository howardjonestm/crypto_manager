<?php
include '../init.php';
session_start();

$userEmailInput = $_POST['addUser'];
$_SESSION['user_id'];

$auth = new authentication(getDB());
$port = new portfolio(getDB());

if($auth->checkExists($userEmailInput)){
    var_dump($auth->getUserID($userEmailInput));


}else{
    echo "User was not found";
}


?>


