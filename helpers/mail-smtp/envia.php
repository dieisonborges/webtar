<?php

function ENVIAEMAIL($smtp, $porta, $senha, $usuario, $remetente, $remetentenome, $destinatario, $destinatarionome, $assunto, $mensagem, $debug=false) {
 
  $headers = "MIME-Version: 1.0\r\n".
             "Content-type: text/html;\r\n".
             "From: \"" . $remetentenome . "\" <" . $remetente . ">\r\n".
             "Reply-To: \"" . $remetentenome . "\" <" . $remetente . ">\r\n".
             "To: \"" . $destinatarionome . "\" <" . $destinatario . ">\r\n".
             "Subject: " . $assunto . " \r\n";
             "Date: ". date('D, d M Y H:i:s O') ." \r\n";
             "X-Priority: 3\r\n".
             "X-MSMail-Priority: High\r\n".
             "X-Mailer: WV Mailer\r\n".
             "X-SenderIP: " . $_SERVER["REMOTE_ADDR"] . "\r\n";
 
  if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
    $headers .= "X-SenderIP-Lan: " . $_SERVER["HTTP_X_FORWARDED_FOR"] . "\r\n";
  }
 
  $corpo = "\r\n<html>\r\n".
           "<head>\r\n".
           "<style>\r\n".
           "body { margin: 4px; padding: 4px; text-align: left; text-decoration: none; font-size: 11px; font-family: \"Lucida Sans Unicode\", Arial, Geneva, Helvetica, sans-serif; }\r\n".
           "input, textarea, td, th { font-family: \"Lucida Sans Unicode\", Arial, Geneva, Helvetica, sans-serif; font-size: 11px; }\r\n".
           "input, textarea, td, th {font-family: \"Lucida Sans Unicode\", Arial, Geneva, Helvetica, sans-serif;font-size: 11px;}\r\n".
           "a { text-decoration:none; font:bold; color:#989CAE; }\r\n".
           "a:hover { color:dimgray; font:bold; }\r\n".
           "</style>\r\n".
           "</head>\r\n".
           "<body bgcolor=\"#FFFFFF\">\r\n".
           $mensagem . "\r\n".
           "</body>\r\n".
           "</html>\r\n".
           "\n";
 
  $conn = fsockopen($smtp, $porta, $errno, $errstr, 30);
  fputs($conn, "EHLO " . $smtp . "\r\n");
  fputs($conn, "AUTH LOGIN\r\n");
  fputs($conn, base64_encode($usuario) . "\r\n");
  fputs($conn, base64_encode($senha) . "\r\n");
  fputs($conn, "MAIL FROM: " . $remetente . "\r\n");
  fputs($conn, "RCPT TO: " . $destinatario . "\r\n");
  fputs($conn, "DATA\r\n");
  fputs($conn, $headers);
  fputs($conn, "\r\n");
  fputs($conn, $corpo . "\r\n");
  fputs($conn, ".\r\n");
  fputs($conn, "QUIT\r\n");
 
  $log = "";
  while (!feof($conn)) {
    $log .= fgets($conn) . "<BR>\n";
  }
 
  if ($debug == true) {
    fclose($conn);
	return $log;
  } else {
  	return fclose($conn);
  }	
}
?>

<?php echo $resultado = ENVIAEMAIL("10.112.30.23", "25", "n1ngu3mS@B3", "telfa@cindacta4.intraer", "tifa@cindacta4.intraer", "teste", "tifa@cindacta4.intraer", "teste", "teste", "teste", $debug=false); ?>
