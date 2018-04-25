<?php
class Dalligacoes
{
    private $conexao;
    public function Dalligacoes($conexao)
    {
         $this->conexao = $conexao;
    }
    public function getTodos($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbLigacoes where tbUnidades_id='$tbUnidades_id' order by dataLigacao desc, time desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getTodosUsuarioSemClass($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "select sum(lig.valor) as valor, count(lig.id) as qtd_ligacoes, usu.usuario as usuario, usu.nomeCompleto as nomeCompleto, usu.saram as saram, usu.postoGraduacao as postoGraduacao, lig.status_gestor as status_gestor from  tbLigacoes as lig inner join tbUsuario as usu on usu.id=lig.tbUsuario_id
						where (lig.status_usuario='0' or lig.status_usuario='')
						and (lig.status_gestor='0' or lig.status_gestor='')
						and lig.tbUnidades_id='$tbUnidades_id'
						group by usu.id
						order by sum(lig.valor) desc
						";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getPorUsuarioSemClass($tbUsuario_id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "select sum(lig.valor) as valor, count(lig.id) as qtd_ligacoes, usu.usuario as usuario, usu.nomeCompleto as nomeCompleto, usu.saram as saram, usu.postoGraduacao as postoGraduacao, lig.status_gestor as status_gestor from  tbLigacoes as lig inner join tbUsuario as usu on usu.id=lig.tbUsuario_id
						where (lig.status_usuario='0' or lig.status_usuario='')
						and (lig.status_gestor='0' or lig.status_gestor='')
						and lig.tbUnidades_id='$tbUnidades_id'
						and usu.id='$tbUsuario_id'										
						";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getTodosUsuarioClassSemGru($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "select sum(lig.valor) as valor, count(lig.id) as qtd_ligacoes, usu.usuario as usuario, usu.nomeCompleto as nomeCompleto, usu.saram as saram, usu.postoGraduacao as postoGraduacao, lig.status_gestor as status_gestor from  tbLigacoes as lig inner join tbUsuario as usu on usu.id=lig.tbUsuario_id
						where lig.status_usuario='2'
						and (lig.status_gestor='4' or lig.status_gestor='5')
						and lig.tbUnidades_id='$tbUnidades_id'
						group by usu.id
						order by sum(lig.valor) desc
						";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getPorUsuarioClassSemGru($tbUsuario_id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "select sum(lig.valor) as valor, count(lig.id) as qtd_ligacoes, usu.usuario as usuario, usu.nomeCompleto as nomeCompleto, usu.saram as saram, usu.postoGraduacao as postoGraduacao, lig.status_gestor as status_gestor  from  tbLigacoes as lig inner join tbUsuario as usu on usu.id=lig.tbUsuario_id
						where lig.status_usuario='2'
						and (lig.status_gestor='4' or lig.status_gestor='5')
						and lig.tbUnidades_id='$tbUnidades_id'
						and usu.id='$tbUsuario_id'										
						";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	
	public function getTodosUsuarioClassGruNaoQuitada($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "select sum(lig.valor) as valor, count(lig.id) as qtd_ligacoes, usu.usuario as usuario, usu.nomeCompleto as nomeCompleto, usu.saram as saram, usu.postoGraduacao as postoGraduacao, lig.status_gestor as status_gestor from  tbLigacoes as lig inner join tbUsuario as usu on usu.id=lig.tbUsuario_id
						where lig.status_gestor='2'
						and lig.tbUnidades_id='$tbUnidades_id'
						group by usu.id
						order by sum(lig.valor) desc
						";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getPorUsuarioClassGruNaoQuitada($tbUsuario_id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "select sum(lig.valor) as valor, count(lig.id) as qtd_ligacoes, usu.usuario as usuario, usu.nomeCompleto as nomeCompleto, usu.saram as saram, usu.postoGraduacao as postoGraduacao, lig.status_gestor as status_gestor  from  tbLigacoes as lig inner join tbUsuario as usu on usu.id=lig.tbUsuario_id
						where lig.status_gestor='2'
						and lig.tbUnidades_id='$tbUnidades_id'
						and usu.id='$tbUsuario_id'										
						";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getSenhaSemUsuario($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbSenhaSemUsuario where tbUnidades_id='$tbUnidades_id' group by cilcode order by data_hora desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function limparSemSemUsuario($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Delete from tbSenhaSemUsuario Where tbUnidades_id='$tbUnidades_id'; ";
        return mysql_query($sql);
    }
	
	public function getPorSenha($senha, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		//Correcao para nao pegar senha vazia
		if(!$senha)
			$senha="00";

		$_pagi_sql = "Select * from tbLigacoes where senha='$senha' and tbUnidades_id='$tbUnidades_id' order by dataLigacao desc, time desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }	
	
	public function getPorRamal($ramal, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		//Correcao para nao pegar senha vazia
		if(!$ramal)
			$ramal="00";

		$_pagi_sql = "Select * from tbLigacoes where numOrigem like '%$ramal%' and tbUnidades_id='$tbUnidades_id' order by dataLigacao desc, time desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getPorCilcod($cilcod, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		//Correcao para nao pegar senha vazia
		if(!$cilcod)
			$cilcod="00";

		$_pagi_sql = "Select * from tbLigacoes where cilcode like '%$cilcod%' and tbUnidades_id='$tbUnidades_id' order by dataLigacao desc, time desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getContaTelefonicaPorUsuario($tbUsuario_id, $ano, $mes, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "select sum(tbLigacoes.valor) as valor, count(tbLigacoes.id) as qtd_ligacoes
						from  tbLigacoes left join tbJustificativaLigacoes on tbLigacoes.id=tbJustificativaLigacoes.tbLigacoes_id
						where tbLigacoes.valor!=0 
						and tbLigacoes.tbUnidades_id='$tbUnidades_id'
						and tbLigacoes.tbUsuario_id='$tbUsuario_id' 
						and (tbJustificativaLigacoes.id is null or tbJustificativaLigacoes.aprovacao!=1)
						and year(tbLigacoes.dataLigacao)='$ano' 
						and month (tbLigacoes.dataLigacao)='$mes'";
		return mysql_query($sql);
    }
	
	public function getContaTelefonicaPorUsuarioAll($tbUsuario_id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "select sum(valor) as valor, count(id) as qtd_ligacoes from  tbLigacoes 
						where status_usuario='2' 
						and (status_gestor='0' or status_gestor='null' or status_gestor='5')
						and tbUnidades_id='$tbUnidades_id'
						and tbUsuario_id='$tbUsuario_id';";
		return mysql_query($sql);
    }
	
	public function getContaTelefonicaPorUsuarioInsert($tbUsuario_id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "select sum(valor) as valor, count(id) as qtd_ligacoes from  tbLigacoes 
						where status_usuario='2' 
						and (status_gestor='0' or status_gestor='null' or status_gestor='5')
						and tbUnidades_id='$tbUnidades_id'
						and tbUsuario_id='$tbUsuario_id';";
		return mysql_query($sql);
    }
	
	public function getTodosSemAprovacao($tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select lig.id as id, lig.dataLigacao, lig.numOrigem, lig.numDiscado, lig.valor
			from tbLigacoes as lig
			inner join tbJustificativaLigacoes as jus
			on lig.id=jus.tbLigacoes_id
			where jus.aprovacao='3' and lig.tbUnidades_id='$tbUnidades_id'";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getPorNumeroDiscadoPorDia($numDiscado, $dia, $mes, $ano, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		//Correcao para nao pegar senha vazia
		if(!$numDiscado)
			$numDiscado="00";
		$_pagi_sql = "Select * from tbLigacoes
						where numDiscado='$numDiscado' and 
						tbUnidades_id='$tbUnidades_id' and
						year(dataLigacao)='$ano' and 
						month (dataLigacao)='$mes'and 
						day (dataLigacao)='$dia' order by dataLigacao desc, time desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	
	public function getPorNumeroDiscado($numDiscado, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		//Correcao para nao pegar senha vazia
		if(!$numDiscado)
			$numDiscado="00";
		$_pagi_sql = "SELECT * FROM tbLigacoes WHERE numDiscado LIKE '%$numDiscado%' and tbUnidades_id='$tbUnidades_id' order by dataLigacao desc, time desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getPorUsuarioPorDia($tbUsuario_id, $dia, $mes, $ano, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();		
		$_pagi_sql = "select tbJustificativaLigacoes.aprovacao, tbLigacoes.valor, tbLigacoes.id, tbLigacoes.dataLigacao, tbLigacoes.numOrigem, tbLigacoes.status_usuario, tbLigacoes.status_gestor, tbLigacoes.numDiscado  from  tbLigacoes
		  	left join tbJustificativaLigacoes on tbLigacoes.id=tbJustificativaLigacoes.tbLigacoes_id
			where tbLigacoes.valor!=0 and tbLigacoes.tbUsuario_id='$tbUsuario_id' and 
						tbLigacoes.tbUnidades_id='$tbUnidades_id' and 
						year(dataLigacao)='$ano' and 
						month (dataLigacao)='$mes'and 
						day (dataLigacao)='$dia' order by dataLigacao desc, time desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	
	public function getPorUsuario($tbUsuario_id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "Select * from tbLigacoes where tbUsuario_id='$tbUsuario_id' and tbUnidades_id='$tbUnidades_id' order by dataLigacao desc, time desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getComJustificativaPorUsuario($tbUsuario_id, $tbUnidades_id)
	{
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "select tbLigacoes.valor, tbLigacoes.id, tbLigacoes.status_usuario, tbLigacoes.status_gestor, tbLigacoes.dataLigacao, tbLigacoes.numOrigem, tbLigacoes.numDiscado, tbJustificativaLigacoes.aprovacao  from  tbLigacoes
		  	inner join tbJustificativaLigacoes on tbLigacoes.id=tbJustificativaLigacoes.tbLigacoes_id
			where tbLigacoes.valor!=0 and tbLigacoes.tbUsuario_id='$tbUsuario_id' and tbLigacoes.tbUnidades_id='$tbUnidades_id' and  tbJustificativaLigacoes.aprovacao='1'";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	
	public function getPorUsuarioSemJustificativa($tbUsuario_id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "select tbJustificativaLigacoes.aprovacao, tbLigacoes.valor, tbLigacoes.status_usuario, tbLigacoes.status_gestor, tbLigacoes.id, tbLigacoes.dataLigacao, tbLigacoes.numOrigem, tbLigacoes.numDiscado  from  tbLigacoes
		  	left join tbJustificativaLigacoes on tbLigacoes.id=tbJustificativaLigacoes.tbLigacoes_id
			where tbLigacoes.valor!=0 and tbLigacoes.tbUsuario_id='$tbUsuario_id' and tbLigacoes.tbUnidades_id='$tbUnidades_id' and (tbJustificativaLigacoes.id is null or tbJustificativaLigacoes.aprovacao!=1)";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getPorUsuarioSemJustificativaSemPag($tbUsuario_id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "select tbJustificativaLigacoes.aprovacao, tbLigacoes.valor, tbLigacoes.status_usuario, tbLigacoes.status_gestor, tbLigacoes.id, tbLigacoes.dataLigacao, tbLigacoes.numOrigem, tbLigacoes.numDiscado  from  tbLigacoes
		  	left join tbJustificativaLigacoes on tbLigacoes.id=tbJustificativaLigacoes.tbLigacoes_id
			where tbLigacoes.valor!=0 and tbLigacoes.tbUsuario_id='$tbUsuario_id' and tbLigacoes.tbUnidades_id='$tbUnidades_id' and (tbJustificativaLigacoes.id is null or tbJustificativaLigacoes.aprovacao!=1) limit 0, 100";
		return mysql_query($sql);
    }
	
	public function getPorUsuarioSemClassificacao($tbUsuario_id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "select * from tbLigacoes where valor!=0 and tbUsuario_id='$tbUsuario_id' and tbUnidades_id='$tbUnidades_id' and (status_usuario='0' or status_usuario=NULL) and status_gestor<>'1'and status_gestor<>'2' limit 0, 100";
		return mysql_query($sql);
    }
	
	public function getPorUsuarioSemClassificacaoEdit($tbUsuario_id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();		
		$sql = "select * from tbLigacoes where valor!=0 and tbUsuario_id='$tbUsuario_id' and tbUnidades_id='$tbUnidades_id' and status_gestor<>'1'and status_gestor<>'2'";
		return mysql_query($sql);
    }
	
	public function getPorUsuarioComStatus($tbUsuario_id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "select tbJustificativaLigacoes.aprovacao, tbLigacoes.status_usuario, tbLigacoes.status_gestor, tbLigacoes.valor, tbLigacoes.id, tbLigacoes.dataLigacao, tbLigacoes.numOrigem, tbLigacoes.numDiscado  from  tbLigacoes
		  	left join tbJustificativaLigacoes on tbLigacoes.id=tbJustificativaLigacoes.tbLigacoes_id
			where tbLigacoes.valor!=0 and tbLigacoes.tbUsuario_id='$tbUsuario_id' and tbLigacoes.tbUnidades_id='$tbUnidades_id'";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getPorUsuarioSemJustificativaPorMes($tbUsuario_id, $mes, $ano, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "select tbLigacoes.* from  tbLigacoes left join tbJustificativaLigacoes on tbLigacoes.id=tbJustificativaLigacoes.tbLigacoes_id
						where tbLigacoes.valor!=0 and tbLigacoes.tbUsuario_id='$tbUsuario_id' 
						and tbLigacoes.tbUnidades_id='$tbUnidades_id'
						and (tbJustificativaLigacoes.id is null or tbJustificativaLigacoes.aprovacao!=1)
						and year(tbLigacoes.dataLigacao)='$ano' 
						and month (tbLigacoes.dataLigacao)='$mes' order by tbLigacoes.dataLigacao desc, time desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	public function getPorUsuarioSemJustificativaPorDia($tbUsuario_id, $mes, $ano, $dia, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "select tbLigacoes.valor, tbLigacoes.status_usuario, tbLigacoes.status_gestor, tbLigacoes.id, tbLigacoes.dataLigacao, tbLigacoes.numOrigem, tbLigacoes.numDiscado
						from  tbLigacoes left join tbJustificativaLigacoes on tbLigacoes.id=tbJustificativaLigacoes.tbLigacoes_id
						where tbLigacoes.valor!=0 and tbLigacoes.tbUsuario_id='$tbUsuario_id' 
						and tbLigacoes.tbUnidades_id='$tbUnidades_id'
						and (tbJustificativaLigacoes.id is null or tbJustificativaLigacoes.aprovacao!=1)
						and year(tbLigacoes.dataLigacao)='$ano' 
						and month (tbLigacoes.dataLigacao)='$mes'
						and day (tbLigacoes.dataLigacao)='$dia' order by tbLigacoes.dataLigacao desc, time desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	
	public function getPorUsuarioPorMes($tbUsuario_id, $mes, $ano, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$_pagi_sql = "select tbJustificativaLigacoes.aprovacao, tbLigacoes.status_usuario, tbLigacoes.status_gestor, tbLigacoes.valor, tbLigacoes.id, tbLigacoes.dataLigacao, tbLigacoes.numOrigem, tbLigacoes.numDiscado  from  tbLigacoes
		  	left join tbJustificativaLigacoes on tbLigacoes.id=tbJustificativaLigacoes.tbLigacoes_id
			where tbLigacoes.valor!=0 
			and tbLigacoes.tbUsuario_id='$tbUsuario_id' 
			and tbLigacoes.tbUnidades_id='$tbUnidades_id'
			and year(tbLigacoes.dataLigacao)='$ano'
			and month (tbLigacoes.dataLigacao)='$mes' 
			order by tbLigacoes.dataLigacao desc, time desc";
		require("../../helpers/pagination-ajax/paginator.inc.php");        	
		$pagi_navegacion_pagi_result = array($_pagi_result,$_pagi_navegacion);
		return $pagi_navegacion_pagi_result;
    }
	
	
    public function getPorId($id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbLigacoes
            Where id= $id and tbUnidades_id='$tbUnidades_id';";
        return mysql_query($sql);
    }
	
	public function getPorIdMinhasLigacoes($id, $tbUsuario_id, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbLigacoes
            Where id= '$id' and tbUsuario_id='$tbUsuario_id' and tbUnidades_id='$tbUnidades_id';";
        return mysql_query($sql);
    }
	
	public function getPorIdMinhasLigacoesNumDiscado($tbUsuario_id, $numDiscado, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Select * from tbLigacoes
            Where tbUsuario_id='$tbUsuario_id' and numDiscado='$numDiscado' and tbUnidades_id='$tbUnidades_id';";
        return mysql_query($sql);
    }	
	
	public function getRelatorioPorAno($ano, $mes, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select sum(valor) as valor from tbLigacoes where tbUnidades_id='$tbUnidades_id' and year(dataLigacao)='$ano' and month (dataLigacao)='$mes' and valor <> 0";
		return mysql_query($sql);
    }
	
	public function getRelatorioFinanceiroUsuarioMes($ano, $mes, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		
		/*$sql = "Select usu.postoGraduacao, usu.nomeGuerra, sum(lig.valor) as valor from tbLigacoes as lig inner join tbUsuario as usu on lig.tbUsuario_id=usu.id where lig.tbUnidades_id='$tbUnidades_id' and year(lig.dataLigacao)='$ano' and month (lig.dataLigacao)='$mes' order by valor asc limit 10";*/
		
		$sql = "Select usu.postoGraduacao, usu.nomeGuerra, sum(lig.valor) as valor from tbLigacoes as lig inner join tbUsuario as usu on lig.tbUsuario_id=usu.id where lig.tbUnidades_id='$tbUnidades_id' and year(lig.dataLigacao)='$ano' and month (lig.dataLigacao)='$mes' group by usu.id order by valor desc limit 5";
		return mysql_query($sql);
    }
	
	public function getRelatorioPorMes($ano, $mes, $dia, $tbUnidades_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
		$sql = "Select sum(valor) as valor from tbLigacoes where tbUnidades_id='$tbUnidades_id' and year(dataLigacao)='$ano' and month (dataLigacao)='$mes' and day (dataLigacao)='$dia'";
		return mysql_query($sql);
    }
	
	public function incluir($tbCentralTelefonica_id, $tbUnidades_id, $tbUsuario_id, $dataLigacao, $time, $duracao, $tipo, $codigo, $troncoEntrada, $troncoSaida, $canalEntrada, $canalSaida, $numDiscado, $numOrigem, $senha, $valor)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Insert into tbLigacoes(tbCentralTelefonica_id, tbUnidades_id, tbUsuario_id, dataLigacao, time, duracao, tipo, codigo, troncoEntrada, troncoSaida, canalEntrada, canalSaida, numDiscado, numOrigem, senha, valor) values ('$tbCentralTelefonica_id',  '$tbUnidades_id', '$tbUsuario_id', '$dataLigacao', '$time', '$duracao', '$tipo', '$codigo', '$troncoEntrada', '$troncoSaida', '$canalEntrada', '$canalSaida', '$numDiscado', '$numOrigem', '$senha', '$valor')";
        return mysql_query($sql);
    }
	
	                
	public function incluirComCilcodeComDescricao($tbCentralTelefonica_id, $tbUnidades_id, $tbUsuario_id, $dataLigacao, $time, $duracao, $tipo, $codigo, $troncoEntrada, $troncoSaida, $canalEntrada, $canalSaida, $numDiscado, $numOrigem, $senha, $valor, $cilcode, $descricao)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Insert into tbLigacoes(tbCentralTelefonica_id, tbUnidades_id, tbUsuario_id, dataLigacao, time, duracao, tipo, codigo, troncoEntrada, troncoSaida, canalEntrada, canalSaida, numDiscado, numOrigem, senha, valor, cilcode, descricao) values ('$tbCentralTelefonica_id',  '$tbUnidades_id', '$tbUsuario_id', '$dataLigacao', '$time', '$duracao', '$tipo', '$codigo', '$troncoEntrada', '$troncoSaida', '$canalEntrada', '$canalSaida', '$numDiscado', '$numOrigem', '$senha', '$valor', '$cilcode', '$descricao')";
        return mysql_query($sql);
    }	
	
	
	public function incluirComCilcode($tbCentralTelefonica_id, $tbUnidades_id, $tbUsuario_id, $dataLigacao, $time, $duracao, $tipo, $codigo, $troncoEntrada, $troncoSaida, $canalEntrada, $canalSaida, $numDiscado, $numOrigem, $senha, $valor, $cilcode)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
       
        $sql ="Insert into tbLigacoes(tbCentralTelefonica_id, tbUnidades_id, tbUsuario_id, dataLigacao, time, duracao, tipo, codigo, troncoEntrada, troncoSaida, canalEntrada, canalSaida, numDiscado, numOrigem, senha, valor, cilcode) values ('$tbCentralTelefonica_id',  '$tbUnidades_id', '$tbUsuario_id', '$dataLigacao', '$time', '$duracao', '$tipo', '$codigo', '$troncoEntrada', '$troncoSaida', '$canalEntrada', '$canalSaida', '$numDiscado', '$numOrigem', '$senha', '$valor', '$cilcode')";
        return mysql_query($sql);
    }
	
	public function excluirNulos()
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Delete from tbLigacoes Where dataLigacao='0000-00-00';";
        return mysql_query($sql);
    }
	
	public function isertIdContaLigacoes($tbUsuario_id, $tbUnidades_id, $tbContasTelefonicas_id)
    {
        $this->conexao->AbreConexao();
        $this->conexao->SelecionaBanco();
        $sql ="Update tbLigacoes set tbContasTelefonicas_id='$tbContasTelefonicas_id', status_gestor='4' Where tbUsuario_id='$tbUsuario_id' and tbUnidades_id='$tbUnidades_id' and status_usuario='2' and (status_gestor='5' or status_gestor='0');";
     
        return mysql_query($sql);
    }
	
}
?>

