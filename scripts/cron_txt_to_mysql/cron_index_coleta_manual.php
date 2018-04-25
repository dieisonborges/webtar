<?php
//UPLOAD Do BILHETE
session_start();
require('../../util/seguranca.php');
Seguranca::VerificaTarifador();

require('../../funcoes/funcoes.php');
require('../../configuracoes/conexao.php');

// DAL
require('../../dal/dalligacoes.php');
require('../../dal/daltarifas.php');
require('../../dal/dalusuario.php');
require('../../dal/dalcentraltelefonica.php');
require('../../dal/dalunidades.php');


$id=GetPOST('TxtCentral');


$conexao = new Conexao();
$dalcentraltelefonica = new DalcentralTelefonica($conexao);
$rs_centraltelefonica = $dalcentraltelefonica->getPorId($id);

$centraltelefonica = mysql_fetch_object($rs_centraltelefonica);

$ip_bilhete=$centraltelefonica->ip;
$host_bilhete=$centraltelefonica->host;



/* Path do Sistema*/
require('../../configuracoes/path.php');
$local_dir=path_system()."private/ligacoes_para_processar/"; 
$local_dir_bkp=path_system()."private/ligacoes/";

/* Seleção de Central Telefônica */
require('../../configuracoes/config_central.php');


// Busca no banco as tarifas para processar os bilhetes
require('funcao_seleciona_tarifa.php');

// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = $local_dir;

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

// Array com as extensões permitidas
$_UP['extensoes'] = array('txt');

// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = true;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
exit; // Para a execução do script
}

// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar

// Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
echo "Por favor, envie arquivos com a seguinte extensão: TXT";
}

// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
}

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
//$nome_final = time().'.txt';

$nome_final = "IP-".$ip_bilhete."-HOST-".$host_bilhete."-000000-000000".".txt";
} else {
// Mantém o nome original do arquivo
$nome_final = $_FILES['arquivo']['name'];
}

// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
echo "Upload efetuado com sucesso!";
echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
} else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
echo "Não foi possível enviar o arquivo, tente novamente";
}

}

?>



<?php


	 //define o caminho do diretÃ³rio
    $dir = $local_dir;
    //listar arquivos
    $files = glob($dir."/*") or die("<br /><br />Erro ao acessar ou Não existe nenhum arquivo no diretório: ".$dir."<br /><br />");
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
			//require('separa_e_armazena_no_banco.php');
			
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

	echo "Operacao Concluida! <br />";	
	
	
	
	//header("Location:../../views/ligacoes/inserir.php?Operacao=1");
?>
