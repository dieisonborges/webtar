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
		  
		  $conexao = new Conexao();
		  $dalusuario = new Dalusuario($conexao);		  
		  $rs_usuario = $dalusuario->getPorUsuario($nome_usuario,$unidades);	 
		  $usuario = mysql_fetch_object($rs_usuario);
		  
		  if(!isset($usuario->id))
		  {
		  		$id_usuario = "";
		  }
		  else
		  {
		  		$id_usuario=$usuario->id;
		  }
		  
		  $conexao = new Conexao();
		  $dalligacoes = new Dalligacoes($conexao);		  
		  $rs_ligacoes = $dalligacoes->getPorUsuario($id_usuario, $unidades);		  
		  $paginacao = $rs_ligacoes [1];
		  $rs_ligacoes = $rs_ligacoes [0];
		 
		 require("../layouts/listagem_padrao_ligacoes.php");
		 ?>
		