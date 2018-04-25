<?php
class Dalcontatelefonica
{
    private $conexao;
    public function Dalcontatelefonica($conexao)
    {
         $this->conexao = $conexao;
    }
	
	public function getGRUPorID($id, $tbUsuario_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbGRU where id='$id' and tbUsuario_id='$tbUsuario_id'";
		return mysql_query($sql);
		
    }
	
	public function getLigacoesContaTelefonica($tbContasTelefonicas_id, $tbUsuario_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbLigacoes where tbContasTelefonicas_id='$tbContasTelefonicas_id' and tbUsuario_id='$tbUsuario_id'";
		return mysql_query($sql);
		
    }
	
    public function getTodos($tbUsuario_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbContasTelefonicas where tbUsuario_id='$tbUsuario_id' order by data_hora_gerado desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getTodosPagas($tbUsuario_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbContasTelefonicas where tbUsuario_id='$tbUsuario_id' and status_gestor='1' order by data_hora_gerado desc";
		
		$_pagi_sql = "Select tel.*, usu.usuario as usuario, pag.arquivo as arquivo from tbContasTelefonicas as tel inner join tbUsuario as usu on usu.id=tel.tbUsuario_id inner join tbComprovantePagamento as pag on pag.tbUsuario_id=usu.id where tel.tbUsuario_id='$tbUsuario_id' and tel.status_gestor='1' order by tel.data_hora_gerado desc";
		
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	 public function getTodosDevendo($tbUsuario_id, $ano)
    {
        //echo "$tbUsuario_id, $ano";
		$this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbContasTelefonicas where tbUsuario_id='$tbUsuario_id' and year(data_hora_gerado)='$ano'  order by data_hora_gerado ASC";
		
		/*
		$_pagi_sql = "Select tel.*, usu.usuario as usuario, pag.arquivo as arquivo from tbContasTelefonicas as tel inner join tbUsuario as usu on usu.id=tel.tbUsuario_id inner join tbComprovantePagamento as pag on pag.tbUsuario_id=usu.id where tel.tbUsuario_id='$tbUsuario_id' and year(tel.data_hora_gerado)='$ano' order by tel.data_hora_gerado desc";	
		*/
		
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getVerificaTodos($tbUsuario_id, $ano, $mes)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbContasTelefonicas where tbUsuario_id='$tbUsuario_id' and month(data_hora_gerado)='$mes' and year(data_hora_gerado)='$ano'";
		$sql = mysql_query($sql);
		$sql=mysql_fetch_object($sql);
		if((isset($sql->id))and(($sql->pagamento)==1))
			{
			return 1;
			}
		elseif((isset($sql->id))and(($sql->pagamento)==0))
			{
			return 0;
			}
		else
			{
			return 3;
			}
    }
	
	public function getTodosDevendoSemPag($tbUsuario_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbContasTelefonicas where tbUsuario_id='$tbUsuario_id' and pagamento='0' order by data_hora_gerado ASC";
		return mysql_query($sql);
    }
	
    public function getPorId($id, $tbUsuario_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbContasTelefonicas
            Where id= '$id' and tbUsuario_id='$tbUsuario_id';";
        return mysql_query($sql);
    }
	
	public function getPorIdSemUsu($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select tbUsuario_id from tbContasTelefonicas
            Where id= '$id';";
        return mysql_query($sql);
    }
	
	public function getPorIdAdm($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();	
		$sql = "Select * from tbContasTelefonicas Where id= '$id'";
		 return mysql_query($sql);
    }
	
	public function getPorData($data)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();	
		$sql = "Select * from tbContasTelefonicas
						where tbUsuario_id='$tbUsuario_id' and 
						month (dataLigacao)='$mes'and 
						day (dataLigacao)='$dia' order by dataLigacao desc";
		 return mysql_query($sql);
    }
	
	public function getPorUsuarioAdm($usuario)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();	
		/*$_pagi_sql = "Select tel.*, usu.usuario as usuario from tbContasTelefonicas as tel inner join tbUsuario as usu on usu.id=tel.tbUsuario_id where usu.usuario='$usuario' order by tel.data_hora_gerado desc";*/
		
		$_pagi_sql = "Select tel.*, usu.usuario as usuario, pag.arquivo as arquivo from tbContasTelefonicas as tel inner join tbUsuario as usu on usu.id=tel.tbUsuario_id inner join tbComprovantePagamento as pag on pag.tbUsuario_id=usu.id where usu.usuario='$usuario' order by tel.data_hora_gerado desc";
		
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getPorUsuarioAdmComComprovante($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();	
		$_pagi_sql = "Select tel.*, usu.usuario as usuario, pag.arquivo as arquivo from tbContasTelefonicas as tel inner join tbUsuario as usu on usu.id=tel.tbUsuario_id inner join tbComprovantePagamento as pag on pag.tbUsuario_id=usu.id where usu.tbUnidades_id='$tbUnidades_id' order by tel.data_hora_gerado desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	
	public function incluir($tbUsuario_id, $valor)
    {
		$this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Insert into tbContasTelefonicas(tbUsuario_id, valor) values ('$tbUsuario_id', '$valor')";
		$rs = mysql_query($sql);	
	
		if($rs=true)
                {
				return mysql_insert_id();
				}
		else
				{
				return 0;
				}
		
        
    }
	
	
	public function pagar($id, $tbUsuario_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql="Update tbContasTelefonicas set status_gestor='1' Where id='$id';";
		$sql_ligacoes="Update tbLigacoes set status_gestor='1' Where tbUsuario_id='$tbUsuario_id' and tbContasTelefonicas_id='$id';";
		mysql_query($sql_ligacoes);		 
        return mysql_query($sql);
    }
	
	public function cancelar_pagamento($id, $tbUsuario_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql="Update tbContasTelefonicas set status_gestor='2' Where id='$id';";
		$sql_ligacoes="Update tbLigacoes set status_gestor='2' Where tbUsuario_id='$tbUsuario_id' and tbContasTelefonicas_id='$id';";
		mysql_query($sql_ligacoes);		 
        return mysql_query($sql);
    }
		
	public function excluirParaRevisaoConta($tbUsuario_id, $mes, $ano)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Delete from tbContasTelefonicas Where tbUsuario_id='$tbUsuario_id' and month (data_hora_gerado)='$mes' and year (data_hora_gerado)='$ano';";
        return mysql_query($sql);
    }
	
	public function excluir($id, $id_usuario, $unidades)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Delete from tbContasTelefonicas Where tbUsuario_id='$id_usuario' and id='$id' and unidades='$unidades';";
        return mysql_query($sql);
    }
	
