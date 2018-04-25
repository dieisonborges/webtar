<?php
class Daltarifas
{
    private $conexao;
    public function Daltarifas($conexao)
    {
         $this->conexao = $conexao;
    }
    public function getTodos($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbTarifas where tbUnidades_id='$tbUnidades_id' order by tipo asc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	/*
	public function getTodosSemPag()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql ="Select * from tbTarifas";
        return mysql_query($sql);
    }
	*/	
	
	public function getTodosSemPagUni($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql ="Select * from tbTarifas where tbUnidades_id='$tbUnidades_id'";
        return mysql_query($sql);
    }
	
   /*
   public function getPorId($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbTarifas
            Where id= $id;";
        return mysql_query($sql);
    }
	*/
	
	public function getPorIdUni($id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbTarifas
            Where id= $id and tbUnidades_id='$tbUnidades_id';";
        return mysql_query($sql);
    }
	
    public function incluir($tbUnidades_id, $tipo, $mascara, $valor, $descricao)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Insert into tbTarifas(tbUnidades_id, tipo, mascara, valor, descricao) values ('$tbUnidades_id', '$tipo', '$mascara', '$valor', '$descricao')";
        return mysql_query($sql);
    }
    public function alterar($id, $tbUnidades_id, $tipo, $mascara, $valor, $descricao)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbTarifas set tipo= '$tipo', mascara='$mascara', valor='$valor', descricao='$descricao'
            Where id= $id and tbUnidades_id='$tbUnidades_id';";
     
        return mysql_query($sql);
    }
	
    public function excluir($id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Delete from tbTarifas
        Where id= $id and tbUnidades_id='$tbUnidades_id';";
        return mysql_query($sql);
    }
}
?>
