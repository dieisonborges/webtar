<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
	
	require('../../dal/dalunidades.php');	
	require('../../dal/dalusuario.php');
	
	$unidades_id = GetVarSESSION('unidades_real');	
	
	$conexao = new Conexao();
	$dalunidades = new Dalunidades($conexao);
	$rs_unidades = $dalunidades->getUnidadeFilha($unidades_id);

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
          <h1>Alternar para UNIDADE</h1>  
		  <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>        
          <div class="text">
		  	<form action="../../scripts/usuario/alternar_unidade.php" method="post" enctype="multipart/form-data" name="validate" id="validate">
			  <label for="unidade" class="labeltxtgeral">Unidade:</label>
			  <select id="unidade" name="TxtUnidade" class="inputsgeraltxt" style="width:80%; float:left;">			  		
				  <?php while ($unidades = mysql_fetch_object($rs_unidades)){?>
				  <option value="<?php echo $unidades->id;?>"> <?php echo ($unidades->sigla);?></option>
				  <?php }?>
			  </select>
			  
			  <input type="submit" value="Atualizar" id="btn_ok_cadastro_editar" />
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
