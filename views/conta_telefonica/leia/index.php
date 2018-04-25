<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaUsuario();
  require('../../funcoes/funcoes.php');
  
  
  $ano_inicial=GetGET('TxtAnoInicial');
  if($ano_inicial=='')
  	$ano_inicial=2011;
	
  $ano_final=GetGET('TxtAnoFinal');
  if($ano_final=='')
  	$ano_final=date("Y");
 
  
  //$ano_inicial=2011;
  //$ano_final=2011;
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">
<script type="text/javascript">
	function darf(id, ano, mes)
	{
		window.location='darf.php?id='+id+'&mes='+mes+'&ano='+ano;
	}
	function detalhes(ano, mes)
	{	
		window.location='detalhes.php?TxtMesAno='+mes+'%2F'+ano;;
	}
	function justificar(ano, mes)
	{		
		window.location='../minhas_ligacoes/minhas_ligacoes_sem_justificativa_por_mes.php?TxtMesAno='+mes+'%2F'+ano;
	}
	function pesquisa(pag)
	{
		url="listagem_index.php?TxtAnoInicial=<?php echo $ano_inicial; ?>&TxtAnoFinal=<?php echo $ano_final; ?>&_pagi_pg="+pag;
		ajax(url);
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
          <h1>Conta Telef&ocirc;nica  </h1>
		   <?php if(GetGET('Operacao')==5){ ?>
          <div id="login_invalido">
          	<h4>Selecione algum DARF! &Eacute; s&oacute; marcar do lado direito da lista!</h4>
          </div>
		  <?php }elseif(GetGET('Operacao')==6){ ?>
          <div id="login_invalido">
          	<h4>O DARF precisa ter mais de 10 reais!</h4>
          </div>
		   <?php }elseif(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>
		 
          <div class="text">
		  		<form action="index.php" method="get" enctype="multipart/form-data">
					<label for="TxtAnoInicial" class="labeltxtgeral">Se você quiser, coloque um período: (de 2011 até <?php echo date("Y");?>)</label>
              		<label class="labelano">DE</label><input class="inputsgeraltxtdata" id="ano_inicial" name="TxtAnoInicial" type="text" value="<?php echo $ano_inicial; ?>">
					<label class="labelano">ATÉ</label><input class="inputsgeraltxtdata" id="ano_final" name="TxtAnoFinal" type="text" value="<?php echo $ano_final; ?>">
			  		<input type="submit" value="BUSCAR" id="btn_ok_cadastro_editar_data" />
				</form>
                <form action="darf_uniao.php" method="post">
                <input type="submit" value="GERAR UNIÃO DE DARF" class="btn_unir_darfs" />
				<div id="pagina"></div>
				<input type="submit" value="GERAR UNIÃO DE DARF" class="btn_unir_darfs" />
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
