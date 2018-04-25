<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();	
	require('../../funcoes/funcoes.php');

	$cpf = $_REQUEST["TxtCPF"];	
	
	if(validaCPF($cpf))
	{
		echo "false";
	}
	else
	{
		echo "true";
	}
?>
