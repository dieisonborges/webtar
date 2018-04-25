<?php
    session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();
	
	require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalusuario.php');
	
	$email = GetPOST('TxtEmail');
	$senha = GetPOST('TxtSenha');
	$nomeCompleto = GetPOST('TxtNomeCompleto');
	$nomeGuerra = GetPOST('TxtNomeGuerra');
	$saram = GetPOST('TxtSaram');
	$identidade = GetPOST('TxtIdentidade');
	$telefone = GetPOST('TxtTelefone');
	$postoGraduacao = GetPOST('TxtPostoGraduacao');
	$tbPermissoes_id = GetPOST('TxtPermissoes');
	
	$usuario = GeraUSUARIO($nomeCompleto,$nomeGuerra);

	$conexao = new Conexao();
	$dalusuario = new Dalusuario($conexao);
    $dalusuario->incluir($email ,$senha ,$usuario ,$nomeCompleto ,$nomeGuerra ,$saram ,$identidade ,$telefone ,$postoGraduacao ,$tbPermissoes_id);
    $conexao->FechaConexao();        

	header("Location:../../views/usuario/index.php?Operacao=1");
?>
