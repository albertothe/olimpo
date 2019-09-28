<?php
require_once 'conexao.php';

$acao = (isset ( $_GET ['acao'] )) ? $_GET ['acao'] : '';
$parametro = (isset ( $_GET ['parametro'] )) ? $_GET ['parametro'] : '';

if ($acao == 'autocomplete') {

	$sql = "SELECT 
				nome
			 FROM clientes WHERE nome ILIKE  '%$parametro%'";
	// $dados = array();
	$eSql = pg_query ( $conexao, $sql );
	$registros = pg_num_rows ( $eSql );
	if ($registros > 0) {
		$i = 0;
		while ( $obj = pg_fetch_object ( $eSql ) ) {
			$nome[] =  substr($obj->nome,0,25);
			// $doc [] = $obj->doc ;
			$dados [$i]= array (
					'nome' => $nome [$i]
			);
			$i ++;
		}
	}
	$json = json_encode ( $dados );
	print_r ( $json );
	// echo $json;
}

if ($acao == 'consulta') {

	$sql = "SELECT 
				codcliente,
				nome,
				endereco,
				cidade,
				uf,
				bairro,
				celular,
				status
			 FROM clientes WHERE nome ILIKE  '%$parametro%'";
	$eSql = pg_query ( $conexao, $sql );
	$registros = pg_num_rows ( $eSql );
	if ($registros > 0) {
		$i = 0;
		while ( $obj = pg_fetch_object ( $eSql ) ) {
			//$fantasiaCliente [] = $obj->fantasiaCliente;
			// $doc [] = $obj->doc ;
			$dados [$i]= array (
					'codcliente' => $obj->codcliente,
					'nome' => substr($obj->nome,0,34),
					'endereco' => $obj->endereco,
					'cidade' => $obj->cidade,
					'uf' => $obj->uf,
					'bairro' => $obj->bairro,
					'celular' => $obj->celular,
					'status' =>$obj->status
			);
			$i ++;
		}
	}
	$json = json_encode ( $dados );
	print_r ( $json );
}

?>