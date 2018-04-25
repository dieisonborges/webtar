<?php
	session_start();
	require('../../util/seguranca.php');
	Seguranca::VerificaUsuario();
	
	require('../../funcoes/funcoes.php');
	require('../../configuracoes/conexao.php');
	
	
	$tbUsuario_id = GetVarSESSION('id');
	$id = GetGET('id');
	
	require('../../dal/dalcontatelefonica.php');
	$conexao = new Conexao();
	$dalcontatelefonica = new Dalcontatelefonica($conexao);		
	$rs_contatelefonica =  $dalcontatelefonica->getPorId($id, $tbUsuario_id);
	$contatelefonica = mysql_fetch_object($rs_contatelefonica);
	
	
	require('../../dal/dalusuario.php');
	$conexao = new Conexao();
    $dalusuario = new Dalusuario($conexao);
    $rs_usuario =  $dalusuario->getPorId($tbUsuario_id);
    $usuario = mysql_fetch_object($rs_usuario);
	
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
          <h1>Termo de Responsabilidade</h1>
          <div class="text">		  
		  	<iframe src="termo_responsabilidade_seco.php" frameborder="0" height="1108" width="853" id="darf"></iframe>							
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
