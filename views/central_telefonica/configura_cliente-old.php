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
          <h1>Instruções para Configurar o CLIENTE (Coletor)</h1>
          <div class="text">
       				<table width="100%" id="tabela_lista_geral" class="tabela_help">
					<tr class="conteudo_tabela_lista_geral">
                                                <td>

	<pre>						
Procedimentos de Configuração do Coletor do WEBTAR


Procedimento para colocar o I.P. Fixo via terminal
	$sudo nano /etc/network/interfaces
	edite o arquivo com as informações de cada destacamento EX:

	#auto lo
	#iface lo inet loopback
	########################
	#interface eth0
	auto eth0
	iface eth0 inet static
	address 10.112.24.50
	netmask 255.255.252.0
	broadcast 10.112.27.255
	gateway 10.112.27.254
	dns-server 10.112.24.21

	pressione Ctrl + o para salvar
	pressione Ctrl + x para sair

	reinicie o computador

Procedimento para colocar o computador no PROXY do CINDACTA IV

	$sudo nano /etc/apt/apt.conf
	cole o conteúdo abaixo no arquivo
	Acquire::http::Proxy "http://10.112.30.20:3142";
	pressione Ctrl + o para salvar
	pressione Ctrl + x para sair

Procedimento para instalar o SSH
	$sudo apt-get install ssh

Procedimento para editar o nome da máquina:
	$sudo nano /etc/hostname
	Edite o arquivo com o novo nome do computador
	pressione Ctrl + o para salvar
	pressione Ctrl + x para sair
	
	$sudo nano /etc/hostnames
	Edite o arquivo com o novo nome do computador 
	(CUIDADO! Só edite o nome da máquina - Padrão do nome: coletordtceabv )
	pressione Ctrl + o para salvar
	pressione Ctrl + x para sair

Procedimento de rodar o script de configuração
	Faça o download do arquivo de configuracao com o comando abaixo
	$ wget --no-check-certificate https://webtar.cindacta4.intraer/webtar/scripts/shell/instalador_cliente/instalador_cliente
	Faça o download do arquivo de configuracao com o comando abaixo
	$ wget --no-check-certificate https://webtar.cindacta4.intraer/webtar/scripts/shell/instalador_cliente/config_instalador_cliente
	Execute o comando abaixo
	$sudo bash instalador_cliente instalar

Procedimento para editar os araquivos de configuracao
	entrando na pasta
	$cd /home/tarifador/sh-crontab
	editando as configuracaoes do coletor
	$sudo nano configuracoes_do_coletor
		-Edite o I.P. do computador
		-Edite a interface (ttyS0, ttyS1, ttyUSB0 ou ttyUSB1)-É a porta em que está ligada a SERIAL

Procedimento Para adicionar o coletor no WEBTAR
	1 - Abra o WEBTAR e entre como ADMINISTRADOR
	2 - Clique no menu Ferramentas > Gereciar Centrais Telefônicas
	3 - Clique em Nova Central
	4 - Preencha as informações e clique Cadastrar

