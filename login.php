<?php
require_once('includes/config.php');

if( $user->is_logged_in() ){ header('Location: index.php'); } 

if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($user->login($username,$password)){ 
		$_SESSION['username'] = $username;
		header('Location: user_panel.php');
		exit;
	
	} else {
		$error[] = 'Zły użytkownik lub hasło lub konto nie jest jeszcze aktywne.';
	}

} 
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
 <link rel="stylesheet" href="css/register.css">
 <link href="fonts/fontello/css/fontello.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>

	<div class="user-box">
	<header>
		<a href="index.php"><img src="img/logo-sm.png" alt="LOGO"></a>
		<h1>Logowanie</h1>
	</header>	
		<div class="register-line"></div>
		<h4>Zaloguj się przez
		<button class="facebook-btn"><i class="icon-facebook"></i>Facebook</button><h4>
		<hr>
		<h4>Nie masz konta? <a href='register.php'>Zarejestruj się</a><h4>
		<hr>

		<form role="form" method="post" action="" autocomplete="off">
				<?php
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action'])){

					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Twoje konto zostało aktywowane. Możesz się zalogować.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Sprawdź swój email.</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='bg-success'>Hasło zmienione. Mozesz się teraz zalogować.</h2>";
							break;
					}

				}

				
				?>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Użytkownik" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Hasło" tabindex="3">
				</div>
				
					<h4><a href='reset.php'>Zapomniałeś hasła?</a></h4>
				
				<hr>
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Zaloguj" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
			</form>


	</div>


</body>
</html>