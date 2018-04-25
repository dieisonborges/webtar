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
	
	public function getTodosSemPag($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbUsuario where tbUnidades_id='29'";
		return mysql_query($sql);
    }
	
	public function getTodosSemAdmSemPag($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbUsuario where tbPermissoes_id != '3' and tbUnidades_id='$tbUnidades_id' order by nomeGuerra ASC";
		return mysql_query($sql);
    }
	
	public function getTodosSemAdmSemPagJustPendente($tbUnidades_id, $ano)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select usu.*, con.* from tbUsuario as usu inner join tbContasTelefonicas as con on con.tbUsuario_id=usu.id Where con.pagamento='0' and con.year(mes_referencia)='$ano' and usu.tbPermissoes_id != '3' and tbUnidades_id='$tbUnidades_id' order by usu.nomeGuerra ASC";
		
		return mysql_query($sql);
    }
	
	public function getTodosSemAdm($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbUsuario where tbPermissoes_id != '3' and tbUnidades_id='$tbUnidades_id' order by nomeGuerra ASC";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getTodosSemAdmPorUsuario($usuario, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbUsuario where tbPermissoes_id != '3' and (usuario like '%$usuario%' or nomeCompleto like '%$usuario%') and tbUnidades_id='$tbUnidades_id' order by nomeGuerra ASC";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getTodosSemUni()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbUsuario order by nomeGuerra ASC";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getTodosPorUsuarioSemUni($usuario)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbUsuario where (usuario like '%$usuario%' or nomeCompleto like '%$usuario%') order by nomeGuerra ASC";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	
	
	public function getPorSenha($senha, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbUsuario where senha='$senha' and  tbUnidades_id='$tbUnidades_id';";
		return mysql_query($sql);
		
    }
	
	public function getPorIdentidade($identidade, $tbUnidades_id)
	{
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbUsuario where identidade='$identidade' and  tbUnidades_id='$tbUnidades_id';";
		return mysql_query($sql);
		
    }
	
	public function getPorSaram($saram, $tbUnidades_id)
	{
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbUsuario where saram='$saram' and tbUnidades_id='$tbUnidades_id';";
		return mysql_query($sql);
		
    }
	
	public function getPorSenhaScript($senha, $tbUnidades_id, $data_hora, $origem)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		
		if(ereg('[^0-9]',$senha))
			{
				return 0;
			}
		else
			{				
				$sql = "Select * from tbUsuario where senha='$senha' and tbUnidades_id='$tbUnidades_id'";
				$query = mysql_query($sql);
				$query = mysql_fetch_object($query);
				if(isset($query->id))
				{
					return $query->id;
				}
				elseif(($senha)and(data_hora)and(origem))
				{
					
					$sql = "Insert into tbSenhaSemUsuario(tbUnidades_id, senha, data_hora, origem) values ('$tbUnidades_id', '$senha', '$data_hora', '$origem')";
					mysql_query($sql);
					echo "<br />Obs: A senha $senha no est cadastrada!<br />";
					return 0;
				}
			}
				
    }
	
	public function getPorCilcodeScript($cilcode, $tbUnidades_id, $data_hora, $origem)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		
		if(ereg('[^0-9]',$cilcode))
			{
				return 0;
			}
		else
			{				
				$sql = "Select * from tbUsuario where (cilcode='$cilcode' or cilcode_2='$cilcode') and tbUnidades_id='$tbUnidades_id'";
				$query = mysql_query($sql);
				$query = mysql_fetch_object($query);
				if(isset($query->id))
				{
					return $query->id;
				}
				elseif(($cilcode)and(data_hora)and(origem))
				{
					$sql = "Insert into tbSenhaSemUsuario(tbUnidades_id, cilcode, data_hora, origem) values ('$tbUnidades_id', '$cilcode', '$data_hora', '$origem')";
					mysql_query($sql);
					echo "<br />Obs: O cilcode $cilcode nao esta cadastrado!<br />";
					return 0;
				}
			}
	}
	
	public function getPorCPF($cpf, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbUsuario where cpf='$cpf' and tbUnidades_id='$tbUnidades_id';";
		return mysql_query($sql);
		
    }
	
	public function getPorUnicoCPF($cpf)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbUsuario where cpf='$cpf';";
		$rs = mysql_query($sql);							
		if(mysql_num_rows($rs)>0)
				{				
                return true;
				}
		else
				{
				return false;
				}
		
    }
	
	public function getPorEmail($email, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbUsuario where email='$email' and tbUnidades_id='$tbUnidades_id'";
		return mysql_query($sql);
		
    }
	
    public function getPorId($id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select usu.*, uni.nome, uni.cidade, uni.sigla, uni.nome as unidade from tbUsuario as usu inner join tbUnidades as uni on uni.id=usu.tbUnidades_id
            Where usu.id= '$id' and usu.tbUnidades_id='$tbUnidades_id';";
        return mysql_query($sql);
    }
	
  	public function getUnidadePorIdUsuario($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select tbUnidades_id from tbUsuario where id='$id'";
        return mysql_query($sql);
    }
	
	public function getPorIdUnidade($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select usu.*, uni.cod_unidade_gestora_gru, uni.nome_unidade_gru, uni.gestao_gru, uni.cod_recolhimento_gru, uni.nome from tbUsuario as usu inner join tbUnidades as uni on uni.id=usu.tbUnidades_id Where usu.id='$id';";
        return mysql_query($sql);
    }
	
	public function getPorUsuario($usuario, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbUsuario Where usuario='$usuario' and tbUnidades_id='$tbUnidades_id';";
        return mysql_query($sql);
    }
	
    public function incluir($cpf, $email, $senha, $usuario, $nomeCompleto, $nomeGuerra, $saram, $identidade, $telefone, $postoGraduacao, $tbPermissoes_id, $ativo, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Insert into tbUsuario(cpf, email, senha, usuario, nomeCompleto, nomeGuerra, saram, identidade, telefone, postoGraduacao, tbPermissoes_id, ativo, tbUnidades_id) values ('$cpf', '$email', '$senha', '$usuario', '$nomeCompleto', '$nomeGuerra', '$saram', '$identidade', '$telefone', '$postoGraduacao', '$tbPermissoes_id', '$ativo', '$tbUnidades_id')";
        return mysql_query($sql);
    }
	
	 public function incluirAdm($cpf, $email, $senha, $usuario, $nomeCompleto, $nomeGuerra, $saram, $identidade, $telefone, $postoGraduacao, $tbPermissoes_id, $ativo, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Insert into tbUsuario(cpf, email, senha, usuario, nomeCompleto, nomeGuerra, saram, identidade, telefone, postoGraduacao, tbPermissoes_id, ativo, tbUnidades_id) values ('$cpf', '$email', '$senha', '$usuario', '$nomeCompleto', '$nomeGuerra', '$saram', '$identidade', '$telefone', '$postoGraduacao', '3', '$ativo', '$tbUnidades_id')";
        return mysql_query($sql);
    }
	
	public function alterarAdm($id, $cpf, $email, $senha, $usuario, $nomeCompleto, $nomeGuerra, $saram, $identidade, $telefone, $postoGraduacao, $tbPermissoes_id, $ativo, $tipoSenha, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbUsuario set cpf='$cpf', email='$email', senha='$senha', usuario='$usuario', nomeCompleto='$nomeCompleto', nomeGuerra='$nomeGuerra', saram='$saram', identidade='$identidade', telefone='$telefone', postoGraduacao='$postoGraduacao', tbPermissoes_id='$tbPermissoes_id', ativo='$ativo', tipoSenha='$tipoSenha', tbUnidades_id='$tbUnidades_id'  Where id='$id';";
     
        return mysql_query($sql);
    }
	
	public function alterarParaAdm($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbUsuario set tbPermissoes_id='3'  Where id='$id';";
     
        return mysql_query($sql);
    }
	
	public function alterarParaTar($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbUsuario set tbPermissoes_id='2'  Where id='$id';";
     
        return mysql_query($sql);
    }
	
    public function alterar($id, $cpf, $email, $senha, $usuario, $nomeCompleto, $nomeGuerra, $saram, $identidade, $telefone, $postoGraduacao, $tbPermissoes_id, $ativo, $tipoSenha, $tbUnidades_id, $unidades, $cilcode, $cilcodeSecundario, $funcional)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbUsuario set cpf='$cpf', email='$email', senha='$senha', usuario='$usuario', nomeCompleto='$nomeCompleto', nomeGuerra='$nomeGuerra', saram='$saram', identidade='$identidade', telefone='$telefone', postoGraduacao='$postoGraduacao', tbPermissoes_id='$tbPermissoes_id', ativo='$ativo', tipoSenha='$tipoSenha', tbUnidades_id='$tbUnidades_id', cilcode='$cilcode', cilcode_2='$cilcodeSecundario', funcional='$funcional'  Where id='$id' and tbUnidades_id='$unidades';";
     
        return mysql_query($sql);
    }
	
	public function alterarMeuUsuario($id , $email, $telefone, $postoGraduacao, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbUsuario set email= '$email', telefone='$telefone', postoGraduacao='$postoGraduacao'
            Where id= $id and tbUnidades_id='$tbUnidades_id';";
     
        return mysql_query($sql);
    }
	
	public function liberaTodasTentativas()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbUsuario set tentativas='0';";     
        return mysql_query($sql);
    }	
	
    public function excluir($id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Delete from tbUsuario Where id='$id' and tbUnidades_id='$tbUnidades_id';";
        return mysql_query($sql);
    }
}
?>
