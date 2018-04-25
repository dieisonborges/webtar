<?php		
		session_start();
		require('../../util/seguranca.php');
		Seguranca::VerificaUsuario();
		
		require('../../funcoes/funcoes.php');
		require('../../configuracoes/conexao.php');
		require('../../dal/dalcontatelefonica.php');
		
		$unidades = GetVarSESSION('unidades_real');
		$tbUsuario_id = GetVarSESSION('id');
		
		$id = GetGET('TxtIdGRU');

		
		$conexao = new Conexao();
		$dalcontatelefonica = new Dalcontatelefonica($conexao);
		$rs_gru =  $dalcontatelefonica->getGRUPorID($id, $tbUsuario_id);
		$dados_gru = mysql_fetch_object($rs_gru);
		$arquivoGRU = $dados_gru->arquivo_pdf;
		$nomeArquivoGRU = $dados_gru->nome_pdf;

		
		$redirect = $arquivoGRU;
 
		header("location:$redirect");

		//header('content-type: application/pdf');
		//header('content-disposition: attachment; filename="'.$nomeArquivoGRU.'"');
		//echo $arquivoGRU;
?>
