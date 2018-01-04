<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script>
  <script src="../scripts/showHints.js"></script>
  <script src="../scripts/getTransactions.js"></script>
  <script src="../scripts/returnGroup.js"></script>
  <script src="../scripts/displayPerformance.js"></script>


  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}

  .blacktext {color: #010101}
  .whitetext {color: #FFF9F9}
  .investmentdark {background-color: #585757 }
  .investmentgreen {color: #1abc9c }
  .custombg1 {background-color: #e8eaea}
  .greybackground {background-color: #817F7F}
  .borderrounding {
        border-radius: 15px 50px 30px;      
        margin-bottom: 2cm;
        background-color: #c0c5c5;
    }
    .borderrounding2 {
        border-radius: 15px 50px 30px;      
        margin-bottom: 2cm;
        border: 2px solid #f5f6f7;
        background-color: #c0c5c5;;
    }
    .borderrounding3 {
        border-radius: 30px 50px 15px;      
        margin-bottom: 2cm;
        border: 2px solid #f5f6f7;
        background-color: #c5c0c5;
    }

    .borderrounding3 {
        border-radius: 15px 30px 50px;      
        margin-bottom: 2cm;
        border: 2px solid #C9C8C8;
        background-color: #EEECEC;
    }

    .borderrounding4 {
        border-radius: 15px 30px 50px;      
        margin-bottom: 0.75cm;
        border: 2px solid #C9C8C8;
        background-color: #585757;
    }

    .borderrounding5 {
        border-radius: 15px 30px 50px;      
        margin-bottom: 0.4cm;
        border: 0.5px solid #C9C8C8;
        background-color: #817F7F;
    }

    .borderrounding6 {
        border-radius: 15px 30px 50px;      
        margin-bottom: 0.75cm;
        border: 2px solid #C9C8C8;
        background-color: #A3A2A2;
    }

    .borderrounding7 {
        border-radius: 15px 30px 50px;      
        margin-bottom: 0.75cm;
        border: 2px solid #C9C8C8;
        background-color: #D3D3D3;
        color: #2D2929
    }

    .borderrounding8 {
        border-radius: 15px 30px 50px;      
        margin-bottom: 0.75cm;
        border: 2px solid #C9C8C8;
       
    }

    .padding1{
        padding: 1cm 1cm;
    }

    .padding2{
        padding: 1cm 1cm;
    }

    .padding3{
        padding: 0.5cm 0.5cm;
    }

    

  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">CryptoManager</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./investments.php">Investments</a></li>
        <li><a href="./myGroups.php">myGroups</a></li>   
        <li><a href="./admin.php">Admin</a></li>       
        <li>
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
      </ul>
    </div>
  </div>
</nav>