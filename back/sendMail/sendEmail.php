<?php

require ("../../assets/extend/PHPMailer/src/PHPMailer.php");
require ("../../assets/extend/PHPMailer/src/SMTP.php");

define('GUSER', '**');	// <-- Insira aqui o seu GMail
define('GPWD', '**');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
    global $error;

	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 465;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
    $mail->Subject = $assunto;
    $mail->Body = $corpo;

	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		
		return true;
	}
}

// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), 
//o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.

 if (smtpmailer('emilyleme.dev@gmail.com', '**', 'Formulario Pedidos - Leme Code', 'Novo chamado recebido!', $Vai)) {

	header("Location: pedido.php");

      die();

}
if (!empty($error)) echo $error;
?>