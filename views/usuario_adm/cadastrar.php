<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();
	
	require('../../configuracoes/conexao.php');
	require('../../funcoes/funcoes.php');
	
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
          <h1>Cadastro Para Novos Usuários de Telefone</h1>          
          <div class="text">
            <form action="../../scripts/usuario_adm/incluir.php" method="post" enctype="multipart/form-data" name="validate" id="validate">  
			  
			  <label for="TxtCPF" class="labeltxtgeral">CPF (Somente os n&uacute;meros):</label>
              <input class="inputsgeraltxt" id="cpf" name="TxtCPF" type="text" value="">
			  
			  <label for="unidade" class="labeltxtgeral">Unidade:</label>
			  <select id="unidade" name="TxtUnidade" class="inputsgeraltxt" style="width:80%; float:left;">			  		
				  <?php while ($unidades = mysql_fetch_object($rs_unidades)){?>
				  <option value="<?php echo $unidades->id;?>"> <?php echo ($unidades->sigla);?></option>
				  <?php }?>
			  </select>
			  
			  <label for="TxtEmail" class="labeltxtgeral">E-mail:</label>
              <input class="inputsgeraltxt" id="email" name="TxtEmail" type="text" value="">		              
             
              <label for="nomeCompleto" class="labeltxtgeral">Nome Completo:</label>
              <input class="inputsgeraltxt" id="nomeCompleto" name="TxtNomeCompleto" type="text" value="">
			  
			  <label for="nomeGuerra" class="labeltxtgeral">Nome de Guerra:</label>
              <input class="inputsgeraltxt" id="nomeGuerra" name="TxtNomeGuerra" type="text" value="">
			  
			  <label for="usuario" class="labeltxtgeral">Usuario:</label>
              <input class="inputsgeraltxt" id="usuario" type="text" value="O usu&aacute;rio ser&aacute; criado automaticamente! Nome de guerra mais iniciais!" disabled="disabled" >
			  
			  <label for="saram" class="labeltxtgeral">SARAM ou N de Ordem:</label>
              <input class="inputsgeraltxt" id="saram" name="TxtSaram" type="text" value="">
			  
			  <label for="identidade" class="labeltxtgeral">Identidade:</label>
              <input class="inputsgeraltxt" id="identidade" name="TxtIdentidade" type="text" value="">
			  
			  <label for="telefone" class="labeltxtgeral">Telefone:</label>
              <input class="inputsgeraltxt" id="telefone" name="TxtTelefone" type="text" value="">
			  
			  <label for="postoGraduacao" class="labeltxtgeral">Perfil</label>
			  <select class="select_geral" name="TxtPermissoes" id="tbPermissoes_id">
			 		<option value="" selected="selected">Selecione uma op&ccedil;&atilde;o</option>
			  		<?php
					switch($usuario->tbPermissoes_id)
			  		{
			  		case 1:
						echo '<option selected="selected" value="1">Usuario</option>';
						break;
					case 2:
						echo '<option selected="selected" value="2">Tarifador</option>';
						break;
					case 3:
						echo '<option selected="selected" value="3">Administrador</option>';
						break;
					}
				?>
				<option value="1">Usuario</option>
                <option value="2">Tarifador</option>
				<option value="3">Administrador</option>
			  </select>
			  	
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
