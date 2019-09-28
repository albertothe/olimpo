<?php
function erro_msgLocal($erro) {
	switch ($erro) {
		case "01" :
			die ( "Não foi possivel se conectar ao gerenciador" );
		case "02" :
			die ( "Verifique a existencia do banco de dados" );
		case "03" :
			die ( "Erro ao realizar a consulta" );
		
		default :
			die ( "Erro não localizado" );
		// echo "<h1>$erro</h1>";
	}
}
function erro_msg_consultaLocal($erro, $sql) {
	switch ($erro) {
		case "01" :
			die ( "Não foi possivel se conectar ao gerenciador" );
		case "02" :
			die ( "Verifique a existencia do banco de dados" );
		case "03" :
			die ( "Erro ao realizar a consulta: " . '</br>' . $sql );
		
		default :
			die ( "Erro não localizado" );
		// echo "<h1>$erro</h1>";
	}
}
class conectarLocal {
	var $result;
	public $host, $user, $password, $dbname, $conexao, $selecaobanco, $port;
	function __construct() {
		$this->host = 'localhost';
		$this->user = 'postgres';
		// $this->password = '';
		$this->port = '5432';
		$this->password = 'p4v800dx';
		// $this->password = 'dp7cmpd6mc'; <--servidor 107
		$this->dbname = 'olimpo';
		$bdcon = "host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->password";
		
		$this->conexao = @pg_connect ( $bdcon );
	}
	function getConnectionLocal() {
		return $this->conexao;
	}
	function getHostLocal() {
		return $this->host;
	}
	function setHostLocal($host) {
		$this->host = $host;
	}
	function fecharLocal($conexao) {
		@pg_close ( $conexao );
	}
	/*
	 * function query($query) {
	 * $this->result = pg_query ( $query, $this->conexao ) or erro_msg ( "03" );
	 * }
	 * function num_rows() {
	 * return pg_num_rows ( $this->result );
	 * }
	 * function affected_rows() {
	 * return pg_affected_rows ();
	 * }
	 */
}
?>