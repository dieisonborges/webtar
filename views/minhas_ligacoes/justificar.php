<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaUsuario();
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
	require('../../dal/daljustificativaligacoes.php');
	
	$id_ligacao = GetGET('id');
	
	$unidades = GetVarSESSION('unidades');
	
	$conexao = new Conexao();
    $daljustificativaligacoes = new DalJustificativaLigacoes($conexao);
    $rs_justificativaligacoes =  $daljustificativaligacoes->getPorIdLigacao($id_ligacao, $unidades);
    $justificativaligacoes = mysql_fetch_object($rs_justificativaligacoes);
	
	
	$msgStatus = (isset($justificativaligacoes->aprovacao)) ? GetStatusJUSTIFICATIVA($justificativaligacoes->aprovacao) : '';
	$aprovacao = (isset($justificativaligacoes->aprovacao)) ? $justificativaligacoes->aprovacao : '';
	$justificativa = (isset($justificativaligacoes->justificativa)) ? $justificativaligacoes->justificativa : '';
	$id = (isset($justificativaligacoes->id)) ? $justificativaligacoes->id : '';
	
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body>
<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <?php include('../layouts/menu_top_horizontal.php');?>
      <div class="info"> </div>
      
      <div class="mainpanel">
        <div class="text_">
          <h1>Justificar Liga&ccedil;&atilde;o Telef&ocirc;nica</h1>
		  <?php echo $msgStatus; ?>  
          <?php 
		    //Caso nao tenha sido aprovada
		  	if($aprovacao!=1)
				{
			?>
			<div class="text">
			<form action="../../scripts/justificar_ligacoes/justificar.php" method="post" enctype="multipart/form-data" >
		  	  <input id="id_ligacao" name="TxtIdLigacao" value="<?php echo $id_ligacao;?>" type="hidden">
			  <input id="id" name="TxtId" value="<?php echo $id;?>" type="hidden">
			  <label for="TxtTipo" class="labeltxtgeral">Tipo de Liga&ccedil;&atilde;o:</label>
              <select class="select_geral" id="tipo" name="TxtTipo" type="text" value="">
			  		<option value='1'>Servi&ccedil;o</option>
                    <option value='2'>Particular</option>
			  </select>
			  <label for="justificativa" class="labeltxtgeral">Justificativa: </label>
			  <?php
				include("../../helpers/fckeditor/fckeditor.php") ;
				$oFCKeditor = new FCKeditor('TxtJustificativa') ;
				$sBasePath = '../../helpers/fckeditor/' ;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $justificativa;
				$oFCKeditor->Create() ;
			  ?>
			  
			  <input type="submit" value="Atualizar" id="btn_ok_cadastro_editar" />
            </form>			
			
          </div>
          <!--text-->
		  <?php
				}
			else{
		?>
			
			<div class="text">
 			<form action="../minhas_ligacoes/minhas_ligacoes_sem_justificativa.php" method="post" enctype="multipart/form-data" >
			  <input id="id" name="TxtId" type="hidden" value="<?php echo $justificativaligacoes->id;?>">
			  <label for="TxtTipo" class="labeltxtgeral">Tipo de Liga&ccedil;&atilde;o:</label>
			  <select disabled="disabled">
			  	<option value='1' selected='selected'>Trabalho</option>
			  </select>
			  <label for="justificativa" class="labeltxtgeral">Justificativa: </label>
			  <div class="txt_justificativa" id="justificativa">
			  	<?php echo $justificativa;?>
			  </div>
			  <input type="submit" value="Sair" id="btn_ok_cadastro_editar" />
            </form>			
			
          </div>
          <!--text-->
		<?php
		}	
			?>			  
        </div>
        <!--text_-->
      </div>

      <!--mainpanel-->
    </div>
    <!--menu-->
    <?php include('../layouts/rodape.php');?>
  </div>
  <!--wrap2-->
</div>
<!--wrap1-->
</body>
</html>
