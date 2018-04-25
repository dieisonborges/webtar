<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaUsuario();
  
  require('../../funcoes/funcoes.php');
  require('../../configuracoes/conexao.php');
  require('../../dal/dalligacoes.php');		  
  require('../../dal/dalusuario.php');
  
  $unidades = GetVarSESSION('unidades_real');
  $id = GetVarSESSION('id');
  
  $conexao = new Conexao();
  $dalligacoes = new Dalligacoes($conexao);
  $rs_ligacoes = $dalligacoes->getPorUsuarioSemClassificacao($id, $unidades);
  $conexao->FechaConexao();
  
?>

<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">
<script type="text/javascript">
	
	function detalhes(id)
	{
		window.location='detalhes.php?id='+id;
	}
	
</script>

<script type="application/javascript" src="../../public/js/check-box.js"></script>
<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <?php include('../layouts/menu_top_horizontal.php');?>      
      <div class="info"> </div>
      
      <div class="mainpanel">
        <div class="text_">
          <h1>Liga&ccedil;&otilde;es Telef&ocirc;nicas N&atilde;o Classificadas  </h1>
          <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>
          <div class="text">		  			
					
                    <?php require("../layouts/listagem_padrao_minhas_ligacoes_classificacao.php");	?>
                    
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
