<?php
include('JSON.php');
//include('funcoes_red.php');
$result = array();

if (isset($_FILES['photoupload']) )
{	$file = $_FILES['photoupload']['tmp_name'];
	$error = false;
	$size = @getimagesize($file);
	$extensao = strtolower(end(explode('.', $_FILES['photoupload']['name']))); 
	
	/*$_UP['extensoes'] = array('ovf', 'vmdk');*/
	
	$_UP['extensoes'] = array('*', '*');
	
	
	$tmp_name = $_FILES['photoupload']['tmp_name'];
	$aux_tipo_imagem = $size['mime'];
	//// Definicao de Diretorios /cloque aqui o diretório que vc quer que vá no caso upload/txt 
							
    $diretorio = "upload/".rand();
	mkdir($diretorio);			
	chmod($diretorio, 0777);
          
	move_uploaded_file($_FILES['photoupload']['tmp_name'], $diretorio.'/'.$_FILES['photoupload']['name']);
	chmod($diretorio.'/'.$_FILES['photoupload']['name'], 0777);
                                 
	$addr = gethostbyaddr($_SERVER['REMOTE_ADDR']);
 
	$log = fopen('script.log', 'a');
	fputs($log, ($error ? 'FAILED' : 'SUCCESS') . ' - ' . preg_replace('/^[^.]+/', '***', $addr) . ": {$_FILES['photoupload']['name']} - {$_FILES['photoupload']['size']} byte\n" );
	fclose($log);
 
	if ($error)
	{
		$result['result'] = 'failed';
		$result['error'] = $error;
	}
	else
	{
		$result['result'] = 'success';
		$result['size'] = "Upload feito com Sucesso !!!! Obrigado por nos enviar o arquivo!!<br>";
	}
 
}
else
{
	$result['result'] = 'error';
	$result['error'] = 'Arquivo ausente ou erro interno!';
}
 
if (!headers_sent() )
{
	header('Content-type: application/json');
}
 
echo json_encode($result);

?>
