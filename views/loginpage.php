<?php 
$activePage = "loginPage";
include 'header.php';
?>




    <div class="container">   

        <div class="container-fluid align-items-center">
          <form class="form-signin" action="../logic/login.php" method="post">
            <h2 class="form-signin-heading blacktext">Login</h2>
            <p class="text-warning"> <?php if(isset($_SESSION['loginerror'])){echo $_SESSION['loginerror'];} ?> </p>
            <label for="email" class="sr-only">Email</label>
            <input type="email" id="email" class="form-control" placeholder="email" name="email" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="inputPassword" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
        </div>
          <div class="container-fluid align-items-center">
          <form class="form-signin" action="../logic/register.php" method="post">
            <h2 class="form-signin-heading blacktext">Register</h2>
            <p class="text-warning"> <?php if(isset($_SESSION['registererror'])){echo $_SESSION['registererror'];}?> </p>
            <label for="newEmail" class="sr-only">Email address</label>
            <input type="email" id="newEmail" class="form-control" name="newEmail" placeholder="New email" required autofocus>
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="newPassword" class="form-control" name="newPassword" placeholder="Password" required autofocus>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
          </form>
      </div>
        
      </div>
  </body>
</html>