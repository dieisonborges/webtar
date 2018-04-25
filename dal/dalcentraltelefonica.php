<?php
class DalcentralTelefonica
{
    private $conexao;
    public function DalcentralTelefonica($conexao)
    {
         $this->conexao = $conexao;
    }
    public function getTodos()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select tel.*, uni.nome as unidade, uni.sigla as sigla from tbCentralTelefonica as tel inner join tbUnidades as uni on tel.tbUnidades_id=uni.id";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	
	public function getTodosSemPag()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select tel.*, uni.sigla as sigla from tbCentralTelefonica as tel inner join tbUnidades as uni on tel.tbUnidades_id=uni.id";
		return mysql_query($sql);
    }
	
	public function getUltimoBilhete($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select dataLigacao, time from tbLigacoes where tbUnidades_id='$tbUnidades_id' order by dataLigacao desc, time desc limit 1";
		return mysql_query($sql);
    }
	

	
	public function getPorId($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select tel.*, uni.nome as unidade from tbCentralTelefonica as tel inner join tbUnidades as uni on tel.tbUnidades_id=uni.id where tel.id='$id'";
		return mysql_query($sql);
		
	}
	
	public function getPorIP($ip)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select id,tbUnidades_id from tbCentralTelefonica where ip='$ip'";
		if(mysql_query($sql))
			{
				return mysql_query($sql);
			}
		else
			{
				return 0;
			}
		
	}
	
    public function incluir($tbUnidades_id, $ip, $macAddress, $descricao, $usuarioCentral, $senhaCentral)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Insert into tbCentralTelefonica(tbUnidades_id, ip, macAddress, descricao, usuarioCentral, senhaCentral) values ('$tbUnidades_id', '$ip', '$macAddress', '$descricao', '$usuarioCentral', '$senhaCentral')";
        return mysql_query($sql);
    }	
				    
    public function alterar($id, $tbUnidades_id, $ip, $macAddress, $descricao, $usuarioCentral, $senhaCentral, $status)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        echo $sql ="Update tbCentralTelefonica set ip='$ip', macAddress='$macAddress', descricao='$descricao', usuarioCentral='$usuarioCentral', senhaCentral='$senhaCentral', status='$status' Where id='$id'";
     
        return mysql_query($sql);
    }

    public function excluir($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Delete from tbCentralTelefonica
        Where id= $id;";
        return mysql_query($sql);
    }
}
?>
