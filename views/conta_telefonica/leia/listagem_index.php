		<?php
		session_start();
		require('../../util/seguranca.php');
		Seguranca::VerificaUsuario();
		
		require('../../funcoes/funcoes.php');
		require('../../configuracoes/conexao.php');
		require('../../dal/dalusuario.php');
		require('../../dal/dalligacoes.php');
		
		$ano_inicial=GetGET('TxtAnoInicial');
		$ano_final=GetGET('TxtAnoFinal');
		//$ano_inicial=2011;
		//$ano_final=2011;
		

		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
		$id = GetVarSESSION('id');
		$rs_usuario =  $dalusuario->getPorId($id);
		$usuario = mysql_fetch_object($rs_usuario);
		
		$senha=$usuario->senha;
		
		$cont_total_conta=0;
		?>
        
		  
		  <table width="100%" id="tabela_lista_geral">
            <tr id="tit_tabela_lista_geral">
            <td width="8%">Ano</td>
			<td width="11%">M&ecirc;s</td>
			<td width="10%">Qtd Liga&ccedil;&otilde;es</td>                        
            <td width="9%">Valor R$</td> 
			<td width="35%">Situa&ccedil;&atilde;o do Pagamento</td>
			
            <td width="7%">Justificar</td>
            <td width="7%">Detalhes</td>
            <td width="8%">Gerar DARF</td>
            <td width="5%">UNIR DARF</td>
            </tr>
          		<?php 
				//Este FOR faz rodar o intervalo de anos especificado pelo usuario
				for($ano_inicial;$ano_inicial<=$ano_final;$ano_inicial++)
						{
						$ano=$ano_inicial;						
						//Este FOR faz rodar 12 MESES ou seja 1 ANO
						for($mes=1;$mes<=12;$mes++)
							{
							//Verifica ligacoes sem justificativa e retorna a soma por MÊS
							$conexao = new Conexao();
							$dalligacoes = new Dalligacoes($conexao);
							$rs_ligacoes = $dalligacoes->getContaTelefonicaPorSenha($senha, $ano, $mes);
							//Joga o resultado da QUERY em um array
							while ($ligacoes = mysql_fetch_object($rs_ligacoes))
								{
								//Verifica os meses com VALOR 0 que não vão pra conta
								if(isset($ligacoes->valor))
								{
									//VERIFICA QUANTOS REGISTROS EXISTEM
									++$cont_total_conta;
							
				?>
           	  <tr class="conteudo_tabela_lista_geral">
                    	<td>
                        	<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
								<?php echo $ano;?>
							</a>
						</td>
						<td>
                        	<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
								<?php echo ConverteMES($mes);?>
							</a>
						</td>
						<td>
                        	<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
								<?php echo $ligacoes->qtd_ligacoes;?>
							</a>
						</td>
                        <td>
                        	<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
								<?php echo number_format($ligacoes->valor,2);?>
							</a>
						</td>
						 
						<td>
                        	<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
								<?php echo "DEVEDOR";?>
							</a>
						</td>						
						
<td class="td_edit_tabela_lista_geral">
                       		<a href="javascript:justificar('<?php echo $ano;?>','<?php echo $mes; ?>')">
                           		<img src="../../public/images/edit.gif" alt="Editar" width="30" height="30" border="0" />
							</a>
						</td>
                		<td class="td_excluir_tabela_lista_geral">
                        	<a href="javascript:detalhes('<?php echo $ano;?>','<?php echo $mes; ?>')">
                       			<img src="../../public/images/visualizar.gif" alt="Excluir" width="23" height="23" border="0" />
							</a>						
						</td>
                        <td>
							<?php if(($ligacoes->valor)>=10){ ?>
							<a href="javascript:darf('<?php echo $id;?>','<?php echo $ano;?>','<?php echo $mes; ?>')">
							
								<img src="../../public/images/documento.png" alt="Editar" width="45" height="60" border="0" />							
								
							</a>
							<?php }else{ ?>
								<a href="../ajuda/index.php">
									<img src="../../public/images/alert.png" alt="Editar" width="45" height="60" border="0" />
								</a>
							<?php } ?>
						</td>
                        <td>
                        	
							<input type="checkbox" name="TxtData<?php echo $cont_total_conta;?>" value="<?php echo "$mes/$ano"; ?>" />
                        </td>
   		    </tr>
			   <?php }}}}?>
            </table>
		  
		    <input type="hidden" name="TxtTotal" value="<?php echo $cont_total_conta;?>" />
            <input type="hidden" name="TxtId" value="<?php echo $id;?>" />
			