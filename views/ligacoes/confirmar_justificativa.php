<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
	require('../../dal/daljustificativaligacoes.php');
	
	$id = GetGET('id');	
	$unidades = GetVarSESSION('unidades');
	$conexao = new Conexao();
    $daljustificativaligacoes = new DalJustificativaLigacoes($conexao);
    $rs_justificativaligacoes =  $daljustificativaligacoes->getPorIdLigacao($id, $unidades);
    $justificativaligacoes = mysql_fetch_object($rs_justificativaligacoes);
	
	$status=GetStatusJUSTIFICATIVA($justificativaligacoes->aprovacao);
  	
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
          <h1>Confirmar Justificativa Liga&ccedil;&atilde;o Telef&ocirc;nica</h1>
		  <?php
		  	echo $status;
		  ?>  
          <?php 
		  	if($justificativaligacoes->aprovacao!=1)
				{
			?>
			<div class="text">
			  <label for="TxtTipo" class="labeltxtgeral">Tipo de Liga&ccedil;&atilde;o:</label>
			  <select class="select_geral" id="tipo" name="TxtTipo" disabled="disabled">
			  		<option value='1'>Trabalho</option>
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
			<?php
				}
			else{
			?>
			<div class="text">
 			<form action="index.php" method="post" enctype="multipart/form-data" >
			  <input id="id" name="TxtId" type="hidden" value="<?php echo $justificativaligacoes->id;?>">
			  <label for="TxtTipo" class="labeltxtgeral">Tipo de Liga&ccedil;&atilde;o:</label>
			  <div class="txt_justificativa">
			  	<select class="select_geral" id="tipo" name="TxtTipo" disabled="disabled">
			  		<option value='1'>Trabalho</option>
			 	 </select>
			  </div>
			  <label for="justificativa" class="labeltxtgeral">Justificativa: </label>
			  <div class="txt_justificativa" id="justificativa">
			  	<?php echo $justificativaligacoes->justificativa;?>
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
