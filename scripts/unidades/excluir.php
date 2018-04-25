<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();
	
    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalunidades.php');

	$id = GetGET('id');
	$conexao = new Conexao();
	$dalunidades = new Dalunidades($conexao);
	$dalunidades->excluir($id);

	
	header("Location:../../views/unidades/index.php?Operacao=1");

?>
