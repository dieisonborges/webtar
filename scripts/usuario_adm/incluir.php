<?php
 	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();
	
	require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalusuario.php');
	
	function verificaGeradorSenha()
	{
		$senha = GeradorSenha($tipo="N N N N N N N");

		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
		$rs_usuario =  $dalusuario->getPorSenha($senha);
		$usuario = mysql_fetch_object($rs_usuario);
		if(isset($usuario->id))
			{
				verificaGeradorSenha();
			}
		else
			{
				return $senha;
			}
	
	}
	
	function verificaCPFBanco($cpf)
	{
		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
		$rs_usuario =  $dalusuario->getPorCPF($cpf);
		$usuario = mysql_fetch_object($rs_usuario);
		if(isset($usuario->id))
			{
				return false;
			}
		elseif(!validaCPF($cpf))
			{
				return false;
			}
		else
			{
				return true;
			}
	}
	
	$cpf = antiSqlInjection(GetPOST('TxtCPF'));
    $email = antiSqlInjection(GetPOST('TxtEmail'));	
	$nomeCompleto = antiSqlInjection(GetPOST('TxtNomeCompleto'));
	$nomeGuerra = antiSqlInjection(GetPOST('TxtNomeGuerra'));
	$saram = antiSqlInjection(GetPOST('TxtSaram'));
	$identidade = antiSqlInjection(GetPOST('TxtIdentidade'));
	$telefone = antiSqlInjection(GetPOST('TxtTelefone'));
	$postoGraduacao = antiSqlInjection(GetPOST('TxtPostoGraduacao'));
	$tbPermissoes_id = "1";
	$ativo = "0";
	$tbUnidades_id = antiSqlInjection(GetPOST('TxtUnidade'));	
	$senha = verificaGeradorSenha();
	$usuario=GeraUSUARIO($nomeCompleto, $nomeGuerra);
	
	if(verificaCPFBanco($cpf) and !empty($cpf) and !empty($email) and !empty($usuario) and !empty($nomeCompleto) and !empty($nomeGuerra) and !empty($saram) and !empty($identidade) and !empty($telefone) and !empty($postoGraduacao) and !empty($tbUnidades_id))
		{		
		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
		$dalusuario->incluirAdm($cpf, $email, $senha, $usuario, $nomeCompleto, $nomeGuerra, $saram, $identidade, $telefone, $postoGraduacao, $tbPermissoes_id, $ativo, $tbUnidades_id);
		$conexao->FechaConexao();
		header("Location:../../views/usuario_adm/index.php?Operacao=1");
		}  
	else
		{ 
		header("Location:../../views/usuario_adm/index.php?Operacao=0");
		} 

	
	
?>
