<?php
 	
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();
	
	require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalusuario.php');
	
			  /* GERADOR DE LOGS -------------------------- */
			  
			  require('../../dal/dallogs.php');
			  
			  $tbUsuario_id_LOG=GetVarSESSION('id');
			  $tarefaExecutada_LOG='Remove Todas as Contagens de Tentativas de LOGIN por:'.GetVarSESSION('usuario');
			  $tipoDeTarefa_LOG='SEGURAN&Ccedil;A LOGIN';			  			  
			  
			  $conexao = new Conexao();
			  $dallogs = new DALLogs($conexao); 
			  $dallogs->incluir($tbUsuario_id_LOG, $tarefaExecutada_LOG, $tipoDeTarefa_LOG);
			  $conexao->FechaConexao(); 
			  
			  /* FIM GERADOR DE LOGS ----------------------- */
			  
	
	
		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
		$dalusuario->liberaTodasTentativas();
		$conexao->FechaConexao();
		header("Location:../../views/central_telefonica/start_cron.php?Operacao=1");
		

	
?>
