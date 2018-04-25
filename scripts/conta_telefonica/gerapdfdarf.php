<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaUsuario();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalusuario.php');

	
    /*$id = GetPOST('TxtId');
    $email = GetPOST('TxtEmail');
	$telefone = GetPOST('TxtTelefone');
	$postoGraduacao = GetPOST('TxtPostoGraduacao');

    $conexao = new Conexao();
	$dalusuario = new Dalusuario($conexao);
    $dalusuario->alterarMeuUsuario($id ,$email ,$telefone ,$postoGraduacao);
    $conexao->FechaConexao();        

	echo("<script>window.location='../../views/meu_usuario/index.php?Operacao=1'</script>");
	header("Location:../../views/meu_usuario/index.php?Operacao=1");*/
	
    $html="../../views/layouts/darf_html.php";
	
	
    require_once("../../helpers/dompdf-0.5.2/dompdf_config.inc.php");
    $dompdf = new DOMPDF();
    $dompdf->load_html_file($html);
    $dompdf->set_paper('letter', 'landscape');
    $dompdf->render();
    $dompdf->stream("darf.pdf");
	
	echo("<script>window.location='../../views/conta_telefonica/index.php?Operacao=1'</script>");
	header("Location:../../views/conta_telefonica/index.php?Operacao=1");
	
?>