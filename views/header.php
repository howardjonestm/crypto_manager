<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script>

    <title>Bitcoin portfolio manager</title>

  </head>

  <body>

    <!-- Navigation -->
    <nav>
       
        <h3>Bitcoin portfolio manager</h3>
    
            <ul class="nav nav-tabs bg-primary" id="myTab" role="tablist">
                <li class="nav-item">                   
                    <a class="nav-link <?php if ($activePage == "home"){echo " active\"";}else{echo " text-white\"";}?> id="home-tab"  href="home.php" aria-controls="home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($activePage == "investments"){echo " active\"";}else{echo " text-white\"";}?> id="investments-tab"  href="investments.php" aria-controls="home" aria-selected="true">Investments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($activePage == "myGroups"){echo " active\"";}else{echo " text-white\"";}?> id="myGroups-tab" href="myGroups.php" aria-controls="home" aria-selected="true">myGroups</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($activePage == "admin"){echo " active\"";}else{echo " text-white\"";}?> id="admin-tab" href="admin.php" aria-controls="home" aria-selected="true">Admin</a>
                </li>
                

            
          

          <li class = "nav-item">
          <?php
      				if (!isset($_SESSION['user_id'])){  
                          if($activePage=="loginPage"){     
                            echo "<a class=\"nav-link active\" id=\"loginregister-tab\"  href=\"loginpage.php\" aria-controls=\"home\" aria-selected=\"true\">Login/Register</a>";           
                          }else{
                            echo "<a class=\"nav-link text-white\" id=\"loginregister-tab\"  href=\"loginpage.php\" aria-controls=\"home\" aria-selected=\"true\">Login/Register</a>";
                          }       
                          
      				}else {                       
                            echo "<a class=\"nav-link text-white\" id=\"logout-tab\"  href=\"../logic/logout.php\" aria-controls=\"home\" aria-selected=\"true\">Logout</a>";
                          
      				}
      			?>
          </li>        
    </nav>