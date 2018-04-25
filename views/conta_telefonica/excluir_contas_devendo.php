<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaUsuario();
  require('../../funcoes/funcoes.php');
  
  $ano=GetGET('TxtAno');
  if(!$ano)
  	$ano=date("Y");
  
    
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">
<script type="text/javascript">
	function detalhes(idConta)
	{	
		window.location='ligacoes_conta_telefonica.php?TxtIdConta='+idConta;
	}
	function excluir(idConta)
	{	
		if (confirm('Tem certeza, que deseja excluir esta CONTA?'))
			window.location='../../scripts/conta_telefonica/excluir_gru.php?TxtIdConta='+idConta;
	}
	
	function comprovante(idGRU)
	{	
		window.location='../conta_telefonica/comprovante.php?TxtGRU='+idGRU;
	}
	function pesquisa(pag)
	{
		url="listagem_contas_devendo.php?TxtAno=<?php echo $ano; ?>&_pagi_pg="+pag;
		ajax(url);
	}

</script>
<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <?php include('../layouts/menu_top_horizontal.php');?>      
     
      <div class="mainpanel">
        <div class="text_">
          <h1>Conta Telef&ocirc;nica</h1>
          <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>
          
          <div class="text">
		  			<form action="contas_devendo.php" method="get" enctype="multipart/form-data">
			  			<label for="TxtMesAno" class="labeltxtgeral">Insira o Ano (9999):</label>
              			<input class="inputsgeraltxtdata" id="ano" name="TxtAno" type="text" value="<?php echo "$ano";?>">
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
