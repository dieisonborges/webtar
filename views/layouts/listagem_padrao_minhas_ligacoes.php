<table width="100%" id="tabela_lista_geral">
			 <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="8" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
              <tr id="tit_tabela_lista_geral">			  			
                       <td width="6%">Data</td>
                <td width="15%">N&uacute;mero de Origem</td> 
                <td width="17%">N&uacute;mero Discado</td> 
				<td width="9%">Valor R$</td> 
				<td width="14%">STATUS Lig.</td>
                <td width="16%">STATUS Pag.</td>				
                <td width="5%" >Just.</td>                       
                <td width="7%">Deta.</td>
              </tr>
          		<?php while ($ligacoes = mysql_fetch_object($rs_ligacoes)){?>
           	  <tr class="conteudo_tabela_lista_geral">
                    	
						<td>
                        	<a href="javascript:detalhes('<?php echo $ligacoes->id;?>')">
								<?php echo converteData($ligacoes->dataLigacao);?>
							</a>
						</td>
                        <td>
                        	<a href="javascript:detalhes('<?php echo $ligacoes->id;?>')">
								<?php echo ($ligacoes->numOrigem);?>
							</a>
						</td>
						 
						<td>
                        	<a href="javascript:detalhes('<?php echo $ligacoes->id;?>')">
								<?php echo ($ligacoes->numDiscado);?>
							</a>
						</td>						
						<td>
							<a href="javascript:detalhes('<?php echo $ligacoes->id;?>')">
								<?php echo number_format($ligacoes->valor,2);?>
							</a>
						</td>
						
						<td>
								<?php 
								
								if (isset($ligacoes->status_usuario))
								{
									$status_usuario=$ligacoes->status_usuario;
								}
								else
								{
									$status_usuario=0;
								}
								echo GetStatusUSUARIOclassificacao($status_usuario);
								?>
						</td>
                        
                        <td>
								<?php 
								if (isset($ligacoes->status_gestor))
								{
									$status_gestor=$ligacoes->status_gestor;
								}
								else
								{
									$status_gestor=0;
								}
								echo GetStatusGESTORclassificacao($status_gestor);
								?>
						</td>
               		  	<td class="td_edit_tabela_lista_geral">
                       		<a href="javascript:justificar('<?php echo $ligacoes->id;?>')">
                           		<img src="../../public/images/edit.gif" alt="Editar" width="30" height="30" border="0" />                          	</a>
						</td>
                		<td class="td_excluir_tabela_lista_geral">
                        	<a href="javascript:detalhes('<?php echo $ligacoes->id;?>')">
                       		<img src="../../public/images/visualizar.gif" alt="Excluir" width="23" height="23" border="0" />                            </a>
						</td>
           		  </tr>
			   <?php }?>
           	  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="8" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
               
            </table>