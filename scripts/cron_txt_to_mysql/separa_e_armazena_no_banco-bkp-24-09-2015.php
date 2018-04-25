	<?php
	
	/* IIIIIIIIIIIIIII INICIO BLOCO 2 - COLHE E ARMAZENA OS DADOS NO BANCO MYSQL IIIIIIIIIIIIIIIIIIIIIIII*/
	
	// ABRE O ARQUIVO PARA LEITURA
	
	$ponteiro = fopen ($caminho_arquivo, 'r');
	
	echo "<br /><br /> ----------------------------------------------------------------------<br />";	
	echo "Abrindo o arquivo de texto $caminho_arquivo. <br />";
	
	// VERIFICA DE QUAL CENTRAL E O BILHETE
	$nome_central = explode("/", $caminho_arquivo);
	$nome_central = array_reverse($nome_central, false);		
	$nome_central = $nome_central[0];		
	$nome_central = explode("-", $nome_central);
	
	echo "<br/> <br/>IP do Coletor";		
	echo $nome_central[1];
	echo "<br/> <br/>Nome do HOST do Coletor";		
	echo $nome_central[3];	
	echo "<br/>";	

	//Consultando as Centrais no Banco Mysql	
	$conexao = new Conexao();
	$dalcentraltelefonica = new DalcentralTelefonica($conexao);		
	$rs_centraltelefonica = $dalcentraltelefonica->getPorIP($nome_central[1]);	
	$centraltelefonica = mysql_fetch_object($rs_centraltelefonica);
	$conexao->FechaConexao();	
	
	$id_central_telefonica=$centraltelefonica->id;
	$tbUnidades_id=$centraltelefonica->tbUnidades_id;
	
	echo "Unidade Selecionada: $tbUnidades_id<br />";
	
	$conexao = new Conexao();
	//ENQUANTO EXISTIR UMA LINHA NO ARQUIVO DE TEXTO IRA SEPARAR AS LINHAS
	while (!feof($ponteiro))
		{	
		//SEPARA O ARQUIVO TXT POR LINHA
		$linha = fgets($ponteiro, 4096);

		//SEPARA A LINHA EM COLUNAS PARA INSERIR NO MYSQL
		$dataLigacao=substr($linha, 0, 6);
		$time=substr($linha, 7, 4);
		$duracao=substr($linha, 12, 4);
		$tipo=substr($linha, 17, 1);
		$codigo=substr($linha, 20, 4);
		$troncoSaida=substr($linha, 27, 4);
		$canalSaida=substr($linha, 31, 3);
		$troncoEntrada=substr($linha, 37, 4);
		$canalEntrada=substr($linha, 41, 3);
		$numDiscado=substr($linha, 45, 18);		
		$numOrigem=substr($linha, 66, 15);
		$senha=substr($linha, 84, 7);
		$acount_code=substr($linha, 92, 4);
		$return=substr($linha, 97, 1);
		$line_feed=substr($linha, 98, 1);		
				
					
		// Configuracao do formato da duracao
		//
		//    0026
		//    ||||____ Segundos X 6		
		//	  |||_____ Minutos
		//	  ||______ Horas
		//	  |_______ Dias
		//
		
		//Converte DURACAO Para Segundos
		
		$duracao_segundos=($duracao[3]*6);
		$duracao_minutos=($duracao[2]*60);
		$duracao_horas=($duracao[1]*3600);
		$duracao_dias=$duracao[0]*86400;
		
		$duracao=$duracao_segundos+$duracao_minutos+$duracao_horas+$duracao_dias;		
			
		//GERA VALOR DA TARIFA		
		//Se menor que 30s converte para 0,5;
		//Se maior que 30s divide "dura��o" por 60.
		$duracao_temp=$duracao;
		if($duracao_temp>3)
		{
			if($duracao_temp<=30)
				{
				$duracao_temp=0.5;
				}
			else
				{
				$duracao_temp=$duracao_temp/60;
				}
		
			$valor=getPrecoTarifa($numDiscado, $tbUnidades_id);
			$valor=$valor*$duracao_temp;
		}
		else
		{
			$valor=0;
		}	
		//CONVERTE A HORA PARA FORMATO DO BANCO MYSQL
		//00:00:00
		
		$horas=substr($time, 0, 2);	
		$minutos=substr($time, 2, 2);
		$segundos="00";
		$time=$horas.":".$minutos.":".$segundos;
		
		//CONVERTE A DATA PARA FORMATO DO BANCO MYSQL
		//0000-00-00
		$ano_atual=date("Y"); //PEGA O ANO ATUAL
		$ano=substr($ano_atual, 0, 2).substr($dataLigacao, 4, 2);	
		$mes=substr($dataLigacao, 2, 2);
		$dia=substr($dataLigacao, 0, 2);	
		$dataLigacao=$ano."-".$mes."-".$dia;
		
		//Setando o ID do usuario
		//2013-01-15 23:51:41
		//22:03:00
		//2012-12-20
		
		$data_hora_senha=$dataLigacao." ".$time;
		
		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
		$tbUsuario_id = $dalusuario->getPorSenhaScript($senha, $tbUnidades_id, $data_hora_senha, $numOrigem);			
		$conexao->FechaConexao();
		
		
		if(($duracao)and($time!='::00')and($dataLigacao!='20--'))
			{	
			//INCLUI NO BANCO MYSQL
			$conexao = new Conexao();
			$dalligacoes = new Dalligacoes($conexao);		
			if($dalligacoes->incluir($id_central_telefonica, $tbUnidades_id, $tbUsuario_id, $dataLigacao, $time, $duracao, $tipo, $codigo, $troncoEntrada, $troncoSaida, $canalEntrada, $canalSaida, $numDiscado, $numOrigem, $senha, $valor))
					{
					echo date("h:m:s d/m/Y");
					echo "<br />";
					echo "Registro ".mysql_insert_id()." adicionado!<br />";
					}
			else
					{
					echo "<br />Ocorreu um erro ao armazenar no banco de dados!<br />";
					}
			$conexao->FechaConexao();
			}
		else
			{
				echo date("h:m:s d/m/Y");
				echo "<br />VARIAVEIS COM VALOR NULO<br />";
				echo "Central-Telefonica: ".$id_central_telefonica."<br />";
				echo "Duracao: ".$duracao."<br />";
				echo "Data: ".$dataLigacao."<br />";
				echo "Hora: ".$time."<br />";
				echo "Unidade: ".$tbUnidades_id."<br />";				
				echo "Ligacao Nula. N�o foi armazenado no banco<br />";
			}
		
	}
	$conexao->FechaConexao();		
	//FECHA O SEGUNDO PONTEIRO QUE INSERE OS DADOS NO BANCO
	fclose($ponteiro);
	
	echo "<br />FIM do arquivo de texto $caminho_arquivo. <br />";
	echo " ----------------------------------------------------------------------<br />";	
	
	
	/* IIIIIIIIIIIIIIIIIIIIIIII FIM BLOCO 2 - COLHE E ARMAZENA OS DADOS NO BANCO MYSQL  IIIIIIIIIIIIIIIIIIIIIIIIII*/
	?>
