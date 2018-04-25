		<?php
		  session_start();
  		  require('../../util/seguranca.php');
  		  Seguranca::VerificaTarifador();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalligacoes.php');
		  require('../../dal/dalusuario.php');	
		  
		  $unidades = GetVarSESSION('unidades');
		  
		  $nome_usuario=GetGET('TxtNomeUsuario');	 
		  
		  $conexao = new Conexao();
		  $dalusuario = new Dalusuario($conexao);		  
		  $rs_usuario = $dalusuario->getPorUsuario($nome_usuario, $unidades);	 
		  $usuario = mysql_fetch_object($rs_usuario);
		  
		  
		  $conexao = new Conexao();
		  if(!isset($usuario->id))
		  	{
				
		  		$dalligacoes = new Dalligacoes($conexao);		  
		  		$rs_ligacoes = $dalligacoes->getTodosUsuarioClassGruNaoQuitada($unidades);	
			}
		  else
		  	{
				
				$dalligacoes = new Dalligacoes($conexao);		  
		  		$rs_ligacoes = $dalligacoes->getPorUsuarioClassGruNaoQuitada($usuario->id, $unidades);	
			}
		  
		  $conexao->FechaConexao();  
		  $paginacao = $rs_ligacoes [1];
		  $rs_ligacoes = $rs_ligacoes [0];
		 
		 ?>
         
         <table width="100%" id="tabela_lista_geral">
			 <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="8" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
              <tr id="tit_tabela_lista_geral">			  			
                        <td width="14%">Usu&aacute;rio</td>
				<td width="16%">Posto / Graduacao</td>
                <td width="26%">Nome</td>
				<td width="17%">Qtd de Lig. Particulares sem GRU</td> 
				<td width="13%">Valor R$</td> 
                <td width="14%">Status</td> 
           </tr>
          		<?php while ($ligacoes = mysql_fetch_object($rs_ligacoes)){?>
           	  <tr class="conteudo_tabela_lista_geral">
                    	<td>
                        	<a href="#">
								<?php echo ($ligacoes->usuario);?>
							</a>
						</td>
						<td>
                        	<a href="#">
								<?php echo GetPOSTO($ligacoes->postoGraduacao);?>
							</a>
						</td>
						<td>
                        	<a href="#">
								<?php echo ($ligacoes->nomeCompleto);?>
							</a>
						</td>
                        <td>
                        	<a href="#">
								<?php echo ($ligacoes->qtd_ligacoes);?>
							</a>
						</td>
						 
						<td>
                        	<a href="#">
								<?php echo number_format($ligacoes->valor, 2);?>
							</a>
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
						
               		  	
           		  </tr>
			   <?php }?>
           	  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="8" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
               
            </table>
		