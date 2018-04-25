<?php
  	session_start();
  	require('../../util/seguranca.php');
	require('../../funcoes/funcoes.php');
	require('../../configuracoes/conexao.php');
	
	require('../../dal/dalunidades.php');
	$conexao = new Conexao();
	$dalunidades = new Dalunidades($conexao);
	$rs_unidades = $dalunidades->getTodos();
	$paginacao = $rs_unidades [1];
	$rs_unidades = $rs_unidades [0];
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
          <h1>Cadastro Para Usuários de Telefone</h1>          
          <div class="text">
            <form action="../../scripts/usuario/verificar_cadastro.php" method="post" enctype="multipart/form-data" name="validate" id="validate">  
			  
			  <label for="TxtCPF" class="labeltxtgeral">Por Favor Insira o seu CPF (Somente os n&uacute;meros):</label>
              <input class="inputsgeraltxt" id="cpf" name="TxtCPF" type="text" value="" >
              
              <label for="TxtCILCODE" class="labeltxtgeral">Você já tem <strong>CILCODE</strong> ou <strong>SENHA</strong> Telefônica?</label>
              
              
              <label for="TxtCILCODE" class="labeltxtgeral">SIM <input type="radio" value="Y" name="TxtCILCODE" class="input_cad_cilcode" /></label>
              
              <label for="TxtCILCODE" class="labeltxtgeral">NÃO <input type="radio" value="N" name="TxtCILCODE" class="input_cad_cilcode" /></label>
              
              
			  
			  
			  	
              <input type="submit" value="Continuar" id="btn_ok_cadastro_editar" style="margin-top:30px;" />
            </form>
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
