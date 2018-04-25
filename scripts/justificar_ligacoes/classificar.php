<?php
	
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaUsuario();

    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/daljustificativaligacoes.php');
	
	$unidades = GetVarSESSION('unidades');
	$id_usuario = GetVarSESSION('id');

	$totalLista = GetPOST('TxtTotalLista');    
    $id = GetPOST('TxtId');
	$classificacao = GetPOST('TxtClassificacao');
	
	
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
	case 5:SEM Conta
	default:Não Class
			
	*/
	
	
	$cont=0;
	while($cont<=$totalLista)
		{
		$classificacao_gestor=0;
		if(isset($classificacao[$cont]))
		{
			if(($classificacao[$cont]==2)or($classificacao[$cont]==1))
				{
			
				/*
				if($classificacao[$cont]==2)
					{
						$classificacao_gestor=4;
					}
				else
				
				*/
				
				if($classificacao[$cont]==1)
					{
						$classificacao_gestor=3;
					}
				if($classificacao[$cont]==2)
					{
						$classificacao_gestor=5;
					}
					
					
				$conexao = new Conexao();
				$daljustificativaligacoes = new DalJustificativaLigacoes($conexao);		
				$daljustificativaligacoes->incluirClassificacao($id[$cont], $id_usuario, $classificacao[$cont], $classificacao_gestor, $unidades);
				$conexao->FechaConexao();
				}
			else
				{
					$conexao = new Conexao();
					$daljustificativaligacoes = new DalJustificativaLigacoes($conexao);		
					$daljustificativaligacoes->incluirClassificacaoSemGestor($id[$cont], $id_usuario, $classificacao[$cont], $unidades);
					$conexao->FechaConexao();
				}	
			}	
	
		$cont++;	
		}
header("Location:../../views/minhas_ligacoes/minhas_ligacoes_sem_justificativa.php?Operacao=1");
?>