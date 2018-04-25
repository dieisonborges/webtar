<?php
  session_start();
  require('../../util/seguranca.php');
  Seguranca::VerificaTarifador();
  
  require('../../funcoes/funcoes.php');
  require('../../configuracoes/conexao.php');
  require('../../dal/dalligacoes.php');
  
  $unidades = GetVarSESSION('unidades');
  
  $mes_ano=GetGET('TxtAnoMes');
  if(!$mes_ano)
  	$mes_ano=date("m/Y");
?>

<?php include('../layouts/doc_type_top.php');?>
<?php include('../layouts/head.php');?>
<body>

<!-- GERA O GRAFICO-->
<script src="../../helpers/animated-graphics/graphics-lib/graphics.js" type="text/javascript"></script>
<script src="../../helpers/animated-graphics/graphics-lib/vectors.js" type="text/javascript"></script>


<script type="text/javascript">
var chart;
var chartData = [
<?php	
$mes_ano=explode('/', $mes_ano); 
$mes=$mes_ano[0];
$ano=$mes_ano[1];
$mes_ano=$mes."/".$ano;
$ultimoDia=cal_days_in_month( CAL_GREGORIAN, $mes, $ano);

$conexao = new Conexao();
$dalligacoes = new Dalligacoes($conexao);

for($dia=1;$dia<=$ultimoDia;$dia++)
{

$rs_ligacoes = $dalligacoes->getRelatorioPorMes($ano, $mes, $dia, $unidades);
$ligacoes = mysql_fetch_object($rs_ligacoes);			
?>
{
	dia: "<?php echo $dia."/".$mes;?>",
	/*ligacoes: "<?php //echo str_replace(",", "", $ligacoes->qtd);?>",*/
	valor: "<?php echo str_replace(",", "", (number_format($ligacoes->valor,2))); ?>",
}, 

<?php } ?>

];


GrLibrary.ready(function () {
chart = new GrLibrary.AmSerialChart();
chart.pathToImages = "../graphics-lib/images/";
chart.dataProvider = chartData;
chart.categoryField = "dia";
chart.startDuration = 1;


var categoryAxis = chart.categoryAxis;
categoryAxis.gridPosition = "start";

/*
var graph1 = new GrLibrary.GrGraph();
graph1.type = "column";
graph1.title = "Quantidade de Ligações";
graph1.valueField = "ligacoes";
graph1.lineAlpha = 0;
graph1.fillAlphas = 1;
chart.addGraph(graph1);
*/

var graph1 = new GrLibrary.GrGraph();
graph1.type = "column";
graph1.title = "Valor em R$";
graph1.valueField = "valor";
graph1.lineAlpha = 0;
graph1.fillAlphas = 1;
chart.addGraph(graph1);

var legend = new GrLibrary.GrLegend();
chart.addLegend(legend);

chart.write("container_grafico");
});
</script>

<!-- FIM GERA O GRAFICO-->


<div class="wrap1">
  <div class="wrap2">
    <?php include('../layouts/logo.php');?>
    <div id="menu">
      <?php include('../layouts/menu_top_horizontal.php');?>      
      <div class="info"> </div>
      
      <div class="mainpanel">
        <div class="text_">
          <h1>Relatorio de Liga&ccedil;&otilde;es Telef&ocirc;nicas</h1>
          
          <div class="text">
		  			<form action="relatorio_ligacoes_por_mes.php" method="get" enctype="multipart/form-data">
			  			<label for="TxtMesAno" class="labeltxtgeral">Insira o M&ecirc;s e o Ano (99/9999):</label>
              			<input class="inputsgeraltxtdata" id="mes_ano" name="TxtAnoMes" type="text" value="<?php echo "$mes_ano";?>">
			  			<input type="submit" value="BUSCAR" id="btn_ok_cadastro_editar_data" />
					</form>
			<div id="container_grafico" style="width:100%; height:400px;"></div>
			
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
