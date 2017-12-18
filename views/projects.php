<?php 
$activePage = "projects";
include 'header.php';
include '../init.php';
?>

<div class="row border border-dark rounded">

  
<div class="col-sm rounded">
    <h5>Create a new investment group</h5>

    <form class="form-signin" action="../logic/projects.php" method="post">
  
      <label for="groupName" class="sr-only">Group Name</label>
      <input type="text" id="groupName" class="form-control" name="groupName" placeholder="Group name" autofocus>
      <input type="text" id="groupDescription" class="form-control" name="groupDescription" placeholder="Group description" autofocus>
      <button class="btn btn-l btn-primary btn-block" type="submit">Submit</button>

  </form>
  
</div>
<div class="col-sm  rounded">
<h3>Your admin groups</h3>
<?php 

$groups = new groups(getDB());
$groupsArray = $groups->returnUserAdmins($_SESSION['user_id']);

foreach($groupsArray as $groupName){
  echo 
    "<div class=\"card\" style=\"width: 20rem;\">
    <div class=\"card-body\">
      <h4 class=\"card-title\">".$groupName."</h4>
      <h6 class=\"card-subtitle mb-2 text-muted\">Portfolio value:</h6>
      <p class=\"card-text\">".$groups->returnDescription($groupName)["group_description"]."</p>    

      <form action=\"../logic/deleteGroup.php\" method=\"post\">
        <button type=\"submit\" id=\"myBtn\" name=\"myBtn\" value=\"".$groupName."\"class=\"btn btn-warning\">Delete group</button>
      </form>

      <a href=\"#\" class=\"card-link\">Add users</a>
      <a href=\"#\" class=\"card-link\">View members</a>
    </div>
  </div>
";
  
}

?>

</div>
</div>




<div data-role="page">
 

  <div data-role="main" class="ui-content">
    <a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-left">Show Popup Form</a>

    <div data-role="popup" id="myPopup" class="ui-content" style="min-width:250px;">
      <form method="post" action="/action_page_post.php">
        <div>
          <h3>Login information</h3>
          <label for="usrnm" class="ui-hidden-accessible">Username:</label>
          <input type="text" name="user" id="usrnm" placeholder="Username">
          <label for="pswd" class="ui-hidden-accessible">Password:</label>
          <input type="password" name="passw" id="pswd" placeholder="Password">
          <label for="log">Keep me logged in</label>
          <input type="checkbox" name="login" id="log" value="1" data-mini="true">
          <input type="submit" data-inline="true" value="Log in">
        </div>
      </form>
    </div>
  </div>

</div> 



<?php include './footer.php'; ?>