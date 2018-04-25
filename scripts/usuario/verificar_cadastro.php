<?php
 	require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalusuario.php');
	
	
	function verificaCPFCADASTRADO($cpf)
	{
		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
		return  $dalusuario->getPorUnicoCPF($cpf);
	}
	
	$cpf = antiSqlInjection(GetPOST('TxtCPF'));
    $cilcode = antiSqlInjection(GetPOST('TxtCILCODE'));
	
	
	
	if(verificaCPFCADASTRADO($cpf))
		{
			echo '<script type="application/javascript"> alert("Você já está cadastrado!"); </script>'; 
			echo '<script language="JavaScript"> window.location="../../views/login/"; </script>';      
		}
	elseif(!validaCPF($cpf))
		{
			echo '<script type="application/javascript"> alert("CPF INVÁLIDO!"); </script>'; 
			echo '<script language="JavaScript"> window.location="../../views/usuario/verificar_cadastro.php"; </script>';      
		}
	elseif($cilcode=='Y')
		{
			//header("Location:../../views/usuario/cadastrar_com_cilcode.php?TxtCPF=$cpf");
			header("Location:../../views/usuario/cadastrar.php?TxtCPF=$cpf");
		}
	elseif($cilcode=='N')
		{
			header("Location:../../views/usuario/cadastrar.php?TxtCPF=$cpf");
		}
	else
		{
			echo '<script type="application/javascript"> alert("ERRO 234572342"); </script>';
		}
	
	
?>
