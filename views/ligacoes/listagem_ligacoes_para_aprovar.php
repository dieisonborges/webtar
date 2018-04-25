		<?php
		  session_start();
  		  require('../../util/seguranca.php');
  		  Seguranca::VerificaTarifador();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalligacoes.php');
		  
		  $unidades = GetVarSESSION('unidades');
		  
		  $conexao = new Conexao();
		  $dalligacoes = new Dalligacoes($conexao);
          $rs_ligacoes = $dalligacoes->getTodosSemAprovacao($unidades); 
		  $paginacao = $rs_ligacoes [1];
		  $rs_ligacoes = $rs_ligacoes [0];
		  
		  require("../layouts/listagem_padrao_ligacoes.php");
		 ?>
		