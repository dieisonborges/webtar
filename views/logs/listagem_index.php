		<?php
		  session_start();
  		  require('../../util/seguranca.php');
		  Seguranca::VerificaAdministrador();
		  		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dallogs.php');
		  
		  $mes_ano_dia=GetGET('TxtMesAnoDia');
		  	  
		  $mes_ano_dia=explode("/",$mes_ano_dia);
		  $dia=$mes_ano_dia[0];
		  $mes=$mes_ano_dia[1];
		  $ano=$mes_ano_dia[2];

		  $conexao = new Conexao();
		  $dallogs = new Dallogs($conexao);
		  $rs_logs = $dallogs->getTodosBusca($ano, $mes, $dia);
		  $paginacao = $rs_logs [1];
		  $rs_logs = $rs_logs [0];
		  
		  ?>
		  
		  <table width="100%" id="tabela_lista_geral">
			 <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="8" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
              <tr id="tit_tabela_lista_geral">			  			
                        <td width="12%">DATA - HORA</td>
						<td width="28%">Tarefa Executada</td>
                        <td width="18%">Tipo de Tarefa</td> 
                        <td width="13%">I.P.</td> 
						<td width="15%">ID Usu&aacute;rio</td> 
              </tr>
          		<?php while ($logs = mysql_fetch_object($rs_logs)){?>
           	  <tr class="conteudo_tabela_lista_geral">
                    	<td>
                        	<a href="#">
								<?php echo ($logs->dataHora);?>
							</a>
						</td>
						<td>
                        	<a href="#">
								<?php echo ($logs->tarefaExecutada);?>
							</a>
						</td>
                        <td>
                        	<a href="#">
								<?php echo ($logs->tipoDeTarefa);?>
							</a>
						</td>
						 
						<td>
                        	<a href="#">
								<?php echo ($logs->ip);?>
							</a>
						</td>						
						<td>
							<a href="#">
								<?php echo ($logs->tbUsuario_id);?>
							</a>
						</td>

               		  	
   		    </tr>
			   <?php }?>
           	  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="8" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
               
            </table>
		  
		
			