		<?php
		  session_start();
  		  require('../../util/seguranca.php');
		  Seguranca::VerificaTarifador();
		  		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalligacoes.php');
		  
		  $unidades = GetVarSESSION('unidades');
		  
		  $conexao = new Conexao();
		  $dalligacoes = new Dalligacoes($conexao);
		  $rs_ligacoes = $dalligacoes->getSenhaSemUsuario($unidades);
		  $paginacao = $rs_ligacoes [1];
		  $rs_ligacoes = $rs_ligacoes [0];
		  
		  
		  ?>
	<table width="100%" id="tabela_lista_geral">
			 <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="8" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
              <tr id="tit_tabela_lista_geral">
						<td width="12%">Data / Hora</td>
						<td width="12%">Origem</td>   
                        <td width="12%">CILCOD/SENHA</td>                    
			<td width="12%">CILCOD/SENHA</td> 
              </tr>
          		<?php while ($ligacoes = mysql_fetch_object($rs_ligacoes)){?>
           	  <tr class="conteudo_tabela_lista_geral">
              			<td>
                        	<a href="#">
								<?php echo ($ligacoes->data_hora);?>
							</a>
						</td>
                        <td>
                        	<a href="#">
								<?php echo $ligacoes->origem;?>
							</a>
						</td>
                    	<td>
                        	<a href="#">
								<?php echo ($ligacoes->cilcode);?>
							</a>
						</td>
           		  
				<td>
					<a href="#"><?php echo($ligacoes->senha); ?></a>
				</td>
			</tr>
			   <?php }?>
           	  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="8" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
               
            </table>	  
		
			
