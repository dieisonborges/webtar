<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaUsuario();
	
    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalcontatelefonica.php');

	$id = GetGET('TxtIdConta');
	
	$id_usuario = GetVarSESSION('id');
	$unidades = GetVarSESSION('unidades');	
	
	
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);
	$dalcontatelefonica->excluir($id, $id_usuario, $unidades);
	$conexao->FechaConexao(); 

	
	header("Location:../../views/minhas_ligacoes/minhas_ligacoes_sem_justificativa_edit.php?Operacao=1");

?>
