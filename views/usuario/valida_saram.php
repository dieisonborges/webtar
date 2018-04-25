<?php	
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
  	require('../../dal/dalusuario.php');
	
	$saram = $_REQUEST["TxtSaram"];
	
	$conexao = new Conexao();
    $dalusuario = new Dalusuario($conexao);
    $rs_usuario =  $dalusuario->getPorSaram($saram);
    $usuario = mysql_fetch_object($rs_usuario);
	if(isset($usuario->id))
		{
			echo "false";
		}
	else
		{
			echo "true";
		}
?>
