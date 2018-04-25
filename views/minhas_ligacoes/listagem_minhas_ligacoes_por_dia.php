		<?php
		  session_start();
  		  require('../../util/seguranca.php');
  		  Seguranca::VerificaUsuario();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalligacoes.php');	
		  
		  $unidades = GetVarSESSION('unidades_real');
		  	  
  		  $mes_ano_dia=GetGET('TxtMesAnoDia');
		  
		  $mes_ano_dia=explode("/",$mes_ano_dia);
		  $dia=$mes_ano_dia[0];
		  $mes=$mes_ano_dia[1];
		  $ano=$mes_ano_dia[2];
		  
		  $id_usuario=GetVarSESSION('id');
		  $conexao = new Conexao();
		  $dalligacoes = new Dalligacoes($conexao);
		  $rs_ligacoes = $dalligacoes->getPorUsuarioPorDia($id_usuario, $dia, $mes, $ano, $unidades);
		  $paginacao = $rs_ligacoes [1];
		  $rs_ligacoes = $rs_ligacoes [0];
		  
   		  require("../layouts/listagem_padrao_minhas_ligacoes.php");

		 ?>
