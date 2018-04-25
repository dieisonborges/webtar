		<?php
		  session_start();
  		  require('../../util/seguranca.php');
  		  Seguranca::VerificaUsuario();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalligacoes.php');
		  
		  $unidades = GetVarSESSION('unidades_real');
		  
  		  $mes_ano=GetGET('TxtMesAno');
		  		  
		  $mes_ano=explode("/",$mes_ano);
		  $mes=$mes_ano[0];
		  $ano=$mes_ano[1];
		  
		  $id_usuario=GetVarSESSION('id');
		  $conexao = new Conexao();
		  $dalligacoes = new Dalligacoes($conexao);
		  $rs_ligacoes = $dalligacoes->getPorUsuarioPorMes($id_usuario, $mes, $ano, $unidades);
		  $paginacao = $rs_ligacoes [1];
		  $rs_ligacoes = $rs_ligacoes [0];
		 
  		  require("../layouts/listagem_padrao_minhas_ligacoes.php");

		 ?>