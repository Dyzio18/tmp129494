<?php 

require('includes/config.php'); 

?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <!-- meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Krakostop - Krakowski wyścig autostopowy 2017</title>
  <meta name="description" content="Krakowski wyścig autostopowy 2017<" />
  <meta name="keywords"  content="Autostop, kraków, wyscig, autostopowy" />
  <meta http-equiv="X-UA-Compatibile" content="IE=edge,chrome=1" />
  <meta name="author" content="Patryk Nizio, Bartosz Piątkowski, Jan Schab" />
  <link rel="Shortcut icon" href="favicon.ico" />

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link href="fonts/fontello/css/fontello.css" rel="stylesheet">
<!-- Carousel -->
<link  href="css/owl.carousel.css" rel="stylesheet" >
<link  href="css/owl.theme.default.min.css" rel="stylesheet" >
<!--Timer - Clock -->
<link rel="stylesheet" href="css/flipclock.css">

<!--Fonts-->
<link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">


<!--JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<!-- Carousel -->
<script src="js/owl.carousel.js"></script>
<!-- Timer - Clock -->
<script src="js/flipclock.js"></script>	


</head>
<body data-spy="scroll" data-target=".navbar" data-offset="10" id="myScrollspy">



<nav class="navbar navbar-default" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="img/logo-sm.png" alt="LOGO"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" id="myNavbar" >
        <li><a href="aboutUs.php">O nas </a></li>
        <li><a href="edition2017.php">2017</a></li>
        <li><a href="register.php">Zapisy</a></li>
        <li><a href="parozlaczka.php">Parozłączka</a></li>
        <li><a href="index.php #contact">Kontakt</a></li>


      </ul>

<ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span>

      <?php
      if(isset($_SESSION['username']))
         echo "Panel użytkownika" ;
      else 
          echo "Rejestracja";
      ?>

      </a></li>
      <li>
      <?php
      if(isset($_SESSION['username']))
         echo '<a href="logout.php"> <span class="glyphicon glyphicon-log-in"></span> Wyloguj</a>'; 
      else 
          echo '<a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Zaloguj</a>';
      ?>
      </li>
    </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>





<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="container-fluid" id="last_Editions">

  <h1> Regulamin </h1>

  <div class="container">
   
    <p> Regulamin pojawi się wkrótce </p>
    <br><br><br><br>

  </div>
</div>




<footer class=" container-fluid ">


  <div class="social-container col-xs-12 col-sm-6 col-md-4 col-lg-4">
  <h2> Social media</h2>
    <a href="https://www.facebook.com/krakostop" target="_blank"><i class="icon-facebook"></i>Faceebok</a><br>
    <a href="https://www.instagram.com/krakostop/" target="_blank"><i class="icon-instagram"></i>Instagram</a>
  
  </div>  

  <div class="contact-container col-xs-12 col-sm-6 col-md-4 col-lg-4">
  <h2>Kontakt</h2>
  <p>Mozesz napisać do nas również bezpośrednio na adres:</p>
    <i class="icon-mail"></i> krakostop@gmail.com

  </div>

  <div class="link-container col-xs-12 col-sm-6 col-md-4 col-lg-4">
  <h2>Szybkie linki:</h2>
    <ul>
      <li><a href="index.php">Strona główna</a></li>
      <li><a href="regulamin.php">Regulamin</a></li>
      <li><a href="aboutUs.php">O nas</a></li>
      <li><a href="edition2017.php">Edycja 2017</a></li>
      <li><a href="last_editions.php">Poprzednie edycje</a></li>
      <li><a href="parozlaczka.php">Parozłączka</a></li>
      <li><a href="index.php #contact">Kontakt</a></li>
    </ul>
  </div>


<div class="col-xs-12 foo"> All right reserved by Krakostop</div>
</footer>
</body>
</html>