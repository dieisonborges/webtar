		<?php
		  session_start();
		  require('../../util/seguranca.php');
		  Seguranca::VerificaTarifador();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalusuario.php');
		  $conexao = new Conexao();
		  $dalusuario = new Dalusuario($conexao);
		  $rs_usuario = $dalusuario->getTodosAdm();
		  $paginacao = $rs_usuario [1];
		  $rs_usuario = $rs_usuario [0];
		  ?>
		  
		<table width="100%" id="tabela_lista_geral">
			 <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="9" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
              <tr id="tit_tabela_lista_geral">
                        <td width="13%">Posto/Gradua&ccedil;&atilde;o</td>
                        <td width="27%">Nome</td>
						<td width="19%">Usu&aacute;rio</td> 
                        <td width="15%">Identidade</td> 						 
						<td width="7%">Ativo</td>
						
              </tr>
          		<?php while ($usuario = mysql_fetch_object($rs_usuario)){?>
           	  <tr class="conteudo_tabela_lista_geral">
                    	<td>
                        	<a href="#">
								<?php echo (GetPOSTO($usuario->postoGraduacao));?>              </a>                </td>
                        <td>
                        	<a href="#">
								<?php echo ($usuario->nomeGuerra);?>                            </a>                </td>
						<td>
                        	<a href="#">
								<?php echo ($usuario->usuario);?>                            </a>                </td>
                		<td>
                        	<a href="#">
								<?php echo ($usuario->identidade);?>                            </a>                </td>
						
						<td>
                        	<a href="#">
								<?php echo (verificaUsuarioAtivo($usuario->ativo));?>                            </a>                </td>
               		  	
           		  </tr>
			   <?php }?>
           	  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="9" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
               
            </table>
			