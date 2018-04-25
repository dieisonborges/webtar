<?php
	
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaUsuario();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/daljustificativaligacoes.php');
	require('../../dal/dalligacoes.php');
	
	$unidades = GetVarSESSION('unidades');

	$id = GetPOST('TxtIdLigacao');    
    $tipo = GetPOST('TxtTipo');
	$justificativa = GetPOST('TxtJustificativa');
	
	//Justifica todas as Ligações com o mesmo número
	
	$id_usuario=GetVarSESSION('id');
	
	$conexao = new Conexao();
    $dalligacoes_user = new Dalligacoes($conexao);
    $rs_ligacoes_user =  $dalligacoes_user->getPorIdMinhasLigacoes($id, $id_usuario, $unidades);
    $ligacoes_user = mysql_fetch_object($rs_ligacoes_user);
	$numDiscado=$ligacoes_user->numDiscado;
	$conexao->FechaConexao();
	
	$conexao = new Conexao();
    $dalligacoes = new Dalligacoes($conexao);
    $rs_ligacoes =  $dalligacoes->getPorIdMinhasLigacoesNumDiscado($id_usuario, $numDiscado, $unidades);	
	$conexao->FechaConexao();
	//Cria Justificativa para todas as ligacoes com o mesmo destino
    while ($ligacoes = mysql_fetch_object($rs_ligacoes)){	
	/* APROVACAO AUTOMATICA */
	//if(!$id)
		//{
		$tbLigacoes_id = GetPOST('TxtIdLigacao');
		//aprovacao = 1 - APROVADA
		$aprovacao = 1;
		$conexao = new Conexao();
		$daljustificativaligacoes = new DalJustificativaLigacoes($conexao);
		$daljustificativaligacoes->incluir($ligacoes->id, $tipo, $justificativa, $aprovacao, $unidades);
    	$conexao->FechaConexao();		
		//}
	
	
	/* APROVACAO MANUAL */
	
	/*
    if(!$id)
		{
		//Nao existe uma Justificativa
		$tbLigacoes_id = GetPOST('TxtIdLigacao');
		//aprovacao = 3 - AGUARDANDO APROVACAO
		$aprovacao = 3;
		$conexao = new Conexao();
		$daljustificativaligacoes = new DalJustificativaLigacoes($conexao);
		$daljustificativaligacoes->incluir($tbLigacoes_id, $tipo, $justificativa, $aprovacao);
    	$conexao->FechaConexao();		
		}
	else   
		{	
		//Ja existe uma Justificativa	 
		//aprovacao = 3 - AGUARDANDO APROVACAO
		$aprovacao = 3;
		$conexao = new Conexao();
		$daljustificativaligacoes = new DalJustificativaLigacoes($conexao);
    	$daljustificativaligacoes->alterar($id, $tipo, $justificativa, $aprovacao);
    	$conexao->FechaConexao();		 
		} 
	*/ 
	
	} 

	header("Location:../../views/minhas_ligacoes/minhas_ligacoes_sem_justificativa.php?Operacao=1");
?>