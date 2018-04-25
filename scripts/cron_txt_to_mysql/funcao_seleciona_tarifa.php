<?php
function getPrecoTarifa($numDiscado, $unidade)
		{	
		
		//Verifica se existe unidade MÃE
		$conexao = new Conexao();
		$dalunidades= new Dalunidades($conexao);
		$unidade_mae = $dalunidades->getUnidadeMae($unidade);
		$conexao->FechaConexao();
		if($unidade_mae)
			{
			$unidade=$unidade_mae;
			}
		
		
		$tarifa_final="0.00";
		$qtd_numeros_validos_no_numero_discado_final="0";
		//TRABALHANDO O NUMERO DISCADO
		//REMOVE OS ESPACOS	
		$numDiscado=str_replace(" ", "", $numDiscado);
		//REMOVE DELIMITADOR #
		$numDiscado_delimitador = explode("#", $numDiscado);
		$numDiscado=$numDiscado_delimitador[0];
		//CONTA O TAMANHO DO NUMERO PARA COMPARACAO	
		$qtd_char_numDiscado=strlen($numDiscado);	
		
		// BUSCA E LISTA AS TARIFAS
		$conexao = new Conexao();
		$daltarifas = new Daltarifas($conexao);
		$rs_tarifas = $daltarifas->getTodosSemPagUni($unidade);
		$conexao->FechaConexao();
		
		while ($tarifas = mysql_fetch_object($rs_tarifas))
			{
				//CONTA O NUMERO DE CARACTERES DA MASCARA
				$qtd_char_mascara=strlen($tarifas->mascara);
				$mascara=$tarifas->mascara;
				
				//QUANTIDADE DE NUMEROS VALIDOS NA MASCARA
				$qtd_numeros_validos_na_mascara=0;
				$qtd_char_mascara_temp=$qtd_char_mascara;
				while($qtd_char_mascara_temp>0)
					{						
						$qtd_char_mascara_temp--;
						if(is_numeric($mascara[$qtd_char_mascara_temp]))
							{
							$qtd_numeros_validos_na_mascara++;
							}
						
					}
				$qtd_numeros_validos_no_numero_discado=0;
					
				if($qtd_char_numDiscado==$qtd_char_mascara)
					{	
					$qtd_char_mascara_temp=$qtd_char_mascara;					
					while($qtd_char_mascara_temp>0)
						{
							$qtd_char_mascara_temp--;
							if(is_numeric($mascara[$qtd_char_mascara_temp]))
								{
									if(($numDiscado[$qtd_char_mascara_temp])==($mascara[$qtd_char_mascara_temp]))
									{										
										$qtd_numeros_validos_no_numero_discado++;
									}
								}								
						}
					if(($qtd_numeros_validos_no_numero_discado)==($qtd_numeros_validos_na_mascara))
						{
							if($qtd_numeros_validos_no_numero_discado_final<$qtd_numeros_validos_no_numero_discado)
								{
									$tarifa_final=$tarifas->valor;
									$qtd_numeros_validos_no_numero_discado_final=$qtd_numeros_validos_no_numero_discado;
								}
						}
					
					}
				
				
			}
			echo "<br /> Tarifado $tarifa_final! <br />";
			return $tarifa_final;
		}
?>