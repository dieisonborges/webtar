<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

require '../class.phpmailer.php';

try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	$body             = file_get_contents('contents.html');
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "expresso01.cindacta4.intraer"; // SMTP server
	$mail->Username   = "tifa@cindacta4.intraer";     // SMTP server username
	$mail->Password   = "n1ngu3mS@B3";            // SMTP server password

	$mail->IsSendmail();  // tell the class to use Sendmail

	$mail->AddReplyTo("tifa@cindacta4.intraer","Teste");

	$mail->From       = "telfa@cindacta4.intraer";
	$mail->FromName   = "WEBTAR - Sistema de Tarifação Telefônica";

	$to = "telfa@cindacta4.intraer";

	$mail->AddAddress($to);

	$mail->Subject  = "Notificação do WEBTAR - Sistema de Tarifação Telefônica";

	//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->WordWrap   = 80; // set word wrap

	$mail->MsgHTML($body);

	$mail->IsHTML(true); // send as HTML

	echo $status = $mail->Send();
	echo "<br />";
	echo 'A mensagem foi enviada!';
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
?>