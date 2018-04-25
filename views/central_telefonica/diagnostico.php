<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaTarifador();
  require('../../funcoes/funcoes.php');
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">
<script type="text/javascript">
	function pesquisa(pag)
	{
		url="listagem_diagnostico.php?_pagi_pg="+pag;
		ajax(url);
	}
	function verifica_conexao(id)
	{
		window.location='verifica_conexao.php?id='+id;
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
          <h1>Centrais Telefonicas Cadastradas</h1>
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
