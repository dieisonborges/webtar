<?php
		  require('../../funcoes/funcoes.php');
		  require('../../configuracoes/conexao.php');
		  require('../../dal/dalunidades.php');
		  $conexao = new Conexao();
		  $dalunidades = new Dalunidades($conexao);
		  $rs_unidades = $dalunidades->getTodos();
		  $paginacao = $rs_unidades [1];
		  $rs_unidades = $rs_unidades [0];
?>

<table width="100%" id="tabela_lista_geral">
  <tr class="conteudo_tabela_lista_geral">
    <td colspan="6" align="center" class="paginacao"><?php echo $paginacao; ?></td>
  </tr>
  <tr id="tit_tabela_lista_geral">
    <td width="22%">Nome</td>
    <td width="23%">Cidade</td>
    <td width="23%">Estado</td>
    <td width="4%">Editar</td>
    <td width="4%">Excluir</td>
  </tr>
  <?php while ($unidades = mysql_fetch_object($rs_unidades)){?>
  <tr class="conteudo_tabela_lista_geral">
    <td><a href="javascript:editar('<?php echo $unidades->id;?>')"> <?php echo ($unidades->sigla);?> </a> </td>
    <td><a href="javascript:editar('<?php echo $unidades->id;?>')"> <?php echo ($unidades->cidade);?> </a> </td>
    <td><a href="javascript:editar('<?php echo $unidades->id;?>')"> <?php echo ($unidades->estado);?> </a> </td>
    <td class="td_edit_tabela_lista_geral"><a href="javascript:editar('<?php echo $unidades->id;?>')"> <img src="../../public/images/edit.gif" alt="Editar" width="30" height="30" border="0" /> </a> </td>
    <td class="td_excluir_tabela_lista_geral"><a href="javascript:excluir('<?php echo $unidades->id;?>')"> <img src="../../public/images/excluir.gif" alt="Excluir" width="23" height="23" border="0" /> </a> </td>
  </tr>
  <?php }?>
  <tr class="conteudo_tabela_lista_geral">
    <td colspan="6" align="center" class="paginacao"><?php echo $paginacao; ?></td>
  </tr>
</table>
