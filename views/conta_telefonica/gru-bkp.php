<?php
	session_start();
	require('../../util/seguranca.php');
	Seguranca::VerificaUsuario();
	
	require('../../funcoes/funcoes.php');	
	require('../../configuracoes/conexao.php');
	require('../../dal/dalcontatelefonica.php');
	require('../../dal/dalusuario.php');
	require('../../dal/dalunidades.php');
	
	$flagGeradoInterno=0;
	
	//Recupera o Valor da GRU
	$valorTotal = GetPOST('TxtValor');
	$competencia = GetPOST('TxtCompetencia');
	$numeroReferencia = GetPOST('TxtNReferencia');
	//Recupera ID do USUARIO na Seo
	$tbUsuario_id = GetVarSESSION('id');
	
	$unidade = GetVarSESSION('unidades_real');
	
	//Recupera DAL Conta Telefnica
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);
	$rs_contatelefonica =  $dalcontatelefonica->getTodosDevendoSemPag($tbUsuario_id);
	$conexao->FechaConexao();  
	
	//Carrega os meses de Referencia e o valor Total
	if(!$valorTotal)
		{
		$valorTotal='0';
		}
	if(!$competencia)
		{
		$competencia=' ';
		}
	
	while ($contatelefonica = mysql_fetch_object($rs_contatelefonica)){
		
		if(!$competencia){
			//Carrega os Meses que esto devendo
			$data = explode('-', $contatelefonica->mes_referencia);
			$ano = $data[0];
			$ano = $ano[2].$ano[3];		
			$mes = $data[1];
			
			$competencia=$mes.'/'.$ano.' '.$competencia;
		}
		
		if(!$valorTotal)
		{		
		//Carrega o valor total da GRU
		$valorTotal=$valorTotal+$contatelefonica->valor;	
		$flagGeradoInterno=1;	
		}
	
	}	
	
	if($flagGeradoInterno)
		{
		//Arredondando o valor da conta
		$valorTotal=round($valorTotal, 2);
		//Removendo o "."
		$valorTotal=str_replace(".","", $valorTotal);
	
		//Substituindo a "," por "."
		$valorTotal=str_replace(",",".", $valorTotal);
		
		}
	
			
	//Recupera DAL Usuario
	$conexao = new Conexao();
    $dalusuario = new Dalusuario($conexao);
    $rs_usuario =  $dalusuario->getPorIdUnidade($tbUsuario_id);
    $usuario = mysql_fetch_object($rs_usuario);
	
	//Verifica UNIDADE MÃE
	$conexao = new Conexao();
    $dalunidades = new Dalunidades($conexao);
    $rs_unidades =  $dalunidades->getPorId($unidade);
    $unidades = mysql_fetch_object($rs_unidades);
	
	if(($unidades->unidade_mae)=='0')
		{
			$nome_unidade_gru = $usuario->nome_unidade_gru;
			$cod_recolhimento_gru = $usuario->cod_recolhimento_gru;
			$cod_unidade_gestora_gru = $usuario->cod_unidade_gestora_gru;
			$gestao_gru = $usuario->gestao_gru;	
		
		}
	else
		{
		
			$conexao = new Conexao();
    		$dalunidade_mae = new Dalunidades($conexao);
   			$rs_unidade_mae =  $dalunidade_mae->getPorId($unidades->unidade_mae);
    		$unidade_mae = mysql_fetch_object($rs_unidade_mae);
		
			$nome_unidade_gru = $unidade_mae->nome_unidade_gru;
			$cod_recolhimento_gru = $unidade_mae->cod_recolhimento_gru;
			$cod_unidade_gestora_gru = $unidade_mae->cod_unidade_gestora_gru;
			$gestao_gru = $unidade_mae->gestao_gru;
			
		}
	
	
	//Verifica CPF Cadastrado
	
	if(!$usuario->cpf)
		{
			//die("Não existe CPF cadastrado no sistema!");
			echo "<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
					alert ('Não existe CPF cadastrado no sistema! Cadastre o seu CPF!')
				</SCRIPT>";
			echo "<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
					window.location = '../../views/meu_usuario/index.php'
				  </SCRIPT>";
		}
	else{
	
	//Gerando o vencimento
	// Formato 15/12/2012
	$dia_calc=15+date("d");
	if($dia_calc<10)
		{
		$dia_calc="0".$dia_calc;
		}
	$vencimento=$dia_calc.date("/m/Y");
	
	//Eliminando / e -	
	if($numeroReferencia=="")
		{
			$numeroReferencia=str_replace("(","", $usuario->telefone);
		}
	$numeroReferencia=str_replace("(","", $numeroReferencia);
	$numeroReferencia=str_replace(")","", $numeroReferencia);
	$numeroReferencia=str_replace("-","", $numeroReferencia);
	$numeroReferencia=str_replace(" ","", $numeroReferencia);
	
	//Corrigindo o CPF	
	$cpf=$usuario->cpf;
	$cpf=maskCPF($cpf,'###.###.###-##');
	
	//Codificando para ISO
	
	$nomeCompleto=urlencode(utf8_decode($usuario->nomeCompleto));
	$nome_unidade_gru=urlencode($nome_unidade_gru);
	$cod_recolhimento_gru=urlencode($cod_recolhimento_gru);
	$numeroReferencia=urlencode($numeroReferencia);
	$competencia=urlencode($competencia);
	$vencimento=urlencode($vencimento);
	$cpf=urlencode($cpf);
	$cod_unidade_gestora_gru=urlencode($cod_unidade_gestora_gru);
	$gestao_gru=urlencode($gestao_gru);
	$valorTotal=urlencode($valorTotal);
	
	//Setando a variavel como string
	settype($pagina_gru, "string");	
	
	//Gera nome do Arquivo
	$nome_pdf = 'gru'.date("dmYhms").'_'.$cpf_arquivo.'_'.'r'.rand(0,9999).'.pdf';
	
	$pagina_gru = file_get_contents("https://consulta.tesouro.fazenda.gov.br/gru_novosite/gerarPDF.asp?codigo_correlacao=41&boleto=3&impressao=SA&pagamento=1&campo=NRCR&ind=0&nome_contribuinte=".$nomeCompleto."&nome_favorecido=".$nome_unidade_gru."&codigo_recolhimento=".$cod_recolhimento_gru."&referencia=".$numeroReferencia."&competencia=".$competencia."&vencimento=".$vencimento."&cnpj_cpf=".$cpf."&codigo_favorecido=".$cod_unidade_gestora_gru."&gestao=".$gestao_gru."&valorPrincipal=".$valorTotal."&descontos=&deducoes=&multa=&juros=&acrescimos=&valorTotal=".$valorTotal);
		
	
	//CPF-Para-nome-de-arquivo
	$cpf_arquivo=str_replace(".","", $cpf);
	$cpf_arquivo=str_replace("-","", $cpf_arquivo);
	

	// Exibir o pdf da GRU
	//header('content-type: application/pdf');
	//header('content-disposition: attachment; filename="gru'.date("dmYhms").$cpf_arquivo.'r'.'.pdf"');
	//echo $pagina_gru; // Só imprimir os dados binários

	
	$pagina_gru  = mysql_real_escape_string($pagina_gru );
		
	//Incluindo a GRU Gerada no banco de dados
	//Recupera DAL Conta Telefnica
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);
	$rs_contatelefonica =  $dalcontatelefonica->incluirGRU($tbUsuario_id, $vencimento, $valorTotal, $pagina_gru, $nome_pdf);
	$conexao->FechaConexao();  
	
	if($rs_contatelefonica)
		{
			echo "<script type='text/javascript'>alert('GRU Gerada com sucesso!');</script>";
		}
	else
		{
			echo "<script type='text/javascript'>alert('Houve algum erro!');</script>";
		}
	
	echo '<script language="JavaScript"> window.location="contas_devendo.php"; </script>';
	
	
	}

	
	
	
	
// Gerador de GRU
// Create by Dieison S. Borges
// dieisoncomix@gmail.com
// 10/12/2012


/*

Link Utilizado para gerar GRU:

https://consulta.tesouro.fazenda.gov.br/gru/gerarHTML.asp?codigo_correlacao=41&boleto=3&impressao=SA&pagamento=1&campo=NRCR&ind=0&nome_contribuinte=&nome_favorecido=&codigo_recolhimento=22053-1+FDO+AERON-OUT+REC+CORRENTES&referencia=9236525472&competencia=Mar%E7o%2F2012&vencimento=&cnpj_cpf=000.000.000-00&codigo_favorecido=120094&gestao=00001&valorPrincipal=120%2C00&descontos=&deducoes=&multa=&juros=&acrescimos=&valorTotal=120%2C00


*/




?> 
