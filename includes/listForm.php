<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("configuracoes.php"); //ok
require_once("funcoes.php"); //ok
require_once("conexao.php");

$sqlConsulta = "SELECT * from formapagamentos where status = 'A'";
			
$resultConsulta = pg_query ( $conexao, $sqlConsulta );

$qntlinha = pg_num_rows ( $resultConsulta );


if ($qntlinha > 0) {
	$indice = 0;
	while ( $obj = pg_fetch_object ( $resultConsulta ) ) {
		$codForma [] = $obj->codforma;
		$nomeForma [] = $obj->forma;
		$indice ++;
	}
}

$smarty->assign ( "codForma", $codForma );
$smarty->assign ( "nomeForma", $nomeForma );
		
?>