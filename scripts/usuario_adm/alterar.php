<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalusuario.php');
	
    $id = GetPOST('TxtId');
	$cpf = GetPOST('TxtCPF');
    $email = GetPOST('TxtEmail');
	$senha = GetPOST('TxtSenha');
	$usuario = GetPOST('TxtUsuario');
	$nomeCompleto = GetPOST('TxtNomeCompleto');
	$nomeGuerra = GetPOST('TxtNomeGuerra');
	$saram = GetPOST('TxtSaram');
	$identidade = GetPOST('TxtIdentidade');
	$telefone = GetPOST('TxtTelefone');
	$postoGraduacao = GetPOST('TxtPostoGraduacao');
	$tbPermissoes_id = GetPOST('TxtPermissoes');
	$ativo = GetPOST('TxtAtivo');
	$tbUnidades_id = GetPOST('TxtUnidade');
	
	/* TIPO DE SENHA */
	$tipoSenha = GetPOST('TxtLocal');
	$tipoSenha = $tipoSenha." ".GetPOST('TxtCelular');
	$tipoSenha = $tipoSenha." ".GetPOST('TxtDDD');
	$tipoSenha = $tipoSenha." ".GetPOST('TxtDDI');
	
		
    $conexao = new Conexao();
	$dalusuario = new Dalusuario($conexao);
    $dalusuario->alterarAdm($id, $cpf, $email, $senha, $usuario, $nomeCompleto, $nomeGuerra, $saram, $identidade, $telefone, $postoGraduacao, $tbPermissoes_id, $ativo, $tipoSenha, $tbUnidades_id);
    $conexao->FechaConexao();        

	header("Location:../../views/usuario_adm/index.php?Operacao=1");
?>