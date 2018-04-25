<?php
 	require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalusuario.php');	
	
	
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
	
	
	function verificaCILCODEBanco($cilcode)
	{
		
		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
		return  $dalusuario->getPorUnicoCILCODE($cilcode);
		
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
	$senha = antiSqlInjection(GetPOST('TxtSenha'));
	$usuario=GeraUSUARIO($nomeCompleto, $nomeGuerra);
	
	$cilcode=antiSqlInjection(GetPOST('TxtCilcode'));
	$cilcode_2=antiSqlInjection(GetPOST('TxtCilcode_2'));
	
	echo "$cpf"."   -   ";
	echo verificaCPFBanco($cpf);
	
	if((verificaCPFBanco($cpf)) and ($cpf) and ($email) and ($usuario) and ($nomeCompleto) and ($nomeGuerra) and ($saram) and ($identidade) and ($telefone) and ($postoGraduacao) and ($tbUnidades_id) and (verificaCILCODEBanco($cilcode)))
		{		
		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
			if($dalusuario->incluir($cpf, $email, $senha, $usuario, $nomeCompleto, $nomeGuerra, $saram, $identidade, $telefone, $postoGraduacao, $tbPermissoes_id, $ativo, $tbUnidades_id))
			{		
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
