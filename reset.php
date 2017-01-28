<?php require('includes/config.php');

if( $user->is_logged_in() ){ header('Location: user_panel.php'); }

if(isset($_POST['submit'])){

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Wpisz poprawny adres email';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(empty($row['email'])){
			$error[] = 'Błędny adres email.';
		}

	}

	if(!isset($error)){

		$token = md5(uniqid(rand(),true));

		try {

			$stmt = $db->prepare("UPDATE members SET resetToken = :token, resetComplete='No' WHERE email = :email");
			$stmt->execute(array(
				':email' => $row['email'],
				':token' => $token
			));

			$to = $row['email'];
			$subject = "Nowe haslo. Krakostop.";
			$body = "<p>Ktos zresetował Twoje haslo.</p>
			<p>Jesli to nie Ty, zignoruj ten list.</p>
			<p>Aby zresetować haslo kliknij link: <a href='".DIR."resetPassword.php?key=$token'>".DIR."resetPassword.php?key=$token</a></p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			header('Location: login.php?action=reset');
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
		<h1>Reset hasła</h1>
	</header>	
		<div class="register-line"></div>
		<h4><a href='login.php'>Wróć do strony logowania</a></a><h4>
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
							echo "<h2 class='bg-success'>Możesz się zalogować.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Sprawdź swój email.</h2>";
							break;
					}
				}
				?>

				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" value="" tabindex="1">
				</div>

				<hr>
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Zresetuj hasło" class="btn btn-primary btn-block btn-lg" tabindex="2"></div>
			</form>


	</div>


</body>
</html>