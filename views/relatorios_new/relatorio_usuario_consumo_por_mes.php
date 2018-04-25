<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaTarifador();
  
  require('../../funcoes/funcoes.php');


  $unidades = GetVarSESSION('unidades');
  
  $mes_ano=GetGET('TxtAnoMes');
  if(!$mes_ano)
  	$mes_ano=date("m/Y");

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
          <h1>Relat&oacute;rio de Usu&aacute;rios e Senhas</h1>
          <div class="text">	
			<form action="relatorio_usuario_consumo_por_mes.php" method="get" enctype="multipart/form-data">
			  			<label for="TxtMesAno" class="labeltxtgeral">Insira o M&ecirc;s e o Ano (99/9999):</label>
              			<input class="inputsgeraltxtdata" id="mes_ano" name="TxtAnoMes" type="text" value="<?php echo "$mes_ano";?>">
			  			<input type="submit" value="BUSCAR" id="btn_ok_cadastro_editar_data" />
			</form>	  
		  	<iframe src="relatorio_usuario_consumo_por_mes_seco.php?TxtAnoMes=<?php echo $mes_ano;?>" frameborder="0" height="500" width="920" id="darf"></iframe>							
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
