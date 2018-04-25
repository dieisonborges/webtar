<?php
	session_start();
	require_once('../../funcoes/funcoes.php');
	require_once('../../configuracoes/conexao.php');   
	require('../../dal/dalcaptcha.php');
	
	$conexao = new Conexao();
	$dalcaptcha = new Dalcaptcha($conexao);	
	$rs_captcha =  $dalcaptcha->getRand();
	$captcha = mysql_fetch_object($rs_captcha);
	$_SESSION['captcha'] = $captcha->keypass;

	header("Location:../../views/login/index.php?ErroLogin=1");
	  
?>

