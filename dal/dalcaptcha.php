<?php
class Dalcaptcha
{
    private $conexao;
    public function Dalcaptcha($conexao)
    {
         $this->conexao = $conexao;
    }
    public function getTodos()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbCaptcha";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getRand()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbCaptcha ORDER BY RAND() LIMIT 0,1;";
		return mysql_query($sql);
    }
	
	
	public function getImageCaptcha($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();		
		$query = "SELECT name, type, size, content "."FROM tbCaptcha WHERE id = '$id'";
		$query = mysql_query($query);		
		return $query;
    }
	
    public function getPorId($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbCaptcha
            Where id= $id;";
        return mysql_query($sql);
    }
	
    public function incluir($fileName, $fileSize, $fileType, $content, $keypass)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		
		$sql = "INSERT INTO tbCaptcha (name, size, type, content, keypass) VALUES ('$fileName', '$fileSize', '$fileType', '$content', '$keypass')";
        return mysql_query($sql);
    }
	
    public function alterar($id, $fileName, $fileSize, $fileType, $content, $keypass)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbCaptcha set name= '$fileName', size='$fileSize', type='$fileType', content='$content', keypass='$keypass' Where id= '$id';";
     
        return mysql_query($sql);
    }
	
	public function alterarSemImagem($id, $keypass)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbCaptcha set keypass='$keypass' Where id='$id';";
     
        return mysql_query($sql);
    }
	
    public function excluir($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Delete from tbCaptcha
        Where id= $id;";
        return mysql_query($sql);
    }
}
?>
