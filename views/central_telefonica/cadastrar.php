<?php
  	session_start();
  	require('../../util/seguranca.php');
	require('../../funcoes/funcoes.php');
	require('../../configuracoes/conexao.php');
  	Seguranca::VerificaAdministrador();
	
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
          <h1>Cadastrar Nova Central Telefonica</h1>          
          <div class="text">
            <form action="../../scripts/central_telefonica/incluir.php" method="post" enctype="multipart/form-data">
			  <label for="unidade" class="labeltxtgeral">Unidade:</label>
			  <select id="unidade" name="TxtUnidade" class="inputsgeraltxt">			  		
				  <?php while ($unidades = mysql_fetch_object($rs_unidades)){?>
				  <option value="<?php echo $unidades->id;?>"> <?php echo ($unidades->sigla);?></option>
				  <?php }?>
			  </select>
			  <a href="../unidades/cadastrar.php" target="_blank" style="float:left; margin-bottom:20px;">Clique aqui para cadastrar outra UNIDADE</a>
			  

			  <label for="ip" class="labeltxtgeral">IP: (127.0.0.1)</label>
              <input class="inputsgeraltxt" id="ip" name="TxtIp" type="text" value="">
			  
			  <label for="mac" class="labeltxtgeral">Mac Address: (00:00:00:00:00:00)</label>
              <input class="inputsgeraltxt" id="mac" name="TxtMac" type="text" value="">  
			  
			  <label for="descricao" class="labeltxtgeral">Descricao:</label>
			  <textarea class="inputsgeraltxt" id="descricao" name="TxtDescricao">
			  </textarea>
            
              <label for="usuarioCentral" class="labeltxtgeral">Usuario Para Acessar A Central Telefonica: (root)</label>
              <input class="inputsgeraltxt" id="usuarioCentral" name="TxtUsuarioCentral" type="text" value="">
			  
			  <label for="senhaCentral" class="labeltxtgeral">Senha Para Acessar A Central Telefonica: (*****)</label>
              <input class="inputsgeraltxt" id="senhaCentral" name="TxtSenhaCentral" type="password" value="">
			  
			  <input type="submit" value="Cadastrar" id="btn_ok_cadastro_editar" />
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
