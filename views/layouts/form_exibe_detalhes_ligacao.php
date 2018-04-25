<br /><br /><br /><br />
<label for="usuario" class="labeltxtgeral">Usu&aacute;rio:</label>
<a class="inputsgeraltxt" target="_blank" style="font-size:18px; color:blue;"  href="https://webtar.cindacta4.intraer/webtar/views/usuario/editar.php?id=<?php echo ($ligacoes->tbUsuario_id);?>">
Clique aqui para visualizar o usu&aacute;rio que efetuou esta liga&ccedil;&atilde;o</a>
<br /><br />			 

<form action="#">
			  <label for="TxtDataLigacao" class="labeltxtgeral">Data:</label>
              <input class="inputsgeraltxt" id="dataligacao" name="TxtDataLigacao" type="text" value="<?php echo converteData($ligacoes->dataLigacao);?>" disabled="disabled">
			  
			  <label for="TxtHoraLigacao" class="labeltxtgeral">Hor&aacute;rio:</label>
              <input class="inputsgeraltxt" id="dataligacao" name="TxtHoraLigacao" type="text" value="<?php echo $ligacoes->time;?>" disabled="disabled">
			  
			  <label for="duracao" class="labeltxtgeral">Duracao:</label>
              <input class="inputsgeraltxt" id="duracao" name="" type="text" value="<?php echo ($ligacoes->duracao);?>" disabled="disabled">
			  
			  <label for="numDiscado" class="labeltxtgeral">Numero Discado:</label>
              <input class="inputsgeraltxt" id="numDiscado" name="" type="text" value="<?php echo ($ligacoes->numDiscado);?>" disabled="disabled">
			  
			  <label for="numOrigem" class="labeltxtgeral">Numero de Origem:</label>
              <input class="inputsgeraltxt" id="numOrigem" name="" type="text" value="<?php echo ($ligacoes->numOrigem);?>" disabled="disabled">
			  
			  <label for="TxtValor" class="labeltxtgeral">Valor R$:</label>
              <input class="inputsgeraltxt" id="valor-minhas" name="TxtValor" type="text" value="<?php echo ($ligacoes->valor);?>" disabled="disabled">
			  <div id="inf_adicionais_ligacoes">
				  <label for="canalEntrada" class="labeltxtgeral">Canal de Entrada:</label>
				  <input class="inputsgeraltxt" id="canalEntrada" name="" type="text" value="<?php echo ($ligacoes->canalEntrada);?>" disabled="disabled">
				  
				  <label for="canalSaida" class="labeltxtgeral">Canal de Saida:</label>
				  <input class="inputsgeraltxt" id="canalSaida" name="" type="text" value="<?php echo ($ligacoes->canalSaida);?>" disabled="disabled">
							  
				  <label for="tipo" class="labeltxtgeral">Tipo:</label>
				  <input class="inputsgeraltxt" id="tipo" name="" type="text" value="<?php echo ($ligacoes->tipo);?>" disabled="disabled">
				  
				  <label for="codigo" class="labeltxtgeral">Codigo:</label>
				  <input class="inputsgeraltxt" id="codigo" name="" type="text" value="<?php echo ($ligacoes->codigo);?>" disabled="disabled">
				  
				  <label for="troncoEntrada" class="labeltxtgeral">Tronco de Entrada:</label>
				  <input class="inputsgeraltxt" id="troncoEntrada" name="" type="text" value="<?php echo ($ligacoes->troncoEntrada);?>" disabled="disabled">
				  
				  <label for="troncoSaida" class="labeltxtgeral">Tronco de Saida:</label>
				  <input class="inputsgeraltxt" id="troncoSaida" name="" type="text" value="<?php echo ($ligacoes->troncoSaida);?>" disabled="disabled">
				  
				   <label for="cilcode" class="labeltxtgeral">Cilcode:</label>
				  <input class="inputsgeraltxt" id="cilcode" name="" type="text" value="<?php echo ($ligacoes->cilcode);?>" disabled="disabled">
				
				<label for="id_usuario" class="labeltxtgeral">ID usu&aacute;rio:</label>
				  <input class="inputsgeraltxt" id="senha" name="" type="text" value="<?php echo ($ligacoes->tbUsuario_id);?>" disabled="disabled">
				<label for="senha" class="labeltxtgeral">Senha :</label><?php $senha_exibe = $ligacoes->senha;?>
				  <input class="inputsgeraltxt" id="senha" name="" type="text" 
			value="<?php echo $senha_exibe[0].$senha_exibe[1]."*".$senha_exibe[3].$senha_exibe[4]."*".$senha_exibe[6];?>" disabled="disabled">
				 
				  
			</div>
</form>

<script type="text/javascript">
	fadeOut('inf_adicionais_ligacoes', 0.01)
</script>