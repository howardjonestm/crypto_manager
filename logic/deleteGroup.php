<?php
include '../init.php';
session_start();

$groups = new groups(getDB());
$groups->deleteByGroupName($_POST['myBtn']);

header( 'Location: ../views/projects.php' );
?>