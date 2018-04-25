<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaUsuario();
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
  	require('../../dal/dalusuario.php');
	
	$unidades = GetVarSESSION('unidades_real');
	$id = GetVarSESSION('id');
	
	$conexao = new Conexao();
    $dalusuario = new Dalusuario($conexao);	
    $rs_usuario =  $dalusuario->getPorId($id, $unidades);
    $usuario = mysql_fetch_object($rs_usuario);
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
          <h1>Meu Perfil</h1> 
		  <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>         
          <div class="text">
		  <form action="../../scripts/meu_usuario/alterar.php" method="post" enctype="multipart/form-data" name="validate" id="validate">
		  	  
			  
			  <input id="id" name="TxtId" type="hidden" value="<?php echo ($usuario->id);?>">
			  <label for="TxtEmail" class="labeltxtgeral">E-mail:</label>
              <input class="inputsgeraltxt" id="email" name="TxtEmail" type="text" value="<?php echo ($usuario->email);?>">
			  
			   <label for="telefone" class="labeltxtgeral">Telefone:</label>
              <input class="inputsgeraltxt" id="telefone" name="TxtTelefone" type="text" value="<?php echo ($usuario->telefone);?>">
			  
			   <label for="postoGraduacao" class="labeltxtgeral">Posto ou Graduacao:</label>
			  <select class="select_geral" name="TxtPostoGraduacao"  id="postoGraduacao" >
			  	<option value="" selected="selected">Selecione uma op&ccedil;&atilde;o</option>
			  		<?php include('../layouts/select_posto_graduacao.php');?>	
			  </select>	
              
              <label for="TxtCPF" class="labeltxtgeral">CPF (Somente os n&uacute;meros):</label>
              <input class="inputsgeraltxt" id="cpf" name="TxtCPF" type="text" value="<?php echo ($usuario->cpf);?>"  disabled="disabled" />
             
              <label for="nomeCompleto" class="labeltxtgeral">Nome Completo: <span class="not_edit">Campo n&atilde;o edit&aacute;vel</span></label>
              <input class="inputsgeraltxt" id="nomeCompleto" name="" type="text" value="<?php echo ($usuario->nomeCompleto);?>" disabled="disabled">
			  
			  <label for="nomeGuerra" class="labeltxtgeral">Nome de Guerra: <span class="not_edit">Campo n&atilde;o edit&aacute;vel</span></label>
              <input class="inputsgeraltxt" id="nomeGuerra" name="" type="text" value="<?php echo ($usuario->nomeGuerra);?>" disabled="disabled">
			  
			  <label for="usuario" class="labeltxtgeral">Usuario: <span class="not_edit">Campo n&atilde;o edit&aacute;vel</span></label>
              <input class="inputsgeraltxt" id="usuario" type="text"  name="" value="<?php echo ($usuario->usuario);?>" disabled="disabled">
			  
			  <label for="saram" class="labeltxtgeral">SARAM: <span class="not_edit">Campo n&atilde;o edit&aacute;vel</span></label>
              <input class="inputsgeraltxt" id="saram" name="" type="text" value="<?php echo ($usuario->saram);?>" disabled="disabled">
			  
			  <label for="identidade" class="labeltxtgeral">Identidade: <span class="not_edit">Campo n&atilde;o edit&aacute;vel</span></label>
              <input class="inputsgeraltxt" id="identidade" name="" type="text" value="<?php echo ($usuario->identidade);?>" disabled="disabled">
              <label for="postoGraduacao" class="labeltxtgeral">Perfil <span class="not_edit">Campo n&atilde;o edit&aacute;vel</span></label>
			  <select class="select_geral" name="" id="tbPermissoes_id" disabled="disabled">
			 		<?php 
					switch($usuario->tbPermissoes_id)
			  		{
			  		case 1:
						echo '<option selected="selected" value="0">Usuario</option>';
						break;
					case 2:
						echo '<option selected="selected" value="0">Tarifador</option>';
						break;
					case 3:
						echo '<option selected="selected" value="0" disabled="disabled">Administrador</option>';
						break;				
					}
					?>					
			  </select>
			  <input type="submit" value="Atualizar" id="btn_ok_cadastro_editar" />
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