	public function getGRUPorIdConta($id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select * from tbContasTelefonicas where id='$id'";
		$rs_sql = mysql_query($sql);
		$sql_result = mysql_fetch_object($rs_sql);
		
		return $sql_result->tbGRU_id;
    }
	
	public function excluirGRU($id_gru, $id_usuario, $id_conta)
    {
        //echo "$id_gru, $id_usuario, $id_conta";
		$this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();        
		$sql_conta ="Delete from tbContasTelefonicas Where tbUsuario_id='$id_usuario' and id='$id_conta' and status_gestor<>'1';";
		if($sql_conta){
			$sql_gru ="Delete from tbGRU Where tbUsuario_id='$id_usuario' and id='$id_gru';";
			mysql_query($sql_gru);
		}
		mysql_query($sql_conta);
        return ;
    }
	
	public function excluirContaGRU($id_gru, $id_usuario, $id_conta)
	{
        //echo "$id_gru, $id_usuario, $id_conta";
		$this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();        
		$sql_conta ="Delete from tbContasTelefonicas Where tbUsuario_id='$id_usuario' and id='$id_conta' and status_gestor<>'1';";
		if(mysql_query($sql_conta))
		{
			$sql_comprovante="Delete from tbComprovantePagamento Where tbUsuario_id='$id_usuario' and tbGRU_id='$id_gru';";
			if(mysql_query($sql_comprovante))
				{
				$sql_gru ="Delete from tbGRU Where tbUsuario_id='$id_usuario' and id='$id_gru';";
				if(mysql_query($sql_gru))
					{
					return true;
					}
				}
		}
		else
		{
        	return false;
		}
    }
	

	public function incluirComprovante($tbUsuario_id, $arquivo, $tbGRU_id)
    {
		$this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Insert into tbComprovantePagamento(tbUsuario_id, arquivo, tbGRU_id) values ('$tbUsuario_id', '$arquivo', '$tbGRU_id')";
        return mysql_query($sql);		
			
    }
	
	public function incluirGRU($tbUsuario_id, $vencimento, $valor_total, $arquivo_pdf, $nome_pdf)
    {
		$this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();       
        $sql ="Insert into tbGRU(tbUsuario_id, vencimento, valor_total, arquivo_pdf, nome_pdf) values ('$tbUsuario_id', '$vencimento', '$valor_total', '$arquivo_pdf', '$nome_pdf');";
        $rs = mysql_query($sql);	
		if($rs=true)
                {
				return mysql_insert_id();
				}
		else
				{
				return 0;
				}	
			
    }
	               
	public function insertGruNaConta($id, $tbGRU_id)
    {
		$this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();       
        $sql ="Update tbContasTelefonicas set tbGRU_id='$tbGRU_id', status_gestor='2' Where id='$id';";
        return mysql_query($sql);		
			
    }	
	
	public function insertGruNasLigacoes($tbContasTelefonicas_id, $tbUsuario_id)
    {
		$this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();       
        $sql ="Update tbLigacoes set status_gestor='2' Where tbContasTelefonicas_id='$tbContasTelefonicas_id' and tbUsuario_id='$tbUsuario_id';";
        return mysql_query($sql);		
			
    }

	public function alteraComprovante($id, $tbUsuario_id, $arquivo)
    {
		$this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql="Update tbComprovantePagamento set arquivo='$arquivo' Where id='$id' and tbUsuario_id='$tbUsuario_id';";
        return mysql_query($sql);		
			
    }
	
	
	public function getComprovante($tbUsuario_id)
    {
		$this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();       
        $sql ="Select * from tbComprovantePagamento Where tbUsuario_id='$tbUsuario_id';";
		$rs = mysql_query($sql);							
		if(mysql_num_rows($rs)>0)
                {
				return $rs;
				}
		else
				{
				return false;
				}
        
	}
	
	public function getComprovantePorGRU($tbGRU_id, $tbUsuario_id)
    {
		$this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();   
        $sql ="Select * from tbComprovantePagamento Where tbUsuario_id='$tbUsuario_id' and tbGRU_id='$tbGRU_id';";
		return mysql_query($sql);
        
	}
	
	
}
?>
