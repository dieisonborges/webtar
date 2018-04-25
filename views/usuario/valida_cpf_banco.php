<?php	
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
  	require('../../dal/dalusuario.php');
	
	$unidades = GetVarSESSION('unidades');
	
	$cpf = $_REQUEST["TxtCPF"];	
	
	$conexao = new Conexao();
	$dalusuario = new Dalusuario($conexao);
	$rs_usuario =  $dalusuario->getPorCPF($cpf, $unidades);
	$usuario = mysql_fetch_object($rs_usuario);
	if(isset($usuario->id))
		{
			echo "false";
		}
	elseif(!validaCPF($cpf))
		{
			echo "false";
		}
	else
		{
			echo "true";
		}
	
?>