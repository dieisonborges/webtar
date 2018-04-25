<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaUsuario();
  
  require('../../funcoes/funcoes.php');
  
  $ano=GetGET('TxtAno');
  if(!$ano)
  	$ano=date("Y");
  
  require('../../scripts/conta_telefonica/gerador_conta_individual.php');
  
  
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">
<script type="text/javascript">
	function detalhes(ano, mes)
	{	
		window.location='../minhas_ligacoes/minhas_ligacoes_sem_justificativa_por_mes.php?TxtMesAno='+mes+'%2F'+ano;
	}
	function comprovante(ano, mes)
	{	
		window.location='../conta_telefonica/comprovante.php?TxtMesAno='+mes+'%2F'+ano;
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
          <a class="btn_novo_usuario" href="gru.php" target="_blank">Gerar GRU</a>
          <div class="text">
		  			<form action="contas_devendo.php" method="get" enctype="multipart/form-data">
			  			<label for="TxtMesAno" class="labeltxtgeral">Insira o Ano (9999):</label>
              			<input class="inputsgeraltxtdata" id="ano" name="TxtAno" type="text" value="<?php echo "$ano";?>">
			  			<input type="submit" value="BUSCAR" id="btn_ok_cadastro_editar_data" />
					</form>
       				<div id="pagina"></div>
          </div>
		  <a class="btn_novo_usuario" href="gru.php" target="_blank">Gerar GRU</a>
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
