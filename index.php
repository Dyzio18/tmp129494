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
  <link rel="Shortcut icon" href="img/logosmail.png" />

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
<!--scroll-reveal -->
<script src="js/scroll-reveal.js"></script>

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
        <li><a href="#aboutUs">O nas </a></li>
        <li><a href="#edition2017">2017</a></li>
        <li><a href="#joinUs">Zapisy</a></li>
        <li><a href="parozlaczka.php">Parozłączka</a></li>
        <li><a href="#contact">Kontakt</a></li>


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




<div class="jumbotron">
  <h1> Edycja 2017 </h1>
  <h2>Do wyścigu zostało</h2><br>
  <div id="clockdiv">
  <div class="clock_item">
    <span class="days"></span>
    <div class="smalltext">Dni</div>
  </div>
  <div class="clock_item">
    <span class="hours"></span>
    <div class="smalltext">Godzin</div>
  </div>
  <div class="clock_item">
    <span class="minutes"></span>
    <div class="smalltext">Minut</div>
  </div>
  <div class="clock_item">
    <span class="seconds"></span>
    <div class="smalltext">Sekund</div>
  </div>
</div>
    <p><a class="btn btn-danger btn-lg" href="#joinUs" role="button">Zapisz sie!</a></p>
</div>


<div class="container-fluid" id="aboutUs">
  <div class="container" >
      <h2> Czym jest Krakostop?</h2>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 "> 
        <div class="test"> <h2>Tu bedzie ikonografika</h2> </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8"> 
      <h3>Wyjaśniamy...</h3>
      <p>  Krakostop, czyli Krakowski Wyścig Autostopowy to najlepszy sposób na spędzenie majowego weekendu! Nasi uczestnicy (zwani Krakostopowiczami) muszą dotrzeć w jak najkrótszym czasie do wyznaczonego miejsca w Europie, poruszając się wyłącznie autostopem.</p>
      <p>500 uczestników ściga się w dwuosobowych zespołach po tytuł zwycięzcy i liczne nagrody! Lecz Krakostop nie kończy się na wyścigu. To również mnóstwo zabawy, przygód i poznanie niesamowitych ludzi. To okazja do spędzenia weekendu majowego, który na długo zapisze się w pamięci uczestników!
      </p>
      <button class="btn-lg">Dowiedz się więcej!</button>
    </div>
  </div>
</div>

<div class="container-fluid" id="edition2017">
  <svg class="SVG_Triangle" id="Triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="75" viewBox="0 0 100 100" preserveAspectRatio="none">
    <path class="trianglePath" d="M0 100 L0 0 L100 100 Z"></path>
  </svg>

<div class="container">
	<div class="header-edition">
		  <h2>Edycja 2017</h2>
      <h3>Hiszpania - Barcelona</h3>
		<div class="col-xs-6">
		  <h3>20-21.03  <i class="icon-user-plus"></i>  Zapisy </h3>
		</div>
		<div class="col-xs-6">
		  <h3>29.04  <i class="icon-flag"></i>  Start wyścigu</h3>
		</div>
	</div>
	<div class="text-edition">
		Już 29 kwietnia z terenu Akademii Górniczo-Hutniczej w Krakowie wystartuje V Edycja Krakostopu. Tym razem udamy się do słonecznej Hiszpanii, na <a href="http://www.camping3estrellas.com/en/">camping3estrellas</a> w Barcelonie. W tej edycji uczestnicy mają do pokonania około 2200 km. 2017 będzie obfitował w kolor czerwony!  

		<br>
    <a href="last_editions.php"><button class="btn-lg btn-left"> <span class="glyphicon glyphicon-menu-left"> </span> Poprzednie edycje  </button></a>
		<a href="edition2017.php"><button class="btn-lg btn-right">Przeczytaj więcej <span class="glyphicon glyphicon-menu-right"> </span> </button> </a>
	</div>
</div>
</div>

<div class="container-fluid" id="joinUs">
  <svg class="SVG_Triangle" id="Triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="75" viewBox="0 0 100 100" preserveAspectRatio="none">
  <path class="trianglePath" d="M0 100 L0 0 L100 100 Z"></path>
  </svg>
  <div class="container">
  <h2> Zapisz sie! </h2>
    



  </div>
</div>

<div class="container-fluid" id="partners">
  <svg class="SVG_Triangle" id="Triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="75" viewBox="0 0 100 100" preserveAspectRatio="none">
  <path class="trianglePath" d="M0 100 L0 0 L100 100 Z"></path>
  </svg>

  <div class="container">
  <h2> Partnerzy </h2>

<div class="owl-carousel">

  <div class="owl-item"> 
    <img src="img/partners/partners_eska.jpg" alt="eska_logo">
  </div>
  <div class="owl-item"> 
    <img src="img/partners/partners_malopolska.jpg" alt="malopolska_logo">
  </div>
  <div class="owl-item"> 
    <img src="img/partners/partners_geoinformatica.png" alt="geoinformatica">
  </div>
  <div class="owl-item"> 
    <img src="img/partners/partners_geoturystyka.jpg" alt="geoturystyka_logo">
  </div>

</div>

      

  </div>
</div>


<div class="container-fluid" id="contact">
  <svg class="SVG_Triangle" id="Triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="75" viewBox="0 0 100 100" preserveAspectRatio="none">
  <path class="trianglePath" d="M0 100 L0 0 L100 100 Z"></path>
  </svg>

  <div class="container">
  <h2><b>Napisz do nas!</b></h2>


    <form id="contact-form" class="form" action="contact.php" method="POST" role="form">
          <div class="form-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Imię i Nazwisko" tabindex="1" required>
          </div>                            
          <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" tabindex="2" required>
          </div>                            
          <div class="form-group">
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="Temat" tabindex="3">
          </div>                            
          <div class="form-group">
                  <textarea rows="5" cols="50" name="message" class="form-control" id="message" placeholder="Wiadomość..." tabindex="4" required></textarea>                                 
          </div>
          <div class="text-center">
                  <button type="submit" name="submit" value="Submit" class="submit-button">Wyślij!</button>
          </div>
   </form>
      

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
  




  <script src="js/scroll-reveal-item.js"></script>

  <script type="text/javascript">
function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    } 

    if (t.total < 0 )
      {
        daysSpan.innerHTML = ('00');
        hoursSpan.innerHTML = ('00');
        minutesSpan.innerHTML = ('00');
        secondsSpan.innerHTML = ('00');
      } 

  }
      updateClock();

  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(2017, 4, 1, 14, 25, 1);
initializeClock('clockdiv', deadline);
</script>

</body>
</html>