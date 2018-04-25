		<?php
		  session_start();
		  require('../../util/seguranca.php');
		  Seguranca::VerificaTarifador();
		
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/daltarifas.php');
		  require('../../dal/dalusuario.php');
		  
		  $unidades = GetVarSESSION('unidades');
		  		  
		  $conexao = new Conexao();
		  $daltarifas = new Daltarifas($conexao);
		  $rs_tarifas = $daltarifas->getTodos($unidades);
		  $paginacao = $rs_tarifas [1];
		  $rs_tarifas = $rs_tarifas [0];
		  $conexao->FechaConexao();
		  ?>
		  
		<table width="100%" id="tabela_lista_geral">
			 <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="5" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
              <tr id="tit_tabela_lista_geral">
                        <td width="24%">Tipo</td>
                        <td width="41%">M&aacute;scara</td> 
                        <td width="23%">Valor</td>      
                        <td width="6%">Editar</td>
                        <td width="6%">Excluir</td>
              </tr>
          		<?php while ($tarifas = mysql_fetch_object($rs_tarifas)){?>
           	  <tr class="conteudo_tabela_lista_geral">
                    	<td>
                        	<a href="javascript:editar('<?php echo $tarifas->id;?>')">
								<?php echo ($tarifas->tipo);?>              </a>                </td>
                        <td>
                        	<a href="javascript:editar('<?php echo $tarifas->id;?>')">
								<?php echo ($tarifas->mascara);?>                            </a>                </td>
                <td>
                        	<a href="javascript:editar('<?php echo $tarifas->id;?>')">
								  <?php echo "R$ ".str_replace(".", ",", $tarifas->valor); ?>                            </a>                </td>
               		  	<td class="td_edit_tabela_lista_geral">
                       		<a href="javascript:editar('<?php echo $tarifas->id;?>')">
                           		<img src="../../public/images/edit.gif" alt="Editar" width="30" height="30" border="0" />                          	</a>                        </td>
                		<td class="td_excluir_tabela_lista_geral">
                        	<a href="javascript:excluir('<?php echo $tarifas->id;?>')">
                       		<img src="../../public/images/excluir.gif" alt="Excluir" width="23" height="23" border="0" />                            </a>                        </td>
   		  </tr>
			   <?php }?>
           	  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="5" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
               
            </table>
			