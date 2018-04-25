<?php
  	session_start();
  	require('../../util/seguranca.php');
	require('../../funcoes/funcoes.php');
  	Seguranca::VerificaAdministrador();
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
          <h1>Cadastrar Novo Usu&aacute;rio</h1>          
          <div class="text">
            <form action="../../scripts/usuario/incluir_interno.php" method="post" enctype="multipart/form-data" name="validate" id="validate">
			  <label for="TxtEmail" class="labeltxtgeral">E-mail:</label>
              <input class="inputsgeraltxt" id="email" name="TxtEmail" type="text" value="">
			  
			  <label for="senha" class="labeltxtgeral">Senha:</label>
              <input class="inputsgeraltxt" id="senha" name="TxtSenha" type="password" value="">  
			  
			  <label for="confirmaSenha" class="labeltxtgeral">Confirmar Senha:</label>
              <input class="inputsgeraltxt" id="confirmaSenha" name="TxtConfirmaSenha" type="password" value="">            
             
              <label for="nomeCompleto" class="labeltxtgeral">Nome Completo:</label>
              <input class="inputsgeraltxt" id="nomeCompleto" name="TxtNomeCompleto" type="text" value="">
			  
			  <label for="nomeGuerra" class="labeltxtgeral">Nome de Guerra:</label>
              <input class="inputsgeraltxt" id="nomeGuerra" name="TxtNomeGuerra" type="text" value="">
			  
			  <label for="usuario" class="labeltxtgeral">Usuario:</label>
              <input class="inputsgeraltxt" id="usuario" type="text" value="O usu&aacute;rio ser&aacute; criado automaticamente! Nome de guerra mais iniciais!" disabled="disabled" >
			  
			  <label for="saram" class="labeltxtgeral">SARAM:</label>
              <input class="inputsgeraltxt" id="saram" name="TxtSaram" type="text" value="">
			  
			  <label for="identidade" class="labeltxtgeral">Identidade:</label>
              <input class="inputsgeraltxt" id="identidade" name="TxtIdentidade" type="text" value="">
			  
			  <label for="telefone" class="labeltxtgeral">Telefone:</label>
              <input class="inputsgeraltxt" id="telefone" name="TxtTelefone" type="text" value="">
			  
			  <label for="postoGraduacao" class="labeltxtgeral">Posto ou Graduacao:</label>
			  <select class="select_geral" name="TxtPostoGraduacao"  id="postoGraduacao" >
			  	<option value="" selected="selected">Selecione uma op&ccedil;&atilde;o</option>
			  		<?php include('../layouts/select_posto_graduacao.php');?>	
			  </select>
			  	
              <label for="postoGraduacao" class="labeltxtgeral">Perfil</label>
			  <select class="select_geral" name="TxtPermissoes" id="tbPermissoes_id">
			 		<option value="" selected="selected">Selecione uma op&ccedil;&atilde;o</option>
			  		<?php include('../layouts/select_permissoes.php');?>
			  </select>
			  
              <!--<input name="BtnGravar" type="submit" value="Atualizar" id="btn_ok_cadastro_editar" /> -->
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
