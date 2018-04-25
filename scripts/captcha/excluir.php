<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();
	
    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalcaptcha.php');

	$captcha = GetGET('id');
	$conexao = new Conexao();
	$dalcaptcha = new Dalcaptcha($conexao);
	$dalcaptcha->excluir($captcha);

	
	header("Location:../../views/captcha/index.php?Operacao=1");

?>
