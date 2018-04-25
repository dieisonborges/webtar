		<?php
		  session_start();
  		  require('../../util/seguranca.php');
  		  Seguranca::VerificaUsuario();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalligacoes.php');
		  
		  $unidades = GetVarSESSION('unidades');
		  
		  $id_usuario=GetVarSESSION('id');
		  $conexao = new Conexao();
		  $dalligacoes = new Dalligacoes($conexao);
		  $rs_ligacoes = $dalligacoes->getPorUsuarioComStatus($id_usuario, $unidades);
		  $paginacao = $rs_ligacoes [1];
		  $rs_ligacoes = $rs_ligacoes [0];
		 
  		  require("../layouts/listagem_padrao_minhas_ligacoes.php");
		  
		  ?>
		 
