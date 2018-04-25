		<div class="text">
			<form action="../../scripts/justificar_ligacoes/justificar.php" method="post" enctype="multipart/form-data" >
		  	  <input id="id_ligacao" name="TxtIdLigacao" type="hidden" value="<?php echo $id_ligacao;?>">
			  <input id="aprovacao" name="TxtAprovacao" type="hidden" value="<?php echo $status;?>">
			  <input id="id" name="TxtId" type="hidden" value="<?php echo $id;?>">
			  <label for="TxtTipo" class="labeltxtgeral">Tipo de Liga&ccedil;&atilde;o:</label>
              <select class="select_geral" id="tipo" name="TxtTipo" type="text" value="">
			  		<?php include('../layouts/select_tipo_ligacao.php');?>
			  </select>
			  <label for="justificativa" class="labeltxtgeral">Justificativa: </label>
			  <?php
				include("../../public/fckeditor/fckeditor.php") ;
				$oFCKeditor = new FCKeditor('TxtJustificativa') ;
				$sBasePath = '../../public/fckeditor/' ;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $justificativa;
				$oFCKeditor->Create() ;
			  ?>
			  
			  <input type="submit" value="Atualizar" id="btn_ok_cadastro_editar" />
            </form>			
			
          </div>
          <!--text-->