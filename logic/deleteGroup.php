<?php
include '../init.php';
session_start();

$groups = new groups(getDB());
$groupName = $_POST['myBtn'];

$groupArray = $groups->getGroupId($groupName);
$groupID = $groupArray['group_id'];

//delete group record
$groups->deleteByGroupName($_POST['myBtn']);
//delete membership record
$groups->deleteGroupMembers($groupID);

header( 'Location: ../views/admin.php' );
?>