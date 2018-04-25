<?php
		
		require('../../configuracoes/conexao.php');
		//DAL
		require('../../dal/dalcontatelefonica.php');	
		require('../../dal/dalligacoes.php');
	 	require('../../dal/dalusuario.php');
		
		$id_usuario = GetVarSESSION('id');
		$unidades = GetVarSESSION('unidades');
					
		// Pagamento = 0 (Não pagou)
		
		$ano=GetGET('TxtAno');
  		if(!$ano)
  			$ano=date("Y");
		
		//Carrega a DATA	
		$mes = 1;
		
		
		
				
		while($mes<13)
		{		
			//echo "<br /><br />   ".$mes;
			//echo " - ".$ano;
			//echo " - ".$id_usuario;
			
			$conexao = new Conexao();
			$dalcontatelefonica = new Dalcontatelefonica($conexao);
			$status_verifica = $dalcontatelefonica->getVerificaTodos($id_usuario, $ano, $mes);
			$conexao->FechaConexao();
			
			//echo "<br />STATUS ".$status_verifica."  ";
			
			// Config DATAS		
				$dataVencimento = "01-".($mes+1)."-".$ano;		
				$periodoApuracao=ultimoDiaMes("01-".$mes."-".$ano);	
				
			//Referente ao mes ...
				$mes_referencia=$ano.'-'.$mes.'-01';
			
			if($status_verifica==0)
			{							
				//Apaga
				$conexao = new Conexao();
				$dalcontatelefonica = new Dalcontatelefonica($conexao);
				$dalcontatelefonica->excluirParaRevisaoConta($id_usuario, $mes, $ano);
				$conexao->FechaConexao();
				
				$conexao = new Conexao();
				$dalligacoes = new Dalligacoes($conexao);
				$rs_ligacoes = $dalligacoes->getContaTelefonicaPorUsuario($id_usuario, $ano, $mes, $unidades);			
				$rs_ligacoes = mysql_fetch_object($rs_ligacoes);			
				$conexao->FechaConexao();
				if(($rs_ligacoes->valor)!=0)
					{
					$conexao = new Conexao();
					$dalcontatelefonica = new Dalcontatelefonica($conexao);
					$id_conta = $dalcontatelefonica->incluir($id_usuario, $rs_ligacoes->valor, $mes_referencia);	
					//echo "<br />if Inserido ".$id_conta."<br /> \n";
					$conexao->FechaConexao();			
					
					}
			}
			elseif($status_verifica==3)
			{
							
				
				$conexao = new Conexao();
				$dalligacoes = new Dalligacoes($conexao);
				$rs_ligacoes = $dalligacoes->getContaTelefonicaPorUsuario($id_usuario, $ano, $mes, $unidades );			
				$rs_ligacoes = mysql_fetch_object($rs_ligacoes);			
				$conexao->FechaConexao();
				if(($rs_ligacoes->valor)!=0)
					{
					$conexao = new Conexao();
					$dalcontatelefonica = new Dalcontatelefonica($conexao);
					$id_conta = $dalcontatelefonica->incluir($id_usuario, $rs_ligacoes->valor, $mes_referencia);	
					//echo "<br />if Inserido ".$id_conta."<br /> \n";
					$conexao->FechaConexao();			
					
					}
			}		

			$mes++;
		}
			
			
		  
?>
