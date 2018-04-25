<?php
		  session_start();
  		  require('../../util/seguranca.php');
          Seguranca::VerificaAdministrador();
		  
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalcentraltelefonica.php');
		  $conexao = new Conexao();
		  $dalcentralTelefonica = new DalcentralTelefonica($conexao);
		  $rs_centralTelefonica = $dalcentralTelefonica->getTodos();
		  $paginacao = $rs_centralTelefonica [1];
		  $rs_centralTelefonica = $rs_centralTelefonica [0];
		  ?>

<table width="100%" id="tabela_lista_geral">
  <tr class="conteudo_tabela_lista_geral">
    <td colspan="7" align="center" class="paginacao"><?php echo $paginacao; ?></td>
  </tr>
  <tr id="tit_tabela_lista_geral">
    <td width="16%">IP</td>
    <td width="19%">Mac Address</td>
    <td width="19%">Unidade</td>
    <td width="16%">Descri&ccedil;&atilde;o</td>
    <td width="4%">Editar</td>
    <td width="8%">Excluir</td>
  </tr>
  <?php while ($centralTelefonica = mysql_fetch_object($rs_centralTelefonica)){?>
  <tr class="conteudo_tabela_lista_geral">
    <td><a href="javascript:editar('<?php echo $centralTelefonica->id;?>')"> <?php echo ($centralTelefonica->ip);?> </a> </td>
    <td><a href="javascript:editar('<?php echo $centralTelefonica->id;?>')"> <?php echo ($centralTelefonica->macAddress);?> </a> </td>
    <td><a href="javascript:editar('<?php echo $centralTelefonica->id;?>')"> <?php echo ($centralTelefonica->sigla);?> </a> </td>
    
	<td><a href="javascript:editar('<?php echo $centralTelefonica->id;?>')"> <?php echo ($centralTelefonica->descricao);?> </a> </td>
   
    <td class="td_edit_tabela_lista_geral"><a href="javascript:editar('<?php echo $centralTelefonica->id;?>')"> <img src="../../public/images/edit.gif" alt="Editar" width="30" height="30" border="0" /> </a> </td>
   
    <td class="td_excluir_tabela_lista_geral"><a href="javascript:excluir('<?php echo $centralTelefonica->id;?>')"> <img src="../../public/images/excluir.gif" alt="Excluir" width="23" height="23" border="0" /> </a> </td>
  </tr>
  <?php }?>
  <tr class="conteudo_tabela_lista_geral">
    <td colspan="7" align="center" class="paginacao"><?php echo $paginacao; ?></td>
  </tr>
</table>
