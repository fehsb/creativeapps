<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("class/class.phpmailer.php");

// Inicia a classe PHPMailer
$mail = new PHPMailer(true);

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP

try {
    echo $_POST['email'];
     $mail->Host = 'mx1.hostinger.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail->Port       = 465; //  Usar 587 porta SMTP
     $mail->Username = 'helpmail@creativeapps.com.br'; // Usuário do servidor SMTP (endereço de email)
     $mail->Password = '20011995'; // Senha do servidor SMTP (senha do email usado)
     $mail->SMTPSecure = 'ssl';  // SSL REQUERIDO pelo GMail
     $mail->isSMTP();

     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->SetFrom('helpmail@creativeapps.com.br' 'Nome'); //Seu e-mail
     $mail->AddReplyTo('meajuda@creativeapps.com.br', 'Nome'); //Seu e-mail
     $mail->Subject = 'Assunto'; //Assunto do e-mail
     echo $_POST['email'];

     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress($_POST['email'], 'Teste Locaweb');

     //Campos abaixo são opcionais
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC($_POST['email'], 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo


     //Define o corpo do email
     $mail->MsgHTML('corpo do email');

     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('arquivo.html'));

     $mail->Send();
     echo "Mensagem enviada com sucesso</p>\n";

    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}



?>
