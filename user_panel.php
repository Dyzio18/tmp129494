<?php require('includes/config.php'); 

if(!$user->is_logged_in()){ header('Location: login.php'); } 

?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <!-- Required meta tags always come first -->
	<title>Krakostop - Krakowski wyścig autostopowy 2017</title>
	<meta name="description" content="Krakowski wyścig autostopowy 2017<" />
	<meta name="keywords"  content="Autostop, kraków, wyscig, autostopowy" />
	<meta http-equiv="X-UA-Compatibile" content="IE=edge,chrome=1" />
	<meta name="author" content="Patryk Nizio, Bartosz Piątkowski, Jan Schab" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


 <link rel="stylesheet" href="css/bootstrap.css">
 <link rel="stylesheet" href="css/user_panel.css">
 <link href="fonts/fontello/css/fontello.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">


</head>
<body>

<header>
<a class="navbar-brand" href="index.php"><img src="img/logo-sm.png" alt="LOGO"> Strona główna </a>


<div class="panel-user-log">
	<h4>Witaj: <?php echo $_SESSION['username']; ?> <a href='logout.php'>Wyloguj</a></h4>
 </div>
</header>
	


<div class="container">
  <h2>Panel użytkownika</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a href="#home">Tablica</a></li>
    <li><a href="#menu1">Rejestracja</a></li>
    <li><a href="#menu2">Parozłączka</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Tablica</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Rejestracja</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Parozłączka</h3>
      <p>Chcesz wziąć udział w wyścigu ale nie masz drugiej osoby do pary? To nie problem. Skorzystaj z naszej parozłączki i znajdz towarzysza swojej autostopowej podróży. Napisz pare słów o sobie żeby inni mogli Cię lepiej poznać, a my wrzucimy Twoje ogłoszenie na Tablice Parozłączki</p>
		<div class="form-group">
		  <label for="comment">Napisz ogłoszenie</label>
		  <textarea class="form-control" rows="5" id="comment"></textarea>
		</div>
    </div>

  </div>
</div>

<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>

</body>
</html>