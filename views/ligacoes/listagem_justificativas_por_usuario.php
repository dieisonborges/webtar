		<?php
		  session_start();
  		  require('../../util/seguranca.php');
  		  Seguranca::VerificaTarifador();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalligacoes.php');
		  require('../../dal/dalusuario.php');	
		  
		  $unidades = GetVarSESSION('unidades');
		  
		  $nome_usuario=GetGET('TxtNomeUsuario');	
		  
		  if($nome_usuario){ 
		  
		  $conexao = new Conexao();
		  $dalusuario = new Dalusuario($conexao);		  
		  $rs_usuario = $dalusuario->getPorUsuario($nome_usuario, $unidades);	 
		  $usuario = mysql_fetch_object($rs_usuario);
		  
		  	if(isset($usuario->id))
			{
		  
				  $conexao = new Conexao();
				  $dalligacoes = new Dalligacoes($conexao);		  
				  $rs_ligacoes = $dalligacoes->getComJustificativaPorUsuario($usuario->id, $unidades);		  
				  $paginacao = $rs_ligacoes [1];
				  $rs_ligacoes = $rs_ligacoes [0];				  
				  
				  require("../layouts/listagem_padrao_minhas_ligacoes.php");
				  
				}
			else
				{
					echo "&nbsp; &nbsp; Nenhum Usu&aacute;rio Encontrado!";
				}
		  
		  }
		  else
		  {
				echo "&nbsp; &nbsp; Insira um usu&aacute;rio para buscar!";
		  }
		 
		 ?>