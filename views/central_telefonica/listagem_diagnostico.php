<?php
		  session_start();
  		  require('../../util/seguranca.php');
  	      Seguranca::VerificaTarifador();
		  
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalcentraltelefonica.php');
		  require('../../dal/dalunidades.php');	
		  require('../../dal/dalusuario.php');
	
	
		  $conexao = new Conexao();
		  $dalcentralTelefonica = new DalcentralTelefonica($conexao);
		  $rs_centralTelefonica = $dalcentralTelefonica->getTodosSemPag();
		
		
		  $unidades_id = GetVarSESSION('unidades_real');	
		  
?>

<table width="100%" id="tabela_lista_geral">
  
  <tr id="tit_tabela_lista_geral">
    <td width="25%">Central (Coletor)</td>
    <td width="46%">Conex&atilde;o</td>
	<td width="29%">Servidor</td>

  </tr>
  <?php while ($centralTelefonica = mysql_fetch_object($rs_centralTelefonica)){?>
  
  <?php
  
		  $conexao = new Conexao();
		  $dalunidades = new Dalunidades($conexao);
		  $rs_unidades = $dalunidades->getUnidadeFilha($unidades_id);
  
  ?>
  
  <?php while ($unidades = mysql_fetch_object($rs_unidades)){?>
  
  <?php if(($unidades->id)==($centralTelefonica->tbUnidades_id)){ ?>
  
  <tr class="conteudo_tabela_lista_geral">
    <td style="padding-top:20px;"><?php echo ($centralTelefonica->ip)."<br />".($centralTelefonica->sigla);?><img src="../../public/images/telefone.png" style="float:right; margin-top:-50px;" /> </td>
	<td class="td_edit_tabela_lista_geral">	
		<?php	 

		// Verifica se foi DESATIVADO pelo usuario
                        if ($centralTelefonica->status==1)
                        {
        echo '<p class="btn_status_conexao" style="background:green;">ATIVADO</p>';
                        }
                        else
                        {
        echo '<p class="btn_status_conexao" style="background:red;">DESATIVADO</p>';
                        }


			
			if (ping($centralTelefonica->ip)==0)
			{
				echo '<p class="btn_status_conexao" style="background:red;">Sem Conex&atilde;o de REDE</p>';
			}
			else
			{
				echo '<p class="btn_status_conexao" style="background:green;">Conectado a REDE</p>';
			}
			
			$conexao = new Conexao();
		  	$dalcentralTelefonica = new DalcentralTelefonica($conexao);
		    $rs_ultimoBilhete = $dalcentralTelefonica->getUltimoBilhete($centralTelefonica->tbUnidades_id);
			$ultimoBilhete = mysql_fetch_object($rs_ultimoBilhete);
			
			$dataUltimoBilhete = $ultimoBilhete->dataLigacao;
			$horaUltimoBilhete = $ultimoBilhete->time;
			
			// Verifica diferenca dos dias para gerar o fundo vermelho
			$data_final=date("d/m/Y");
			
			$data_inicial=explode("-", $dataUltimoBilhete);
			$data_inicial=$data_inicial[2]."/".$data_inicial[1]."/".$data_inicial[0];			
			
			
			$limiteDias=difDias($data_inicial, $data_final);
		    
			// Se coleta for efetuada a mais de tres dias o sistema emite um alerta				
			if ($limiteDias>=3)
			{
	echo '<p class="btn_status_conexao" style="background:red;">Ultima coleta: '.converteData($dataUltimoBilhete).' '.$horaUltimoBilhete.'</p>';
			}
			else
			{
	echo '<p class="btn_status_conexao" style="background:green;">Ultima coleta: '.converteData($dataUltimoBilhete).' '.$horaUltimoBilhete.'</p>';
			}




						
		?>
	</td>
	<td><img src="../../public/images/servidor.png" /><br /><?php echo $_SERVER['SERVER_ADDR']; ?><br />WEBTAR Server 01</td>
  </tr>
  <?php }}}?>
  
</table>
