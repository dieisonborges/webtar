<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaTarifador();
  
  require('../../funcoes/funcoes.php');
  $numero_discado=GetGET('TxtNumeroDiscado');
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">
<script type="text/javascript">
	function justificar(id)
	{
		window.location='confirmar_justificativa.php?id='+id;
	}
	function detalhes(id)
	{
		window.location='detalhes.php?id='+id;
	}
	function pesquisa(pag)
	{
		url="listagem_ligacoes_por_n_discado.php?TxtNumeroDiscado=<?php echo $numero_discado; ?>&_pagi_pg="+pag;
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
		  			<form action="ligacoes_por_n_discado.php" method="get" enctype="multipart/form-data">
						<label for="TxtNumeroDiscado" class="labeltxtgeral">Insira o Número Discado:</label>
              			<input class="inputsgeraltxtdata" id="numero_discado" name="TxtNumeroDiscado" type="text" value="<?php echo $numero_discado; ?>">
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
