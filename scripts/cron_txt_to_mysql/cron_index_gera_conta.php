<?php
		require('../../util/seguranca.php');
		Seguranca::VerificaCentral();
		
		require('../../funcoes/funcoes.php');
		require('../../configuracoes/conexao.php');
		//DAL
		require('../../dal/dalcontatelefonica.php');	
		require('../../dal/dalligacoes.php');
	 	require('../../dal/dalusuario.php');
					
		// Pagamento = 0 (Não pagou)
		
		//Carrega a DATA via GET	
		//$mes = GetGET('');
		//$ano = GetGET('');
		
		
		//Carrega a DATA	
		$mes = date('m');
		$ano = date('Y');				
		
		//TESTE de DATA		
		//$mes = '04';
		//$ano = '2012';
		
		
		// Config DATAS		
		$dataVencimento = "01-".($mes+1)."-".$ano;		
		$periodoApuracao=ultimoDiaMes("01-".$mes."-".$ano);	
		
		//Referente ao mes ...
		$mes_referencia=$ano.'-'.$mes.'-01';	
		
		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
		$rs_usuario = $dalusuario->getTodosSemPag();
		$conexao->FechaConexao();
		
		
		// Carrega as contas telefonicas de todos os usuarios
		while ($usuario = mysql_fetch_object($rs_usuario))
			{
			echo $usuario->nomeGuerra."<br /> \n";
			$conexao = new Conexao();
			$dalligacoes = new Dalligacoes($conexao);
			$rs_ligacoes = $dalligacoes->getContaTelefonicaPorUsuario($usuario->id, $ano, $mes );			
			$rs_ligacoes = mysql_fetch_object($rs_ligacoes);			
			$conexao->FechaConexao();
			if(($rs_ligacoes->valor)!=0)
				{
				$conexao = new Conexao();
				$dalcontatelefonica = new Dalcontatelefonica($conexao);
				$id_conta = $dalcontatelefonica->incluir($usuario->id, $rs_ligacoes->valor, $mes_referencia);	
				echo "Inserido ".$id_conta."<br /> \n";
				$conexao->FechaConexao();			
				
				}
			
			}
			
		echo "Finalizado <br /> \n";
		  
?>
