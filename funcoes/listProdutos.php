<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok
require_once("../includes/verificar.php");
require_once("../includes/conexao.php");

$session_usuarioLogado = isset ( $_SESSION ["nomeUsuarioSessao"] ) ? $_SESSION ['nomeUsuarioSessao'] : "";
$session_codUsuarioLogado = isset ( $_SESSION ["codUsuarioSessao"] ) ? $_SESSION ['codUsuarioSessao'] : "";

$sqlConsulta = 'select * from produtos ORDER BY descricao';
			
$resultConsulta = pg_query ( $conexao, $sqlConsulta );

$qntlinha = pg_num_rows ( $resultConsulta );


if ($qntlinha > 0) {
	$indice = 0;
	while ( $obj = pg_fetch_object ( $resultConsulta ) ) {
		$codProduto [] = $obj->codproduto;
		$descricao [] = $obj->descricao;
		$unidade [] = $obj->unidade;
		$status [] = $obj->status;
		$grade [] = $obj->grade;
		$indice ++;
	}
	$smarty->assign ( "codProduto", $codProduto );
	$smarty->assign ( "descricao", $descricao );
	$smarty->assign ( "unidade", $unidade );
	$smarty->assign ( "status", $status );
	$smarty->assign ( "grade", $grade );
	
} else {
	$smarty->assign ( "codProduto", "" );
	$smarty->assign ( "descricao", "" );
	$smarty->assign ( "unidade", "" );
	$smarty->assign ( "status", "" );
	$smarty->assign ( "grade", "" );
	
}
pg_close($conexao);

$smarty->assign('data_hoje',data_extenso());
$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );

$smarty->display('menu.html');
$smarty->display('listProdutos.html');
		
?>