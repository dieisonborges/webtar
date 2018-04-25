<?php
		  session_start();
		  require('../../util/seguranca.php');
		  Seguranca::VerificaTarifador();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalusuario.php');
		  require('../../dal/dalunidades.php');
		  
		  $unidades = GetVarSESSION('unidades');
		  
		  $conexao = new Conexao();
		  $dalusuario = new Dalusuario($conexao);
		  $rs_usuario = $dalusuario->getTodosSemAdmSemPag($unidades);
		  
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
  <div style="position:absolute;top:234;left:363"><span class="ft1"><?php echo ($unidades->sigla);?></span></div>
  <div style="position:absolute;top:289;left:303"><span class="ft0">Relat&oacute;rio de Usu&aacute;rios e Senhas</span></div>
  <div style="position:absolute;top:331;left:10"><span class="ft0">
    <table width="860" border="0" class="tb_relatorio_usuario">
      <tr>
        <td width="146"><strong>Posto/Gradua&ccedil;&atilde;o</strong></td>
        <td width="212"><strong>Nome Guerra </strong></td>
        <td width="336"><strong>Nome Completo </strong></td>
        <td width="189"><strong>Senha</strong></td>
      </tr>
	  
	  <?php while ($usuario = mysql_fetch_object($rs_usuario)){?>	  
	  <tr>
        <td><?php echo (GetPOSTO($usuario->postoGraduacao)); ?></td>
        <td><?php echo $usuario->nomeGuerra; ?></td>
        <td><?php echo $usuario->nomeCompleto; ?></td>
        <td><?php echo $usuario->senha; ?></td>
      </tr>
     <?php }?>
	  
      
      
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