<?php
	/*
	session_start();
	require('../../util/seguranca.php');
	Seguranca::VerificaUsuario();
	
	require('../../funcoes/funcoes.php');	
	require('../../configuracoes/conexao.php');
	require('../../dal/dalcontatelefonica.php');
	require('../../dal/dalusuario.php');
	require('../../dal/dalunidades.php');
	
	//Recupera o Valor da GRU
	$valorTotal = GetPOST('TxtValor');
	$competencia = GetPOST('TxtCompetencia');
	
	//Recupera ID do USUARIO na Seo
	$tbUsuario_id = GetVarSESSION('id');
	
	$unidade = GetVarSESSION('unidades_real');
	
	//Recupera DAL Conta Telefnica
	*/
	/*
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);
	$rs_contatelefonica =  $dalcontatelefonica->getTodosDevendoSemPag($tbUsuario_id);
	*/
	
	//Carrega os meses de Referencia e o valor Total
	//$competencia=' ';
	//$valorTotal='0';
	
	/*
	while ($contatelefonica = mysql_fetch_object($rs_contatelefonica)){
		
		//Carrega os Meses que esto devendo
		$data = explode('-', $contatelefonica->mes_referencia);
		$ano = $data[0];
		$ano = $ano[2].$ano[3];		
		$mes = $data[1];
		
		$competencia= $mes.'/'.$ano.' '.$competencia;
		
		//Carrega o valor total da GRU
		$valorTotal=$valorTotal+$contatelefonica->valor;
	
	}
	*/
	
	/*
	
	//Removendo o "."
	$valorTotal=str_replace(".","", $valorTotal);
	
	//Substituindo a "," por "."
	$valorTotal=str_replace(",",".", $valorTotal);
	
	//Arredondando o valor da conta
	$valorTotal=round($valorTotal, 2);
	
		
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
	$dia_calc=3+date("d");
	$vencimento=$dia_calc.date("/m/y");
	
	//Eliminando / e -	
	$numeroReferencia=str_replace("(","", $usuario->telefone);
	$numeroReferencia=str_replace("-","", $numeroReferencia);
	$numeroReferencia=str_replace(" ","", $numeroReferencia);
	
	//Gerando GRU no site do Tesouro Nacional
	header("Location:https://consulta.tesouro.fazenda.gov.br/gru/gerarHTML.asp?codigo_correlacao=41&boleto=3&impressao=SA&pagamento=1&campo=NRCR&ind=0&nome_contribuinte=".$usuario->nomeCompleto."&nome_favorecido=".$nome_unidade_gru."&codigo_recolhimento=".$cod_recolhimento_gru."&referencia=".$numeroReferencia."&competencia=".$competencia."&vencimento=".$vencimento."&cnpj_cpf=".$usuario->cpf."&codigo_favorecido=".$cod_unidade_gestora_gru."&gestao=".$gestao_gru."&valorPrincipal=".$valorTotal."&descontos=&deducoes=&multa=&juros=&acrescimos=&valorTotal=".$valorTotal);

		}
		
		*/
		
		
// Gerador de GRU
// Create by Dieison S. Borges
// dieisoncomix@gmail.com
// 10/12/2012


/*

Link Utilizado para gerar GRU:

https://consulta.tesouro.fazenda.gov.br/gru/gerarHTML.asp?codigo_correlacao=41&boleto=3&impressao=SA&pagamento=1&campo=NRCR&ind=0&nome_contribuinte=&nome_favorecido=&codigo_recolhimento=22053-1+FDO+AERON-OUT+REC+CORRENTES&referencia=9236525472&competencia=Mar%E7o%2F2012&vencimento=&cnpj_cpf=000.000.000-00&codigo_favorecido=120094&gestao=00001&valorPrincipal=120%2C00&descontos=&deducoes=&multa=&juros=&acrescimos=&valorTotal=120%2C00


*/




?>