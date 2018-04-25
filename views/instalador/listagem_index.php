		<?php
		  session_start();
		  require('../../util/seguranca.php');
		  Seguranca::VerificaAdministrador();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalusuario.php');
		  $conexao = new Conexao();
		  $dalusuario = new Dalusuario($conexao);
		  $rs_usuario = $dalusuario->getTodos();
		  $paginacao = $rs_usuario [1];
		  $rs_usuario = $rs_usuario [0];
		  ?>
		  
		<table width="100%" id="tabela_lista_geral">
			 <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="6" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
              <tr id="tit_tabela_lista_geral">
                        <td width="17%">Posto/Gradua&ccedil;&atilde;o</td>
                        <td width="34%">Nome</td>
						<td width="24%">Usu&aacute;rio</td> 
                        <td width="11%">Identidade</td>      
                        <td width="6%">Editar</td>
                        <td width="8%">Excluir</td>
              </tr>
          		<?php while ($usuario = mysql_fetch_object($rs_usuario)){?>
           	  <tr class="conteudo_tabela_lista_geral">
                    	<td>
                        	<a href="javascript:editar('<?php echo $usuario->id;?>')">
								<?php echo (GetPOSTO($usuario->postoGraduacao));?>              </a>                </td>
                        <td>
                        	<a href="javascript:editar('<?php echo $usuario->id;?>')">
								<?php echo ($usuario->nomeGuerra);?>                            </a>                </td>
						<td>
                        	<a href="javascript:editar('<?php echo $usuario->id;?>')">
								<?php echo ($usuario->usuario);?>                            </a>                </td>
                		<td>
                        	<a href="javascript:editar('<?php echo $usuario->id;?>')">
								<?php echo ($usuario->identidade);?>                            </a>                </td>
               		  	<td class="td_edit_tabela_lista_geral">
                       		<a href="javascript:editar('<?php echo $usuario->id;?>')">
                           		<img src="../../public/images/edit.gif" alt="Editar" width="30" height="30" border="0" />                          	</a>                        </td>
                		<td class="td_excluir_tabela_lista_geral">
                        	<a href="javascript:excluir('<?php echo $usuario->id;?>')">
                       		<img src="../../public/images/excluir.gif" alt="Excluir" width="23" height="23" border="0" />                            </a>                        </td>
           		  </tr>
			   <?php }?>
           	  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="6" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
               
            </table>
			