<?php require('includes/config.php');

if($user->is_logged_in() ){ header('Location: user_panel.php'); }

if(isset($_POST['submit'])){

	if(strlen($_POST['username']) < 3){
		$error[] = 'Użytkownik za krótki.';
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = 'Użytkownik jest już używany.';
		}

	}

	if(strlen($_POST['password']) < 3){
		$error[] = 'Hasło za krótkie.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Hasło za krótkie.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Podane hasła są różne.';
	}

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Wpisz poprawny adres email';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = 'Email jest już używany.';
		}

	}


	if(!isset($error)){

		$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		$activasion = md5(uniqid(rand(),true));

		try {

			$stmt = $db->prepare('INSERT INTO members (username,password,email,active) VALUES (:username, :password, :email, :active)');
			$stmt->execute(array(
				':username' => $_POST['username'],
				':password' => $hashedpassword,
				':email' => $_POST['email'],
				':active' => $activasion
			));
			$id = $db->lastInsertId('memberID');

			$to = $_POST['email'];
			$subject = "Krakostop";
			$body = "<p>Dziekujemy za zarejestrowanie sie na stronie Krakostop.</p>
			<p>Aby aktywowac konto kliknij link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
			<p>Krakostop</p>";

			$mail = new Mail();
			$mail->setFrom(SITEEMAIL);
			$mail->addAddress($to);
			$mail->subject($subject);
			$mail->body($body);
			$mail->send();

			header('Location: register.php?action=joined');
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
		<h1>Rejestracja</h1>
	</header>	
		<div class="register-line"></div>
		<h4>Zaloguj się przez
		<button class="facebook-btn"><i class="icon-facebook"></i> Facebook</button><h4>
		<hr>
		<h4>Masz już konto? <a href='login.php'>Zaloguj się</a><h4>
		<hr>

		<form role="form" method="post" action="" autocomplete="off">
				<?php
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2 class='bg-success'>Rejestracja zakończona sukcesem. Sprawdź swój email.</h2>";
				}
				?>
		
		 <div class="form-group">
		  	<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Użytkownik" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
		</div>
		<div class="form-group">
		  	<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
		</div>
		<div class="form-group">
		    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Hasło" tabindex="3">
		</div>
		<div class="form-group">
		    <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Potwierdź hasło" tabindex="4">
		</div>
	      <h4> Rejestrując się akceptujesz <a href="regulamin.php" target="_blank">regulamin</a><h4>
			<input type="submit" name="submit" value="Zarejestruj" class="btn btn-primary btn-block btn-lg" tabindex="5">
		</form>


	</div>


</body>
</html>