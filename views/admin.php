<?php 
$activePage = "admin";
include 'header.php';
include '../init.php';


if (!isset($_SESSION['user_id'])) {
	
	echo "<p class=\"blacktext\">Please login to access this feature<p>";
}
else{
?>

<br>
<div class="row">

  
<div class="col-md-6 col-md-offset-3">
    <h4 class="padding3 borderrounding7"><u>Create a new investment group</u></h4>
    <p class="text-warning"><?php echo $_SESSION['groupExists']; $_SESSION['groupExists']=""; ?><hp>

    <form class="form-signin" action="../logic/admin.php" method="post">
  
      <label for="groupName" class="sr-only">Group Name</label>
      <input type="text" id="groupName" class="form-control" name="groupName" placeholder="Group name" autofocus>
      <input type="text" id="groupDescription" class="form-control" name="groupDescription" placeholder="Group description" required autofocus>
      <button class="btn btn-l btn-primary btn-block" type="submit">Add group</button>

  </form>
</div>  
</div>
<br><br>
<div class="row">
<div class="col-md-6 col-md-offset-3 rounded">
<h4 class="padding3 borderrounding7"><u>Edit your existing admin groups</u></h4>

<p class="text-warning"> <?php echo $_SESSION['addUserFailure'];$_SESSION['addUserFailure']=""; ?> </p>
<p class="text-success"> <?php echo $_SESSION['addUserSuccess'];$_SESSION['addUserSuccess']=""; ?> </p>

<p class="text-warning"> <?php echo $_SESSION['removeUserFailure'];$_SESSION['removeUserFailure']=""; ?> </p>
<p class="text-success"> <?php echo $_SESSION['removeUserSuccess'];$_SESSION['removeUserSuccess']=""; ?> </p>

<?php 

$groups = new groups(getDB());
$groupsArray = $groups->returnUserAdmins($_SESSION['user_id']);

foreach($groupsArray as $groupName){

  echo 
    "
    <div class=\"borderrounding4 padding3\" >
    
      <h4 class=\"greybackground padding3 borderrounding5\">".$groupName." (Total value: xxx)</h4>
      
      <p class=\"card-text\">Description: ".$groups->returnDescription($groupName)["group_description"]."</p>    

      <p class=\"card-text\"><strong>Members: </strong><br></p>";
      

      foreach($groups->getMembers($groupName) as $value){
        
        echo "
        <form class=\"form-inline\" method=\"post\" action=\"../logic/deleteUserGroup.php\">
        
        
        <input type=\"hidden\" class=\"form-control\" id=\"groupName\" value=\"$groupName\" name =\"groupName\">$value</input>
        
        
        <button type=\"submit\" id=\"myBtn\" name=\"user\" class=\"btn btn-danger\" value=\"$value\">Remove user</button>
        
      </form>
        ";
      }
     
      
         
  echo 
    
  "
      
<br>
      
      <form action=\"../logic/addUsersGroup.php\" method=\"post\">
      <input type=\"text\" class=\"blacktext\" id=\"addUser\" name=\"addUser\" placeholder=\"Add user\" onkeyup=\"showHint(this.value)\"></input>
        <button type=\"submit\" id=\"myBtn\" name=\"myBtn\" value=\"".$groupName." \"class=\"btn btn-success\">Add user</button>        
      </form>

      <p>Suggestions: <br><span class=\"txtHint\" id=\"txtHint\"></span></p>
      

      <br>
      <form action=\"../logic/deleteGroup.php\" method=\"post\">
        <button type=\"submit\" id=\"myBtn\" name=\"myBtn\" value=\"".$groupName."\"class=\"btn btn-danger\">Delete group</button>
      </form>

    </div>
  
  
";
  
}

?>

</div>
</div>
</div>





<?php include './footer.php';}  ?>