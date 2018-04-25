<?php
	
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalmsginicial.php');
	
	$unidades = GetVarSESSION('unidades');
	
    $mensagem = GetPOST('TxtMsgInicial');
	
	$id = GetPOST('TxtId');
	
	if($id)
		{	
		$conexao = new Conexao();
		$dalmsginicial = new DalMsgInicial($conexao);
		$dalmsginicial->alterar($id, $mensagem, $unidades);
		$conexao->FechaConexao();  
		}
	else
		{
		$conexao = new Conexao();
		$dalmsginicial = new DalMsgInicial($conexao);
		$dalmsginicial->incluir($mensagem, $unidades);
		$conexao->FechaConexao(); 
		}      

	header("Location:../../views/msg_inicial/index.php?Operacao=1");
?>