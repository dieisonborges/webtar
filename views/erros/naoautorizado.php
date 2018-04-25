<?php require_once('../../funcoes/funcoes.php');?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body>
<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <div class="info"> </div>
      <div class="mainpanel">
        <div class="text_">
            <h1>ATENÇÃO!</h1>
		  <img src="../../public/images/erro.png" width="140" height="147" title="cadeado" class="img_erro" />	
          <div class="container_erro">		  		  	
          	<h4>Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar este conte&uacute;do!</h4><br /><br />
            <a href='../../'> Clique aqui para tentar entrar no sistema!</a>
          </div>
                    
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
