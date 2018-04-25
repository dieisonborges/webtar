<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaTarifador();
  
  require('../../funcoes/funcoes.php');
  
  $nome_usuario=GetGET('TxtNomeUsuario');
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
		url="listagem_ligacoes_por_usuario.php?TxtNomeUsuario=<?php echo $nome_usuario; ?>&_pagi_pg="+pag;
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
		  			<form action="ligacoes_por_usuario.php" method="get" enctype="multipart/form-data">
			  			<label for="TxtNomeUsuario" class="labeltxtgeral">Insira o Usu&aacute;rio:</label>
              			<input class="inputsgeraltxtdata" id="nome_usuario" name="TxtNomeUsuario" type="text" value="<?php echo $nome_usuario; ?>">
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
