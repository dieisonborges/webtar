<?php
	function GetPOST($var)
	{
		return (isset($_POST[$var])) ? $_POST[$var] : '';
	}
	
	function GetGET($var)
	{
		return (isset($_GET[$var])) ? $_GET[$var] : '';
	}
		
	function GetVarSESSION($var)
	{
	 	return (isset($_SESSION[$var])) ? $_SESSION[$var] : '';
	}
	
		/* ------------------------------------- Claasificacoes adicionadas em Setembro 2014 --------- */
	
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
	
	
	function GetStatusUSUARIOclassificacao($status)
	{
		switch ($status) {
			case 0:
				return "<p style='color:red; text-transform:uppercase;'>Não Class.</p>";
				break;
			case 1:
				return "<p style='color:green; text-transform:uppercase;'>Serviço</p>";
				break;
			case 2:
				return "<p style='color:orange; text-transform:uppercase;'>Particular</p>";
				break;
			default:
				return "<p style='color:red; text-transform:uppercase;'>Não Class.</p>";
				break;
		}
	}
	
	function GetStatusGESTORclassificacao($status)
	{
		switch ($status) {
			case 0:
				return "<p style='color:red; text-transform:uppercase;'>Não Class.</p>";
				break;
			case 1:
				return "<p style='color:green; text-transform:uppercase;'>GRU PAGA</p>";
				break;
			case 2:
				return "<p style='color:orange; text-transform:uppercase;'>GRU GERADA</p>";
				break;
			case 3:
				return "<p style='color:green; text-transform:uppercase;'>Serviço</p>";
				break;
			case 4:
				return "<p style='color:red; text-transform:uppercase;'>SEM GRU</p>";
				break;
			case 5:
				return "<p style='color:red; text-transform:uppercase;'>SEM Conta</p>";
				break;
			default:
				return "<p style='color:red; text-transform:uppercase;'>Não Class.</p>";
				break;
		}
	}
	/* ------------------FIM------------------- Claasificacoes adicionadas em Setembro 2014 --------- */
	

	
	
	function verificaUsuarioAtivo($usuario)
	{
		if($usuario==1)
			{
				return "<p style='color:#00FF00'>ATIVO</p>";
			}
		else
			{
				return "<p style='color:#FF0000'>INATIVO</p>";
			}
	}
	function ping($ip)
	{
		$tmpPing=shell_exec("ping $ip -c2");
		if (strpos($tmpPing,"0 received")>0)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	
	// Verifica Diferenca entre os dias
	function geraTimestamp($data) {
		$partes = explode('/', $data);
		return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
	}
	
	function difDias($data_inicial, $data_final)
	{
		// Define os valores a serem usados
		//$data_inicial = '23/03/2009';
		//$data_final = '04/11/2009';
		
		// Cria uma funÃ§Ã£o que retorna o timestamp de uma data no formato DD/MM/AAAA
		
		
		// Usa a funÃ§Ã£o criada e pega o timestamp das duas datas:
		$time_inicial = geraTimestamp($data_inicial);
		$time_final = geraTimestamp($data_final);
		
		// Calcula a diferenÃ§a de segundos entre as duas datas:
		$diferenca = $time_final - $time_inicial; // 19522800 segundos
		
		// Calcula a diferenÃ§a de dias
		$dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias
		
		// Exibe uma mensagem de resultado:
		//echo "A diferenÃ§a entre as datas ".$data_inicial." e ".$data_final." Ã© de <strong>".$dias."</strong> dias";
		
		return $dias;
		
		// A diferenÃ§a entre as datas 23/03/2009 e 04/11/2009 Ã© de 225 dias
	}
	
	function maskCPF($val, $mask)
	{
	 $maskared = '';
	 $k = 0;
	 for($i = 0; $i<=strlen($mask)-1; $i++)
	 {
	 if($mask[$i] == '#')
	 {
	 if(isset($val[$k]))
	 $maskared .= $val[$k++];
	 }
	 else
	 {
	 if(isset($mask[$i]))
	 $maskared .= $mask[$i];
	 }
	 }
	 return $maskared;
	}
 
	
	function ultimoDiaMes($newData){
      /*Desmembrando a Data*/
      list($newDia, $newMes, $newAno) = explode("-", $newData);
      return date("d-m-Y", mktime(0, 0, 0, $newMes+1, 0, $newAno));
   }
	
	function converteData($data)
	{
		// DE 2011-08-30 PARA 30-08-2011
		$data=explode("-",$data);
		return $data[2]."-".$data[1]."-".$data[0]; 
	}
	
	function converteDataBarra($data)
	{
		// DE 2011-08-30 PARA 30/08/2011
		$data=explode("-",$data);
		return $data[2]."/".$data[1]."/".$data[0]; 
	}
	
	function converteDataHoraBarra($data)
	{
		// DE ... PARA ...
		$data=explode(" ",$data);
		$hora=$data[1];
		$data=$data[0];
		$data=explode("-",$data);
		return $data[2]."/".$data[1]."/".$data[0]." &agrave;s ".$hora; 
	}

	
	function antiSqlInjection($string)
	{
		$string = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$string);
		$string = strip_tags($string);
		$string = htmlspecialchars($string);
		$string = trim($string);
		$string = stripslashes($string);
		$string = mysql_escape_string($string);
		$string = strip_tags($string);
		return $string;
	}
	
	function validaCPF($cpf)
	{	// Verifiva se o número digitado contém todos os digitos
		$cpf = str_pad(ereg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
		
		// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
		if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
		{
		return false;
		}
		else
		{   // Calcula os números para verificar se o CPF é verdadeiro
			for ($t = 9; $t < 11; $t++) {
				for ($d = 0, $c = 0; $c < $t; $c++) {
					$d += $cpf{$c} * (($t + 1) - $c);
				}
	
				$d = ((10 * $d) % 11) % 10;
	
				if ($cpf{$c} != $d) {
					return false;
				}
			}
	
			return true;
		}
	}
	
	function converteMesReferencia($data)
	{
		// DE 2011-08-30 PARA 30-08-2011
		$data=explode("-",$data);
		return ConverteMES($data[1])."-".$data[0]; 
	}
	
	
	function ConverteMES($mes)
	{
		switch ($mes) {
			case 1:
				echo "Janeiro";
				break;
			case 2:
				echo "Fevereiro";
				break;
			case 3:
				echo "Mar&ccedil;o";
				break;
			case 4:
				echo "Abril";
				break;
			case 5:
				echo "Maio";
				break;
			case 6:
				echo "Junho";
				break;
			case 7:
				echo "Julho";
				break;
			case 8:
				echo "Agosto";
				break;
			case 9:
				echo "Setembro";
				break;
			case 10:
				echo "Outubro";
				break;
			case 11:
				echo "Novembro";
				break;
			case 12:
				echo "Dezembro";
				break;
		}
	}
	
	function GetPERMISSAO($permissao)
	{
		switch($permissao)
			{
			case 1:
				return "Usuario";
				break;
			case 2:
				return "Tarifador";
				break;
			case 3:
				return "Administrador";
				break;
			}
	}
	
	function GetStatusJUSTIFICATIVA($status)
	{
		switch ($status) {
			case 1:
				return "<div id='login_invalido'><h4> STATUS - A sua justificativa foi APROVADA!</h4></div>";
				break;
			case 2:
				return "<div id='login_invalido'><h4> STATUS - A sua justificativa foi N&Atilde;O foi aprovada!</h4></div>";
				break;
			case 3:
				return "<div id='login_invalido'><h4> STATUS - Aguardando APROVA&Ccedil;&Atilde;O!</h4></div>";
				break;
			default:
				return "";
		}
	}
	
	function GetStatusJUSTIFICATIVAcompacta($status)
	{
		switch ($status) {
			case 1:
				return "<p style='color:green; text-transform:uppercase;'>Aprovada!</p>";
				break;
			case 2:
				return "<p style='color:red; text-transform:uppercase;'>Reprovada!</p>";
				break;
			case 3:
				return "<p style='color:orange; text-transform:uppercase;'>Aguardando!</p>";
				break;
			default:
				return "<p style='color:red; text-transform:uppercase;'>Sem Justificativa!</p>";
				break;
		}
	}

	function GeraUSUARIO($nomeCompleto, $nomeGuerra)
	{
		$nomeCompleto = strtolower($nomeCompleto);	
		/* VERIFICA PREPOSICAO E REMOVE */	
		$nomeCompleto = str_replace(" da "," ",$nomeCompleto);
		$nomeCompleto = str_replace(" de "," ",$nomeCompleto);
		$nomeCompleto = str_replace(" do "," ",$nomeCompleto);
		$nomeCompleto = str_replace(" das "," ",$nomeCompleto);
		$nomeCompleto = str_replace(" dos "," ",$nomeCompleto);
		$nomeCompleto = str_replace(" o "," ",$nomeCompleto);
		$nomeCompleto = str_replace(" a "," ",$nomeCompleto);
		/* FIM BLOCO VERIFICA PREPOSICAO E REMOVE */	
		$nomeGuerra = strtolower($nomeGuerra);		
		$nomeCompleto = explode(' ', $nomeCompleto);			
		$cont=0;
		$iniciais="";
		while(isset($nomeCompleto[$cont]))
			{
				$iniciais = $iniciais.substr($nomeCompleto[$cont], 0, 1);
				$cont++;
			}
		$usuario=$nomeGuerra.$iniciais;
		  
		//remove os espacos
		$usuario = str_replace(" ","",$usuario);
		
		//remove os acentos
		$usuario = ereg_replace("[^a-zA-Z0-9_]", "", strtr($usuario, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC"));
		
		
		return $usuario;
	}
	
	function setCase($term, $tp) { 
    if ($tp == "1") $palavra = strtr(strtoupper($term),"Ã Ã¡Ã¢Ã£Ã¤Ã¥Ã¦Ã§Ã¨Ã©ÃªÃ«Ã¬Ã­Ã®Ã¯Ã°Ã±Ã²Ã³Ã´ÃµÃ¶Ã·Ã¸Ã¹Ã¼ÃºÃ¾Ã¿","ÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃ"); 
    elseif ($tp == "0") $palavra = strtr(strtolower($term),"ÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃÃ","Ã Ã¡Ã¢Ã£Ã¤Ã¥Ã¦Ã§Ã¨Ã©ÃªÃ«Ã¬Ã­Ã®Ã¯Ã°Ã±Ã²Ã³Ã´ÃµÃ¶Ã·Ã¸Ã¹Ã¼ÃºÃ¾Ã¿"); 
    return $palavra; 
	}
	
	function GetPOSTO($var)
	{
		switch($var)
		{
			case 1:
			return 'Marechal-Do-Ar';
			break;
			case 2:
			return 'Tenente-Brigadeiro-Do-Ar';
			break;
			case 3:
			return 'Major-Brigadeiro';
			break;
			case 4:
			return 'Brigadeiro';
			break;
			case 5:
			return 'Coronel';
			break;
			case 6:
			return 'Tenente-Coronel';
			break;
			case 7:	
			return 'Major';
			break;
			case 8:
			return 'Cap';
			break;
			case 9:	
			return '1T';
			break;
			case 10:
			return '2T';
			break;	
			case 11:
			return 'Aspirante';
			break;	
			case 12:
			return 'Suboficial';
			break;
			case 13:
			return '1S';
			break;	
			case 14:
			return '2S';
			break;
			case 15:
			return '3S';
			break;	
			case 16:
			return 'Cabo';
			break;
			case 17:
			return 'Taifeiro-Mor';
			break;
			case 18:
			return 'S1';
			break;
			case 19:
			return 'T1';
			break;
			case 20:
			return 'S2';
			break;
			case 21:
			return 'T2';
			break;	
			case 22:
			return 'Civil';
			break;			
		}
	}
	
	function GeradorSenha($tipo="L L N N")
	{
		// Interessante Funcao para usar: GeradorSenha($tipo="N N N N N N N");
		// o explode retira os espaÃ§os presentes entre as letras (L) e nÃºmeros (N)        
		$tipo = explode(" ", $tipo);
		// CriaÃ§Ã£o de um padrÃ£o de letras e nÃºmeros (no meu caso, usei letras maiÃºsculas
		// mas vocÃª pode intercalar maiusculas e minusculas, ou adaptar ao seu modo.)
		$padrao_letras = "A|B|C|D|E|F|G|H|I|J|K|L|M|N|O|P|Q|R|S|T|U|V|X|W|Y|Z";
		$padrao_numeros = "0|1|2|3|4|5|6|7|8|9";
		
		// criando os arrays, que armazenarÃ£o letras e nÃºmeros
		// o explode retire os separadores | para utilizar as letras e nÃºmeros
		$array_letras = explode("|", $padrao_letras);
		$array_numeros = explode("|", $padrao_numeros);
		
		// cria a senha baseado nas informaÃ§Ãµes da funÃ§Ã£o (L para letras e N para nÃºmeros)
		$senha = "";
		for ($i=0; $i<sizeOf($tipo); $i++)
		{
			if ($tipo[$i] == "L")
			{
				$senha.= $array_letras[array_rand($array_letras,1)];
			}
			else
			{
				if ($tipo[$i] == "N")
				{
					$senha.= $array_numeros[array_rand($array_numeros,1)];
				}
			}
		}
		// informa qual foi a senha gerada para o usuÃ¡rio naquele momento
		return $senha;
	
	}
	
?>
