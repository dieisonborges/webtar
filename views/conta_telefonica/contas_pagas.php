<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaUsuario();
  
  require('../../funcoes/funcoes.php');
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">
<script type="text/javascript">
	function detalhes(idConta)
	{	
		window.location='ligacoes_conta_telefonica.php?TxtIdConta='+idConta;
	}
	function pesquisa(pag)
	{
		url="listagem_contas_pagas.php?_pagi_pg="+pag;
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
