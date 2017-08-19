<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("class/class.phpmailer.php");

function sendFeedBackMessage() {
  $m = new PHPMailer;
  $m->SMTPDebug = 3;
  //Set PHPMailer to use SMTP.
  $m->IsSMTP();

  $m->CharSet = 'UTF-8';
  //Set SMTP host name
  $m->Host = "mx1.hostinger.com.br";
  //Set this to true if SMTP host requires authentication to send email
  $m->SMTPAuth = true;
  //Provide username and password
  $m->Username = "helpmail@creativeapps.com.br";
  $m->Password = "20011995";
  //If SMTP requires TLS encryption then set it
  $m->SMTPSecure = "ssl";
  //Set TCP port to connect to
  $m->Port = 465;

  $m->From = "helpmail@creativeapps.com.br";
  $m->FromName = "Help me - Creative - Not Reply";
  $m->AddReplyTo("meajuda@creativeapps.com.br", "MeAjuda - Creative"); //Seu e-mail
  $m->addAddress($_POST["email"], $_POST["name"]);
  $m->isHTML(false);

  $m->Subject = "We recived your message";
  $m->Body = "Hello, we received your message and in a few hours we will get in touch.";
  $m->send();
}


$mail = new PHPMailer;

//Enable SMTP debugging.
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->IsSMTP();

$mail->CharSet = 'UTF-8';
//Set SMTP host name
$mail->Host = "mx1.hostinger.com.br";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "helpmail@creativeapps.com.br";
$mail->Password = "20011995";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "ssl";
//Set TCP port to connect to
$mail->Port = 465;

$mail->From = "helpmail@creativeapps.com.br";
$mail->FromName = $_POST["name"];
$mail->AddReplyTo($_POST["email"], $_POST["name"]); //Seu e-mail
$mail->addAddress("meajuda@creativeapps.com.br", "Me Ajuda");

$mail->isHTML(false);

$mail->Subject = $_POST["subject"];
$mail->Body = $_POST["message"];

$mail->send();
sendFeedBackMessage();

header("Location: http://creativeapps.com.br");
die();





?>
