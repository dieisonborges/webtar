<?php
	session_start();
	require('../../util/seguranca.php');
	Seguranca::VerificaTarifador();
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
  	require('../../dal/dalusuario.php');
	
	$senha = $_REQUEST["TxtSenha"];	
	
	$conexao = new Conexao();
    $dalusuario = new Dalusuario($conexao);
    $rs_usuario =  $dalusuario->getPorSenha($senha);
    $usuario = mysql_fetch_object($rs_usuario);
	if(isset($usuario->id))
		{
			echo "false";
		}
	else
		{
			echo "true";
		}
?>

