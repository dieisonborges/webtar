<?php
class Dalunidades
{
    private $conexao;
    public function Dalunidades($conexao)
    {
         $this->conexao = $conexao;
    }
    public function getTodos()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbUnidades order by id asc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getTodosSemPag()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		//$sql = "Select * from tbUnidades order by nome asc";
		$sql = "Select * from tbUnidades order by id asc";
		return mysql_query($sql);
    }
	
	public function getPorId($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbUnidades Where id='$id';";
        return mysql_query($sql);
    }
	
	public function getUnidadeFilha($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbUnidades Where id='$id' or unidade_mae='$id';";
        return mysql_query($sql);
    }

	
	public function getUnidadeMae($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbUnidades Where id='$id' and unidade_mae <> 0;";
		$rs = mysql_query($sql);							
		if(mysql_num_rows($rs)>0)
                {
				$rs=mysql_fetch_object($rs);
				return ($rs->unidade_mae);
				}
		else
				{
				return false;
				}
        
    }
	
    public function incluir($nome, $sigla, $unidade_mae, $cidade, $estado, $cod_unidade_gestora_gru, $nome_unidade_gru, $gestao_gru, $cod_recolhimento_gru)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Insert into tbUnidades(nome, sigla, unidade_mae, cidade, estado, cod_unidade_gestora_gru, nome_unidade_gru, gestao_gru, cod_recolhimento_gru) values ('$nome', '$sigla', '$unidade_mae', '$cidade', '$estado', '$cod_unidade_gestora_gru', '$nome_unidade_gru', '$gestao_gru', '$cod_recolhimento_gru')";
        return mysql_query($sql);
    }
	
    public function alterar($id, $nome, $sigla, $unidade_mae, $cidade, $estado, $cod_unidade_gestora_gru, $nome_unidade_gru, $gestao_gru, $cod_recolhimento_gru)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbUnidades set nome='$nome', sigla='$sigla', unidade_mae='$unidade_mae', cidade='$cidade', estado='$estado', cod_unidade_gestora_gru='$cod_unidade_gestora_gru', nome_unidade_gru='$nome_unidade_gru', gestao_gru='$gestao_gru', cod_recolhimento_gru='$cod_recolhimento_gru' Where id='$id';";
     
        return mysql_query($sql);
    }

    public function excluir($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Delete from tbUnidades
        Where id='$id';";
        return mysql_query($sql);
    }
}
?>
