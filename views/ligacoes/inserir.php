<?php
  	session_start();
  	require('../../util/seguranca.php');
  	Seguranca::VerificaAdministrador();
	
	require('../../funcoes/funcoes.php');
  	require('../../configuracoes/conexao.php');
	
	require('../../dal/dalcentraltelefonica.php');
	
	$conexao = new Conexao();
    $dalcentraltelefonica = new DalcentralTelefonica($conexao);
    $rs_centraltelefonica = $dalcentraltelefonica->getTodosSemPag();

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
          <h1>Ferramenta de Inserção de Bilhetes</h1>  
		  <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>        
          <div class="text">
		  <form action="../../scripts/cron_txt_to_mysql/cron_index_coleta_manual.php" method="post" enctype="multipart/form-data">
		  		
				<label for="Central" class="labeltxtgeral">Selecione a Central Telefônica:</label>
				  <select id="Central" name="TxtCentral" class="inputsgeraltxt">					  			  		
					  <?php while ($centraltelefonica = mysql_fetch_object($rs_centraltelefonica)){?>
					  <option value="<?php echo $centraltelefonica->id;?>"><?php echo ($centraltelefonica->sigla);?> - <?php echo ($centraltelefonica->descricao);?></option>
					  <?php }?>
				  </select>
				
				
		  		<label class="labeltxtgeral">Bilhete (MAX 2MB):</label>
				<input type="file" name="arquivo"  class="inputsgeraltxt" />
				<label class="labeltxtgeral"> Formato do Bilhete </label>
				<label class="labeltxtgeral">Data_Hora_Duracao_Tipo_Codigo_TroncoEntrada_TroncoSaida_CanalEntrada_Canal_Saida Numero_Discado_Numero_Origem_Senha_Valor</label>
				<label class="labeltxtgeral">Exemplo: 010112 0930 0005 7     1   8933025                     99999999              5615   1234567 </label>
				
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
