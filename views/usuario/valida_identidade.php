<?php	
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
  	require('../../dal/dalusuario.php');
	
	$identidade = $_REQUEST["TxtIdentidade"];
	
	$conexao = new Conexao();
    $dalusuario = new Dalusuario($conexao);
    $rs_usuario =  $dalusuario->getPorIdentidade($identidade);
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
