<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaTarifador();
  
  require('../../funcoes/funcoes.php');
  
  // CONEXAO COM O MYSQL
  require('../../configuracoes/conexao.php');	
	
  // DAL
  require('../../dal/dalligacoes.php');
  require('../../dal/daltarifas.php');
  require('../../dal/dalusuario.php');
  require('../../dal/dalunidades.php');
  require('../../dal/dalcentraltelefonica.php');
  
  // Busca no banco as tarifas para processar os bilhetes
  require('../../scripts/cron_txt_to_mysql/funcao_seleciona_tarifa.php');
  
  $unidades = GetVarSESSION('unidades');
?>

<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">

<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <?php include('../layouts/menu_top_horizontal.php');?>      
      <div class="info"> </div>
      
      <div class="mainpanel">
        <div class="text_">
          <h1>Testar M&aacute;scaras Cadastrados</h1>
          
          
          <div class="text">
		  
		   <form action="test_mask.php" method="get" enctype="multipart/form-data">          	
			  <label for="TxtNTel" class="labeltxtgeral">Digite um n&uacute;mero telef&ocirc;nico:</label>
              <input class="inputsgeraltxt" id="ntel" name="TxtNTel" type="text" value="<?php echo GetGET('TxtNTel'); ?>">
			  
			  <label for="TxtSec" class="labeltxtgeral">Digite o tempo em <strong>segundos</strong>:</label>
              <input class="inputsgeraltxt" id="sec" name="TxtSec" type="text" value="<?php echo GetGET('TxtSec'); ?>">  
			                          
              <input type="submit" value="Verificar" id="btn_ok_cadastro_editar" />
            </form>
			
		  <?php
		  
		  $numDiscado=GetGET('TxtNTel');
		  $duracao_temp=GetGET('TxtSec');
		  
		  
		    if(($numDiscado)and($duracao_temp))
			{
				if($duracao_temp>3)
				{
					if($duracao_temp<=30)
						{
						$duracao_temp=0.5;
						}
					else
						{
						$duracao_temp=$duracao_temp/60;
						}
				
					$valor=getPrecoTarifa($numDiscado, $unidades);
					$valor=$valor*$duracao_temp;
				}
				else
				{
					$valor=0;
				}		  

		  
			  echo "
			  <div id='login_invalido'>
				<h4>Opera&ccedil;&atilde;o realizada com sucesso!<br />
				O valor gerado &eacute;: R$ <strong>$valor</strong></h4>
			  </div>";
          
		  }
		  ?>
			
       				
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
