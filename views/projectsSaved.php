<?php 
$activePage = "admin";
include 'header.php';
include '../init.php';
?>

<div class="row border border-dark rounded">

  
<div class="col-sm rounded">
    <h5>Create a new investment group</h5>

    <form class="form-signin" action="../logic/admin.php" method="post">
  
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
    "<div class=\"card\" >
    <div class=\"card-body\">
      <h4 class=\"card-title\">".$groupName."</h4>
      <h6 class=\"card-subtitle mb-2 text-muted\">Portfolio value:</h6>
      <p class=\"card-text\">".$groups->returnDescription($groupName)["group_description"]."</p>    

      <form action=\"../logic/deleteGroup.php\" method=\"post\">
        <button type=\"submit\" id=\"myBtn\" name=\"myBtn\" value=\"".$groupName."\"class=\"btn btn-warning\">Delete group</button>
      </form>

      <form action=\"../logic/addUsersGroup.php\" method=\"post\">
      <input type=\"text\" id=\"addUser\" name=\"addUser\" placeholder=\"Add user\"></input>
        <button type=\"submit\" id=\"myBtn\" name=\"myBtn\" value=\"".$groupName." \"class=\"btn btn-success\">Add user</button>        
      </form>

      <a href=\"#\" class=\"card-link\">View members</a>
    </div>
  </div>
";
  
}

?>

<form class="form-signin" action="../logic/personalInvestment.php" method="post">
      <h3 class="form-signin-heading">Bitcoin</h3>
      <select class="custom-select col" id="btcBuySell" name="btcBuySell">
        <option selected>Option</option>
        <option value="buy">Buy</option>
        <option value="sell">Sell</option>
      </select>
      <label for="bitcoinQuantity" class="sr-only">Quantity</label>
      <input type="number" id="bitcoinQuantity" class="form-control" name="bitcoinQuantity" placeholder="Quantity" autofocus>
      
      <br>

      <h3 class="form-signin-heading">Ethereum</h3>
      <select class="custom-select col" id="ethBuySell" name="ethBuySell">
        <option selected>Option</option>
        <option value="buy">Buy</option>
        <option value="sell">Sell</option>
      </select>
      <label for="ethereumQuantity" class="sr-only">Quantity</label>
      <input type="number" id="ethereumQuantity" class="form-control" name="ethereumQuantity" placeholder="Quantity" autofocus>
      <button class="btn btn-s btn-success btn-block" type="submit">Submit</button>
  </form>





</div>
</div>





<?php include './footer.php'; ?>