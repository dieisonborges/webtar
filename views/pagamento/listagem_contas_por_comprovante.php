		<?php
		  session_start();
  		  require('../../util/seguranca.php');
  		  Seguranca::VerificaTarifador();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalcontatelefonica.php');
		  
		  $unidades = GetVarSESSION('unidades');
		  
		  $conexao = new Conexao();
		  $dalcontatelefonica = new Dalcontatelefonica($conexao);		  
		  $rs_contatelefonica =  $dalcontatelefonica->getPorUsuarioAdmComComprovante($unidades);
		  $paginacao = $rs_contatelefonica [1];
		  $rs_contatelefonica = $rs_contatelefonica [0];
		  
		  ?>
		  
		 
		  
		  <table width="100%" id="tabela_lista_geral">
		  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="10" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
            
            <tr id="tit_tabela_lista_geral">
			<td width="7%">C&oacute;digo</td>
			<td width="10%">Valor R$</td>
			<td width="15%">Data Conta</td>
			<td width="19%"> Comprovante</td>
            <td width="15%">Pagamento</td>
            <td width="24%">GRU</td>
			<td width="5%">Cancelar <br />
			  PAG.</td>
            <td width="5%">Efetuar <br />
              PAG.</td>
            </tr>
			<?php while ($contatelefonica = mysql_fetch_object($rs_contatelefonica)){?>
           	  <tr class="conteudo_tabela_lista_geral" style="font-size:12px;">
			  			<td>
                        	<a href="javascript:detalhes('<?php echo $contatelefonica->id; ?>')">
								<?php echo $contatelefonica->id; ?>
							</a>
						</td>
						
                        <td>
                        	<a href="javascript:detalhes('<?php echo $contatelefonica->id; ?>')">
								<?php echo number_format($contatelefonica->valor,2);?>
							</a>
						</td>
												
						<td>
							<a href="javascript:detalhes('<?php echo $contatelefonica->id; ?>')">
								<?php echo converteMesReferencia($contatelefonica->data_hora_gerado);?>
							</a>
                        	
						</td>						
						<td>
							<?php echo '<a target="_blank" href="../../private/comprovantes/'.$contatelefonica->arquivo.'">Ver Comprovante de PG</a>'; ?>
                        	
						</td>
						<td>
                        	<a href="javascript:detalhes('<?php echo $contatelefonica->id; ?>')">
								<?php 
								if(($contatelefonica->status_gestor)==1)								
									echo "<p style='color:green; text-transform:uppercase;'>Conta Paga</p>";
								else
									echo "<p style='color:red; text-transform:uppercase;'>Devedor</p>";
								?>
							</a>
						</td>						

						<?php 
							$data = explode('-', $contatelefonica->data_hora_gerado);
							$ano = $data[0];
							$mes = $data[1];
							?>
                            
                         <td>
								<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
									<?php 
										if($contatelefonica->status_gestor==4)
										{
											echo '<a href="#">Gere a GRU</a>';
										}
										else
										{
											echo '<a href="../conta_telefonica/visualizar-gru.php?TxtIdGRU='.$contatelefonica->tbGRU_id.'" target="_blank" >Visualizar GRU</a>';
										}																											
										
									?>
								</a>
							</td>  
							
						<td class="td_excluir_tabela_lista_geral">
                        	<a href="javascript:cancelar_pagamento('<?php echo $contatelefonica->id;?>','<?php echo $contatelefonica->usuario;?>')">
                       			<img src="../../public/images/cancelar_pagamento.gif"  alt="Excluir" width="39" height="39" border="0" />							</a>						</td>
						
<td class="td_excluir_tabela_lista_geral">
                        	<a href="javascript:pagar('<?php echo $contatelefonica->id;?>','<?php echo $contatelefonica->usuario;?>')">
                       			<img src="../../public/images/confimar_pagamento.gif"  alt="Excluir" width="36" height="36" border="0" />							</a>					</td>
						
                        
   		    </tr>
			
			<?php }?>
			<tr class="conteudo_tabela_lista_geral">
           	    <td colspan="10" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
            </table>
		  