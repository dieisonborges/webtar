<?php
	
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/daljustificativaligacoes.php');

	echo $id_ligacao = GetPOST('TxtIdLigacao');
	echo $aprovacao = GetPOST('TxtAprovacao');
	
	
	
    $conexao = new Conexao();
	$daljustificativaligacoes = new DalJustificativaLigacoes($conexao);
    $daljustificativaligacoes->alterarAprovacao($id_ligacao, $aprovacao);
    $conexao->FechaConexao();  
	
	echo("<script>window.location='../../views/ligacoes/ligacoes_para_aprovar.php?Operacao=1'</script>");
	header("Location:../../views/ligacoes/ligacoes_para_aprovar.php?Operacao=1");
	
?>