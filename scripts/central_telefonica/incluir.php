<?php
    session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();
	
	require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalcentraltelefonica.php');
	
	$tbUnidades_id = GetPOST('TxtUnidade');
	$ip = GetPOST('TxtIp');
	$macAddress = GetPOST('TxtMac');
	$descricao = GetPOST('TxtDescricao');
	$usuarioCentral = GetPOST('TxtUsuarioCentral');
	$senhaCentral = GetPOST('TxtSenhaCentral');

	$conexao = new Conexao();
	$dalcentraltelefonica = new Dalcentraltelefonica($conexao);
    $dalcentraltelefonica->incluir($tbUnidades_id, $ip, $macAddress, $descricao, $usuarioCentral, $senhaCentral);
    $conexao->FechaConexao();        

	header("Location:../../views/central_telefonica/index.php?Operacao=1");
?>
