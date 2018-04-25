<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();
	
	require('../../funcoes/funcoes.php');
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body>
<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <?php include('../layouts/menu_top_horizontal.php');?>
      <div class="info"> </div>
      
      <div class="mainpanel">
        <div class="text_">
          <h1>Cadastrar Nova Tarifa</h1>          
          <div class="text">
            <form action="../../scripts/tarifas/incluir.php" method="post" enctype="multipart/form-data">
			  <label for="TxtTipo" class="labeltxtgeral">Tipo: (Ex: Interurbano, Local)</label>
              <input class="inputsgeraltxt" id="tipo" name="TxtTipo" type="text" value="">
			  
			  <label for="mascara" class="labeltxtgeral">M&aacute;scara: <a href="../ajuda" class="link_ajuda">Precisando de ajuda com a m&aacute;scara? Clique aqui!</a></label>
			  
              <input class="inputsgeraltxt" id="mascara" name="TxtMascara" type="text" value="">  
			  
			  <label for="valor" class="labeltxtgeral">Valor R$:</label>
              <input class="inputsgeraltxt" id="valor" name="TxtValor" type="text" value="">
			  
			  <label for="descricao" class="labeltxtgeral">Descri&ccedil;&atilde;o:</label>
              <textarea class="inputsgeraltxt" id="descricao" name="TxtDescricao" ></textarea>
			  
			  <input type="submit" value="Cadastrar" id="btn_ok_cadastro_editar" />
            </form>
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
