<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalligacoes.php');

	$unidades = GetVarSESSION('unidades');
	
	$conexao = new Conexao();
	$dalligacoes = new Dalligacoes($conexao);
	$dalligacoes->limparSemSemUsuario($unidades);
	$conexao->FechaConexao(); 
	
	/* GERADOR DE LOGS -------------------------- */
			  
	  require('../../dal/dallogs.php');
	  
	  $tbUsuario_id_LOG=GetVarSESSION('id');
	  $tarefaExecutada_LOG='Limpeza de registros de CILCODES utilizados sem CADASTRO por: '.GetVarSESSION('usuario');
	  $tipoDeTarefa_LOG='CILCODE SEM CADASTRO NO SISTEMA';			  			  
	  
	  $conexao = new Conexao();
	  $dallogs = new DALLogs($conexao); 
	  $dallogs->incluir($tbUsuario_id_LOG, $tarefaExecutada_LOG, $tipoDeTarefa_LOG);
	  $conexao->FechaConexao(); 
	  
	/* FIM GERADOR DE LOGS ----------------------- */
	
	header("Location:../../views/ligacoes/senha_sem_usuario.php?Operacao=1");

?>
