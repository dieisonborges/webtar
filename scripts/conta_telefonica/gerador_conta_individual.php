<?php
		
		require('../../configuracoes/conexao.php');
		
		//DAL
		require('../../dal/dalcontatelefonica.php');	
		require('../../dal/dalligacoes.php');
	 	require('../../dal/dalusuario.php');
		require('../../dal/daljustificativaligacoes.php');
		
		$id_usuario = GetVarSESSION('id');
		$unidades = GetVarSESSION('unidades');							
		
		//Lista e soma as ligacoes		
		$conexao = new Conexao();
		$dalligacoes = new Dalligacoes($conexao);
		$rs_ligacoes = $dalligacoes->getContaTelefonicaPorUsuarioInsert($id_usuario, $unidades);			
		$rs_ligacoes = mysql_fetch_object($rs_ligacoes);			
		$conexao->FechaConexao();
		
		
		if(isset($rs_ligacoes->valor))
			{
			
			//Cria uma conta
			$conexao = new Conexao();
			$dalcontatelefonica = new Dalcontatelefonica($conexao);
			$id_conta = $dalcontatelefonica->incluir($id_usuario, $rs_ligacoes->valor);
			$conexao->FechaConexao();			
					
						
			//Insere o ID da conta nas Ligacoes
			$conexao = new Conexao();
			$dalligacoes = new Dalligacoes($conexao);
			$rs_ligacoes = $dalligacoes->isertIdContaLigacoes($id_usuario, $unidades, $id_conta);					
			$conexao->FechaConexao();
						
			//Bloqueia a ligacao para gerar conta
			
			$classificacao_gestor='4';
			
			$conexao = new Conexao();
			$daljustificativaligacoes = new DalJustificativaLigacoes($conexao);		
			$daljustificativaligacoes->incluirClassificacaoConta($id_conta, $classificacao_gestor, $unidades);
			$conexao->FechaConexao();
			
		}
		
		/*
			
				USUARIO		
				case 0:Não Class				
				case 1:Serviço
				case 2:Particular
				default:Não Class
		
				GESTOR
				case 0:Não Class
				case 1:GRU PAGA
				case 2:GRU GERADA
				case 3:Serviço
				case 4:SEM GRU
				default:Não Class
			
			*/
			
		  
?>