Procedimento Para adicionar uma unidade não cadstarda no WEBTAR
	1 - Abra o WEBTAR e entre como ADMINISTRADOR
	2 - Clique no menu Ferramentas > Unidades
	3 - Clique em Nova Unidade
	4 - Preencha as informações e clique Cadastrar





	</pre>
					 </td>

                                          </tr>
						
					<tr id="tit_tabela_lista_geral">
                                                <td width="16%"> Configurador Automático do Cliente </td>                                             $
                                          </tr>
                                          <tr class="conteudo_tabela_lista_geral">
                                                <td>
                                                        Execute o Script Abaixo,<br /><br />

                                                <a href="../../scripts/shell/instalador_cliente/instalador_cliente">Clique Aqui Para Baixar o Script "$

                                                        Baixe e edite as configurações,<br /><br />

                                                <a href="../../scripts/shell/instalador_cliente/config_instalador_cliente">Clique Aqui Para Baixar o S$
                                                </td>
                                        </tr>


					  <tr id="tit_tabela_lista_geral">
						<td width="16%"> Configura o Cliente Complemento </td>						
					  </tr>
					  <tr class="conteudo_tabela_lista_geral">
						<td>
						Abaixo o passo a passo para instalação do COLETOR<br /><br /><br />
						
						1 -> Instale o Ubuntu Server no Computador que será utilizado para coletar os dados<br /><br />
						
						2 -> Configure um I.P. FIXO conforme instrução abaixo:<br />
						
						$ sudo mv /etc/network/interfaces /etc/network/interfaces_old<br />
						
						$ sudo nano /etc/network/interfaces<br /><br />		
						
						Copie o conteúdo abaixo para o arquivo:<br /><br />
						
						   auto eth0<br />
						   iface eth0 inet static<br />
						   address 192.168.0.20<br />
						   netmask 255.255.255.0<br />
						   gateway 192.168.0.1<br />
						<br />
						3 -> Copie o Script abaixo e o arquivo de configuração para o COLETOR<br /><br />
						
						<a href="../../scripts/shell/instalador_cliente/instalador_cliente">Clique Aqui Para Baixar o Script "instalador_cliente"</a><br /><br />
						
						<a href="../../scripts/shell/instalador_cliente/config_instalador_cliente">Clique Aqui Para Baixar o Arquivo de configuração "config_instalador_cliente"</a><br /><br />
						
						<br />
						
						4-> Inicialize o SCRIPT<br />
						
						$ sudo bash instalador_cliente<br /><br />
						
						5 -> Configure o arquivo "config_instalador_cliente" de acordo com os dados do coletor<br />
						
						$nano /home/tarifador/script-cron/config_instalador_cliente<br /><br />

						6 -> Adicione esta linha ao rc.local<br />
						
						$sudo nano /home/tarifador/sh-crontab/gera_novo_arquivo_de_ligacoes<br /><br />
						
						#No DAMN SAMLL LINUX use<br />
						$nano /opt/bootlocal.sh<br />
						
						#Adicione esta linha no CRONTAB<br />
						$ crontab -e<br />
						*/5 * * * * bash /home/tarifador/sh-crontab/gera_novo_arquivo_de_ligacoes<br />
						00 * * * * bash /home/tarifador/sh-crontab/limpar_mem_cache<br />
						
						
						
						
						</td>
						
					  </tr>
					  <tr class="conteudo_tabela_lista_geral">
						<td>
						<a href="../../scripts/shell/sh-crontab/gera_novo_arquivo_de_ligacoes">Clique Aqui Para Baixar o Script "gera_novo_arquivo_de_ligacoes"</a><br /><br />
						<a href="../../scripts/shell/sh-crontab/configuracoes_do_coletor">Ou Aqui para Baixar o Script "configuracoes_do_coletor"</a>
						<a href="../../scripts/shell/instalador_cliente/limpar_mem_cache">Ou Aqui para Baixar o Script "limpar_mem_cache"</a>
						
						</td>
						
					  </tr>
					  <tr class="conteudo_tabela_lista_geral">
						<td>
						A coletor da central telefonica devera existir a seguinte estrutura de pastas<br />
						
						<img src="../../public/images/estrutura-de-pastas.jpg" alt="Estrutura" />
						
						</td>
						
					  </tr>
					  <tr class="conteudo_tabela_lista_geral">
						<td>Configure um I.P. Fixo no COLETOR<br /><br />
						<br />
						
   
						</td>
						
					  </tr>
					  
					  
					  
					  
					  
					  <tr class="conteudo_tabela_lista_geral">
						<td>
						REMSERIAL<br /><br />
						Configura Interface eth - Serial<br /><br />						
						
						<a href="../../helpers/remserial-1.4/remserial-1.4-comp.tar.gz">DOWNLOAD DO REMSERIAL</a><br /><br />
						<br />
						#Descompactando
						<br />
						$tar zxf remserial-1.4-comp.tar.gz
						#compilando o remserial
						<br />
						#Adicione esta linha ao rc.local<br />
						$ nano /etc/rc.local<br />
						<br />
						/home/tarifador/sh-crontab/remserial-1.4/remserial -d -p 23000 -s "9600 raw" /dev/ttyS0 &
						
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
