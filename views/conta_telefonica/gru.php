<?php
	//Atualizar: gru.php, listagem_contas_devendo.php, gerador_conta_individual.php, contas_devendo.php
	
	session_start();
	require('../../util/seguranca.php');
	Seguranca::VerificaUsuario();
	
	require('../../funcoes/funcoes.php');	
	require('../../configuracoes/conexao.php');
	require('../../dal/dalcontatelefonica.php');
	require('../../dal/dalusuario.php');
	require('../../dal/dalunidades.php');
	
	//Recupera ID do USUARIO na Seo
	$tbUsuario_id = GetVarSESSION('id');
	
	$unidade = GetVarSESSION('unidades_real');
	
	$flagGeradoInterno=0;
	
	$idContaTelefonica = GetGET('TxtIdConta');
	
	//Recupera DAL Conta Telefnica
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);
	$rs_contatelefonica =  $dalcontatelefonica->getPorId($idContaTelefonica, $tbUsuario_id);
	$contatelefonica = mysql_fetch_object($rs_contatelefonica);
	$conexao->FechaConexao();  
	
	//Carrega os Meses que esto devendo
	$data = explode('-', $contatelefonica->data_hora_gerado);
	$ano = $data[0];
	$mes = $data[1];
			
	$competencia=$mes.'/'.$ano;
		
	
	$valorTotal = number_format($contatelefonica->valor,2);

	echo "<h1>";
	echo $valorTotal;
	echo "</h1>";


	//die();

	
	//Arredondando o valor da conta
	//$valorTotal=round($valorTotal, 2);
	//Substituindo o "." por ","
	$valorTotal=str_replace(".",",", $valorTotal);

				
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
		/*
		$mes_calc=1+date("m");
		if($mes_calc>12)
			{
			$mes_calc="01";
			}			
			
		$vencimento="28/".$mes_calc.date("/Y");
		*/
		
		$vencimento="";
		
		//FIM VENCIMENTO
		
		
		
		$numeroReferencia=$usuario->cilcode;
		
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
		
				
		//CPF-Para-nome-de-arquivo
		$cpf_arquivo=str_replace(".","", $cpf);
		$cpf_arquivo=str_replace("-","", $cpf_arquivo);
		
		//Setando a variavel como string
		settype($pagina_gru, "string");	
		
		//Gera nome do Arquivo
		$nome_pdf = 'gru'.date("dmYhms").'_'.$cpf_arquivo.'_'.'r'.rand(0,9999).'.pdf';
		
		/* --------------------------------------------------------------- GRU ----------------------------------------------------- */
		
		// Create a stream
		// PROXY PARA GERACAO DE GRU CINDACTA II		
		require_once('../../configuracoes/proxy-gru.php');
		
		//URL DIRETO DO TESOURO
		/*
		
		echo "https://consulta.tesouro.fazenda.gov.br/gru_novosite/gerarPDF.asp?codigo_favorecido=120072&gestao=00001&codigo_correlacao=483&nome_favorecido=SEGUNDO+CENTRO+INT.DEF.AEREA+CONTR.TFG.AEREO&codigo_recolhimento=22053-1&nome_recolhimento=FDO+AERON-OUT+REC+CORRENTES&referencia=531500&competencia=12%2F2014&vencimento=28%2F01%2F2014&cnpj_cpf=091.961.626-78&nome_contribuinte=Dieison+da+Silva+Borges&valorPrincipal=1%2C60&descontos=&deducoes=&multa=&juros=&acrescimos=&valorTotal=1%2C60&boleto=1&impressao=SA&pagamento=1&campo=CR&ind=0";		
		*/

	
		//ENVIANDO
		/*
		$url_tesouro = "http://consulta.tesouro.fazenda.gov.br/gru_novosite/gerarPDF.asp?codigo_favorecido=".$cod_unidade_gestora_gru."&gestao=".$gestao_gru."&codigo_correlacao=483&nome_favorecido=".$nome_unidade_gru."&codigo_recolhimento=".$cod_recolhimento_gru."&nome_recolhimento=FDO+AERON-OUT+REC+CORRENTES&referencia=".$numeroReferencia."&competencia=".$competencia."&vencimento=".$vencimento."&cnpj_cpf=".$cpf."&nome_contribuinte=".$nomeCompleto."&valorPrincipal=".$valorTotal."&descontos=&deducoes=&multa=&juros=&acrescimos=&valorTotal=".$valorTotal."&boleto=1&impressao=SA&pagamento=1&campo=CR&ind=0";
		*/
		

		$url_tesouro = "http://consulta.tesouro.fazenda.gov.br/gru_novosite/gerarHTML.asp?codigo_favorecido=".$cod_unidade_gestora_gru."&gestao=".$gestao_gru."&codigo_correlacao=483&nome_favorecido=".$nome_unidade_gru."&codigo_recolhimento=".$cod_recolhimento_gru."&nome_recolhimento=FDO+AERON-OUT+REC+CORRENTES&referencia=".$numeroReferencia."&competencia=".$competencia."&vencimento=".$vencimento."&cnpj_cpf=".$cpf."&nome_contribuinte=".$nomeCompleto."&valorPrincipal=".$valorTotal."&descontos=&deducoes=&multa=&juros=&acrescimos=&valorTotal=".$valorTotal."&boleto=1&impressao=SA&pagamento=1&campo=CR&ind=0";

		//teste
		//die($url_tesouro);

		$context = stream_context_create($opts);		
		
		//echo $url_tesouro;
		// Open the file using the HTTP headers set above
		//$file = file_get_contents($url_tesouro, False, $context);

		

		$pagina_gru = $file ;
		
		var_dump($file);
		
		
		
		
		/* --------------------------------------------------------------- GRU ----------------------------------------------------- */
		
		
	
		// Exibir o pdf da GRU
		//header('content-type: application/pdf');
		//header('content-disposition: attachment; filename="gru'.date("dmYhms").$cpf_arquivo.'r'.'.pdf"');
		//echo $pagina_gru; // Só imprimir os dados binários
	
		
		$pagina_gru  = mysql_real_escape_string($pagina_gru);

		//MODIFICADO ARMAZENANDO O LINK

		$pagina_gru=$url_tesouro;
		$nome_pdf="link";
		
			
		//Incluindo a GRU Gerada no banco de dados
		//Recupera DAL Conta Telefnica
		$conexao = new Conexao();
		$dalcontatelefonica = new Dalcontatelefonica($conexao);
		$id_gru_gerada=$dalcontatelefonica->incluirGRU($tbUsuario_id, $vencimento, $valorTotal, $pagina_gru, $nome_pdf);
		$conexao->FechaConexao(); 
		
		
		// Insere o ID da GRU na Conta
		$conexao = new Conexao();
		$dalcontatelefonica = new Dalcontatelefonica($conexao);
		$rs_contatelefonica_gru = $dalcontatelefonica->insertGruNaConta($idContaTelefonica, $id_gru_gerada);
		$conexao->FechaConexao(); 	
		
		// Insere STATUS da GRU nas LIGACOES
		$conexao = new Conexao();
		$dalcontatelefonica = new Dalcontatelefonica($conexao);
		$rs_contatelefonica_gru = $dalcontatelefonica->insertGruNasLigacoes($idContaTelefonica, $tbUsuario_id);
		$conexao->FechaConexao(); 
		
		if($rs_contatelefonica_gru)
			{
				echo "<script type='text/javascript'>alert('GRU Gerada com sucesso!');</script>";
			}
		else
			{
				echo "<script type='text/javascript'>alert('Houve algum erro!');</script>";
			}
		
		echo '<script language="JavaScript"> window.location="contas_devendo.php"; </script>';
	
	
	}

	
header("Location:contas_devendo.php?Operacao=1");
	

?> 
