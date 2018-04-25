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
          <h1>Palavras do Desenvolvedor! </h1>
          
          <div class="text">
       		<div class="txt_msg_desenvolvedor">
               	<p>Ol&aacute;! <br /><br />
                O <strong><?php require ('../../views/layouts/nome_do_sistema.php'); ?></strong> foi criado para controlar as liga&ccedil;&otilde;es telef&ocirc;nicas de forma bem SIMPLES.<br /><br />

Gostaria muito da colabora&ccedil;&atilde;o de voc&ecirc; usu&aacute;rio do sistema. Quando encontrar algo errado, estranho ou muito complicado, n&atilde;o hesite, envie uma mensagem para o meu e-mail.<br />
<br />
<a href="mailto:dieisoncomix@gmail.com">dieison@ymail.com</a>
<br />
<br />

Muito obrigado!<br />
<br />
           	    	<br />                    
                    <strong>Dieison </strong>S. Borges<br />
                    Desenvolvedor WEB desde 2006<br />
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
