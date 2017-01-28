<?php

$emailFrom = "bartek.piatkowski@gmail.com";
$emailTo = "bartek.piatkowski@gmail.com";
$temat = "Kontakt krakostop";
$name = Trim(stripslashes($_POST['name'])); 
$email = Trim(stripslashes($_POST['email'])); 
$subject = Trim(stripslashes($_POST['subject'])); 
$message = Trim(stripslashes($_POST['message'])); 

$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
  exit;
}

$Body = "";
$Body .= "Wiadomość ze strony Krakostop: ";
$Body .= "\n";
$Body .= "Imię: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Temat: ";
$Body .= $subject;
$Body .= "\n";
$Body .= "Wiadomość: ";
$Body .= $message;
$Body .= "\n";

$success = mail($emailTo, $temat, $Body, "From: <$EmailFrom>");

if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
}
?>