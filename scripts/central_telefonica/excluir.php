<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();
	
    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalcentraltelefonica.php');

	$id = GetGET('id');
	$conexao = new Conexao();
	$dalcentraltelefonica = new Dalcentraltelefonica($conexao);
	$dalcentraltelefonica->excluir($id);

	
	header("Location:../../views/central_telefonica/index.php?Operacao=1");

?>
