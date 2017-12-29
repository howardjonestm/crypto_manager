<?php 
$activePage = "admin";
include 'header.php';
include '../init.php';

if (!isset($_SESSION['user_id'])) {
	//Not logged in, send to login page.
	echo "<p>Please login to access this feature<p>";
}
else{
?>

<br>
<div class="row w-75 mx-auto">

  
<div class="col-sm rounded">
    <h4>Create a new investment group</h4>
    <p class="text-warning"><?php echo $_SESSION['groupExists']; $_SESSION['groupExists']=""; ?><hp>

    <form class="form-signin" action="../logic/admin.php" method="post">
  
      <label for="groupName" class="sr-only">Group Name</label>
      <input type="text" id="groupName" class="form-control" name="groupName" placeholder="Group name" autofocus>
      <input type="text" id="groupDescription" class="form-control" name="groupDescription" placeholder="Group description" required autofocus>
      <button class="btn btn-l btn-primary btn-block" type="submit">Submit</button>

  </form>
  
</div>
<div class="col-sm rounded">

<p class="text-warning"> <?php echo $_SESSION['addUserFailure'];$_SESSION['addUserFailure']=""; ?> </p>
<p class="text-success"> <?php echo $_SESSION['addUserSuccess'];$_SESSION['addUserSuccess']=""; ?> </p>

<p class="text-warning"> <?php echo $_SESSION['removeUserFailure'];$_SESSION['removeUserFailure']=""; ?> </p>
<p class="text-success"> <?php echo $_SESSION['removeUserSuccess'];$_SESSION['removeUserSuccess']=""; ?> </p>



<h4>Your admin groups</h4>
<?php 

$groups = new groups(getDB());
$groupsArray = $groups->returnUserAdmins($_SESSION['user_id']);

foreach($groupsArray as $groupName){

  echo 
    "
    <div class=\"card\" >
    <div class=\"card-body bg-light \">
      <h5 class=\"card-title\">".$groupName."</h5>
      <h6 class=\"card-subtitle mb-2 text-muted\">Portfolio value:</h6>
      <p class=\"card-text\">Description: ".$groups->returnDescription($groupName)["group_description"]."</p>    

      <p class=\"card-text\"><strong>Members: </strong><br>";
      

      foreach($groups->getMembers($groupName) as $value){
        
        echo "
        <form class=\"form-inline\" method=\"post\" action=\"../logic/deleteUserGroup.php\">
        <div class=\"form-group\">
        <label for=\"staticEmail2\" class=\"sr-only\">$value</label>
        <input type=\"text\" class=\"form-control-plaintext\" id=\"lol\" value=\"$value\">
        </div>
        <button type=\"submit\" id=\"myBtn\" name=\"myBtn\" \"class=\"btn btn-link btn-warning\" value=\"$value\">Remove user</button>
      </form>
        ";
      }
     
      
         
  echo 
    
  "
      </p>

      
      <form action=\"../logic/addUsersGroup.php\" method=\"post\">
      <input type=\"text\" id=\"addUser\" name=\"addUser\" placeholder=\"Add user\"></input>
        <button type=\"submit\" id=\"myBtn\" name=\"myBtn\" value=\"".$groupName." \"class=\"btn btn-success\">Add user</button>        
      </form>

      



      <br>
      <form action=\"../logic/deleteGroup.php\" method=\"post\">
        <button type=\"submit\" id=\"myBtn\" name=\"myBtn\" value=\"".$groupName."\"class=\"btn btn-danger\">Delete group</button>
      </form>

    </div>
  </div>
  
";
  
}

?>






</div>
</div>





<?php } include './footer.php'; ?>