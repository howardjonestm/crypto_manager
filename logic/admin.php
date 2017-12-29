<?php
include '../init.php';
session_start();

///////Need to add authentication for existing groupname/////////

$groups = new groups(getDB());


$groupName = $_POST['groupName'];
$groupDescription = $_POST['groupDescription'];



$userID = $_SESSION['user_id'];

if(!$groups->returnDescription($groupName)){
//Create group with user as admin
$groups->addgroup($groupName,$userID,$groupDescription);

//Add user to group
$groupID = $groups->returnGroup($groupName);
$groups->addUser($userID,$groupID);

}else{
    $_SESSION['groupExists']="This group name already exists";
    
}
header( 'Location: ../views/admin.php' );


?>