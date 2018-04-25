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
          <h1>Ajuda </h1>
          
          <div class="text">
       		<div class="txt_msg_desenvolvedor">
               	<p>Manual do Usuário.<br /><br />
				<a href="../../docs/manual/manual-usuario-nivel1.pdf">clique aqui para baixar o manual em PDF</a>
				<br />
				<br />
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
