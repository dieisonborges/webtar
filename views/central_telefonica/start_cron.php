<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaAdministrador();
  require('../../funcoes/funcoes.php');
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body onLoad="pesquisa(1)">
<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <?php include('../layouts/menu_top_horizontal.php');?>      
      <div class="info"> </div>      
      <div class="mainpanel">
        <div class="text_">
          <h1>Ferramentas</h1>
		  <?php if(GetGET('Operacao')){ ?>
          <div id="login_invalido">
          	<h4>Opera&ccedil;&atilde;o realizada com sucesso!</h4>
          </div>
          <?php } ?>
          <div class="text">
       				<table width="100%" id="tabela_lista_geral" class="tabela_help">
					  
					  <tr class="conteudo_tabela_lista_geral">
						<td> 
						<strong style="color:red;">CUIDADO! CRONTAB. Força rotinas programadas!</strong><br /><br />
						Testar CRON Coleta Dados<br /><br />						
						
						<a href="../../scripts/cron_txt_to_mysql/cron_index_coleta.php">START CRON COLETA</a><br /><br />
						
						<!--Testar CRON Gera Conta Telefonica<br /><br />						
						
						<a href="../../scripts/cron_txt_to_mysql/cron_index_gera_conta.php">START CRON CONTA</a><br /><br />
                        -->
						Testar CRON PROCESSA BILHETE<br /><br />						
						
						<a href="../../scripts/cron_txt_to_mysql/cron_index_processa.php">START CRON PROCESSA BILHETE</a><br /><br />
						
						

						Remover todas as tentivas dos usuários<br /><br />						
						
						<a href="../../scripts/usuario/remove_tentativas.php">REMOVER TENTATIVAS</a><br /><br />

						</td>
						
					  </tr>
					</table>
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
