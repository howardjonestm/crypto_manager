<?php 
session_start();
include '../init.php';
$groups = new groups(getDB());
$groupName = $_GET['q'];

$analytics = new groupPortfolioAnalytics(getDB());
$btcBalance = $analytics->returnBtcBalance($groupName)["SUM(btc_change)"];
$ethBalance = $analytics->returnEthBalance($groupName)["SUM(eth_change)"];

$value = $analytics->calculateValue($btcBalance,$ethBalance);
$value = number_format((float)$value, 2, '.', '');




if($groupName=="Select"){
    echo "<h3 class=\"blacktext\">Please select a group</h3>";
}
else{

  echo 
    "
    <div class=\"borderrounding4 padding3\" >
    
      <h4 class=\"greybackground padding3 borderrounding5\">".$groupName." (Total value: $$value)</h4>
      
      <p class=\"card-text\">Description: ".$groups->returnDescription($groupName)["group_description"]."</p>    

      <div class=\"row greybackground padding3 borderrounding5\">
      <p class=\"card-text\"><strong>Members: </strong><br></p4>
      <h4>You</h4>";
      
      
      $members = $groups->getMembers($groupName);
      $shift = array_shift($members);
      foreach($members as $value){
             
        echo "
        
        <form class=\"form-inline\" method=\"post\" action=\"../logic/deleteUserGroup.php\">      
            <input type=\"hidden\" class=\"form-control\" id=\"groupName\" value=\"$groupName\" name =\"groupName\">$value</input>   
       
        
            <button type=\"submit\" id=\"myBtn\" name=\"user\" class=\"btn btn-danger\" value=\"$value\">Remove user</button>   
            
        </form>
        
        ";
      }
     
      
         
  echo 
    
  "
 </div>     
<br>
      <div class=\"row\">
        <div class=\"col-md-6\">
                <form action=\"../logic/addUsersGroup.php\" method=\"post\">
                    <input type=\"text\" class=\"blacktext\" id=\"addUser\" name=\"addUser\" placeholder=\"Add user\" onkeyup=\"showHint(this.value)\"></input>
                    <button type=\"submit\" id=\"myBtn\" name=\"myBtn\" value=\"".$groupName." \"class=\"btn btn-success\">Add user</button>        
                </form>
        </div>
        <div class=\"col-md-6\"
                <p>Suggestions: </p><div id=\"txtHint\"></div>
        </div><br>

        <div class=\"row\">
            <div class=\"col-md-3 col-md-offset-9\">
                <form action=\"../logic/deleteGroup.php\" method=\"post\">
                    <button type=\"submit\" id=\"myBtn\" name=\"myBtn\" value=\"".$groupName."\"class=\"btn btn-danger\">Delete group</button>
                </form>
            </div>
        </div>
      </div>

</div>
  
"
    ;}
?>