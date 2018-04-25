<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/daltarifas.php');

	$unidades = GetVarSESSION('unidades');
	
    $id = GetPOST('TxtId');
	$tipo = GetPOST('TxtTipo');
	$mascara = GetPOST('TxtMascara');
	$valor = GetPOST('TxtValor');
	$descricao = GetPOST('TxtDescricao');

	//muda o ponto para virgula
	$valor=str_replace(",", ".", $valor);
	
    $conexao = new Conexao();
	$daltarifas = new Daltarifas($conexao);
    $daltarifas->alterar($id, $unidades, $tipo, $mascara, $valor, $descricao);
    $conexao->FechaConexao();        
	
	/* GERADOR DE LOGS -------------------------- */
			  
	  require('../../dal/dallogs.php');
	  
	  $tbUsuario_id_LOG=GetVarSESSION('id');
	  $tarefaExecutada_LOG='ALTERA&Ccedil;&Atilde;O da Tarifa:'.$id.'-'.$unidades.'-'.$tipo.'-'.$mascara.'-'.$valor.'-'.$descricao.' por: '.GetVarSESSION('usuario');
	  $tipoDeTarefa_LOG='TARIFAS';			  			  
	  
	  $conexao = new Conexao();
	  $dallogs = new DALLogs($conexao); 
	  $dallogs->incluir($tbUsuario_id_LOG, $tarefaExecutada_LOG, $tipoDeTarefa_LOG);
	  $conexao->FechaConexao(); 
	  
	/* FIM GERADOR DE LOGS ----------------------- */

	header("Location:../../views/tarifas/index.php?Operacao=1");
	
?>