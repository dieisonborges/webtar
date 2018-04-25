<?php	
	session_start();
	require('../../util/seguranca.php');
  	Seguranca::VerificaLogado();
	require_once('../../funcoes/funcoes.php');
	require_once('../../configuracoes/conexao.php');   

	require('../../dal/dalunidades.php');
	$conexao = new Conexao();
	$dalunidades = new Dalunidades($conexao);
	$rs_unidades = $dalunidades->getTodosSemPag();
	$conexao->FechaConexao();
	
?>
<?php
	
	if(isset($_POST['changeOption']))
	{
		$disabledSubmit = $_POST['disabledSubmit'];
		if($disabledSubmit == 1) $js = 'disabledSubmit:true';
		else $js = 'disabledSubmit:false';
		
		$autoRevert = $_POST['autoRevert'];
		if($autoRevert == 1) $js .= ',autoRevert:true';
		else $js .= ',autoRevert:false';
		
		$autoSubmit = $_POST['autoSubmit'];
		if($autoSubmit == 1) $js .= ',autoSubmit:true';
		else $js .= ',autoSubmit:false';
	}
	else
	{
		$disabledSubmit = 2;
		$autoRevert = 1;
		$autoSubmit = 2;
		$js = 'disabledSubmit:false,autoRevert:true,autoSubmit:false';
	}
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
      <?php include('../layouts/leftpanel_login.php');?>
      <div class="mainpanel_index">
        <div class="text_">
          <h1>LOGIN - Insira seu usu&aacute;rio e senha <a href="../usuario/verificar_cadastro.php" class="link_ajuda">Ou clique aqui para se cadastrar!</a></h1>
          <?php if(GetGET('ErroLogin')){ ?>
          <div id="login_invalido">
          	<h4>Voc&ecirc; digitou algo errado, por favor tente novamente!</h4>
          </div>
          <?php } ?>
		  
			
			<style type="text/css">
				form{margin:30px;width:300px}
				label{float:left;clear:both;width:100px;margin-top:10px}
				select, input{float:left;margin-top:10px}
				label.large{width:150px}
				.clr{clear:both}
				.notice {background-color:#d8e6fc;color:#35517c;border:1px solid #a7c3f0;padding:10px;margin-top:10px;}
				
				.code {
					margin:30px;
					border:1px solid #F0F0F0;
					background-color:#F8F8F8;
					padding:10px;
					color:#777;
				}
			</style>
          <div class="text">
            <form action="../../scripts/login/autentica.php" method="post" class="form_login" id="mc-form">
                <label for="TxtUsuario">Usu&aacute;rio</label>
            	<input type="text" name="TxtUsuario" value="<?php echo GetGET('usuario');?>" />                
                <label for="TxtSenha">Senha</label>
                <input type="password" name="TxtSenha" />
				<label for="unidade" class="labeltxtgeral">Unidade:</label>
			    <select id="unidade" name="TxtUnidade" class="inputsgeraltxt" style="width:100%; float:left;">			  		
				  <?php while ($unidades = mysql_fetch_object($rs_unidades)){?>
				  <option value="<?php echo $unidades->id;?>"> <?php echo ($unidades->sigla);?></option>
				  <?php }?>
			    </select>
				
				<div style="width:100%; float:left; height:100px;">				
					<div class="clr"></div>			
					<div class="QapTcha"></div>
				</div>
				

                <input type="submit" value="Entrar" class="submit_login"  />

            </form>   
			<script type="text/javascript">
				$(document).ready(function(){
					$('.QapTcha').QapTcha({<?php echo $js;?>});
				});
			</script>   
	
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
