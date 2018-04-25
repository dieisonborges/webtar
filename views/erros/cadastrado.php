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
		  <?php if(GetGET('Operacao')){ ?>
		  <img src="../../public/images/check.png" width="140" height="147" title="cadeado" class="img_erro" />	
		  <?php }else{ ?>
		  <img src="../../public/images/no.jpg" width="140" height="147" title="cadeado" class="img_erro" />	
		  <?php } ?>
          <div class="container_erro">	
		  	<?php if(GetGET('Operacao')){ ?>
			  <div id="login_invalido">
				<h4>cadastro Efetuado com sucesso!</h4>
				<br />
				<p>O seu usuário foi cadastrado com sucesso em nossa base de dados, entre em contato com a sessão de telefonia para que o usuário seja ativado!</p>
				<a href='../../views/meu_usuario/termo_responsabilidade_aberto.php'> Clique aqui e IMPRIMA O Termo de COMPROMISSO e envie à telefonia para liberar o acesso ao sistema!</a>
			  </div>
			  <?php }else{ ?>	
			   <div id="login_invalido">
				<h4>O cadastro n&atilde;o foi efetuado!</h4>
				<br />
				<p>Por Favor entre em contato com a Telefonia para relatar o problema!</p>
			  </div>
			  <?php } ?>  		  	
          	
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
