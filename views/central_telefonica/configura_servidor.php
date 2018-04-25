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
          <h1>Instruções para Configurar o SERVIDOR</h1>
          <div class="text">
       				<table width="100%" id="tabela_lista_geral" class="tabela_help">
					  
					  <tr id="tit_tabela_lista_geral">
						<td width="16%"> Configura o Servidor </td>						
					  </tr>
					  <tr class="conteudo_tabela_lista_geral">
						<td>
						#Adicione esta linha no CRONTAB que fara a coleta dos dados nas centrais todo dia a<br />
						#cada 5 minutos<br /><br />
						$ crontab -e<br /><br />
						*/5 * * * * wget -c http://127.0.0.1/webtar/scripts/cron_txt_to_mysql/cron_index_coleta.php -O /var/www/dt/webtar/docs/log.html
<br /><br />
						ou caso congestione o servidor: äs 06:30 ...<br /><br />
						30 06,12,15,18,00 * * * wget -c http://127.0.0.1/webtar/scripts/cron_txt_to_mysql/cron_index_coleta.php -O /var/www/webtar/docs/log.html<br /><br />
						e para gerar os logs<br /><br />
00 02 * * * bash /var/www/webtar/scripts/shell/gerador_logs_servidor/gera_log_coleta
						<br /><br />

						#Adicione esta linha no CRONTAB que gerara um log das coletas de dados todos os dia às 02 horas<br /><br />
						$ crontab -e<br /><br />
						00 02 * * * bash /var/www/dt/webtar/scripts/shell/gerador_logs_servidor/gera_log_coleta
<br /><br />
						<!--#E esta Linha Para gerar a conta Telefonica Todo dia Primeiro as 03:00 horas<br />
						00 03 01 * * wget http://sistemas.cindacta4.intraer/webtar/scripts/cron_txt_to_mysql/cron_index_gera_conta.php<br /><br /><br />--><br />
						Configure nos arquivos abaixo, o caminho completo do Diretório do SERVIDOR:<br />
						-----------------------------------------------<br />
						Linha(): $local_dir="/var/www/webtar/aaa-atual/sistema/private/comprovantes/";<br />
						Arquivo: /scripts/conta_telefonica/comprovante.php<br />
						-----------------------------------------------<br />
						Linha(): $local_dir="/var/www/webtar/aaa-atual/sistema/private/ligacoes_para_processar/";<br />
						Linha(): $local_dir_bkp="/var/www/webtar/aaa-atual/sistema/private/ligacoes/";<br />
						Arquivo: /scripts/cron_txt_to_mysql/cron_index_coleta_manual.php<br />
						-----------------------------------------------	<br />					
						Linha(): $local_dir="/var/www/webtar/aaa-atual/sistema/private/ligacoes_para_processar/";<br /> 
						Linha(): $local_dir_bkp="/var/www/webtar/aaa-atual/sistema/private/ligacoes/";<br />
						Arquivo: /scripts/cron_txt_to_mysql/cron_index_coleta.php<br />
						-----------------------------------------------	<br />	
						
						

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
