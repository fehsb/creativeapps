<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("class/class.phpmailer.php");

$mail = new PHPMailer;

//Enable SMTP debugging.
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
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
$mail->Port = 587;

$mail->From = "helpmail@creativeapps.com.br";
$mail->FromName = "Full Name";

$mail->addAddress($_POST["email"], "Recepient Name");

$mail->isHTML(false);

$mail->Subject = "Subject Text";
$mail->Body = "Mail body in HTML";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "Message has been sent successfully";
}



?>
