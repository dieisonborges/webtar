<?php
class DalMsgInicial
{
    private $conexao;
    public function DalMsgInicial($conexao)
    {
         $this->conexao = $conexao;
    }
	
    public function getMensagem($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbMsgInicial where tbUnidades_id='$tbUnidades_id';";
		$rs = mysql_query($sql);							
		if(mysql_num_rows($rs)>0)
                {
				return mysql_query($sql);
				}
		else
				{
				return false;
				}
    }
	
	public function incluir($mensagem, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Insert into tbMsgInicial(mensagem, tbUnidades_id) values ('$mensagem', '$tbUnidades_id')";    
        return mysql_query($sql);
    }
	
	
	public function alterar($id, $mensagem, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbMsgInicial set mensagem='$mensagem' Where id='$id' and tbUnidades_id='$tbUnidades_id';";     
        return mysql_query($sql);
    }
}
?>
