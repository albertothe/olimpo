<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("configuracoes.php"); //ok
require_once("funcoes.php"); //ok
require_once("conexao.php");

$sqlConsulta = "SELECT * from usuarios where status = 'A' and tipousuario = 'V'";
			
$resultConsulta = pg_query ( $conexao, $sqlConsulta );

$qntlinha = pg_num_rows ( $resultConsulta );


if ($qntlinha > 0) {
	$indice = 0;
	while ( $obj = pg_fetch_object ( $resultConsulta ) ) {
		$codVendedor [] = $obj->codusuario;
		$nomeVendedor [] = $obj->nome;
		$indice ++;
	}
}

$smarty->assign ( "codVendedor", $codVendedor );
$smarty->assign ( "nomeVendedor", $nomeVendedor );
		
?>