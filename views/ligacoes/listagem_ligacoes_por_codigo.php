		<?php
		  session_start();
  		  require('../../util/seguranca.php');
  		  Seguranca::VerificaTarifador();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalligacoes.php');
		  
		  $unidades = GetVarSESSION('unidades');
		  		  
  		  $id=GetGET('TxtId');
		  
		  $conexao = new Conexao();
		  $dalligacoes = new Dalligacoes($conexao);
		  
		  $rs_ligacoes =  $dalligacoes->getPorId($id, $unidades);
		  $ligacoes = mysql_fetch_object($rs_ligacoes);
		  
		  
		  ?>
		  <table width="100%" id="tabela_lista_geral">
              <tr id="tit_tabela_lista_geral">			  			
                        <td width="12%">COD</td>
						<td width="12%">Data</td>
                        <td width="23%">N&uacute;mero de Origem</td> 
                        <td width="21%">N&uacute;mero Discado</td> 
						<td width="21%">Valor R$</td> 
                        <td width="5%">Autorizar ou Negar Justificativa</td>
                        <td width="6%">Detalhes</td>
              </tr>
           	  <tr class="conteudo_tabela_lista_geral">
                    	<td>
                        	<a href="javascript:detalhes('<?php echo $ligacoes->id;?>')">
								<?php echo ($ligacoes->id);?>
							</a>
						</td>
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
								<?php echo ($ligacoes->valor);?>
							</a>
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
               
            </table>
		