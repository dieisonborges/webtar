<?php
	session_start();
	require('../../util/seguranca.php');
	Seguranca::VerificaTarifador();
	
	require('../../funcoes/funcoes.php');
	require('../../configuracoes/conexao.php');
	
	
	$id = GetGET('id');
	
	require('../../dal/dalcontatelefonica.php');
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);		
	$rs_contatelefonica =  $dalcontatelefonica->getPorIdAdm($id);
	$contatelefonica = mysql_fetch_object($rs_contatelefonica);	


	require('../../dal/dalusuario.php');
	$conexao = new Conexao();
    $dalusuario = new Dalusuario($conexao);
    $rs_usuario =  $dalusuario->getPorId($contatelefonica->tbUsuario_id);
    $usuario = mysql_fetch_object($rs_usuario);
	
	$cpf = $usuario->cpf;
	$nomeCompleto = $usuario->nomeCompleto;
	$telefone = $usuario->telefone;
	
	$periodoApuracao = converteDataBarra($contatelefonica->periodoApuracao);
	$codigoReceita = $contatelefonica->codigoReceita;
	$numeroReferencia = $contatelefonica->numeroReferencia;
	$dataVencimento = converteDataBarra($contatelefonica->dataVencimento);
	$valorPrincipal = number_format($contatelefonica->valorPrincipal,2);
	$valorMulta = number_format($contatelefonica->valorMulta,2);
	$valorJurosEncargos = number_format($contatelefonica->valorJurosEncargos,2);
	$valorTotal = number_format($contatelefonica->valorTotal,2);
	
	
	//Verifica se é menor que 10 reais
	if($valorTotal<10)
		{
		header("Location: contas_por_codigo.php");	
		die();	
		}
