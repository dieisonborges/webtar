<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaTarifador();
  
  require('../../funcoes/funcoes.php');
  $usuario=GetGET('TxtUsuario');
  
  
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">
<script type="text/javascript">
	function excluir(id)
	{
		if (confirm('Tem certeza?'))
			window.location='../../scripts/usuario_adm/excluir.php?id='+id;
	}
	function editar(id)
	{
		window.location='editar.php?id='+id;
	}
	function termo(id)
	{
		window.location='termo_responsabilidade_adm.php?id='+id;
	}
	function pesquisa(pag)
	{
		url="listagem_index.php?_pagi_pg="+pag+"&TxtUsuario=<?php echo $usuario ;?>";
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
          <h1>Usu&aacute;rios Administradores Cadastrados</h1>
          <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>
          <!--<a class="btn_novo_usuario" href="cadastrar.php">Novo ADM</a>-->
          <div class="text">
		  			<form action="index.php" method="get" enctype="multipart/form-data">
			  			<label for="TxtUsuario" class="labeltxtgeral">Buscar usu&aacute;rio:</label>
              			<input class="inputsgeraltxtdata" name="TxtUsuario" type="text" value="<?php echo $usuario; ?>">
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
