<?php
//tutorial followed at w3schools: https://www.w3schools.com/php/php_ajax_php.asp
include '../init.php';

//get a array of all users
$users = new groups(getDB());
$userArray = $users->returnUsers();

$q = $_REQUEST["q"];
$hint = "";

//Lookup hints from array where $q is different from ""
if ($q !== ""){
    $q = strtolower($q);
    $len=strlen($q);
    foreach($userArray as $email){
        if (stristr($q, substr($email, 0, $len))){
            if ($hint === ""){
                $hint = $email;
            }else{
                $hint .= "<br> $email";
           
            }

        }
    }
}

//Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : "$hint";

?>