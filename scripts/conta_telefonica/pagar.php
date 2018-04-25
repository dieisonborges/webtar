<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalcontatelefonica.php');

    $id = GetGET('TxtId');
	
	$usuario= GetGET('TxtUsuario');
	
    $conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);
    $dalcontatelefonica->pagar($id, $usuario);
    $conexao->FechaConexao();        

	if($usuario)
		header("Location:../../views/pagamento/contas_por_usuario.php?Operacao=1&TxtUsuario=$usuario");
	else
		header("Location:../../views/pagamento/contas_por_codigo.php?Operacao=1&TxtId=$id");
?>