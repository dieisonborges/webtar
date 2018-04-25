		<?php
		  session_start();
  		  require('../../util/seguranca.php');
  		  Seguranca::VerificaUsuario();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalligacoes.php');		  
  		  require('../../dal/dalusuario.php');
		  
		  $unidades = GetVarSESSION('unidades_real');
		  $id = GetVarSESSION('id');
		  
		  /*
		  $conexao = new Conexao();
		  $dalusuario = new Dalusuario($conexao);		  
		  $rs_usuario =  $dalusuario->getPorId($id, $unidades);
		  $usuario = mysql_fetch_object($rs_usuario);
		  */
		  
		  $conexao = new Conexao();
		  $dalligacoes = new Dalligacoes($conexao);
		  $rs_ligacoes = $dalligacoes->getPorUsuarioSemJustificativa($id , $unidades);
		  $paginacao = $rs_ligacoes [1];
		  $rs_ligacoes = $rs_ligacoes [0];
		 
 		  require("../layouts/listagem_padrao_minhas_ligacoes.php");

		 ?>