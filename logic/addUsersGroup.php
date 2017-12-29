<?php
include '../init.php';
session_start();

$userEmailInput = $_POST['addUser'];
$groupName = $_POST['myBtn'];

$auth = new authentication(getDB());
$group = new groups(getDB());

if($auth->checkExists($userEmailInput)){
    //obtain user_id and group ID
    $id = $auth->getUserID($userEmailInput)['id'];
    $groupID = $group->getGroupId($groupName)['group_id'];

    //insert record
    $group->addUser($id,$groupID);

    $_SESSION['addUserSuccess']="New user added";


}else{
    $_SESSION['addUserFailure']="User was not found";

    
}

header( 'Location: ../views/admin.php' );

?>


