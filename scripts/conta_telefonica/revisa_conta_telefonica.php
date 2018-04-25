<?php
		session_start();
		require('../../util/seguranca.php');
		Seguranca::VerificaUsuario();
		
		require('../../funcoes/funcoes.php');
		require('../../configuracoes/conexao.php');
		//DAL
		require('../../dal/dalcontatelefonica.php');	
		require('../../dal/dalligacoes.php');
	 	require('../../dal/dalusuario.php');
		
		
		//CARREGA CONSTANTES
		require('../conta_telefonica/constantes_da_conta.php');	
		
		
		$meses=GetGET('conta');
		$meses=explode('_', $meses);
		$qtd_meses=count($meses);
		for($i=1;$i<=$qtd_meses;$i++)
			{
			if(isset($meses[$i]))
				{
				$meses_temp=explode('-', $meses[$i]);
				//Carrega a DATA	
				$mes = $meses_temp[1];
				$ano = $meses_temp[0];	
								
				//TESTE de DATA		
				//$mes = '06';
				//$ano = '2011';
				
				//Usuario
				
				$id_usuario=$_SESSION['id'];	
				
				//Exclui contas antigas	
				$conexao = new Conexao();
				$dalcontatelefonica = new Dalcontatelefonica($conexao);
				$rs_contatelefonica = $dalcontatelefonica->excluirParaRevisaoConta($id_usuario, $mes, $ano);
				$conexao->FechaConexao();	
					
				
				// Config DATAS		
				$dataVencimento = "01-".($mes+1)."-".$ano;		
				$periodoApuracao=ultimoDiaMes("01-".$mes."-".$ano);	
				
				//Referente ao mes ...
				$mesReferencia=$ano.'-'.$mes.'-01';	
				
				$conexao = new Conexao();
				$dalusuario = new Dalusuario($conexao);
				$rs_usuario = $dalusuario->getPorId($id_usuario);
				$conexao->FechaConexao();
				
				
				// Carrega as contas telefonicas de todos os usuarios
				while ($usuario = mysql_fetch_object($rs_usuario))
					{
					
					$conexao = new Conexao();
					$dalligacoes = new Dalligacoes($conexao);
					$rs_ligacoes = $dalligacoes->getContaTelefonicaPorUsuario($usuario->id, $ano, $mes );
					$conexao->FechaConexao();
					$rs_ligacoes = mysql_fetch_object($rs_ligacoes);			
					if(($rs_ligacoes->valor)!=0)
						{				
						$conexao = new Conexao();
						$dalcontatelefonica = new Dalcontatelefonica($conexao);
						$id_conta = $dalcontatelefonica->incluir($usuario->id, converteData($periodoApuracao), $codigoReceita, $numeroReferencia, converteData($dataVencimento), $rs_ligacoes->valor, $valorMulta, $valorJurosEncargos, $rs_ligacoes->valor, $pagamento, $mesReferencia);	
						//echo "Inserido ".$id_conta."<br />";		
						$conexao->FechaConexao();			
						
						}
					
					}
				}
			}
			header("Location:../../views/conta_telefonica/contas_devendo.php?Operacao=1");
?>
