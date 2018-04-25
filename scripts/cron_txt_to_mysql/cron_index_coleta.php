<?php
// Criado com o trabalho �rduo de Dieison da Silva Borges

// Se voc� est� lendo isso deve ser porque deu pau em alguma coisa
// Se precisar me mande um e-mail para dieisoncomix@gmail.com

/*
	Adicionado dia 06 de junho de 2012
	No final deste script ele tamb�m faz a aprova��o automatica das justificativas
*/


/*
DATA: 22/01/2012
ESTE SCRIPT PEGA OS ARQUIVOS DO DIRETORIO
/home/tarifador/ligacoes_para_enviar/
DOS CLIENTES E ARMAZENA NO BANCO DE
DADOS MYSQL.
*/

/* 
OBS: ESTE SCRIPT REMOVE ALGUNS LIXOS
QUE N�O FAZEM PARTE DA TARIFA, EXEMPLO: 2R.
OBSERVANDO QUE SOMENTE ALGUNS.
*/

/*

Configure no CRON para rodar a cada 2 horas

*/

/* Nota do programador: 
******************************************************************************************************
Para executar este script � necess�rio que esteja instaldo e habilitado 
a BIBLIOTECA do PHP libssh2-php que est� dispon�vel no reposit�rio do UBUNTU. 
Abaixo o comando:
$sudo apt-get install libssh2-php.
****************************************************************************************************** 
*/


/* Cuidado!!!!, �ltima chance! hehehe! */

/* Aprovacao Automatica de Justificativas */	
//require('aprovacao_automatica_justificativas.php');

/* Verifica quem esta executando o script */
//require('../../util/seguranca.php');
//Seguranca::VerificaCentral();

/* DIRETORIO DE ARQUIVOS .txt (Bilhetes) DO SERVIDOR */

/* Servidor do CINDACTA IV */
//$local_dir="/var/www/dt/webtar/private/ligacoes_para_processar/"; 
//$local_dir_bkp="/var/www/dt/webtar/private/ligacoes/";

/* PARA TESTES LOCAIS */
//$local_dir="/home/SOFTWARES/WEBSERVER/FAB/WEBTAR/webtar/sistema/private/ligacoes_para_processar/"; 
//$local_dir_bkp="/home/SOFTWARES/WEBSERVER/FAB/WEBTAR/webtar/sistema/private/ligacoes/"; 

/* Path do Sistema*/
require('../../configuracoes/path.php');
$local_dir=path_system()."private/ligacoes_para_processar/"; 
$local_dir_bkp=path_system()."private/ligacoes/";

/* Sele��o de Central Telef�nica */
require('../../configuracoes/config_central.php');

/* FUNCOES */
require('../../funcoes/funcoes.php');

// CONEXAO COM O MYSQL
require('../../configuracoes/conexao.php');	

// DAL
require('../../dal/dalligacoes.php');
require('../../dal/daltarifas.php');
require('../../dal/dalusuario.php');
require('../../dal/dalcentraltelefonica.php');
require('../../dal/dalunidades.php');


// Busca no banco as tarifas para processar os bilhetes
require('funcao_seleciona_tarifa.php');

//Essa funcao copia a pasta ligacoes_para_enviar dos clientes conectados as centrais
require('copia_txt_dos_clientes.php');
	
	 //define o caminho do diretório
    $dir = $local_dir;
    //listar arquivos
    $files = glob($dir."/*") or die("<br /><br />Erro ao acessar ou N�o existe nenhum arquivo no diret�rio: ".$dir."<br /><br />");
    //permorre a lista
    foreach($files as $file) {
        if (!is_dir($file)){	
			//separa o nome do arquivo da URL		
			$file_exp = explode("/", $file);
			$file_exp = array_reverse($file_exp, false);
			$file_exp = $file_exp[0];
			//Faz o back up do arquivo
			copy($file, $local_dir_bkp.$file_exp);
			
			
			/* ******************** INSERINDO NO MYSQL *********************************** */
			
			$caminho_arquivo=$file;
			// INSERE QUEBRA DE LINHA NOS LIXOS GERADOS PELA PORTA SERIAL
			// ASSIM O SISTEMA IRA DESCARTAR OS LIXOS
			// require('verifica_caracter_especial.php');
			
			
			//SEPARA TXT E ARMAZENA NO BANCO DE DADOS
			
			if($CentralTelefonicaATIVADA==1)
				{
				// MD 110
				echo ('MD110 <br />');
				require('separa_e_armazena_no_banco_md_110.php');
				}
			
			if($CentralTelefonicaATIVADA==2)
				{
				// Lucent
				echo ('Lucent <br />');
				require('separa_e_armazena_no_banco.php');
				}
			
			/* ******************** FIM INSERINDO NO MYSQL *********************************** */			
			
			
			$delete = unlink ($file); // remove
			echo $delete;
			if($delete){
			 echo "<br />O ".$file_exp." foi processado!<br />";
			}			
			
		}
	}		
	
	
	/* *************************************************************************************** */
	//Se vc habilitar esta opcao � provavel que fique lenta a insercao dos dados
	//FILTRA E EXCLUI dataLigacao='0000-00-00' and valor='0'
	
	
	$conexao = new Conexao();
	$dalligacoes = new Dalligacoes($conexao);
	$dalligacoes->excluirNulos();
	$conexao->FechaConexao();
	
	
	/* *************************************************************************************** */
	
	
	echo "Operacao Concluida! <br />";	
	
	
	

?>
