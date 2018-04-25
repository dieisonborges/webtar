<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaUsuario();
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
  	require('../../dal/dalusuario.php');
	
	$unidades = GetVarSESSION('unidades_real');
	
	$conexao = new Conexao();
    $dalusuario = new Dalusuario($conexao);
	$id = GetVarSESSION('id');
    $rs_usuario =  $dalusuario->getPorId($id, $unidades);
    $usuario = mysql_fetch_object($rs_usuario);
?>
<?php require('../layouts/termo_resposabilidade.php');?>