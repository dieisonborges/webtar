<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaUsuario();
  
  require('../../funcoes/funcoes.php');
  $mes_ano_dia=GetGET('TxtMesAnoDia');
  if(!$mes_ano_dia)
		  	{
		  	$dia=date("d")-1;
		  	$mes_ano_dia=date("$dia/m/Y");
			}
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">
<script type="text/javascript">
	function justificar(id)
	{
		window.location='justificar.php?id='+id;
	}
	function detalhes(id)
	{
		window.location='detalhes.php?id='+id;
	}
	function pesquisa(pag)
	{
		url="listagem_minhas_ligacoes_sem_justificativa_por_dia.php?TxtMesAnoDia=<?php echo $mes_ano_dia; ?>&_pagi_pg="+pag;
		ajax(url);
	}
</script>
<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <?php include('../layouts/menu_top_horizontal.php');?>      
      <div class="info"> </div>
      
      <div class="mainpanel">
        <div class="text_">
          <h1>Liga&ccedil;&otilde;es Telef&ocirc;nicas  </h1>
          <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>
          <div class="text">	
		  			<form action="minhas_ligacoes_sem_justificativa_por_dia.php" method="get" enctype="multipart/form-data">
			  			<label for="TxtMesAnoDia" class="labeltxtgeral">Insira o M&ecirc;s o Ano e o Dia (99/99/9999):</label>
              			<input class="inputsgeraltxtdata" id="mes_ano_dia" name="TxtMesAnoDia" type="text" value="<?php echo $mes_ano_dia; ?>">
                        <script type="text/javascript" src="../../public/js/config_calendario.js"></script>
			  			<input type="submit" value="BUSCAR" id="btn_ok_cadastro_editar_data" />
					</form>	  			
					<div id="pagina"></div>
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
