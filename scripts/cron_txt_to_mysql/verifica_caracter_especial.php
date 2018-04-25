	<?php
	/* IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII INICIO BLOCO 1 - VERIFICA CARACTER ESPECIAL () IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII*/
	// abre o arquivo colocando o ponteiro de escrita no final
	$arquivo = fopen($caminho_arquivo,'r+');
	if ($arquivo)
		{
		echo "Verificando o caracter especial ... <br />";
		while(true) 
			{
			$linha = fgets($arquivo);
			if ($linha==null) break;	
			// busca na linha atual o conteudo que vai ser alterado
			if(preg_match("//", $linha))
				{
				echo "Caracter especial encontrado! Substituindo dados ... <br />";
				$string .= str_replace("", "\n", $linha);
				}//FECHA if(preg_match("//", $linha))
			else 
				{
				// vai colocando tudo numa nova string
				$string.= $linha;
				}//FECHA else
			}//FECHA while(true)
			// move o ponteiro para o inicio pois o ftruncate() nao fara isso
			rewind($arquivo);
			// truca o arquivo apagando tudo dentro dele
			ftruncate($arquivo, 0);
			// reescreve o conteudo dentro do arquivo
			if (!fwrite($arquivo, $string)) die('Não foi possível atualizar o arquivo.<br />');
			echo 'Arquivo atualizado com sucesso! <br />';
			fclose($arquivo);
		}//FECHA if ($arquivo)
	//FECHA O PRIMEIRO PONTEIRO QUE VERIFICA E SUBSTITUI O CARACTER ESPECIAL QUE NAO E USADO ()
	fclose($ponteiro); 
	/* IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII FIM BLOCO 1 - VERIFICA CARACTER ESPECIAL () IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII*/
	?>