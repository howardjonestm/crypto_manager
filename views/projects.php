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
      <a href=\"#\" class=\"card-link\">Delete project</a>
      <a href=\"#\" class=\"card-link\">Add usrs</a>
      <a href=\"#\" class=\"card-link\">View members</a>
    </div>
  </div>
";
  
}

?>

</div>
</div>
