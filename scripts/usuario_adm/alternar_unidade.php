<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
	
	/* VERIFICAR SEGURANCA DESTE METODO */
	
	$unidade_post = GetPOST('TxtUnidade');
	
	unset($_SESSION['unidades']);
	$_SESSION['unidades'] = $unidade_post;
	
	
	

	header("Location:../../views/usuario/sessao.php?Operacao=1");
?>