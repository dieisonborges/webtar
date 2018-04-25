		<div class="text">
 			<form action="index.php" method="post" enctype="multipart/form-data" >
			  <input id="id" name="TxtId" type="hidden" value="<?php echo $justificativaligacoes->id;?>">
			  <label for="TxtTipo" class="labeltxtgeral">Tipo de Liga&ccedil;&atilde;o:</label>
			  <div class="txt_justificativa">
			  	<?php 
				if(($justificativaligacoes->tipo)==1)
					echo "<option value='1' selected='selected'>Trabalho</option>";
			  	if(($justificativaligacoes->tipo)==2)
					echo "<option value='2' selected='selected'>Pessoal</option>";
				?>
			  </div>
			  <label for="justificativa" class="labeltxtgeral">Justificativa: </label>
			  <div class="txt_justificativa" id="justificativa">
			  	<?php echo $justificativaligacoes->justificativa;?>
			  </div>
			  <input type="submit" value="Sair" id="btn_ok_cadastro_editar" />
            </form>			
			
          </div>
          <!--text-->
