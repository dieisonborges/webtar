<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaUsuario();
	
	
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
  	require('../../dal/dalmsginicial.php');
	
	$unidades = GetVarSESSION('unidades_real');
	
	$conexao = new Conexao();
    $dalmsginicial = new DalMsgInicial($conexao);
    $rs_mensagem =  $dalmsginicial->getMensagem($unidades);
    $msg_inicial = mysql_fetch_object($rs_mensagem);
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
        <div class="text_home">
          <h1><?php require ('../../views/layouts/nome_do_sistema.php'); ?></h1>
          <div class="text">
		  		<div class="txt_msg_home">
					<?php echo $msg_inicial->mensagem ?>
				</div> 				
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
