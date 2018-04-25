<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaTarifador();
  
  require('../../funcoes/funcoes.php');
  
  $ano=GetGET('TxtAno');
  if(!$ano)
  	$ano=date("Y");
  
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
      
      <div class="mainpanel_darf">
        <div class="text_">
          <h1>Usu&aacute;rios com Justificativa Pendente</h1>
          <div class="text">
		  			<form action="relatorio_usuario_nao_justificou.php" method="get" enctype="multipart/form-data">
			  			<label for="TxtMesAno" class="labeltxtgeral">Insira o Ano (9999):</label>
              			<input class="inputsgeraltxtdata" id="ano" name="TxtAno" type="text" value="<?php echo "$ano";?>">
			  			<input type="submit" value="BUSCAR" id="btn_ok_cadastro_editar_data" />
					</form>
       				<div id="pagina"></div>
          </div>
          <div class="text">		  
		  	<iframe src="relatorio_usuario_nao_justificou_seco.php?TxtAno=<?php echo $ano; ?>" frameborder="0" height="500" width="920" id="darf"></iframe>							
		  </div>
          <!--text-->
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
