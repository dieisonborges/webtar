		<?php
		session_start();
		require('../../util/seguranca.php');
		Seguranca::VerificaUsuario();
		
		require('../../funcoes/funcoes.php');
		require('../../configuracoes/conexao.php');
		require('../../dal/dalcontatelefonica.php');

		$conexao = new Conexao();
		$dalcontatelefonica = new Dalcontatelefonica($conexao);
		$tbUsuario_id = GetVarSESSION('id');
		$rs_contatelefonica =  $dalcontatelefonica->getTodosPagas($tbUsuario_id);
		$paginacao = $rs_contatelefonica [1];
		$rs_contatelefonica = $rs_contatelefonica [0];
		
		?>
        
		  
		  <table width="100%" id="tabela_lista_geral">
		  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="10" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	</tr>
            <tr id="tit_tabela_lista_geral">
			<td width="9%">C&oacute;digo</td>
			<td width="13%">Valor R$</td>
			<td width="18%">Conta Gerada em:</td>
			<td width="21%"> GRU</td>
            <td width="15%">STATUS </td>
			<td width="14%">Enviar Comprovante de Pagamento</td>
            <td width="10%">Detalhes</td>
            </tr>
			<?php while ($contatelefonica = mysql_fetch_object($rs_contatelefonica)){?>
							<?php 
								$data = explode('-', $contatelefonica->data_hora_gerado);
								$ano = $data[0];
								$mes = $data[1];
							?>
				  <tr class="conteudo_tabela_lista_geral">
							<td>
								<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
									<?php echo $contatelefonica->id; ?>
								</a>
							</td>
							
							<td>
								<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">									
									<?php echo number_format($contatelefonica->valor,2);?>
								</a>
							</td>
						
							<td>
								<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
									<?php echo converteMesReferencia($contatelefonica->data_hora_gerado); ?>
								</a>
							</td>
							<p style='color:green; text-transform:uppercase; text-decoration:blink; text-decoration:none'>
							<td>
								<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
									<?php 
										if($contatelefonica->status_gestor==4)
										{
											echo '<a href="gru.php?TxtIdConta='.$contatelefonica->id.'">Gerar GRU</a>';
										}
										elseif($contatelefonica->status_gestor==2)
										{
											echo '<a href="visualizar-gru.php?TxtIdGRU='.$contatelefonica->tbGRU_id.'" target="_blank" >Visualizar GRU</a>';
										}
										elseif($contatelefonica->status_gestor==1)
										{
											echo '<a href="visualizar-gru.php?TxtIdGRU='.$contatelefonica->tbGRU_id.'" target="_blank" >Visualizar GRU</a>';
										}																	
										
									?>
								</a>
							</td>                            
                            <td> 
								<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
									<?php 
									echo GetStatusGESTORclassificacao($contatelefonica->status_gestor);		
										
									?>
								</a>
							</td>
							
							<td class="td_excluir_tabela_lista_geral">
                            
                            <?php if($contatelefonica->status_gestor==1) { ?>
                            
                            <?php echo '<a target="_blank" href="../../private/comprovantes/'.$contatelefonica->arquivo.'">Ver Comprovante de PG</a>'; ?>
                            
                            <?php }else{ ?>
                            
								<a href="javascript:comprovante('<?php echo $ano;?>','<?php echo $mes; ?>')">
									<img src="../../public/images/cifrao.png" alt="Comprovante" width="30" height="40" border="0" style="margin-left:30px;" />
								</a>	
                             <?php } ?>					
							</td>						
	
							
							<td class="td_excluir_tabela_lista_geral">
								<a href="javascript:detalhes('<?php echo $contatelefonica->id;?>')">
									<img src="../../public/images/visualizar.gif" alt="Detalhes" width="23" height="23" border="0" />
								</a>						
							</td>
							
				</tr>					
				
			<?php }?>
			<tr class="conteudo_tabela_lista_geral">
           	    <td colspan="10" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
            </table>
		  
		   