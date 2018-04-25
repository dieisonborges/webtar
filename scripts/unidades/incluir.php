<?php
    session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();
	
	require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalunidades.php');
	
	$nome = GetPOST('TxtNome');
	$sigla = GetPOST('TxtSigla');
	$unidadeMae = GetPOST('TxtUnidadeMae');
	$cidade = GetPOST('TxtCidade');
	$estado = GetPOST('TxtEstado');	
	$cod_unidade_gestora_gru = GetPOST('TxtUG');	
	$nome_unidade_gru = GetPOST('TxtNUNIDADE');	
	$gestao_gru = GetPOST('TxtGESTAO');	
	$cod_recolhimento_gru = GetPOST('TxtCRECOLHIMENTO');	
	

	$conexao = new Conexao();
	$dalunidades = new Dalunidades($conexao);
    $dalunidades->incluir($nome, $sigla, $unidadeMae, $cidade, $estado, $cod_unidade_gestora_gru, $nome_unidade_gru, $gestao_gru, $cod_recolhimento_gru);
    $conexao->FechaConexao();        

	header("Location:../../views/unidades/index.php?Operacao=1");
?>
