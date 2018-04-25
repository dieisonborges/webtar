<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaUsuario();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalusuario.php');

	$unidades = GetVarSESSION('unidades');	
    $id = GetVarSESSION('id');
	
	//$cpf = GetPOST('TxtCPF');
    $email = GetPOST('TxtEmail');
	$telefone = GetPOST('TxtTelefone');
	$postoGraduacao = GetPOST('TxtPostoGraduacao');

    $conexao = new Conexao();
	$dalusuario = new Dalusuario($conexao);
    $dalusuario->alterarMeuUsuario($id, $email, $telefone, $postoGraduacao, $unidades);
    $conexao->FechaConexao();        

	header("Location:../../views/meu_usuario/index.php?Operacao=1");
?>