<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaUsuario();
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
  	require('../../dal/dalligacoes.php');
	
	$id_usuario=GetVarSESSION('id');
	
	$unidades = GetVarSESSION('unidades');
	
	$conexao = new Conexao();
    $dalligacoes = new Dalligacoes($conexao);
	$id = GetGET('id');
    $rs_ligacoes =  $dalligacoes->getPorIdMinhasLigacoes($id, $id_usuario, $unidades);
    $ligacoes = mysql_fetch_object($rs_ligacoes);
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
          <h1>Liga&ccedil;&atilde;o</h1>          
          <div class="text">
		  <form action="justificar.php" method="get" enctype="multipart/form-data">
		  	  <input id="id" name="id" type="hidden" value="<?php echo ($ligacoes->id);?>">
 			  <input type="submit" value="Justificar" id="btn_ok_cadastro_editar" style="float:left;" />
		  </form>
		  	<input type="submit" id="btn_ver_detalhes" onClick="javascript:fadeIn('inf_adicionais_ligacoes', 0.1)" value="Ver  Mais Detalhes?" />
		  <?php include('../layouts/form_exibe_detalhes_ligacao.php'); ?>
			
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
