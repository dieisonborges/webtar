<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
  	require('../../dal/dalusuario.php');
	require('../../dal/dalunidades.php');
	
	$unidades = GetVarSESSION('unidades');
	
	$conexao = new Conexao();
    $dalusuario = new Dalusuario($conexao);
	$id = GetGET('id');
    $rs_usuario =  $dalusuario->getPorId($id, $unidades);
    $usuario = mysql_fetch_object($rs_usuario);
	
	$dalunidades = new Dalunidades($conexao);
	$rs_unidades = $dalunidades->getTodos();
	$paginacao = $rs_unidades [1];
	$rs_unidades = $rs_unidades [0];
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body>
<script type="text/javascript">
	function visualizarSenha()
	{
		var senha=document.getElementById('senha');
		alert("A senha é: "+senha.value)
	}	
</script>
<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <?php include('../layouts/menu_top_horizontal.php');?>
      <div class="info"> </div>
      
      <div class="mainpanel">
        <div class="text_">
          <h1>Usu&aacute;rios Cadastrados</h1>          
          <div class="text">
		  <form action="../../scripts/usuario_adm/alterar.php" method="post" enctype="multipart/form-data" name="validate" id="validate">
		  		
		  	  <label for="TxtAtivo" class="labeltxtgeral">Ativo:</label>
			  <table width="182" border="0" align="left" style="float:left; width:100%; margin-bottom:-10px;">
				  <tr>
					<td width="26"><label style="font-size:15px;">SIM</label></td>
					<td width="26"><input <?php if($usuario->ativo==1){echo 'checked="checked"';};?> name="TxtAtivo" type="radio" value="1" style="width:20px; margin-bottom:12px; cursor:pointer;"  /></td>
					<td width="30"><label style="font-size:15px;">NÃO</label></td>
					<td width="28"><input <?php if($usuario->ativo==0){echo 'checked="checked"';};?> name="TxtAtivo" type="radio" value="0" style="width:20px; margin-bottom:12px; cursor:pointer;" /></td>
					<td width="778"></td>
				  </tr>
			  </table>
			  
			  <?php
			  //QUEBRA A STRING (Tudo bem foi gambiarra!!!)
			  $tipoSenha = split(" ", $usuario->tipoSenha);
			  
			  ?>
			  
			  <div id="container_aut_real">
			  		<h4>Autorizado a realizar:</h4>
					<ul>
						<li><label for="TxtLocal" class="labeltxtgeral" >Local</label>
						<input name="TxtLocal" type="checkbox" value="Local" <?php if($tipoSenha[0]=="Local"){echo "checked='checked'";};?>  /></li>					
						<li><label for="TxtCelular" class="labeltxtgeral">Celular</label>
						<input name="TxtCelular" type="checkbox" value="Celular" <?php if($tipoSenha[1]=="Celular"){echo "checked='checked'";};?>/></li>										
						<li><label for="TxtDDD" class="labeltxtgeral">DDD</label>
						<input name="TxtDDD" type="checkbox" value="DDD" <?php if($tipoSenha[2]=="DDD"){echo "checked='checked'";};?>/></li>					
						<li><label for="TxtDDI" class="labeltxtgeral">DDI</label>
						<input name="TxtDDI" type="checkbox" value="DDI" <?php if($tipoSenha[3]=="DDI"){echo "checked='checked'";};?>/></li>					
					</ul>
			  		
			  </div>			   
			   				
			   <label for="TxtCPF" class="labeltxtgeral">CPF (Somente os n&uacute;meros):</label>			   
              <input class="inputsgeraltxt" id="cpf" name="TxtCPF" type="text" value="<?php echo ($usuario->cpf);?>">
			  
			  <label for="unidade" class="labeltxtgeral">Unidade:</label>
			  <select id="unidade" name="TxtUnidade" class="inputsgeraltxt" style="width:80%; float:left;">				  	    		
				  <?php while ($unidades = mysql_fetch_object($rs_unidades)){?>
				  <option value="<?php echo $unidades->id;?>" <?php if(($usuario->tbUnidades_id)==$unidades->id){ echo 'selected="selected"';} ?>> <?php echo ($unidades->sigla);?></option>
				  <?php }?>
			  </select>
			  <a href="../unidades/cadastrar.php" target="_blank" style="float:left; width:100%; margin-bottom:10px;">Clique aqui para cadastrar outra UNIDADE</a><br />
			  
			  <input id="id" name="TxtId" type="hidden" value="<?php echo ($usuario->id);?>">
			  <label for="TxtEmail" class="labeltxtgeral">E-mail:</label>
              <input class="inputsgeraltxt" id="email" name="TxtEmail" type="text" value="<?php echo ($usuario->email);?>">
			  
			  <label for="senha" class="labeltxtgeral">Senha:</label>
              <input class="inputsgeraltxt" id="senha" name="TxtSenha" type="password" value="<?php echo ($usuario->senha);?>">  
			  
			  <label for="confirmaSenha" class="labeltxtgeral">Confirmar Senha:</label>
              <input class="inputsgeraltxt" id="confirmaSenha" name="TxtConfirmaSenha" type="password" value="<?php echo ($usuario->senha);?>">
			  
			  <p class="busca_usuario_senha"><a href="javascript:visualizarSenha()">Visualizar a senha</a></p>       
             
              <label for="nomeCompleto" class="labeltxtgeral">Nome Completo:</label>
              <input class="inputsgeraltxt" id="nomeCompleto" name="TxtNomeCompleto" type="text" value="<?php echo ($usuario->nomeCompleto);?>">
			  
			  <label for="nomeGuerra" class="labeltxtgeral">Nome de Guerra:</label>
              <input class="inputsgeraltxt" id="nomeGuerra" name="TxtNomeGuerra" type="text" value="<?php echo ($usuario->nomeGuerra);?>">
			  
			  <label for="usuario" class="labeltxtgeral">Usuario:</label>
              <input class="inputsgeraltxt" id="usuario" type="text"  name="TxtUsuario" value="<?php echo ($usuario->usuario);?>" >
			  
			  <label for="saram" class="labeltxtgeral">SARAM:</label>
              <input class="inputsgeraltxt" id="saram" name="TxtSaram" type="text" value="<?php echo ($usuario->saram);?>">
			  
			  <label for="identidade" class="labeltxtgeral">Identidade:</label>
              <input class="inputsgeraltxt" id="identidade" name="TxtIdentidade" type="text" value="<?php echo ($usuario->identidade);?>">
			  
			  <label for="telefone" class="labeltxtgeral">Telefone:</label>
              <input class="inputsgeraltxt" id="telefone" name="TxtTelefone" type="text" value="<?php echo ($usuario->telefone);?>">
			  
			  <label for="postoGraduacao" class="labeltxtgeral">Posto ou Graduacao:</label>
			  <select class="select_geral" name="TxtPostoGraduacao"  id="postoGraduacao" >
			  	<option value="" selected="selected">Selecione uma op&ccedil;&atilde;o</option>
			  		<?php include('../layouts/select_posto_graduacao.php');?>	
			  </select>
			  	
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
