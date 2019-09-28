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

$sqlConsulta = 'select * from fornecedores order by fornecedor';
			
$resultConsulta = pg_query ( $conexao, $sqlConsulta );

$qntlinha = pg_num_rows ( $resultConsulta );


if ($qntlinha > 0) {
	$indice = 0;
	while ( $obj = pg_fetch_object ( $resultConsulta ) ) {
		$codFornecedor [] = $obj->codfornecedor;
		$fornecedor [] = $obj->fornecedor;
		$fone [] = $obj->fone;
		$tipo [] = $obj->tipo;
		$status [] = $obj->status;
		$indice ++;
	}
	$smarty->assign ( "codFornecedor", $codFornecedor );
	$smarty->assign ( "fornecedor", $fornecedor );
	$smarty->assign ( "fone", $fone );
	$smarty->assign ( "tipo", $tipo );
	$smarty->assign ( "status", $status );
} else {
	$smarty->assign ( "codFornecedor", "" );
	$smarty->assign ( "fornecedor", "" );
	$smarty->assign ( "fone", "" );
	$smarty->assign ( "tipo", "" );
	$smarty->assign ( "status", "" );
	
}

pg_close($conexao);

$smarty->assign('data_hoje',data_extenso());
$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );

$smarty->display('menu.html');
$smarty->display('listFornecedores.html');
		
?>