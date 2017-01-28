<?php require('includes/config.php'); 

if( $user->is_logged_in() ){ header('Location: user_panel.php'); } 

$stmt = $db->prepare('SELECT resetToken, resetComplete FROM members WHERE resetToken = :token');
$stmt->execute(array(':token' => $_GET['key']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(empty($row['resetToken'])){
	$stop = 'Błędny adres. Proszę użyj adresu z emaila.';
} elseif($row['resetComplete'] == 'Yes') {
	$stop = 'Twoje hasło zostało zmienione!';
}

if(isset($_POST['submit'])){

	if(strlen($_POST['password']) < 3){
		$error[] = 'Hasło za krótkie.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Hasło za krótkie.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Podane hasła nie pasują do siebie.';
	}

	if(!isset($error)){

		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		try {

			$stmt = $db->prepare("UPDATE members SET password = :hashedpassword, resetComplete = 'Yes'  WHERE resetToken = :token");
			$stmt->execute(array(
				':hashedpassword' => $hashedpassword,
				':token' => $row['resetToken']
			));

			header('Location: login.php?action=resetAccount');
			exit;

		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

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
		<h1>Zmień hasło</h1>
	</header>	
		<div class="register-line"></div>
		<h4><a href='login.php'>Wróć do strony logowania</a></a><h4>
		<hr>

	    	<?php if(isset($stop)){

	    		echo "<p class='bg-danger'>$stop</p>";

	    	} else { ?>

				<form role="form" method="post" action="" autocomplete="off">

					<?php
					if(isset($error)){
						foreach($error as $error){
							echo '<p class="bg-danger">'.$error.'</p>';
						}
					}

					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
					}
					?>

					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Hasło" tabindex="1">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Potwierdź hasło" tabindex="1">
							</div>
						</div>
					</div>
					
					<hr>
						<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Zmień hasło" class="btn btn-primary btn-block btn-lg" tabindex="3"></div>
				</form>

			<?php } ?>


	</div>


</body>
</html>