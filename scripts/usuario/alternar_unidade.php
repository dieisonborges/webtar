<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
	
	require('../../dal/dalunidades.php');
	
	$unidade_post = GetPOST('TxtUnidade');	
	
	$conexao = new Conexao();
	$dalunidades = new Dalunidades($conexao);
	$rs_unidades = $dalunidades->getPorId($unidade_post);
	
	$unidades = mysql_fetch_object($rs_unidades);
	
	if((($unidades->unidade_mae)==($_SESSION['unidades_real']))or(($unidades->id)==($_SESSION['unidades_real'])))
		{
			$_SESSION['unidades'] = $unidades->id;
			$_SESSION['unidades_nome'] = $unidades->sigla;
			header("Location:../../views/usuario/sessao.php?Operacao=1");
		}
	else
		{
			header("Location:../../views/usuario/sessao.php?Operacao=0");
		}
	
	
?>