?>
<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body>
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
<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <?php include('../layouts/menu_top_horizontal.php');?>
      <div class="info"> </div>
      
      <div class="mainpanel_darf">
        <div class="text_">
          <h1>DARF Conta Telef&ocirc;nica</h1>
          <div class="text">
            <a href="javascript:printDiv('darf','500')" class="btn_novo_usuario">IMPRIMIR <img src="../../public/images/printer.png" alt="IMPRIMIR" width="49" height="40" style="margin-top:-8px; margin-left:-3px;" /></a>
				
	<div style="background:#FFFFFF; padding:20px; float:left; display:block; width:94%;" id="darf">
	  <table width="650" bordercolor="#000000" cellspacing="0" bordercolordark="#000000" cellpadding="2" bordercolorlight="#000000" border="1" style="border-collapse: collapse">
		<tr>
		  <td align="center" width="316" rowspan="3"><img src="../../public/images/brasaodarf.gif" alt="darf" width="65" height="76" border="0" align="left" /><b><font size="2" color="#000000" face="Verdana">MINIST&Eacute;RIO DA FAZENDA<br />
			Secretaria da Receita Federal<br />
			</font></b><font color="#000000" face="Arial" size="1">Documento de Arrecada&ccedil;&atilde;o de Receitas Federais</font><b><font size="2" color="#000000" face="Verdana"><br />
			</font><font color="#000000" face="Verdana" size="4">DARF</font></b></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">02 PER&Iacute;ODO DE APURA&Ccedil;&Atilde;O</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b><?php echo $periodoApuracao;?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">03 N&Uacute;MERO DO CPF / CNPJ</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b><?php echo $cpf; ?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">04 C&Oacute;DIGO DA RECEITA</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b><?php echo $codigoReceita; ?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td align="left" width="316" rowspan="2"><font face="arial" size="1">01 NOME / TELEFONE</font><br />
			<font face="tahoma" size="1">&nbsp;<b><?php echo $nomeCompleto; ?></b></font><br />
			<font face="tahoma" size="1">&nbsp;<b><?php echo $telefone; ?></b></font></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">05 N&Uacute;MERO DE REFER&Ecirc;NCIA</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b><?php echo $numeroReferencia; ?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">06 DATA DE VENCIMENTO</a></font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b><?php echo $dataVencimento; ?></b>&nbsp;</td>
		</tr>
		<tr>
		  <td width="316" rowspan="3" align="left"><div class="td_referente_mes"><font><b>Referente aos meses:</b></font><?php
				
		   ?></div></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">07 VALOR DO PRINCIPAL</a></font><br /></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b>R$ <?php echo $valorPrincipal;?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">08 VALOR DA MULTA</font><br /></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b>R$ <?php echo $valorMulta;?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">09 VALOR DOS JUROS E/OU ENCARGOS DL - 1.025/69</font></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b>R$ <?php echo $valorJurosEncargos;?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td width="316" rowspan="2" align="center"><table cellpadding="0" cellspacing="0" border="0">
			  <tr>
				<td align="center"><font face="tahoma" size="1"><b>ATEN&Ccedil;&Atilde;O</b></font></td>
				<td></td>
			  </tr>
			  <tr>
				<td align="center"><p align="justify"><font face="tahoma" size="1">&Eacute; vedado o recolhimento de tributos e contribui&ccedil;&otilde;es administrados pela Secretaria da Receita Federal cujo valor total seja inferior a R$ 10,00. Ocorrendo tal situa&ccedil;&atilde;o, adicione esse valor ao tributo/contribui&ccedil;&atilde;o de mesmo c&oacute;digo de per&iacute;odos subseq&uuml;entes, at&eacute; que o total seja igual ou superior a R$ 10,00.</font></p></td>
			  </tr>
			</table></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">10 VALOR TOTAL</font></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b>R$ <?php echo $valorTotal;?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="3" width="320" align="left" valign="top"><font face="arial" size="1">11 AUTENTICA&Ccedil;&Atilde;O<br />
			</font> <font face="tahoma" size="1">&nbsp;</font><br />
			<font face="tahoma" size="1">&nbsp;</font></td>
		</tr>
	  </table>
	  <table width="650" bordercolor="#000000" cellspacing="0" bordercolordark="#000000" cellpadding="0" bordercolorlight="#000000" border="0" style="border-collapse: collapse">
		<tr>
		  <td align="right"><font face="arial" size="1"><?php echo "C&oacute;d:".$id." - ";?><?php require ('../../views/layouts/nome_do_sistema.php'); ?></font></td>
		</tr>
	  </table>
	  <p>&nbsp;<br />
		&nbsp; <br />
		--------------------------------------------------------------------------------------------------------------------------------<br />
		&nbsp; <br />
		&nbsp;&nbsp;&nbsp; </p>
	  <table width="650" bordercolor="#000000" cellspacing="0" bordercolordark="#000000" cellpadding="2" bordercolorlight="#000000" border="1" style="border-collapse: collapse">
		<tr>
		  <td align="center" width="316" rowspan="3"><img src="../../public/images/brasaodarf.gif" alt="darf" width="65" height="76" border="0" align="left" /><b><font size="2" color="#000000" face="Verdana">MINIST&Eacute;RIO DA FAZENDA<br />
			Secretaria da Receita Federal<br />
			</font></b><font color="#000000" face="Arial" size="1">Documento de Arrecada&ccedil;&atilde;o de Receitas Federais</font><b><font size="2" color="#000000" face="Verdana"><br />
			</font><font color="#000000" face="Verdana" size="4">DARF</font></b></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">02 PER&Iacute;ODO DE APURA&Ccedil;&Atilde;O</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b><?php echo $periodoApuracao;?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">03 N&Uacute;MERO DO CPF / CNPJ</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b> <?php echo $cpf; ?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">04 C&Oacute;DIGO DA RECEITA</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b><?php echo $codigoReceita; ?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td align="left" width="316" rowspan="2"><font face="arial" size="1">01 NOME / TELEFONE</font><br />
			<font face="tahoma" size="1">&nbsp;<b><?php echo $nomeCompleto; ?></b></font><br />
			<font face="tahoma" size="1">&nbsp;<b><?php echo $telefone; ?></b></font></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">05 N&Uacute;MERO DE REFER&Ecirc;NCIA</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b><?php echo $numeroReferencia; ?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">06 DATA DE VENCIMENTO</a></font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b><?php echo $dataVencimento; ?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td width="316" rowspan="3" align="left"><div class="td_referente_mes"><font><b>Referente aos meses:</b></font><?php
				
		   ?></div></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">07 VALOR DO PRINCIPAL</a></font><br /></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b>R$ <?php echo $valorPrincipal;?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">08 VALOR DA MULTA</font><br /></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b>R$ <?php echo $valorMulta;?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">09 VALOR DOS JUROS E/OU ENCARGOS DL - 1.025/69</font></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b>R$ 0,00</b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td width="316" rowspan="2" align="center"><table cellpadding="0" cellspacing="0" border="0">
			  <tr>
				<td align="center"><font face="tahoma" size="1"><b>ATEN&Ccedil;&Atilde;O</b></font></td>
				<td></td>
			  </tr>
			  <tr>
				<td align="center"><p align="justify"><font face="tahoma" size="1">&Eacute; vedado o recolhimento de tributos e contribui&ccedil;&otilde;es administrados pela Secretaria da Receita Federal cujo valor total seja inferior a R$ 10,00. Ocorrendo tal situa&ccedil;&atilde;o, adicione esse valor ao tributo/contribui&ccedil;&atilde;o de mesmo c&oacute;digo de per&iacute;odos subseq&uuml;entes, at&eacute; que o total seja igual ou superior a R$ 10,00.</font></p></td>
			  </tr>
			</table></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">10 VALOR TOTAL</font></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b>R$ <?php echo $valorTotal; ?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="3" width="320" align="left" valign="top"><font face="arial" size="1">11 AUTENTICA&Ccedil;&Atilde;O<br />
			</font> <font face="tahoma" size="1">&nbsp;</font><br />
			<font face="tahoma" size="1">&nbsp;</font></td>
		</tr>
	  </table>
	  <table width="650" bordercolor="#000000" cellspacing="0" bordercolordark="#000000" cellpadding="0" bordercolorlight="#000000" border="0" style="border-collapse: collapse">
		<tr>
		  <td align="right"><font face="arial" size="1"><?php echo "C&oacute;d:".$id." - ";?><?php require ('../../views/layouts/nome_do_sistema.php'); ?></font></td>
		</tr>
	  </table>
	</div>
			<a href="javascript:printDiv('darf','500')" class="btn_novo_usuario">IMPRIMIR <img src="../../public/images/printer.png" alt="IMPRIMIR" width="49" height="40" style="margin-top:-8px; margin-left:-3px;" /></a>
				
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
