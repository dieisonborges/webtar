<?php

/*session_start();
require('../../util/seguranca.php');
Seguranca::VerificaAdministrador();
*/

require('../../funcoes/funcoes.php');
require('../../configuracoes/conexao.php');
require('../../dal/dalcaptcha.php');

$id=getGET('id');

$conexao = new Conexao();
$dalcaptcha = new Dalcaptcha($conexao);



$rs_captcha = $dalcaptcha->getImageCaptcha($id);

list($name, $type, $size, $content) = mysql_fetch_array($rs_captcha);
		
header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;

exit;


?>