<?php
class DalJustificativaLigacoes
{
    private $conexao;
    public function DalJustificativaLigacoes($conexao)
    {
         $this->conexao = $conexao;
    }
    
	/*
	public function getTodos($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbJustificativaLigacoes where tbUnidades_id='$tbUnidades_id'";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	*/
	
	public function getPorId($id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbJustificaLigacoes Where id='$id' and tbUnidades_id='$tbUnidades_id'";
		return mysql_query($sql);
    }
	
	public function getPorIdLigacao($id_ligacao, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select jus.*, lig.id as lig_id from tbJustificativaLigacoes as jus inner join tbLigacoes as lig
on jus.tbLigacoes_id=lig.id
Where lig.id='$id_ligacao' and lig.tbUnidades_id='$tbUnidades_id'";
		return mysql_query($sql);
    }
	
	
    public function incluir($tbLigacoes_id, $tipo, $justificativa, $aprovacao)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Insert into tbJustificativaLigacoes(tbLigacoes_id, tipo, justificativa, aprovacao) values ('$tbLigacoes_id', '$tipo', '$justificativa', '$aprovacao')";
        return mysql_query($sql);
    }
	
	public function incluirClassificacao($id, $id_usuario, $classificacao_usuario, $classificacao_gestor, $unidades)
	{
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();       
        $sql ="Update tbLigacoes set status_usuario='$classificacao_usuario', status_gestor='$classificacao_gestor' Where id='$id' and tbUsuario_id='$id_usuario' and tbUnidades_id='$unidades';";
        return mysql_query($sql);
    }
	
	public function incluirClassificacaoConta($tbContasTelefonicas_id, $classificacao_gestor, $tbUnidades_id)
	{
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();       
        $sql ="Update tbLigacoes set status_gestor='$classificacao_gestor' Where tbContasTelefonicas_id='$tbContasTelefonicas_id' and tbUnidades_id='$tbUnidades_id';";
        return mysql_query($sql);
    }
	
	public function incluirClassificacaoSemGestor($id, $id_usuario, $classificacao_usuario, $unidades)
	{
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();       
        $sql ="Update tbLigacoes set status_usuario='$classificacao_usuario' Where id='$id' and tbUsuario_id='$id_usuario' and tbUnidades_id='$unidades';";
        return mysql_query($sql);
    }
	
	public function modificarClassificacao($id_conta, $id_usuario, $classificacao_usuario, $classificacao_gestor, $unidades)
	{
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();       
        $sql ="Update tbLigacoes set status_usuario='$classificacao_usuario', status_gestor='$classificacao_gestor' Where tbUsuario_id='$id_usuario' and tbUnidades_id='$unidades' and tbContasTelefonicas_id='$id_conta';";
        return mysql_query($sql);
    }
	
	public function modificarClassificacaoRemoveContaGRU($id_conta, $id_usuario, $classificacao_usuario, $classificacao_gestor, $unidades)
	{
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();       
        $sql ="Update tbLigacoes set status_usuario='$classificacao_usuario', status_gestor='$classificacao_gestor', tbContasTelefonicas_id=NULL Where tbUsuario_id='$id_usuario' and tbUnidades_id='$unidades' and tbContasTelefonicas_id='$id_conta';";
        return mysql_query($sql);
    }
	
	
	public function alterar($id, $tipo, $justificativa, $aprovacao)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Update tbJustificativaLigacoes set tipo='$tipo', justificativa='$justificativa', aprovacao='$aprovacao'
            Where id= $id;";
        return mysql_query($sql);
    }
	
	public function alterarAprovacao($id_ligacao, $aprovacao)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Update tbJustificativaLigacoes set aprovacao='$aprovacao'
            Where tbLigacoes_id= $id_ligacao;";
        return mysql_query($sql);
    }
	
	public function aprovarTodas($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();       
        $sql ="Update tbJustificativaLigacoes set aprovacao='1'
            Where aprovacao!='1';";
        return mysql_query($sql);
    }
	
}
?>
