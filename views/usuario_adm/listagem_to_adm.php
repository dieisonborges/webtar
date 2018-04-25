		<?php
		  session_start();
		  require('../../util/seguranca.php');
		  Seguranca::VerificaAdministrador();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalusuario.php');
		  $conexao = new Conexao();
		  $dalusuario = new Dalusuario($conexao);
		  $usuario=GetGET('TxtUsuario');
		  if($usuario!="")
		  	{
		  	$rs_usuario = $dalusuario->getTodosPorUsuarioSemUni($usuario);
			}
		  else
		  	{
			$rs_usuario = $dalusuario->getTodosSemUni();
			}
		  $paginacao = $rs_usuario [1];
		  $rs_usuario = $rs_usuario [0];
		  ?>
		  
		<table width="100%" id="tabela_lista_geral">
			 <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="9" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
              <tr id="tit_tabela_lista_geral">
                        <td width="11%">Posto/Gradua&ccedil;&atilde;o</td>
                        <td width="16%">Nome</td>
						<td width="18%">Usu&aacute;rio</td> 
                        <td width="10%">Identidade</td> 						 
						<td width="12%">Ativo</td>
						<td width="19%">Transformar em TARIFADOR.</td> 
						<td width="14%">Transformar em ADMINISTRADOR.</td>     
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
						
						<td>
                        	<a href="javascript:editar('<?php echo $usuario->id;?>')">
								<?php echo (verificaUsuarioAtivo($usuario->ativo));?>                            </a>                </td>
               		  	<td class="td_edit_tabela_lista_geral">
                       		<a href="javascript:tarifador('<?php echo $usuario->id;?>')">
                           		<img src="../../public/images/cadeado.jpg" alt="Editar" width="40" height="40" border="0" />                          	</a>
						</td>
						
						<td class="td_edit_tabela_lista_geral">
                       		<a href="javascript:administrador('<?php echo $usuario->id;?>')">
                           		<img src="../../public/images/cadeado.jpg" alt="Editar" width="40" height="40" border="0" />                          	</a>
						</td>
           		  </tr>
			   <?php }?>
           	  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="9" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
               
            </table>
			