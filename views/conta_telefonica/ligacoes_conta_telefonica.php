<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaUsuario();
  
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
      
      <div class="mainpanel_darf">
        <div class="text_">
          <h1>Conta Telefônica <span style="color:red;"><?php echo GetGET('TxtIdConta'); ?></span> Detalhada - Para Impressão</h1>
          <div class="text">		  
		  	<iframe src="ligacoes_conta_telefonica_seco.php?TxtIdConta=<?php echo GetGET('TxtIdConta'); ?>" frameborder="0" height="500" width="920" id="darf"></iframe>							
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
