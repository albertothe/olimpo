<?php

require_once 'conexao.php';

$acao = (isset ( $_GET ['acao'] )) ? $_GET ['acao'] : '';
$parametro = (isset ( $_GET ['parametro'] )) ? $_GET ['parametro'] : '';

if ($acao == 'autocomplete') {
	
	$sql = "SELECT 
				descricao
			 FROM produtos WHERE descricao ILIKE '%$parametro%'";
	// $dados = array();
	$eSql = pg_query ( $conexao, $sql );
	$registros = pg_num_rows ( $eSql );
	if ($registros > 0) {
		$i = 0;
		while ( $obj = pg_fetch_object ( $eSql ) ) {
			$descricao [] =  substr($obj->descricao,0,25);
			// $doc [] = $obj->doc ;
			$dadosProduto [$i]= array (
					'descricao' => $descricao [$i]
			);
			$i ++;
		}
	}
	$json = json_encode ( $dadosProduto );
	print_r ( $json );
	// echo $json;
}

if ($acao == 'consulta') {
	
	
	$sql = "select 
				pro.codproduto AS codproduto,
				pro.descricao AS descricao,
				est.vlrvnd_rev AS vlrvnd_rev
			from produtos pro inner join estoques est on est.codproduto = pro.codproduto WHERE descricao ILIKE '%$parametro%'";
	$eSql = pg_query ( $conexao, $sql );
	$registros = pg_num_rows ( $eSql );
	if ($registros > 0) {
		$i = 0;
		while ( $obj = pg_fetch_object ( $eSql ) ) {
			//$fantasiaCliente [] = $obj->fantasiaCliente;
			// $doc [] = $obj->doc ;
			$dadosProduto [$i]= array (
					'codproduto' => $obj->codproduto,
					'descricao' => substr($obj->descricao,0,34),
					'vlrvnd_rev' => $obj->vlrvnd_rev,
			);
			$i ++;
		}
	}
	$json = json_encode ( $dadosProduto );
	print_r ( $json );
}
?>
