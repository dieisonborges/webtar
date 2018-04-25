

<table width="100%" id="tabela_lista_geral">
			 <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="10" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
              <tr id="tit_tabela_lista_geral">			  			
                <td width="6%">Data</td>
                <td width="15%">N&uacute;mero de Origem</td> 
                <td width="17%">N&uacute;mero Discado</td> 
				<td width="9%">Valor R$</td> 
				<td width="14%">STATUS Lig.</td>
                <td width="16%">STATUS Pag.</td>
				<td width="11%">Classificar <br />
<span style="font-size:8px;">Servi&ccedil;o</span>
                                <span style="font-size:8px;">Particular</span><br />                                
                   
                          		<input type="checkbox"  class="check-box-ligacoes" name="checkAllPart" onClick="checkAllPart(this)" />
                                <input type="checkbox"  class="check-box-ligacoes" name="checkAllSrv" onClick="checkAllSrv(this)" />
                </td>
                <td width="5%" >Just.</td>                       
                <td width="7%">Deta.</td>
  </tr>
              
             <form action="../../scripts/justificar_ligacoes/classificar.php" method="post" enctype="multipart/form-data" id="form_classificacao"> 
             	<?php $contadorLista=0; ?>
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
                        <?php if (($ligacoes->status_gestor!=1)and($ligacoes->status_gestor!=2)){ ?>
									
                        <input type="hidden" name="TxtTotalLista" value="<?php echo $contadorLista;?>" />
                        <input type="hidden" name="TxtId[<?php echo $contadorLista; ?>]" value="<?php echo $ligacoes->id;?>" />
                        <input type="radio"  class="check-box-ligacoes checkbox_part" name="TxtClassificacao[<?php echo $contadorLista; ?>]" value="1"  />
                        <input type="radio"  class="check-box-ligacoes checkbox_srv" name="TxtClassificacao[<?php echo $contadorLista; ?>]" value="2" />
                         <?php $contadorLista++; ?>
                        <?php }?>     
                </td> 
                		                        
               		  	<td class="td_edit_tabela_lista_geral">
                       		<a href="javascript:justificar('<?php echo $ligacoes->id;?>')">
                           		<img src="../../public/images/edit.gif" alt="Editar" width="30" height="30" border="0" />                          	</a>
						</td>
                		<td width="7%" class="td_edit_tabela_lista_geral">
                        	<a href="javascript:detalhes('<?php echo $ligacoes->id;?>')">
                       		<img src="../../public/images/visualizar.gif" alt="Excluir" width="23" height="23" border="0" />                            </a>						</td>
   		       </tr>
              
			   <?php }?>
                              
               <tr>
           	    <td colspan="10" align="right"> <input type="button" id="btn_ok_cadastro_editar" value="Classificar" onclick="javascript:document.getElementById('form_classificacao').submit();" style=" margin-right:0px; margin-top:10px; float:right;" /></td>
   	      	  </tr>
              
                </form>
               
           	  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="10" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
              
              
               
            </table>
			