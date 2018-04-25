<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaTarifador();
  
  require('../../funcoes/funcoes.php');
  $id=GetGET('TxtId');
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">
<script type="text/javascript">
	function darf(id)
	{
		window.location='darf.php?id='+id;
	}
	function justificar(id)
	{
		window.location='confirmar_justificativa.php?id='+id;
	}
	function pagar(id)
	{
		if (confirm('Deseja Confirmar o Pagamento?'))
			window.location='../../scripts/conta_telefonica/pagar.php?TxtId='+id;
	}
	function cancelar_pagamento(id)
	{
		if (confirm('Tem Certeza que Deseja Cancelar o Pagamento?'))
			window.location='../../scripts/conta_telefonica/cancelar_pagamento.php?TxtId='+id;
	}
	<?php if($id!=""){?>
	function pesquisa(pag)
	{
		url="listagem_contas_por_codigo.php?TxtId=<?php echo $id; ?>&_pagi_pg="+pag;
		ajax(url);
	}
	<?php }?>
</script>
<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <?php include('../layouts/menu_top_horizontal.php');?>      
      <div class="info"> </div>
      
      <div class="mainpanel">
        <div class="text_">
          <h1>Contas Telef&ocirc;nicas por C&oacute;digo </h1>
          <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>
          <div class="text">
		  			<form action="contas_por_codigo.php" method="get" enctype="multipart/form-data">
						<label for="TxtId" class="labeltxtgeral">Insira o C&oacute;digo da Conta:</label>
              			<input class="inputsgeraltxtdata" id="id" name="TxtId" type="text" value="<?php echo $id; ?>">
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
