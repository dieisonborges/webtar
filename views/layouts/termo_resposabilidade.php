<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" href="../../public/images/favicon.ico" type="image/x-icon">
<title><?php require ('../../views/layouts/nome_do_sistema.php'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
<!-- 
select {font-size:12px;}
A:link {text-decoration: none; color: blue}
A:visited {text-decoration: none; color: purple}
A:active {text-decoration: red}
A:hover {text-decoration: underline; color:red}
-->
</style>
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
.ft0{font-style:normal;font-weight:normal;font-size:16px;font-family:Times New Roman;color:#000000;text-transform:uppercase;}
.ft1{font-style:normal;font-weight:bold;font-size:19px;font-family:Times New Roman;color:#000000;}
.ft2{font-style:normal;font-weight:normal;font-size:15px;font-family:Times New Roman;color:#000000;}
.ft3{font-style:normal;font-weight:normal;font-size:11px;font-family:Times New Roman;color:#000000;}
.ft4{font-style:normal;font-weight:normal;font-size:12px;font-family:Times New Roman;color:#000000;}
.ft5{font-style:normal;font-weight:bold;font-size:20px;font-family:Times New Roman;color:#000000; text-align:center; width:590px; float:left;}
.ft6{font-style:normal;font-weight:normal;font-size:12px;font-family:Times New Roman;color:#000000; float:left;}
.ft7{font-style:normal;font-weight:normal;font-size:20px;font-family:Times New Roman;color:#000000; font-weight:bold;}
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

.ft_centro{
	ont-style:normal;
	font-weight:normal;
	font-size:15px;
	font-family:Times New Roman;
	color:#000000;
	text-align:justify;
	width:720px;
	float:left;
}

-->
</style>


  <div style="position:absolute;top:0;left:0;"><img width="850" height="1100" src="../../public/images/termo_responsabilidade.jpg" alt="termo" /></div>
  <div style="position:absolute;top:166;left:339"><span class="ft0">MINIST&Eacute;RIO DA DEFESA</span></div>
  <div style="position:absolute;top:184;left:316"><span class="ft0">COMANDO DA AERON&Aacute;UTICA</span></div>
  <div style="position:absolute; width:900px; text-align:center; top:203;"><span class="ft0"><?php echo ($usuario->unidade);?></span></div>
  <div style="position:absolute;top:238;left:280"><span class="ft1">TERMO DE RESPONSABILIDADE</span></div>
  <div style="position:absolute;top:290;left:130"></div>
  <div style="position:absolute;top:302;left:320"><span class="ft3"> </span></div>
  <!--<div style="position:absolute;top:302;left:332"><span class="ft3">( Grad/Posto, Nome Completo sem abrevia&ccedil;&otilde;es )</span></div>-->
  
  <div style="position:absolute;top:320;left:80; text-align:justify"><span class="ft_centro">
  
  Eu, <strong><?php echo GetPOSTO($usuario->postoGraduacao);?> <?php echo ($usuario->nomeCompleto);?></strong> portador   da   c&eacute;dula   de   IDENTIDADE   n&deg; <strong><?php echo ($usuario->identidade);?></strong> ,   CPF   n&deg; <strong><?php echo ($usuario->cpf);?></strong> ,   SARAM n&deg; <strong><?php echo ($usuario->saram);?></strong> do efetivo do <strong><?php echo ($usuario->sigla);?></strong>, solicita o cadastro junto a Se&ccedil;&atilde;o de Sistemas Telef&ocirc;nicos de uma senha para realiza&ccedil;&atilde;o de liga&ccedil;&otilde;es do tipo: <strong><?php echo ($usuario->tipoSenha);?></strong>  ( Tipo :local, Celular, DDD, DDI). Declaro estar ciente que esta
senha &eacute; sigilosa, pessoal e intransfer&iacute;vel, comprometendo-me a responder em todas as
inst&acirc;ncias   devidas   pelas   consequ&ecirc;ncias   decorrentes   das   a&ccedil;&otilde;es   ou   omiss&otilde;es   que   possam   p&ocirc;r   em   risco   ou
comprometer a exclusividade de conhecimento da senha. Estou ciente, tamb&eacute;m, de que deverei prestar conta das liga&ccedil;&otilde;es particulares ao Gestor de Telecomunica&ccedil;&otilde;es at&eacute; o &uacute;ltimo dia &uacute;til do m&ecirc;s subsequente, a fim de cumprir o previsto no <strong>paragrafo h do item 4.7 da  ICA 174-1/2007</strong>.

</span></div>
    
  
  
  
  <div style="position:absolute;top:495;left:80"><span class="ft2">Telefone do usu&aacute;rio:<span class="ft7"> <?php echo ($usuario->telefone);?> </span>.</span></div>
  <div style="position:absolute;top:525;left:80"><span class="ft2">e-mail intraer do usu&aacute;rio :<span class="ft7"> <?php echo ($usuario->email);?> </span>.</span></div>
  <div style="position:absolute;top:555;left:80"><span class="ft2">Nome de Guerra: <span class="ft7">  <?php echo ($usuario->nomeGuerra);?></span>  </span></div>
  <div style="position:absolute;top:585;left:80"><span class="ft2">Senha Telef&ocirc;nica de 6(seis) d&iacute;gitos (apenas num&eacute;rico): <span class="ft7"> <?php echo ($usuario->senha);?> </span>.</span></div>
  <div style="position:absolute;top:615;left:80"><span class="ft2">* CILCODE Principal: <span class="ft7"> <?php echo ($usuario->cilcode);?> </span>.</span></div>
  <div style="position:absolute;top:645;left:80"><span class="ft2">* CILCODE Secund&aacute;rio: <span class="ft7"> <?php echo ($usuario->cilcode_2);?> </span>.</span></div>
  <div style="position:absolute;top:675;left:80"><span class="ft2">* FUNCIONAL: <span class="ft7"> <?php echo ($usuario->funcional);?> </span>.</span></div>
  
  
  <div style="position:absolute;top:713;left:460"><span class="ft2"><strong><?php echo ($usuario->cidade);?></strong>,<span class="ft7"> <?php echo date("d");?> </span>de <span class="ft7"> <?php echo ConverteMES(date("m"));?> </span> de <span class="ft7"> <?php echo date("Y");?> </span></span></div>
  <div style="position:absolute;top:761;left:461"><span class="ft2">______________________________________________</span></div>
  <div style="position:absolute;top:778;left:610"><span class="ft2"> Assinatura </span></div>
  <div style="position:absolute;top:795;left:715"><span class="ft0"> </span></div>
  <div style="position:absolute;top:848;left:80"><span class="ft2">(</span></div>
  <div style="position:absolute;top:851;left:85"><span class="ft4">Para senhas de Graduados,  ou Acesso  DDI. )</span></div>
  <div style="position:absolute;top:865;left:80"><span class="ft2">Autorizado por :</span></div>
  <div style="position:absolute;top:933;left:80"><span class="ft2">___________________________________________</span></div>
  <div style="position:absolute;top:950;left:179"><span class="ft2"> Assinatura  / Carimbo </span></div>
</div>


<script TYPE="text/javascript">
			var currentZoom = parent.ltop.currentZoom;
			if(currentZoom != undefined)
				document.body.style.zoom=currentZoom/100;
			</script>
</body>
</html>
