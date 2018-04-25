<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaUsuario();
  
  require('../../funcoes/funcoes.php');
  
 
  require('../../scripts/conta_telefonica/gerador_conta_individual.php');
  
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">

<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <?php include('../layouts/menu_top_horizontal.php');?>      
     
      <div class="mainpanel">
        <div class="text_">
          <h1>Teste de GRU</h1>
          <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>
          <div class="text">
		  			<form action="gru.php" method="post" enctype="multipart/form-data">
			  			<label for="TxtValor" class="labeltxtgeral">Insira o Valor da GRU (Ex: 1.523,20):</label>
              			<input class="inputsgeraltxtdata" id="valor" name="TxtValor" type="text" value="00,00">
						<span style="float:left; color:#0C8A3F; font-size:20px; ">R$</span><br />
						<label for="TxtCompetencia" class="labeltxtgeral">Insira o Mês de Referência (Ex: 05/2013):</label>
              			<input class="inputsgeraltxtdata" id="competencia" name="TxtCompetencia" type="text" value="<?php echo date("m/Y"); ?>">

			  	<label for="TxtNReferencia" class="labeltxtgeral">Insira o Número de Referência (Ex: 9288291234):</label>
                                <input class="inputsgeraltxtdata" id="nreferencia" name="TxtNReferencia" type="text" value="">		
			
				<input type="submit" value="GERAR" id="btn_ok_cadastro_editar_data" />
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
