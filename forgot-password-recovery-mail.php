<?php
if(!class_exists('PHPMailer')) {
    require('phpmailer/class.phpmailer.php');
	require('phpmailer/class.smtp.php');
}

require_once("mail_configuration.php");

$mail = new PHPMailer();

$emailBody = '<div><p>Olá, <strong>'.$username.'</strong></p>
				<br>
				<p>Recebemos um pedido de recuperação de senha da sua conta na <a href="' . PROJECT_HOME . '">Rádio McDonalds</a>. Para atualizar sua senha, clique no link abaixo:</p>				
				<p><a href="' . PROJECT_HOME . 'reset-password.php?name='.$param_key.'">' . PROJECT_HOME . 'reset-password.php?name='.$param_key.'</a></p>
				<br>
				<p>Este link só poderá ser usado uma única vez. Se por acaso você não solicitou nenhuma alteração de senha, por favor, entre em contato conosco pelo email <strong>xxxx@radiomcdonalds.com.br</strong></p>
				<br>
				<p>Atenciosamente,</p>				 
				<p>A equipe da Rádio McDonalds</p>
				</div>';

$mail->CharSet = 'UTF-8';
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = PORT;  
$mail->Username = MAIL_USERNAME;
$mail->Password = MAIL_PASSWORD;
$mail->Host     = MAIL_HOST;
$mail->Mailer   = MAILER;

$mail->SetFrom(SENDER_EMAIL, SENDER_NAME);
$mail->AddReplyTo(SERDER_EMAIL, SENDER_NAME);
$mail->ReturnPath=SERDER_EMAIL;	
$mail->AddAddress($param_email);
$mail->Subject = "Rádio McDonald's | Recuperação de Senha";		
$mail->MsgHTML($emailBody);
$mail->IsHTML(true);

if(!$mail->Send()) {
	$msg_error = 'Problem in Sending Password Recovery Email';
} else {
	$msg_success = 'Enviamos um email para que você possa atualizar sua senha.';
}

?>
