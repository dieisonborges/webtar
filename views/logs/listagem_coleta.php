		<?php
		  session_start();
  		  require('../../util/seguranca.php');
		  Seguranca::VerificaAdministrador();
		  
	
			// pega o endereço do diretório
			$diretorio = getcwd(); 
			
			$diretorio = explode('/',$diretorio);
			
			$diretorio=array_reverse($diretorio);
			
			$diretorio[0]="";
			$diretorio[1]="docs";
			
			$diretorio=array_reverse($diretorio);
	
			$diretorio =implode('/', $diretorio);
			
			
			// abre o diretório
			$ponteiro  = opendir($diretorio);
			// monta os vetores com os itens encontrados na pasta
			while ($nome_itens = readdir($ponteiro)) {
				$itens[] = $nome_itens;
			}		
			
			// ordena o vetor de itens
			rsort($itens);
			// percorre o vetor para fazer a separacao entre arquivos e pastas 
			foreach ($itens as $listar) {
			// retira "./" e "../" para que retorne apenas pastas e arquivos
			   if ($listar!="." && $listar!=".."){ 
			
			// checa se o tipo de arquivo encontrado é uma pasta
					if (is_dir($listar)) { 
			// caso VERDADEIRO adiciona o item à variável de pastas
						$pastas[]=$listar; 
					} else{ 
			// caso FALSO adiciona o item à variável de arquivos
						$arquivos[]=$listar;
					}
			   }
			} 
			
			// lista as pastas se houverem
		/*if ($pastas != "" )
			{ 
			foreach($pastas as $listar)
				{
		   		print "Pasta: <a href='$listar'>$listar</a><br>";
				}
		    }*/
		// lista os arquivos se houverem
		
		  ?>
		  
		  <table width="100%" id="tabela_lista_geral">
			 <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="8" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
              <tr id="tit_tabela_lista_geral">			  			
                        <td width="12%">Arquivo de LOG de Coleta de Dados</td>
              </tr>
          		<?php 
				if ($arquivos != "")
				{
				foreach($arquivos as $listar)
		   			{   			
				?>
           	  <tr class="conteudo_tabela_lista_geral">
                    	<td>
                        	<a href="../../docs/<?php echo $listar;?>">
								<?php echo $listar;?>
							</a>
						</td>
   		    </tr>
			   <?php }
			   } ?>
           	  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="8" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
               
            </table>
		  
		
			