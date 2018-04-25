<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaUsuario();
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
	
	// DAL
	require('../../dal/dalcontatelefonica.php');
	$tbUsuario_id = GetVarSESSION('id');
	
	$tbGRU_id=GetGET('TxtGRU');
	
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);	
	$rs_contatelefonica =  $dalcontatelefonica->getComprovantePorGRU($tbGRU_id, $tbUsuario_id);
	$contatelefonica = mysql_fetch_object($rs_contatelefonica);
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
          <h1>Enviar Comprovante de Pagamento</h1>  
		  <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>        
          <div class="text">
		  
		  <?php 
		  if($contatelefonica)
		  {
		  ?>
		  	<div id="login_invalido">
          		<h4>Aten&ccedil;&atilde;o!! J&aacute; existe um comprovante cadastrado!</h4>
          	</div>
			<label class="labeltxtgeral" style="margin-top:30px; margin-bottom:30px;">
			Caso você prossiga, o sistema irá substituir o arquivo!
			</label>
		  	<label class="labeltxtgeral" style="margin-bottom:30px;">
			<a href="../../private/comprovantes/<?php echo $contatelefonica->arquivo; ?>" target="_blank">Clique Aqui Para Visualizar o Comprovante Existente!</a>
			</label>
		  <?php
		  }
		  ?>
		  
		  <form action="../../scripts/conta_telefonica/comprovante.php" method="post" enctype="multipart/form-data">
		  		<input type="hidden" name="TxtGRU" value="<?php echo GetGET('TxtGRU'); ?>" />
		  		<br /><br />	
				<label class="labeltxtgeral">Novo Comprovante de Pagamento (FORMATO: JPEG ou PDF - TAMANHO MAX 2MB):</label>
				<br /><br />
				<input type="file" name="arquivo"  class="inputsgeraltxt" accept="application/pdf , image/jpeg" />
				
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
