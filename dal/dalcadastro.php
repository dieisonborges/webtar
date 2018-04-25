<?php
class Dalusuario
{
    private $conexao;
    public function Dalusuario($conexao)
    {
         $this->conexao = $conexao;
    }
    public function getTodosAdm()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbUsuario where tbPermissoes_id = '3' order by nomeGuerra ASC";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getTodosSemPag()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbUsuario";
		return mysql_query($sql);
    }
	
	public function getTodosSemAdm()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbUsuario where tbPermissoes_id != '3' order by nomeGuerra ASC";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getTodosSemAdmPorUsuario($usuario)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbUsuario where tbPermissoes_id != '3' and (usuario like '%$usuario%' or nomeCompleto like '%$usuario%') order by nomeGuerra ASC";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getPorSenha($senha)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbUsuario where senha='$senha'";
		return mysql_query($sql);
		
    }
	
	public function getPorSenhaScript($senha)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		
		if(ereg('[^0-9]',$senha))
			{
				return 0;
			}
		else
			{				
				$sql = "Select * from tbUsuario where senha='$senha'";
				$query = mysql_query($sql);
				$query = mysql_fetch_object($query);
				if(isset($query->id))
				{
					return $query->id;
				}
				else
				{
					echo "<br />ERRO: A senha $senha não está cadastrada!<br />";
					return 0;
				}
			}
				
    }
	
	public function getPorCPF($cpf)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbUsuario where cpf='$cpf'";
		return mysql_query($sql);
		
    }
	
	public function getPorEmail($email)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbUsuario where email='$email'";
		return mysql_query($sql);
		
    }
	
    public function getPorId($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbUsuario
            Where id= $id;";
        return mysql_query($sql);
    }
	
	public function getPorUsuario($usuario)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbUsuario
            Where usuario='$usuario';";
        return mysql_query($sql);
    }
	
    public function incluir($cpf, $email ,$senha ,$usuario ,$nomeCompleto ,$nomeGuerra ,$saram ,$identidade ,$telefone ,$postoGraduacao ,$tbPermissoes_id, $ativo, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Insert into tbUsuario(cpf, email, senha, usuario, nomeCompleto, nomeGuerra, saram, identidade, telefone, postoGraduacao, tbPermissoes_id, ativo, tbUnidades_id) values ('$cpf', '$email', '$senha', '$usuario', '$nomeCompleto', '$nomeGuerra', '$saram', '$identidade', '$telefone', '$postoGraduacao', '$tbPermissoes_id', '$ativo', '$tbUnidades_id')";
        return mysql_query($sql);
    }
    public function alterar($id ,$cpf, $email ,$senha ,$usuario ,$nomeCompleto ,$nomeGuerra ,$saram ,$identidade ,$telefone ,$postoGraduacao ,$tbPermissoes_id, $ativo, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbUsuario set cpf='$cpf', email='$email', senha='$senha', usuario='$usuario', nomeCompleto='$nomeCompleto', nomeGuerra='$nomeGuerra', saram='$saram', identidade='$identidade', telefone='$telefone', postoGraduacao='$postoGraduacao', tbPermissoes_id='$tbPermissoes_id', ativo='$ativo', tbUnidades_id='$tbUnidades_id'
            Where id= $id;";
     
        return mysql_query($sql);
    }
	public function alterarMeuUsuario($id ,$email ,$telefone ,$postoGraduacao)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbUsuario set email= '$email', telefone='$telefone', postoGraduacao='$postoGraduacao'
            Where id= $id;";
     
        return mysql_query($sql);
    }
    public function excluir($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Delete from tbUsuario
        Where id= $id;";
        return mysql_query($sql);
    }
}
?>
