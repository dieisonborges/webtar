<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaAdministrador();
  require('../../funcoes/funcoes.php');
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">
<script type="text/javascript">
	function excluir(id)
	{
		if (confirm('Tem certeza?'))
			window.location='../../scripts/central_telefonica/excluir.php?id='+id;
	}
	function editar(id)
	{
		window.location='editar.php?id='+id;
	}
	function pesquisa(pag)
	{
		url="listagem_index.php?_pagi_pg="+pag;
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
          <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>
          <a class="btn_novo_usuario" href="cadastrar.php">Nova Central</a>
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
