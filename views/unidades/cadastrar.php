<?php
  	session_start();
  	require('../../util/seguranca.php');
	require('../../funcoes/funcoes.php');
  	Seguranca::VerificaAdministrador();
	
  	require('../../configuracoes/conexao.php');
  	require('../../dal/dalunidades.php');
	
	$conexao = new Conexao();
	$dalunidades = new Dalunidades($conexao);
	$rs_unidades_mae = $dalunidades->getTodosSemPag();
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
          <h1>Cadastrar Nova Unidade</h1>          
          <div class="text">
            <form action="../../scripts/unidades/incluir.php" method="post" enctype="multipart/form-data">
			  <label for="nome" class="labeltxtgeral">Nome:</label>
              <input class="inputsgeraltxt" id="nome" name="TxtNome" type="text" value="" >
			  
			  <label for="sigla" class="labeltxtgeral">SIGLA:</label>
              <input class="inputsgeraltxt" id="sigla" name="TxtSigla" type="text" value="" >
			  
			  <label for="unidade_mae" class="labeltxtgeral">Unidade M&atilde;e (Para Tarifa&ccedil;&atilde;o):</label>
			  <select class="inputsgeraltxt" id="unidade_mae" name="TxtUnidadeMae" type="text">
			  <option value=" " selected="selected">Nenhuma</option>
			  <?php while ($unidades_mae = mysql_fetch_object($rs_unidades_mae)){?>
              		<option value="<?php echo ($unidades_mae->id);?>"><?php echo ($unidades_mae->id);?> - <?php echo ($unidades_mae->sigla);?></option>
			  <?php }?>
			  
			  </select>
			
			  <label for="cidade" class="labeltxtgeral">Cidade:</label>
              <input class="inputsgeraltxt" id="cidade" name="TxtCidade" type="text" value="">
			  
			  <label for="estado" class="labeltxtgeral">Estado:</label>
			  <select class="inputsgeraltxt" id="estado" name="TxtEstado">				
				<option value="AC">AC</option>
				<option value="AL">AL</option>
				<option value="AP">AP</option>
				<option value="AM">AM</option>
				<option value="BA">BA</option>
				<option value="CE">CE</option>
				<option value="DF">DF</option>
				<option value="ES">ES</option>
				<option value="GO">GO</option>
				<option value="MA">MA</option>
				<option value="MT">MT</option>
				<option value="MS">MS</option>
				<option value="MG">MG</option>
				<option value="PA">PA</option>
				<option value="PB">PB</option>
				<option value="PR">PR</option>
				<option value="PE">PE</option>
				<option value="PI">PI</option>
				<option value="RR">RR</option>
				<option value="RO">RO</option>
				<option value="RJ">RJ</option>
				<option value="RN">RN</option>
				<option value="RS">RS</option>
				<option value="SC">SC</option>
				<option value="SP">SP</option>
				<option value="SE">SE</option>
				<option value="TO">TO</option>
			  </select>	
			  
			  <label for="ug" class="labeltxtgeral">Unidade Gestora (GRU):</label>
              <input class="inputsgeraltxt" id="ug" name="TxtUG" type="text" value="">
			  
			  <label for="gestao" class="labeltxtgeral">Gestão (GRU):</label>
              <input class="inputsgeraltxt" id="ug" name="TxtGESTAO" type="text" value="">
			  
			  <label for="nomeunidade" class="labeltxtgeral">Nome da Unidade (GRU):</label>
              <input class="inputsgeraltxt" id="nomeunidade" name="TxtNUNIDADE" type="text" value="">
			  
			  <label for="codrecolhimento" class="labeltxtgeral">Código de Recolhimento (GRU):</label>
              <input class="inputsgeraltxt" id="codrecolhimento" name="TxtCRECOLHIMENTO" type="text" value="">
			  		  
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
