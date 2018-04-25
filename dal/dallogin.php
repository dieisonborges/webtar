<?php
 class DALLogin
 {
	private $conexao;
	
	public function DALLogin($conexao)
	{
		$this->conexao = $conexao;
	}
	
	public function ValidaLogin($usuario, $senha, $tbUnidades_id)
	{
		$this->conexao->AbreConexao();
		$this->conexao->SelecionaBanco();
		$sql = "Select usu.*, uni.sigla  from tbUsuario as usu inner join tbUnidades as uni on usu.tbUnidades_id=uni.id where usu.usuario='$usuario' and usu.senha = '$senha' and usu.tbUnidades_id='$tbUnidades_id' and usu.tentativas<5";
		$rs = mysql_query($sql);							
		if(mysql_num_rows($rs)>0)
				{
				$sql_desbloqueia = "UPDATE tbUsuario SET tentativas=0 where usuario='$usuario' and tbUnidades_id='$tbUnidades_id' and senha='$senha';";
				mysql_query($sql_desbloqueia);
                return $rs;
				}
		else
				{
				return false;
				}
	}
	
	
	public function aumentaTentativa($usuario, $tbUnidades_id)
	{
		$this->conexao->AbreConexao();
		$this->conexao->SelecionaBanco();
		$sql = "UPDATE tbUsuario SET tentativas=(tentativas + 1) where usuario='$usuario' and tbUnidades_id='$tbUnidades_id'";
		return mysql_query($sql);
	}
	
 } 
?>
