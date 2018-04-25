<?php
	session_start();
	require('../../util/seguranca.php');
	Seguranca::VerificaUsuario();
	
	require('../../funcoes/funcoes.php');
	require('../../configuracoes/conexao.php');
	
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
          <h1>Termo de Responsabilidade</h1>
          <div class="text">		  
		  	<iframe src="termo_responsabilidade_seco.php" frameborder="0" height="1300" width="900" id="darf"></iframe>							
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
