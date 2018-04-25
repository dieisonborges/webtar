	<?php
		session_start();
		require('../../util/seguranca.php');
		Seguranca::VerificaAutenticacao();
		
		require('../../funcoes/funcoes.php');
		require('../../configuracoes/conexao.php');
		require('../../dal/dalusuario.php');
		require('../../dal/dalligacoes.php');
		
		$ano=GetGET('TxtAno');

		$conexao = new Conexao();
		$dalusuario = new Dalusuario($conexao);
		$id = GetVarSESSION('id');
		$rs_usuario =  $dalusuario->getPorId($id);
		$usuario = mysql_fetch_object($rs_usuario);
		
		$senha=$usuario->senha;
		  
		?>
	
	<div style="background:#FFFFFF; padding:20px; float:left; display:block; width:94%;" id="darf">
	  <table width="650" bordercolor="#000000" cellspacing="0" bordercolordark="#000000" cellpadding="2" bordercolorlight="#000000" border="1" style="border-collapse: collapse">
		<tr>
		  <td align="center" width="316" rowspan="3"><img src="../../public/images/brasaodarf.gif" alt="darf" width="65" height="76" border="0" align="left" /><b><font size="2" color="#000000" face="Verdana">MINIST&Eacute;RIO DA FAZENDA<br />
			Secretaria da Receita Federal<br />
			</font></b><font color="#000000" face="Arial" size="1">Documento de Arrecada&ccedil;&atilde;o de Receitas Federais</font><b><font size="2" color="#000000" face="Verdana"><br />
			</font><font color="#000000" face="Verdana" size="4">DARF</font></b></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">02 PER&Iacute;ODO DE APURA&Ccedil;&Atilde;O</font></font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">03 N&Uacute;MERO DO CPF / CNPJ</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b>091961626/78</b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">04 C&Oacute;DIGO DA RECEITA</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td align="left" width="316" rowspan="2"><font face="arial" size="1">01 NOME / TELEFONE</font><br />
			<font face="tahoma" size="1">&nbsp;<b> </b><br />
			<font face="tahoma" size="1">&nbsp;<b></b></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">05 N&Uacute;MERO DE REFER&Ecirc;NCIA</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b></b>&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">06 DATA DE VENCIMENTO</a></font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b></b>&nbsp;</td>
		</tr>
		<tr>
		  <td width="316" rowspan="3" align="left"><font face="tahoma" size="1"></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">07 VALOR DO PRINCIPAL</a></font><br /></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b> <?php echo ($ligacoes->valor);?></b>&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">08 VALOR DA MULTA</font><br /></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b>0,00</b>&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">09 VALOR DOS JUROS E/OU ENCARGOS DL - 1.025/69</font></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b>0,00</b>&nbsp;</font></td>
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
			<b><?php echo ($ligacoes->valor);?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="3" width="320" align="left" valign="top"><font face="arial" size="1">11 AUTENTICA&Ccedil;&Atilde;O<br />
			</font> <font face="tahoma" size="1">&nbsp;</font><br />
			<font face="tahoma" size="1">&nbsp;</font></td>
		</tr>
	  </table>
	  <table width="650" bordercolor="#000000" cellspacing="0" bordercolordark="#000000" cellpadding="0" bordercolorlight="#000000" border="0" style="border-collapse: collapse">
		<tr>
		  <td align="right"><font face="arial" size="1">CINDACTA IV </font></td>
		</tr>
	  </table>
	  <p>&nbsp;<br />
		&nbsp; <br />
		------------------------------------------------------------------------------------------------------------------------------------<br />
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
			<b></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">03 N&Uacute;MERO DO CPF / CNPJ</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b>000.000.000-00</b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">04 C&Oacute;DIGO DA RECEITA</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td align="left" width="316" rowspan="2"><font face="arial" size="1">01 NOME / TELEFONE</font><br />
			<font face="tahoma" size="1">&nbsp;<b> </b></font><br />
			<font face="tahoma" size="1">&nbsp;<b></b></font></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">05 N&Uacute;MERO DE REFER&Ecirc;NCIA</font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">06 DATA DE VENCIMENTO</a></font><br /></td>
		  <td align="right" width="128"><font face="tahoma" size="1"><br />
			<b></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td width="316" rowspan="3" align="left"><font face="tahoma" size="1"></font></td>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">07 VALOR DO PRINCIPAL</a></font><br /></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b> <?php echo ($ligacoes->valor);?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">08 VALOR DA MULTA</font><br /></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b>0,00</b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="2" align="left" valign="top"><font face="arial" size="1">09 VALOR DOS JUROS E/OU ENCARGOS DL - 1.025/69</font></td>
		  <td width="128" align="right"><font face="tahoma" size="1"><br />
			<b>0,00</b>&nbsp;</font></td>
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
			<b><?php echo ($ligacoes->valor);?></b>&nbsp;</font></td>
		</tr>
		<tr>
		  <td colspan="3" width="320" align="left" valign="top"><font face="arial" size="1">11 AUTENTICA&Ccedil;&Atilde;O<br />
			</font> <font face="tahoma" size="1">&nbsp;</font><br />
			<font face="tahoma" size="1">&nbsp;</font></td>
		</tr>
	  </table>
	  <table width="650" bordercolor="#000000" cellspacing="0" bordercolordark="#000000" cellpadding="0" bordercolorlight="#000000" border="0" style="border-collapse: collapse">
		<tr>
		  <td align="right"><font face="arial" size="1">CINDACTA IV </font></td>
		</tr>
	  </table>
	</div>
