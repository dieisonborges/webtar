<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
  	require('../../dal/dalcentraltelefonica.php');
	
	$conexao = new Conexao();
    $dalcentraltelefonica = new DalcentralTelefonica($conexao);
	$id = GetGET('id');
    $rs_centraltelefonica = $dalcentraltelefonica->getPorId($id);
    $centraltelefonica = mysql_fetch_object($rs_centraltelefonica);
	$conexao->FechaConexao();
	
	
	require('../../dal/dalunidades.php');
	$conexao = new Conexao();
	$dalunidades = new Dalunidades($conexao);
	$rs_unidades = $dalunidades->getTodos();
	$paginacao = $rs_unidades [1];
	$rs_unidades = $rs_unidades [0];
	$conexao->FechaConexao();
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
          <h1>Coletores Cadastrados</h1>          
          <div class="text">
		  <form action="../../scripts/central_telefonica/alterar.php" method="post" enctype="multipart/form-data">
		  	  <input id="id" name="TxtId" type="hidden" value="<?php echo ($centraltelefonica->id);?>">

			<label for="TxtAtivo" class="labeltxtgeral" style="padding-left:10px;">Ativo:</label>
                       </br>   <table width="182" border="0" align="left" style="float:left; ">
                                  <tr>
                                        <td width="26"><label style="font-size:15px;">SIM</label></td>
                       <td width="26"><input <?php if($centraltelefonica->status==1){echo 'checked="checked"';};?> name="TxtAtivo" type="radio" value="1"/></td>
                                    <td width="30"><label style="font-size:15px;">NÃO</label></td>
                       <td width="28"><input <?php if($centraltelefonica->status==0){echo 'checked="checked"';};?> name="TxtAtivo" type="radio" value="0"/></td>
                              <td width="778"></td>
                                  </tr>
                          </table>



			  <label for="unidade" class="labeltxtgeral">Unidade:</label>
			  <select id="unidade" name="TxtUnidade" class="inputsgeraltxt">
			  	  <option selected="selected" value="<?php echo ($centraltelefonica->id);?>"><?php echo ($centraltelefonica->unidade);?></option>			  		
				  <?php while ($unidades = mysql_fetch_object($rs_unidades)){?>
				  <option value="<?php echo $unidades->id;?>"> <?php echo ($unidades->sigla);?></option>
				  <?php }?>
			  </select>
			  <a href="../unidades/cadastrar.php" target="_blank" style="float:left; margin-bottom:20px;">Clique aqui para cadastrar outra UNIDADE</a>



			  <label for="ip" class="labeltxtgeral">IP: (127.0.0.1)</label>
              <input class="inputsgeraltxt" id="ip" name="TxtIp" type="text" value="<?php echo ($centraltelefonica->ip);?>" />
			  
			  <label for="mac" class="labeltxtgeral">Mac Address: (00:00:00:00:00:00)</label>
              <input class="inputsgeraltxt" id="mac" name="TxtMac" type="text" value="<?php echo ($centraltelefonica->macAddress);?>" /> 
			  
			  <label for="descricao" class="labeltxtgeral">Descricao:</label>
			  <input class="inputsgeraltxt" id="descricao" name="TxtDescricao" value="<?php echo ($centraltelefonica->descricao);?>" />
            
              <label for="usuarioCentral" class="labeltxtgeral">Usuario Para Acessar A Central Telefonica: (root)</label>
              <input class="inputsgeraltxt" id="usuarioCentral" name="TxtUsuarioCentral" type="text" value="<?php echo ($centraltelefonica->usuarioCentral);?>" />
			  
			  <label for="senhaCentral" class="labeltxtgeral">Senha Para Acessar A Central Telefonica: (*****)</label>
              <input class="inputsgeraltxt" id="senhaCentral" name="TxtSenhaCentral" type="password" value="<?php echo ($centraltelefonica->senhaCentral);?>" />
	

			  
			  <input type="submit" value="Alterar" id="btn_ok_cadastro_editar" />
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
