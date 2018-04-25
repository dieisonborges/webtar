<?php
    session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();
	
	require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalcaptcha.php');
	
	
	
	$fileName = $_FILES['userfile']['name'];
	$tmpName  = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];
	
	$fp      = fopen($tmpName, 'r');
	$content = fread($fp, filesize($tmpName));
	$content = addslashes($content);
	fclose($fp);
	
	if(!get_magic_quotes_gpc())
	{
		$fileName = addslashes($fileName);
	}
	
	$keypass=GetPOST('TxtKeyPass');	
	
	
	$conexao = new Conexao();
	$dalcaptcha = new Dalcaptcha($conexao);
    $dalcaptcha->incluir($fileName, $fileSize, $fileType, $content, $keypass);
    $conexao->FechaConexao(); 

	header("Location:../../views/captcha/index.php?Operacao=1");
	
?>
