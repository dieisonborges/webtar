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
          	<h4>&Eacute; necess&aacute;rio entrar no sistema para acessar essa p&aacute;gina!</h4>
            <a href='../../'> Clique aqui para entrar no sistema!</a>
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
