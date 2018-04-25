<?php
	session_start();
	require('../../util/seguranca.php');
	Seguranca::VerificaUsuario();
	
	require('../../funcoes/funcoes.php');
	require('../../configuracoes/conexao.php');
	require('../../dal/dalusuario.php');
	require('../../dal/dalligacoes.php');
	
	
	$total=GetPOST('TxtTotal');
	
	for($i=1;$i<=$total;$i++)
		{
		$data=GetPOST('TxtData'.$i);
			if($data)
				$existe_dados=true;
		}
	
	
	if(!$existe_dados)
		{
			header("Location: index.php?Operacao=5");	
		 	die();
		}
	
	$conexao = new Conexao();
	$dalusuario = new Dalusuario($conexao);
	$id = GetVarSESSION('id');
	$rs_usuario =  $dalusuario->getPorId($id);
	$usuario = mysql_fetch_object($rs_usuario);
	
	$cpf=$usuario->cpf;
	$nomeCompleto=$usuario->nomeCompleto;
	$telefone=$usuario->telefone;
	$senha=$usuario->senha;
	
	$numeroReferencia="0000";
	$codReceita="0000";
	$valor=0;
	$primeiro_dia="ENTRA";
	$contador_de_meses_a_pagar=0;
	
	$mes=0;
	$mes_temp=0;
	$ano=0;
	$ano_temp=0;
	$valor_total=0;
		
	for($i=1;$i<=$total;$i++)
		{
			$data=GetPOST('TxtData'.$i);
			if($data)
				{			
				$data_temp=explode("/", $data);
				$mes=str_pad($data_temp[0], 2, "0", STR_PAD_LEFT);
				$ano=$data_temp[1];
				
				$conexao = new Conexao();
				$dalligacoes = new Dalligacoes($conexao);
				$rs_ligacoes = $dalligacoes->getContaTelefonicaPorSenha($senha, $ano, $mes);
				$ligacoes = mysql_fetch_object($rs_ligacoes);
				
				$referente_aos_meses[$contador_de_meses_a_pagar]="$mes/$ano - R$".number_format($ligacoes->valor,2);
				
				$valor=$valor+($ligacoes->valor);				
				
				$ultimoDia=cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
				
				if(($mes>$mes_temp)and($ano>=$ano_temp))
					{
					$vencimento="$ultimoDia/$mes/$ano";
					}
					
				$mes_temp=$mes;				
				$ano_temp=$ano;
				
				if($primeiro_dia=="ENTRA")
					{
					$periodoApuracao="01/$mes/$ano";
					$primeiro_dia="SAI";
					}
				$valor_total=$valor_total+$ligacoes->valor;	
				$contador_de_meses_a_pagar++;				
				}
			
		}
		
		$valor=number_format($valor,2);
		
		//Verifica se é menor que 10 reais
		if($valor<10)
		{
		header("Location: ../../views/conta_telefonica/index.php?Operacao=6");	
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
          <div class="text"> <a href="javascript:printDiv('darf','500')" class="btn_novo_usuario">IMPRIMIR <img src="../../public/images/printer.png" alt="IMPRIMIR" width="49" height="40" style="margin-top:-8px; margin-left:-3px;" /></a>
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
                          <b><?php echo $codReceita; ?></b>&nbsp;</font></td>
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
                    <td colspan="2" align="left" valign="top"><font face="arial" size="1">06 DATA DE VENCIMENTO</font><br /></td>
                    <td align="right" width="128"><font face="tahoma" size="1"><br />
                          <b><?php echo $vencimento; ?></b>&nbsp;</font></td>
                  </tr>
                  <tr>
                    <td width="316" rowspan="3" align="left">
					<font face="tahoma" size="1"><b>Referente aos meses:<br /><?php

								for($i=0;$i<$contador_de_meses_a_pagar;$i++)
									{
										echo $referente_aos_meses[$i];
										echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
									}														
																							
					?>
					</b>
					</font>
																							
					</td>
                    <td colspan="2" align="left" valign="top"><font face="arial" size="1">07 VALOR DO PRINCIPAL</font><br /></td>
                    <td width="128" align="right"><font face="tahoma" size="1"><br />
                          <b>R$ <?php echo $valor;?></b>&nbsp;</font></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" valign="top"><font face="arial" size="1">08 VALOR DA MULTA</font><br /></td>
                    <td width="128" align="right"><font face="tahoma" size="1"><br />
                          <b>R$ 0,00</b>&nbsp;</font></td>
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
                          <b>R$ <?php echo $valor;?></b>&nbsp;</font></td>
                  </tr>
                  <tr>
                    <td colspan="3" width="320" align="left" valign="top"><font face="arial" size="1">11 AUTENTICA&Ccedil;&Atilde;O<br />
                      </font> <font face="tahoma" size="1">&nbsp;</font><br />
                      <font face="tahoma" size="1">&nbsp;</font></td>
                  </tr>
                </table>
                <table width="650" bordercolor="#000000" cellspacing="0" bordercolordark="#000000" cellpadding="0" bordercolorlight="#000000" border="0" style="border-collapse: collapse">
                  <tr>
                    <td align="right"><font face="arial" size="1">CINDACTA IV - ISON Beta V1.0 </font></td>
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
                          <b><?php echo $codReceita; ?></b>&nbsp;</font></td>
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
                    <td colspan="2" align="left" valign="top"><font face="arial" size="1">06 DATA DE VENCIMENTO</font><br /></td>
                    <td align="right" width="128"><font face="tahoma" size="1"><br />
                          <b><?php echo $vencimento; ?></b>&nbsp;</font></td>
                  </tr>
                  <tr>
                    <td width="316" rowspan="3" align="left"><font face="tahoma" size="1"><b>Referente aos meses:<br /><?php 
								for($i=0;$i<$contador_de_meses_a_pagar;$i++)
									{
										echo $referente_aos_meses[$i];
										echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
									}
																							?></b></font></td>
                    <td colspan="2" align="left" valign="top"><font face="arial" size="1">07 VALOR DO PRINCIPAL</font><br /></td>
                    <td width="128" align="right"><font face="tahoma" size="1"><br />
                          <b>R$ <?php echo $valor;?></b>&nbsp;</font></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" valign="top"><font face="arial" size="1">08 VALOR DA MULTA</font><br /></td>
                    <td width="128" align="right"><font face="tahoma" size="1"><br />
                          <b>R$ 0,00</b>&nbsp;</font></td>
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
                          <b>R$ <?php echo $valor;?></b>&nbsp;</font></td>
                  </tr>
                  <tr>
                    <td colspan="3" width="320" align="left" valign="top"><font face="arial" size="1">11 AUTENTICA&Ccedil;&Atilde;O<br />
                      </font> <font face="tahoma" size="1">&nbsp;</font><br />
                      <font face="tahoma" size="1">&nbsp;</font></td>
                  </tr>
                </table>
                <table width="650" bordercolor="#000000" cellspacing="0" bordercolordark="#000000" cellpadding="0" bordercolorlight="#000000" border="0" style="border-collapse: collapse">
                  <tr>
                    <td align="right"><font face="arial" size="1">CINDACTA IV - ISON Beta V1.0 </font></td>
                  </tr>
                </table>
              </div>
            <a href="javascript:printDiv('darf','500')" class="btn_novo_usuario">IMPRIMIR <img src="../../public/images/printer.png" alt="IMPRIMIR" width="49" height="40" style="margin-top:-8px; margin-left:-3px;" /></a> </div>
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
