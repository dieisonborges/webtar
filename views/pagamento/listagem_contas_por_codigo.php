		<?php
		  session_start();
  		  require('../../util/seguranca.php');
  		  Seguranca::VerificaTarifador();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalcontatelefonica.php');
		  		  
  		  $id=GetGET('TxtId');
		  
		  $conexao = new Conexao();
		  $dalcontatelefonica = new Dalcontatelefonica($conexao);		  
		  $rs_contatelefonica =  $dalcontatelefonica->getPorIdAdm($id);
		  $contatelefonica = mysql_fetch_object($rs_contatelefonica);
		  
		  ?>
		  
		 
		  
		  <table width="100%" id="tabela_lista_geral">
            </tr>
            <tr id="tit_tabela_lista_geral">
			<td width="5%">C&oacute;digo</td>
			<td width="9%">Valor R$</td>
			<td width="28%">M&ecirc;s Referencia:</td>
			<td width="8%">Situa&ccedil;&atilde;o do Pagamento</td>
			<td width="11%">Cancelar PAGAMENTO</td>
            <td width="11%">Efetuar PAGAMENTO</td>
            </tr>
           	  <tr class="conteudo_tabela_lista_geral">
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
								<?php echo converteMesReferencia($contatelefonica->mes_referencia);?>
							</a>
                        	
						</td>
						<td>
                        	<a href="javascript:detalhes('<?php echo $contatelefonica->id; ?>')">
								<?php 
								if(($contatelefonica->pagamento)==1)								
									echo "<p style='color:green; text-transform:uppercase;'>Conta Paga</p>";
								else
									echo "<p style='color:red; text-transform:uppercase;'>Devedor</p>";
								?>
							</a>
						</td>						

						<?php 
							$data = explode('-', $contatelefonica->mes_referencia);
							$ano = $data[0];
							$mes = $data[1];
							?>
							
						<td class="td_excluir_tabela_lista_geral">
                        	<a href="javascript:cancelar_pagamento('<?php echo $contatelefonica->id;?>','<?php echo $contatelefonica->usuario;?>')">
                       			<img src="../../public/images/cancelar_pagamento.gif"  alt="Excluir" width="59" height="59" border="0" />							</a>						</td>
						
                		<td class="td_excluir_tabela_lista_geral">
                        	<a href="javascript:pagar('<?php echo $contatelefonica->id;?>','<?php echo $contatelefonica->usuario;?>')">
                       			<img src="../../public/images/confimar_pagamento.gif"  alt="Excluir" width="59" height="59" border="0" />							</a>					</td>
						
                        
   		    </tr>
			
            </table>
		  