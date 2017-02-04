<?php require('includes/config.php'); 

if(!$user->is_logged_in()){ header('Location: login.php'); } 


if(isset($_POST['submit']))
{
  $agree = true;

  $name = $_POST['name'];
  $fb_address = $_POST['fb_address'];
  $content = $_POST['content'];

  //Check input name
  if ((strlen($name)<2))
  {
    $agree=false;
    $error[]="Za krótkie imię! ";
  }
  if ((strlen($name)>26))
  {
    $agree=false;
    $error[]="Imię powinno posiadać max. 26 znaków!";
  }
  if ((strlen($content)<40) || (strlen($content)>1000))
  {
    $agree=false;
    $error[]="Ogłoszenie powinno zawierać między 40 a 1000 znaków!";
  }
  if((strlen($fb_address)<10))
  {
    $agree=false;
    $error[]="Adres fb jest nie poprawny!";
  }

//echo $agree;

  try {

      //$id = $db->lastInsertId('id');
      //echo $id;

    if(!isset($error)){
          $stmt = $db->prepare('INSERT INTO adverts (id, memberID, name, content, fb_address,date, active ) VALUES (:id, :memberID, :name, :content, :fb_address, :date,  :active)');
          $stmt->execute(array(
            ':id' => $_SESSION['memberID'],
            ':memberID' => $_SESSION['memberID'],
            ':name' => $_POST['name'],
            ':content' => $_POST['content'],  
            ':fb_address' => $fb_address,
            ':date' => date('Y-m-d'),
            ':active' => true
          ));
          $send_add = "Wysłano Ogłoszenie! Sprawdź tablice parozłączki! ";
    }
  }
  catch(PDOException $e) {
        //$error[] = $e->getMessage();
        $error[] = "Dodałeś już ogłoszenie! Każdy użytkownik może dodać tylko jedne ogłoszenie, usuń poprzednie i dodaj nowe. ";
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
    <div id="home" class="tab-pane fade ">
      <h3>Tablica</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Rejestracja</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>



    <div id="menu2" class="tab-pane fade in active">
      <h3>Parozłączka</h3>
      <p>Chcesz wziąść udział w wyścigu ale nie masz drugiej osoby do pary? To nie problem. Skorzystaj z naszej parozłączki i znajdz towarzysza swojej autostopowej podróży. Napisz pare słów o sobie żeby inni mogli Cię lepiej poznać, a my wrzucimy Twoje ogłoszenie na Tablice Parozłączki</p><br>
      <form role="form" method="post" action="" autocomplete="off">
        <?php
            if(isset($error)){
              foreach($error as $error){
                echo '<p class="">'.$error.'</p>';
              }
            }
        ?>
        <?php
            if(isset($send_add)){
              {
                echo '<p class="">'.$send_add.'</p>';
              }
            }
        ?>
        <div class="form-group col-xs-12 col-md-6">
            <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Twoje imię" value="" tabindex="1">
        </div>
        <div class="form-group col-xs-12 col-md-6">
            <input type="text" name="fb_address" id="fb_address" class="form-control input-lg" placeholder="Link do konta Facebook" value="" tabindex="1">
        </div>
        <div class="form-group col-xs-12">
        <label for="content">Napisz ogłoszenie</label>
        <textarea class="form-control" rows="5" name="content" id="content"></textarea>
        </div>
        <br>
        <input type="submit" name="submit" value="Wyslij" class="btn btn-primary btn-lg panel-btn" tabindex="5">
        <br>
      </form>

    </div>

  </div>

  <br><br>
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