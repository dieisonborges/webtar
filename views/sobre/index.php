<?php
  	session_start();  		
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
      <?php include('../layouts/leftpanel_menu_icones.php');?>
      <div class="mainpanel_index">
        <div class="text_">
          <h1>Sobre </h1>
          
          <div class="text">
       		<div class="txt_msg_desenvolvedor">
               	<p>O <strong><?php require ('../../views/layouts/nome_do_sistema.php'); ?></strong> foi criado para controlar as liga&ccedil;&otilde;es telef&ocirc;nicas de forma bem SIMPLES, sem Burocracia, sem perda tempo.<br />
<br />
Toda e qualquer sugest&atilde;o para simplificar o sistema ser&aacute; bem vinda!.<br />
              </p>
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
