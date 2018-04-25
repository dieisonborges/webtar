<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaTarifador();
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
  	require('../../dal/dalmsginicial.php');
	
	$unidades = GetVarSESSION('unidades');
	
	$conexao = new Conexao();
    $dalmsginicial = new DalMsgInicial($conexao);
    $rs_mensagem =  $dalmsginicial->getMensagem($unidades);
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
          <h1>Mensagem da P&aacute;gina Inicial</h1>        
		  <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>  
          <div class="text">
            <form action="../../scripts/msg_inicial/msg_inicial.php" method="post" enctype="multipart/form-data" >
			
			  <?php if($rs_mensagem){?>
			  <?php $msg_inicial = mysql_fetch_object($rs_mensagem);?>
			
			  <input id="id" name="TxtId" type="hidden" value="<?php echo ($msg_inicial->id);?>">
			  <?php
				include("../../helpers/fckeditor/fckeditor.php") ;
				$oFCKeditor = new FCKeditor('TxtMsgInicial') ;
				$sBasePath = '../../helpers/fckeditor/' ;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= $msg_inicial->mensagem ;
				$oFCKeditor->Create() ;
			?>
			<?php }else{?>
			<input id="id" name="TxtId" type="hidden" value="0">
			  <?php
				include("../../helpers/fckeditor/fckeditor.php") ;
				$oFCKeditor = new FCKeditor('TxtMsgInicial') ;
				$sBasePath = '../../helpers/fckeditor/' ;
				$oFCKeditor->BasePath	= $sBasePath ;
				$oFCKeditor->Value		= "" ;
				$oFCKeditor->Create() ;
			?>
			<?php }?>
			
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
