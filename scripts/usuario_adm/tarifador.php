<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalusuario.php');
	
    $id = GetGET('id');
	
			
    $conexao = new Conexao();
	$dalusuario = new Dalusuario($conexao);
    $dalusuario->alterarParaTar($id);
    $conexao->FechaConexao();        
	
	/* GERADOR DE LOGS -------------------------- */
			  
	  require('../../dal/dallogs.php');
	  
	  $tbUsuario_id_LOG=GetVarSESSION('id');
	  $tarefaExecutada_LOG='Transformar o Usu&aacute;rio: '.$id.' em TARIFADOR por: '.GetVarSESSION('usuario');
	  $tipoDeTarefa_LOG='PERMISS&Atilde;O DE USU&Aacute;RIO';			  			  
	  
	  $conexao = new Conexao();
	  $dallogs = new DALLogs($conexao); 
	  $dallogs->incluir($tbUsuario_id_LOG, $tarefaExecutada_LOG, $tipoDeTarefa_LOG);
	  $conexao->FechaConexao(); 
	  
	/* FIM GERADOR DE LOGS ----------------------- */

	header("Location:../../views/usuario_adm/index.php?Operacao=1");
?>