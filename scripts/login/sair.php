<?php
	session_start();
	require_once('../../funcoes/funcoes.php');
    require_once('../../configuracoes/conexao.php');   
	require('../../util/seguranca.php');	
	/* GERADOR DE LOGS */
   	/*
	require('../../dal/dallogs.php');
	$id = $_SESSION['id'];
	$log = "USER: $_SESSION['usuario'] --PERMISSION: $_SESSION['permissao']";		  
	$conexao = new Conexao();
	$dallogs = new DALLogs($conexao); 
	$dallogs->incluir($id, $log, "Logout OK");
	$conexao->FechaConexao();
	*/
    /* FIM GERADOR DE LOGS*/
	Seguranca::Sair();
?>