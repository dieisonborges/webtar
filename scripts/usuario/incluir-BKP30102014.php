<?php
 	require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalusuario.php');
	
	function verificaGeradorSenha($tbUnidades_id)
	{
		// PARA 7 Digitos
		// $senha = GeradorSenha($tipo="N N N N N N N");
		
		// PARA 6 Digitos
		$senha = GeradorSenha($tipo="N N N N N N");
		
		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
		$rs_usuario =  $dalusuario->getPorSenha($senha, $tbUnidades_id);
		$usuario = mysql_fetch_object($rs_usuario);		
		
		
		if(isset($usuario->id))
			{
				$senha="";
				verificaGeradorSenha($tbUnidades_id);
			}
		elseif($senha[0]==0)
			{
				$senha="";
				verificaGeradorSenha($tbUnidades_id);
			}	
		else
			{
				return $senha;
			}
	
	}
	
	function verificaCPFBanco($cpf)
	{
		echo validaCPF($cpf);
		
		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
		$usuarioCpf =  $dalusuario->getPorUnicoCPF($cpf);
		
		
		if(!validaCPF($cpf))
			{
				//echo "INVALIDO";
				return 0;
			}
	    elseif($usuarioCpf)
			{
				//echo "CADASTRADO";
				return 0;
			}
		else
			{
				//echo "- OK -";
				return 1;
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
	$senha = verificaGeradorSenha($tbUnidades_id);
	$usuario=GeraUSUARIO($nomeCompleto, $nomeGuerra);
	
	echo "$cpf"."   -   ";
	echo verificaCPFBanco($cpf);
	
	if((verificaCPFBanco($cpf)) and ($cpf) and ($email) and ($usuario) and ($nomeCompleto) and ($nomeGuerra) and ($saram) and ($identidade) and ($telefone) and ($postoGraduacao) and ($tbUnidades_id))
		{		
		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
			if($dalusuario->incluir($cpf, $email, $senha, $usuario, $nomeCompleto, $nomeGuerra, $saram, $identidade, $telefone, $postoGraduacao, $tbPermissoes_id, $ativo, $tbUnidades_id))
			{		
				
				session_start(); 
				$_SESSION['termo_resposabilidade_id_temp']= mysql_insert_id();		
				$_SESSION['termo_resposabilidade_unidade_temp']= $tbUnidades_id;	
				
				$conexao->FechaConexao();
						
				header("Location:../../views/erros/cadastrado.php?Operacao=1");
				
			}
			else
			{
			$conexao->FechaConexao();
			header("Location:../../views/erros/cadastrado.php?Operacao=0");
			}
		}  
	else
		{ 
		header("Location:../../views/erros/cadastrado.php?Operacao=0");
		} 

	
?>
