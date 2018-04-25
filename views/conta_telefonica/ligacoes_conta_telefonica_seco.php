<?php
		  session_start();
		  require('../../util/seguranca.php');
		  Seguranca::VerificaUsuario();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalusuario.php');
		  require('../../dal/dalcontatelefonica.php');
		  require('../../dal/dalunidades.php');
		  
		  $tbContasTelefonicas_id = GetGET('TxtIdConta');
		  
		  $tbUsuario_id = GetVarSESSION('id');
		  
		  $unidades = GetVarSESSION('unidades');
		  
		  //Busca as ligacoes da CONTA
		  $conexao = new Conexao();
		  $dalcontatelefonica = new Dalcontatelefonica($conexao);
		  $rs_contatelefonica = $dalcontatelefonica->getLigacoesContaTelefonica($tbContasTelefonicas_id, $tbUsuario_id);
		  $conexao->FechaConexao(); 
		  
		  
		  $conexao = new Conexao();
		  $dalcontatelefonica_total = new Dalcontatelefonica($conexao);
		  $rs_contatelefonica_total = $dalcontatelefonica_total->getPorId($tbContasTelefonicas_id, $tbUsuario_id);
		  $contatelefonica_total = mysql_fetch_object($rs_contatelefonica_total);
		  $conexao->FechaConexao(); 
		  
		  
		  $conexao = new Conexao();
    	  $dalunidades = new Dalunidades($conexao);
    	  $rs_unidades =  $dalunidades->getPorId($unidades);
    	  $unidades = mysql_fetch_object($rs_unidades);
    	  
		  
		  
		  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0052)http://www.verypdf.com/ -->
<html>
<head>
<title>pg_0001</title>

<style>
<!-- 
select {font-size:12px;}
A:link {text-decoration: none; color: blue}
A:visited {text-decoration: none; color: purple}
A:active {text-decoration: red}
A:hover {text-decoration: underline; color:red}

-->
</style>

<script type="text/javascript">
	function printDiv(id, pg) {
	var oPrint, oJan;
	oPrint = window.document.getElementById(id).innerHTML;
	oJan = window.open(pg);
	oJan.document.write(oPrint);
	oJan.window.print();
       oJan.document.close();
       oJan.focus();
}
</script>

<script TYPE="text/javascript"> 
<!-- hide 
function killerrors()
{ 
return true; 
} 
window.onerror = killerrors; 
// --> 
</script>


</head>
<body vlink="#FFFFFF" link="#FFFFFF" bgcolor="#ffffff">
<script TYPE="text/javascript">
var currentpos,timer; 
function initialize() 
{ 
timer=setInterval("scrollwindow()",10);
} 
function sc(){
clearInterval(timer); 
}
function scrollwindow() 
{ 
currentpos=document.body.scrollTop; 
window.scroll(0,++currentpos); 
if (currentpos != document.body.scrollTop) 
sc();
} 
document.onmousedown=sc
document.ondblclick=initialize
</script>
<a href="javascript:printDiv('termo','500')" class="btn_novo_usuario">IMPRIMIR <img src="../../public/images/printer.png" alt="IMPRIMIR" width="49" height="40" style="margin-top:-8px; margin-left:-3px;" /></a>
<div id="termo">
  <style type="text/css">
<!--
.ft0{font-style:normal;font-weight:bold;font-size:16px;font-family:Times New Roman;color:#000000;}
.ft1{font-style:normal;font-weight:bold;font-size:15px;font-family:Times New Roman;color:#000000;}
.ft2{font-style:normal;font-weight:normal;font-size:16px;font-family:Times New Roman;color:#000000;}
.ft3{font-style:normal;font-weight:normal;font-size:16px;font-family:Times New Roman;color:#000000;}
.btn_novo_usuario{
	width:170px;
	height:35px;
	background-color:#B2DF37;
	border:3px #CCCCCC solid;
	font-size:18px;
	text-transform:uppercase;
	font-weight:bold;
	text-decoration:none!important;
	padding-top:10px;
	padding-left:20px;
	margin:0 10px 10px 10px;
	position:absolute;
}

#termo{
	position:absolute;
	float:left;
	width:850px;
	height:1100px;
	top:70;
}

.tb_relatorio_usuario td,tr{
	border:1px #999999 solid;
}
-->
</style>
  <div style="position:absolute;top:0;left:0"><img width="826" height="1169" src="../../public/images/fundo_relatorio.jpg" ALT=""></div>
  <div style="position:absolute;top:216;left:289"><span class="ft0">COMANDO DA AERON&Aacute;UTICA</span></div>
  <div style="position:absolute; top:250; width:800px; text-align:center;"><span class="ft1"><?php echo ($unidades->nome);?></span></div>
  <div style="position:absolute;top:289;left:303"><span class="ft0">Conta Telef&ocirc;nica N&uacute;mero <?php echo $tbContasTelefonicas_id ?></span></div>
  <div style="position:absolute;top:331;left:10"><span class="ft0">
  	<table width="747" border="0">
  	<tr>
    <td width="741">Usu&aacute;rio: <strong><?php echo GetVarSESSION('usuario_nome'); ?></strong> - <?php echo GetVarSESSION('usuario'); ?></td>
  	</tr>
    <tr>
    <td>Unidade: <?php echo GetVarSESSION('unidades_nome'); ?> </td>
  	</tr>
	</table>

    <table width="860" border="0" class="tb_relatorio_usuario">
      <tr style="font-size:12px;" >
        <td width="110"><strong>Data/Hora</strong></td>
        <td width="138"><strong>Dura&ccedil;&atilde;o</strong></td>
        <td width="204"><strong>N&uacute;mero de Origem </strong></td>
        <td width="155"><strong>N&uacute;mero de Destino</strong></td>
        <td width="118"><strong>CILCODE</strong></td>
        <td width="118"><strong>Descri&ccedil;&atilde;o</strong></td>
        <td width="109"><strong>Valor R$</strong></td>
      </tr>
	  
	  <?php while ($contatelefonica = mysql_fetch_object($rs_contatelefonica)){?>	  
	  <tr style="font-size:12px;">
        <td><?php echo $contatelefonica->dataLigacao.'  '.$contatelefonica->time; ?></td>
        <td><?php echo $contatelefonica->duracao; ?></td>
        <td><?php echo $contatelefonica->numOrigem; ?></td>
        <td><?php echo $contatelefonica->numDiscado; ?></td>
        <td><?php echo $contatelefonica->cilcode; ?></td>
        <td><?php echo utf8_encode($contatelefonica->descricao); ?></td>
        <td><?php echo $contatelefonica->valor; ?></td>
      </tr>
     <?php }?>
    </table>
    <br><br>
    <table width="375" border="1">
  <tr>
    <td width="206">Data - Hora Gerado</td>
    <td width="153">Valor TOTAL R$</td>

  </tr>
  <tr>
    <td><?php echo $contatelefonica_total->data_hora_gerado; ?></td>
    <td><?php echo number_format($contatelefonica_total->valor,2); ?></td>
  </tr>
</table>

    
  </span></div>
</div>
<script TYPE="text/javascript">
			var currentZoom = parent.ltop.currentZoom;
			if(currentZoom != undefined)
				document.body.style.zoom=currentZoom/100;
			</script>

</body>
</html>