		<?php		
		session_start();
		require('../../util/seguranca.php');
		Seguranca::VerificaUsuario();
		
		require('../../funcoes/funcoes.php');
		require('../../configuracoes/conexao.php');
		require('../../dal/dalcontatelefonica.php');
		
		$unidades = GetVarSESSION('unidades_real');
		
		 $ano=GetGET('TxtAno');
  		 if(!$ano)
  	     	$ano=date("Y");
		
		$conexao = new Conexao();
		$dalcontatelefonica = new Dalcontatelefonica($conexao);
		$tbUsuario_id = GetVarSESSION('id');
		$rs_contatelefonica =  $dalcontatelefonica->getTodosDevendo($tbUsuario_id, $ano);
		$paginacao = $rs_contatelefonica [1];
		$rs_contatelefonica = $rs_contatelefonica [0];
		
		?>
        
		  
		  <table width="100%" id="tabela_lista_geral">
		  <tr class="conteudo_tabela_lista_geral">
           	    <td colspan="10" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	</tr>
            <tr id="tit_tabela_lista_geral">
			<td width="7%">C&oacute;digo</td>
			<td width="12%">Valor R$</td>
			<td width="16%">Conta Gerada em:</td>
			<td width="18%"> GRU</td>
            <td width="14%">STATUS </td>
			<td width="13%">Enviar Comprovante de Pagamento</td>
            <td width="6%">Detalhes</td>
            <td width="9%">Excluir</td>
            </tr>
			<?php while ($contatelefonica = mysql_fetch_object($rs_contatelefonica)){?>
							<?php 
								$data = explode('-', $contatelefonica->data_hora_gerado);
								$ano = $data[0];
								$mes = $data[1];
							?>
				  <tr class="conteudo_tabela_lista_geral">
							<td>
								<a href="#">
									<?php echo $contatelefonica->id; ?>
								</a>
							</td>
							
							<td>
								<a href="#">									
									<?php echo number_format($contatelefonica->valor,2);?>
								</a>
							</td>
						
							<td>
								<a href="#">
									<?php echo converteMesReferencia($contatelefonica->data_hora_gerado); ?>
								</a>
							</td>
							<p style='color:green; text-transform:uppercase; text-decoration:blink; text-decoration:none'>
							<td>
								<a href="#">
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
								<a href="#">
									<?php 
									echo GetStatusGESTORclassificacao($contatelefonica->status_gestor);		
										
									?>
								</a>
							</td>
							
							<td class="td_excluir_tabela_lista_geral">
                            
                            <?php if($contatelefonica->status_gestor==1) { ?>
                            
                            <?php echo '<a href="#" style="color:green;">PAGAMENTO CONFIRMADO</a>'; ?>
                            
                            <?php }elseif(isset($contatelefonica->tbGRU_id)){ ?>
                            
								<a href="javascript:comprovante('<?php echo $contatelefonica->tbGRU_id;?>')">
									<img src="../../public/images/cifrao.png" alt="Comprovante" width="30" height="40" border="0" style="margin-left:30px;" />
								</a>	
                             <?php }else{ ?>
                             	<a href="#" style="color:#FF0000">
									SEM GRU
								</a>		
                             <?php } ?>				
							</td>						
	
							
							<td class="td_excluir_tabela_lista_geral">
								<a href="javascript:detalhes('<?php echo $contatelefonica->id;?>')">
									<img src="../../public/images/visualizar.gif" alt="Detalhes" width="23" height="23" border="0" />
								</a>						
							</td>
                            <?php if($contatelefonica->status_gestor==1){ ?>
                            <td width="5%" class="td_excluir_tabela_lista_geral"><a href="javascript:excluirGRU('<?php echo $contatelefonica->id;?>')" style="color:green;"> GRU PAGA</a> </td>
                            
							<?php }else{ ?>
                            <td class="td_excluir_tabela_lista_geral"><a href="javascript:excluir('<?php echo $contatelefonica->id;?>')" style="color:orange;"> <img src="../../public/images/excluir.gif" alt="Detalhes" width="23" height="23" border="0" /></a> </td>
                            <?php } ?>
			</tr>					
				
			<?php }?>
			<tr class="conteudo_tabela_lista_geral">
           	    <td colspan="10" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
            </table>
		  
		   