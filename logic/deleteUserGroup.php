<?php
include '../init.php';
session_start();


$groupUserEmail = $_POST['user'];
$groupName = $_POST['groupName'];

$auth = new authentication(getDB());
$group = new groups(getDB());

if($auth->checkExists($groupUserEmail)){
    //obtain user_id and group ID
    $id = $auth->getUserID($groupUserEmail)['id'];
    $groupID = $group->getGroupId($groupName)['group_id'];

    //remove record
    $group->deleteUser($id,$groupID);

    $_SESSION['removeUserSuccess']="User removed";


}else{
    $_SESSION['removeUserFailure']="User was not found";
}




header( 'Location: ../views/admin.php' );

?>