		<div class="text">
			  <label for="TxtTipo" class="labeltxtgeral">Tipo de Liga&ccedil;&atilde;o:</label>
			  <select class="select_geral" id="tipo" name="TxtTipo" disabled="disabled">
			  		<?php include('../layouts/select_tipo_ligacao.php');?>
			  </select>
			  <label for="justificativa" class="labeltxtgeral">Justificativa: </label>
			  <div class="txt_justificativa" id="justificativa">
			  	<?php echo $justificativaligacoes->justificativa;?>
			  </div>
			<form action="../../scripts/justificar_ligacoes/confirmar_justificativa.php" method="post" enctype="multipart/form-data" >
		  	  <input id="id_ligacao" name="TxtIdLigacao" type="hidden" value="<?php echo $id;?>">
  			  <label for="justificativa" class="labeltxtgeral">A justificativa &eacute; v&aacute;lida?: </label>
			  <select class="select_geral" id="aprovacao" name="TxtAprovacao">
			  		<option selected="selected" value="1">APROVAR JUSTIFICATIVA</option>
					<option value="2">REJEITAR JUSTIFICATIVA</option>
			  </select>
			  <input type="submit" value="Confirmar" id="btn_ok_cadastro_editar" />
            </form>			
			
          </div>
          <!--text-->