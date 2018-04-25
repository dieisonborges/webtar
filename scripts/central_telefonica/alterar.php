<?php
    session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();
	
	require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalcentraltelefonica.php');
	
	$id = GetPOST('TxtId');
	$tbUnidades_id = GetPOST('TxtUnidade');
	$ip = GetPOST('TxtIp');
	$macAddress = GetPOST('TxtMac');
	$descricao = GetPOST('TxtDescricao');
	$usuarioCentral = GetPOST('TxtUsuarioCentral');
	$status = GetPOST('TxtAtivo');
	$senhaCentral = GetPOST('TxtSenhaCentral');


	$conexao = new Conexao();
	$dalcentraltelefonica = new Dalcentraltelefonica($conexao);
    $dalcentraltelefonica->alterar($id, $tbUnidades_id, $ip, $macAddress, $descricao, $usuarioCentral, $senhaCentral, $status);
    $conexao->FechaConexao();        

	
	header("Location:../../views/central_telefonica/index.php?Operacao=1");
?>
