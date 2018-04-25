<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalusuario.php');
	
	$unidades = GetVarSESSION('unidades');
	
    $id = GetPOST('TxtId');
	$cpf = GetPOST('TxtCPF');
    $email = GetPOST('TxtEmail');
	$senha = GetPOST('TxtSenha');
	$usuario = GetPOST('TxtUsuario');
	$nomeCompleto = GetPOST('TxtNomeCompleto');
	$nomeGuerra = GetPOST('TxtNomeGuerra');
	$saram = GetPOST('TxtSaram');
	$identidade = GetPOST('TxtIdentidade');
	$telefone = GetPOST('TxtTelefone');
	$postoGraduacao = GetPOST('TxtPostoGraduacao');
	$tbPermissoes_id = GetPOST('TxtPermissoes');
	$ativo = GetPOST('TxtAtivo');
	$tbUnidades_id = GetPOST('TxtUnidade');
	$cilcode = GetPOST('TxtCilcode');
	$cilcodeSecundario = GetPOST('TxtCilcodeSecundario');
	$funcional = GetPOST('TxtFuncional');
	
	/* TIPO DE SENHA */
	$tipoSenha = GetPOST('TxtLocal');
	$tipoSenha = $tipoSenha." ".GetPOST('TxtCelular');
	$tipoSenha = $tipoSenha." ".GetPOST('TxtDDD');
	$tipoSenha = $tipoSenha." ".GetPOST('TxtDDI');
	
		
    $conexao = new Conexao();
	$dalusuario = new Dalusuario($conexao);
    $dalusuario->alterar($id, $cpf, $email, $senha, $usuario, $nomeCompleto, $nomeGuerra, $saram, $identidade, $telefone, $postoGraduacao, $tbPermissoes_id, $ativo, $tipoSenha, $tbUnidades_id, $unidades, $cilcode, $cilcodeSecundario, $funcional);
    $conexao->FechaConexao();      
	
	
	/* GERADOR DE LOGS -------------------------- */
			  
	  require('../../dal/dallogs.php');
	  
	  $tbUsuario_id_LOG=GetVarSESSION('id');
	  $tarefaExecutada_LOG='Alterar Usu&aacute;rio: ('.$nomeCompleto.$id.'-'.$cpf.'-'.$email.'-'.$usuario.'-'.$nomeCompleto.'-'.$nomeGuerra.'-'.$saram.'-'.$identidade.'-'.$telefone.'-'.$postoGraduacao.'-'.$tbPermissoes_id.'-'.$ativo.'-'.$tipoSenha.'-'.$tbUnidades_id.'-'.$unidades.'-'.$cilcode.'-'.$cilcodeSecundario.'-'.$funcional.') por: '.GetVarSESSION('usuario');
	  $tipoDeTarefa_LOG='ALTERAR USU&Aacute;RIO';			  			  
	  
	  $conexao = new Conexao();
	  $dallogs = new DALLogs($conexao); 
	  $dallogs->incluir($tbUsuario_id_LOG, $tarefaExecutada_LOG, $tipoDeTarefa_LOG);
	  $conexao->FechaConexao(); 
	  
	/* FIM GERADOR DE LOGS ----------------------- */
	 

	header("Location:../../views/usuario/index.php?Operacao=1");
?>