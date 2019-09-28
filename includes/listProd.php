<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("configuracoes.php"); //ok
require_once("funcoes.php"); //ok
require_once("conexao.php");

$sqlConsulta = 'select * from produtos order by descricao';
			
$resultConsulta = pg_query ( $conexao, $sqlConsulta );

$qntlinha = pg_num_rows ( $resultConsulta );


if ($qntlinha > 0) {
	$indice = 0;
	while ( $obj = pg_fetch_object ( $resultConsulta ) ) {
		$codProduto [] = $obj->codproduto;
		$descricao [] = $obj->descricao;
		$indice ++;
	}
}
pg_close($conexao);


$smarty->assign ( "codProduto", $codProduto );
$smarty->assign ( "descricao", $descricao );
		
?>