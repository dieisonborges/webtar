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
           	    <td colspan="9" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	</tr>
            <tr id="tit_tabela_lista_geral">
			<td width="6%">C&oacute;digo</td>
			<td width="10%">Valor R$</td>
			<td width="29%">Referente ao M&ecirc;s:</td>
			<td width="7%">Situa&ccedil;&atilde;o do Pagamento</td>
			<td width="7%">Enviar Comprovante de Pagamento</td>
            <td width="5%">Detalhes</td>
            </tr>
			<?php while ($contatelefonica = mysql_fetch_object($rs_contatelefonica)){?>
							<?php 
								$data = explode('-', $contatelefonica->mes_referencia);
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
									<?php echo converteMesReferencia($contatelefonica->mes_referencia); ?>
								</a>
							</td>
							<p style='color:green; text-transform:uppercase; text-decoration:blink; text-decoration:none'>
							<td>
								<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
									<?php 
									if(($contatelefonica->pagamento)==1)								
										echo "<p style='color:green; text-transform:uppercase;'>Conta Paga</p>";
									else
										echo "<p style='color:red; text-transform:uppercase;'>Devedor</p>";
									?>
								</a>
							</td>
							
							<td class="td_excluir_tabela_lista_geral">
								<a href="javascript:comprovante('<?php echo $ano;?>','<?php echo $mes; ?>')">
									<img src="../../public/images/cifrao.png" alt="Comprovante" width="30" height="40" border="0" style="margin-left:30px;" />
								</a>						
							</td>						
	
							
							<td class="td_excluir_tabela_lista_geral">
								<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
									<img src="../../public/images/visualizar.gif" alt="Detalhes" width="23" height="23" border="0" />
								</a>						
							</td>
							
				</tr>					
				
			<?php }?>
			<tr class="conteudo_tabela_lista_geral">
           	    <td colspan="9" align="center" class="paginacao"><?php echo $paginacao; ?></td>
   	      	  </tr>
            </table>
		  
		   