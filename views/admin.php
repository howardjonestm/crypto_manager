<?php 
$activePage = "admin";
include 'header.php';
include '../init.php';


if (!isset($_SESSION['user_id'])) {
	
	echo "<p class=\"blacktext\">Please login to access this feature<p>";
}
else{
?>




<div class="row">
    <div class="container col-md-6 col-md-offset-3">
        <h2 class="blacktext">Manage groups</h2>
        <p class="blacktext">Here you can create a new group or edit your existing admin groups<p>
    
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create group</button>

    <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title blacktext">Add group</h4>
                        </div>
                        <div class="modal-body">
                        <form class="form-signin" action="../logic/admin.php" method="post">   
                            <label for="groupName" class="sr-only">Group Name</label>
                            <input type="text" id="groupName" class="form-control" name="groupName" placeholder="Group name" autofocus>
                            <input type="text" id="groupDescription" class="form-control" name="groupDescription" placeholder="Group description" required autofocus>
                            <button class="btn btn-l btn-primary btn-block" type="submit">Add group</button>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                
                </div>
        </div>
    
    </div>
</div>




<br>
<div class="row">
    <div class="col-md-6 col-md-offset-3 rounded">
    <h3 class="blacktext">Edit an existing group</h3>

        <p class="text-warning"> <?php if(isset($_SESSION['addUserFailure'])){echo $_SESSION['addUserFailure'];} $_SESSION['addUserFailure']=""; ?> </p>
        <p class="text-success"> <?php if(isset($_SESSION['addUserSuccess'])){echo $_SESSION['addUserSuccess'];} $_SESSION['addUserSuccess']=""; ?> </p>

        <p class="text-warning"> <?php if(isset($_SESSION['removeUserFailure'])){echo $_SESSION['removeUserFailure'];} $_SESSION['removeUserFailure']=""; ?> </p>
        <p class="text-success"> <?php if(isset($_SESSION['removeUserSuccess'])){echo $_SESSION['removeUserSuccess'];} $_SESSION['removeUserSuccess']=""; ?> </p>


        <select class="form-control" id="groupAdmins" name="groupAdmins" onchange="returnGroup(this.value)">
                <?php 
                $groups = new groups(getDB());
                $userID = $_SESSION['user_id'];
                $admins = $groups->returnUserAdmins($userID);

                echo "<option selected>Select</option>";
                foreach($admins as $value){
                    echo "<option>$value</option>";
                }
                ?>
        </select>
<br><
        <div id="returnGroup"><h3 class="blacktext">Please select a group</h3></div>
    </div>
</div>

<br><br><br><br><br><br>



<?php include './footer.php';}  ?>