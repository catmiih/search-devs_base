<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../assets/extend/PHPMailer/src/Exception.php';
require '../../assets/extend/PHPMailer/src/PHPMailer.php';
require '../../assets/extend/PHPMailer/src/SMTP.php';


global $error;

function confirmEmail($email, $type)
{
	$usermail = $email;
	$hostmail = 'naoresponda@searchdevs.com.br';

	$mail = new PHPMailer(true);

	/* SendMail Config */
	$mail->IsSMTP();
	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = 'email-ssl.com.br';
	$mail->Port = 465;
	$mail->Username = $hostmail;
	$mail->Password = 'f6jAGS406@3';
	$mail->setLanguage('pt');

	/* Sending Email */
	$mail->setFrom($hostmail);
	$mail->addReplyTo($hostmail);

	$mail->AddAddress($usermail);

	if ($type == 0) {

		$confirm = '<div class="email" style="width: 40rem; background-color: #000; color: #fff; font-family: sans-serif; padding: 3%; border-radius: 25px;">
        <div class="header">
            <h1 style="text-align: center; margin: 10% auto;">Bem vindo ao SEARCH DEVS!</h1>
        </div>
        <p style="margin: 10% 5%;">Você acaba de iniciar oficialmente sua trilha para se tornar parte do time SEARCH DEVS, e o primeiro passo é
            confirmar seu email, que é possível realizar apenas clicando no botão abaixo!</p>

        <a href="" class="btn" style="color: #fff; font-weight: bold; border: none; border-radius: 10px; background: #092565; background: radial-gradient(circle, #092565 0%, #6e05f5 100%); background-size: 200%; font-size: 1.2rem; text-decoration: none; margin-left: 5%; padding: 3% 10%;">CONFIRMAR EMAIL</a>

        <p style="margin: 10% 5%;">Ou copie e cole o link em seu navegador: <a href="" class="link" style="color: #6e05f5;">linkfoda</a></p>
    </div>';

		$mail->isHTML(true);
		$mail->charSet = 'UTF-8';
		$mail->Encoding = 'base64';
		$mail->Subject = 'Confirmação de cadastro no SEARCHDEVS.';
		$mail->Body = '<br>' . $confirm . '<br>';

		if (!$mail->send()) {
			echo 'Não foi possível enviar a mensagem.<br>';
			echo 'Erro: ' . $mail->ErrorInfo;
		} else {
			header('Location: index.php?enviado');
		}
	}
}

confirmEmail('naoresponda@searchdevs.com.br', 0);
