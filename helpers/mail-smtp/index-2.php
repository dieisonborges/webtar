<?php

function sendMail($para,$de,$mensagem,$assunto)
{
    //DADOS SMTP
    $smtp = "https://expresso01.cindacta4.intraer";
    $usuario = "telfa@cindacta4.intraer";
    $senha = "n1ngu3mS@B3";

    require_once('smtp/smtp.php');

    $mail = new SMTP;
    $mail->Delivery('relay');
    $mail->Relay($smtp, $usuario, $senha, 25, 'login', false);
    $mail->TimeOut(50);
    $mail->Priority('high');
    $mail->From($de);
    $mail->AddTo($para);
    $mail->Html($mensagem);

    if($mail->Send($assunto))
        return true;
    else
        return false;
} 

echo $status = sendMail("tifa@cindacta4.intraer","telfa@cindacta4.intraer","ola","ola");


?>