<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();
	
    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalusuario.php');

	$usuario = GetGET('id');
	$conexao = new Conexao();
	$dalusuario = new Dalusuario($conexao);
	$dalusuario->excluir($usuario);

	
	echo("<script>window.location='../../views/usuario/index.php?Operacao=1'</script>");
	header("Location:../../views/usuario/index.php?Operacao=1");

?>
