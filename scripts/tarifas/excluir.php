<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/daltarifas.php');

	$unidades = GetVarSESSION('unidades');
	$id = GetGET('id');
	$conexao = new Conexao();
	$daltarifas = new Daltarifas($conexao);
	$daltarifas->excluir($id, $unidades);
	
	/* GERADOR DE LOGS -------------------------- */
			  
	  require('../../dal/dallogs.php');
	  
	  $tbUsuario_id_LOG=GetVarSESSION('id');
	  $tarefaExecutada_LOG='EXCLUS&Atilde;O da Tarifa:'.$id.' por: '.GetVarSESSION('usuario');
	  $tipoDeTarefa_LOG='TARIFAS';			  			  
	  
	  $conexao = new Conexao();
	  $dallogs = new DALLogs($conexao); 
	  $dallogs->incluir($tbUsuario_id_LOG, $tarefaExecutada_LOG, $tipoDeTarefa_LOG);
	  $conexao->FechaConexao(); 
	  
	/* FIM GERADOR DE LOGS ----------------------- */
	
	header("Location:../../views/tarifas/index.php?Operacao=1");

?>
