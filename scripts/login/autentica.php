<?php
   session_start();
   require_once('../../funcoes/funcoes.php');
   require_once('../../configuracoes/conexao.php');   
   require('../../dal/dallogin.php');  
   
   
   /* --------------------------------------- CAPTCHA ------------------------------------------ */
   // if form is submit
				
   /** SESSION CONTROL **/
	if(isset($_SESSION['qaptcha_key']) && !empty($_SESSION['qaptcha_key']))
	{
		$QaptChaInput = $_SESSION['qaptcha_key']; 
	
		if(isset($_POST[''.$QaptChaInput.'']) && empty($_POST[''.$QaptChaInput.'']))
		{
    
		   $usuario_get = GetPOST('TxtUsuario');
		   $senha_get = GetPOST('TxtSenha');   
		   $unidade_get= GetPOST('TxtUnidade');
		   
		   //SEGURANCA SQL INJECTION
		   $usuario_get=antiSqlInjection($usuario_get);
		   $senha_get=antiSqlInjection($senha_get); 
		   $unidade_get=antiSqlInjection($unidade_get);
		   
				 
		   $conexao = new Conexao();
		   $dallogin = new DALLogin($conexao);      
		   $rs_usuario = $dallogin->ValidaLogin($usuario_get, $senha_get, $unidade_get); 
		   $usuario = mysql_fetch_object($rs_usuario);
		   $conexao->FechaConexao();
		   
		   
		   if (($rs_usuario)and($_SESSION['keypass']==$keypass)and($usuario->ativo!=1))
		   {  
			  /* GERADOR DE LOGS */
			  
			  require('../../dal/dallogs.php');
			  $conexao = new Conexao();
			  $dallogs = new DALLogs($conexao); 
			  $dallogs->incluir($usuario->id, "US-".$usuario->usuario."-ID-".$usuario->id."-PE-".$usuario->tbPermissoes_id, "INATIVO");
			  $conexao->FechaConexao(); 
			  
			  /* FIM GERADOR DE LOGS*/	  
			  
			  header("Location:../../views/erros/inativo.php");
			  die();
		   }
		   
		   elseif (($rs_usuario)and($usuario->ativo==1))
		   {
			  $_SESSION['usuario'] = $usuario->usuario;
			  $_SESSION['usuario_nome'] = $usuario->nomeGuerra;
			  $_SESSION['id'] = $usuario->id;
			  $_SESSION['permissao'] = $usuario->tbPermissoes_id; 
			  $_SESSION['unidades'] = $usuario->tbUnidades_id;
			  $_SESSION['unidades_real'] = $usuario->tbUnidades_id;
			  $_SESSION['unidades_nome'] = $usuario->sigla;
			  
			  // GERADOR DE LOGS 
			  
			  require('../../dal/dallogs.php');
			  $conexao = new Conexao();
			  $dallogs = new DALLogs($conexao); 
			  $dallogs->incluir($usuario->id, "US-".$usuario->usuario."-ID-".$usuario->id."-PE-".$usuario->tbPermissoes_id, "LOGIN");
			  $conexao->FechaConexao(); 
			  
			  // FIM GERADOR DE LOGS	  
			  
			  header("Location:../../views/home/index.php");
			  die();
		   }
		   else
		   {
			  /* GERADOR DE LOGS */
			  
			  require('../../dal/dallogs.php');
			  $conexao = new Conexao();
			  $dallogs = new DALLogs($conexao); 
			  $dallogs->incluir("", "USUARIO->".$usuario_get."-SENHA->".$senha_get, "TENTATIVA-DE-LOGIN-FALHOU");
			  $conexao->FechaConexao(); 
			  
			  //echo "AQUI -> ".$usuario_get." - ".$unidade_get;
			  
			  $conexao = new Conexao();
			  $dallogin = new DALLogin($conexao);      
			  $dallogin->aumentaTentativa($usuario_get, $unidade_get); 
			  $conexao->FechaConexao();
			  
			  /* FIM GERADOR DE LOGS*/	
			  header("Location:../../views/login/index.php?ErroLogin=1");
			  die();
		   }  
   
   		}
							
						
	}
	else{
		header("Location:../../views/login/index.php?ErroLogin=1");
	}
					
	/** Unset SESSION in all cases **/
	unset($_SESSION['qaptcha_key']);
			
				
	/* --------------------------------------- CAPTCHA ------------------------------------------ */
   
?>