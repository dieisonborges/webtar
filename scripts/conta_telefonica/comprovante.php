<?php
//UPLOAD Do BILHETE
session_start();
require('../../util/seguranca.php');
Seguranca::VerificaUsuario();

require('../../funcoes/funcoes.php');
require('../../configuracoes/conexao.php');

// DAL
require('../../dal/dalcontatelefonica.php');

/* PATH do Sistema */
require('../../configuracoes/path.php');
$local_dir=path_system()."private/comprovantes/"; 

$tbUsuario_id = GetVarSESSION('id');

$tbGRU_id=GetPOST('TxtGRU');


// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = $local_dir;

// Tamanho m�ximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

// Array com as extens�es permitidas
$_UP['extensoes'] = array('jpeg','pdf');

// Renomeia o arquivo? (Se true, o arquivo ser� salvo como .jpg e um nome �nico)
$_UP['renomeia'] = true;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'N�o houve erro';
$_UP['erros'][1] = 'O arquivo no upload � maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'N�o foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
die("N�o foi poss�vel fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
exit; // Para a execu��o do script
}

// Caso script chegue a esse ponto, n�o houve erro com o upload e o PHP pode continuar

// Faz a verifica��o da extens�o do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
echo "<script type='text/javascript'> alert('Por favor, envie arquivos com a seguinte extens�o: JPEG ou PDF!'); </script>";
}

// Faz a verifica��o do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "<script type='text/javascript'> alert('O arquivo enviado � muito grande, envie arquivos de at� 2Mb.'); </script>";
}

// O arquivo passou em todas as verifica��es, hora de tentar mov�-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extens�o .jpg
//$nome_final = time().'.txt';

$nome_final = md5(mt_rand(1,100000)).".".$extensao;

} else {
// Mant�m o nome original do arquivo
$nome_final = $_FILES['arquivo']['name'];
}

// Depois verifica se � poss�vel mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
echo "<script type='text/javascript'> alert('Opera��o efetuada com sucesso!'); </script>";
//echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';

//Exclui Arquivo Anterior
$conexao = new Conexao();
$dalcontatelefonica = new Dalcontatelefonica($conexao);
$rs_contatelefonica_gru =  $dalcontatelefonica->getComprovantePorGRU($tbGRU_id, $tbUsuario_id);
$contatelefonica_gru = mysql_fetch_object($rs_contatelefonica_gru);	
$conexao->FechaConexao();

//echo $contatelefonica->arquivo;

if(isset($contatelefonica_gru->id))
	{	
	unlink($local_dir.$contatelefonica_gru->arquivo);
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);
	//echo "ALTERA --- "."$contatelefonica_gru->id, $tbUsuario_id, $nome_final";
	$dalcontatelefonica->alteraComprovante($contatelefonica_gru->id, $tbUsuario_id, $nome_final);
	$conexao->FechaConexao();
	}
	
else
	{
	//Inseri o novo Arquivo
	
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);
	$dalcontatelefonica->incluirComprovante($tbUsuario_id, $nome_final, $tbGRU_id);
	$conexao->FechaConexao();
	}

} else {
// N�o foi poss�vel fazer o upload, provavelmente a pasta est� incorreta
echo "<script type='text/javascript'> alert('N�o foi poss�vel enviar o arquivo, tente novamente'); </script>";
}

}

//header("Location:../../views/conta_telefonica/contas_devendo.php?Operacao=1");


echo '<script language= "JavaScript">location.href="../../views/conta_telefonica/contas_devendo.php?Operacao=1";</script>';


?>


