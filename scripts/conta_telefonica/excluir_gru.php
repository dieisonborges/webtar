<?php
	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaUsuario();
	
    require('../../funcoes/funcoes.php');
    require('../../configuracoes/conexao.php');
    require('../../dal/dalcontatelefonica.php');
	require('../../dal/daljustificativaligacoes.php');

	$id_conta = GetGET('TxtIdConta');
	
	/* PATH do Sistema */
	require('../../configuracoes/path.php');
	$local_dir=path_system()."private/comprovantes/"; 
	
	//echo $id_conta ;
	
	$id_usuario = GetVarSESSION('id');
	$unidades = GetVarSESSION('unidades');	
	
	//Classificacao
	
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
	
	$classificacao_usuario='2';
	$classificacao_gestor='0';
	
	
	//Busca GRU
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);
	$id_gru = $dalcontatelefonica->getGRUPorIdConta($id_conta);
	$conexao->FechaConexao(); 
	
	//Busca Comprovante de Pagamento
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);	
	$rs_comprovante =  $dalcontatelefonica->getComprovantePorGRU($id_gru, $id_usuario);
	$comprovante = mysql_fetch_object($rs_comprovante);
	$conexao->FechaConexao(); 
	
	//Exclui arquivo comprovante de pagamento
	unlink($local_dir.$contatelefonica_gru->arquivo);
	
	
	//Exclui GRU e CONTA
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);
	$result_del_gru = $dalcontatelefonica->excluirContaGRU($id_gru, $id_usuario, $id_conta);
	$conexao->FechaConexao(); 
	
	if($result_del_gru)
		{
			//Mudando a classificacao das Ligacoes e desvincula a Ligacao
		$conexao = new Conexao();
		$daljustificativaligacoes = new DalJustificativaLigacoes($conexao);		
		$daljustificativaligacoes->modificarClassificacaoRemoveContaGRU($id_conta, $id_usuario, $classificacao_usuario, $classificacao_gestor, $unidades);
		$conexao->FechaConexao();	
		}
	
		
	header("Location:../../views/conta_telefonica/excluir_contas_devendo.php?Operacao=1");

?>
