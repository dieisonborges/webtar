<?php

    require('config.php');
    class Conexao
	{
    	private $servidor;
		private $senha;
		private $usuario;
		private $banco;
		public $conexao;

		public function Conexao()
		{
			$this->servidor = Configuracoes::$servidor;
			$this->usuario = Configuracoes::$usuario;
			$this->senha = Configuracoes::$senha;
			$this->banco = Configuracoes::$banco;
		}

		public function AbreConexao()
		{
			$this->conexao = mysql_connect(
								$this->servidor,
								$this->usuario,
								$this->senha
							);
                      
			return $this->conexao;
		}

		public function FechaConexao()
		{
			return mysql_close($this->conexao);
		}

		public function SelecionaBanco()
		{
			// Refactor para verificar se banco selecionado
			mysql_select_db($this->banco);
		}
    }
?>
