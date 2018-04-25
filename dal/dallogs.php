<?php
class Dallogs
{
    private $conexao;
    public function Dallogs($conexao)
    {
         $this->conexao = $conexao;
    }
    public function getTodos()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbLogUsuario order by dataHora ASC";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }	
	
	public function getTodosBusca($ano, $mes, $dia)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbLogUsuario where 
						year(dataHora)='$ano' 
						and month (dataHora)='$mes'
						and day (dataHora)='$dia' order by dataHora DESC";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
		
    public function incluir($tbUsuario_id, $tarefaExecutada, $tipoDeTarefa)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();		
		//PEGA o IP
		$ip=$_SERVER['REMOTE_ADDR'];
		//PEGA Host Name
		//$nomeEstacao=shell_exec("nslookup ".$ip." | grep name | awk {'print $4'} | sed '$s/\.$//' ");
		$nomeEstacao=exec(" host ".$ip." | awk {'print $5'} | sed '$s/\.$//' ");

		//Pega MAC
		$macAddress = "NO MAC";//trim(shell_exec(""));
		// FORMATO 2012-12-31 23:59:59
		//$dataHora=date("Y-m-d h:m:s");
       
        $sql ="Insert into tbLogUsuario(tbUsuario_id, tarefaExecutada, tipoDeTarefa, ip, nomeEstacao, macAddress) values ('$tbUsuario_id', '$tarefaExecutada', '$tipoDeTarefa', '$ip', '$nomeEstacao', '$macAddress');";
        return mysql_query($sql);
    }
    
}
?>
