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

    <title>Bitcoin portfolio manager</title>

  </head>

  <body>

    <!-- Navigation -->
    <nav>
       
        <h3>Bitcoin portfolio manager</h3>
    
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab"  href="index.php" role="tab" aria-controls="home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="investments-tab" data-toggle="tab" href="investments.php" role="tab" aria-controls="home" aria-selected="true">Investments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="marketdata-tab" data-toggle="tab" href="marketdata.php"role="tab" aria-controls="home" aria-selected="true">Market Data</a>
                </li>

            
          

          <li class = "nav-item">
          <?php
      				if (isset($_SESSION['user_id'])){                         
                          echo "<a class=\"nav-link\" id=\"logout-tab\" data-toggle=\"tab\" href=\".views/logout.php\"role=\"tab\" aria-controls=\"home\" aria-selected=\"true\">Logout</a>";
      				}else {                       
                        echo "<a class=\"nav-link\" id=\"loginregister-tab\" data-toggle=\"tab\" href=\".views/logout.php\"role=\"tab\" aria-controls=\"home\" aria-selected=\"true\">Login/Register</a>";
                          
      				}
      			?>
          </li>

        
    </nav>

        
  </body>

</html>