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

$codfornecedor = isset ( $_GET ['codfornecedor'] ) ? $_GET ['codfornecedor'] : "";

$operacao = isset ( $_GET ['operacao'] ) ? $_GET ['operacao'] : "";

if ($operacao == "ver"){
		$sqlConsulta = 'select * from fornecedores where codfornecedor = '.$codfornecedor;
					
		$resultConsulta = pg_query ( $conexao, $sqlConsulta );

		$obj = pg_fetch_array($resultConsulta);

		$codFornecedor = $obj['codfornecedor'];
		$fornecedor = $obj['fornecedor'];
		$fone = $obj['fone'];
		$tipo = $obj['tipo'];
		$status = $obj['status'];

		pg_close($conexao);
		
		$smarty->assign ( "estatus", "ver" );

		$smarty->assign ( "codFornecedor", $codFornecedor );
		$smarty->assign ( "fornecedor", $fornecedor );
		$smarty->assign ( "fone", $fone );
		$smarty->assign ( "tipo", $tipo );
		$smarty->assign ( "status", $status );
		
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadForn.html');

} elseif ($operacao == "editar") {

		$sqlConsulta = 'select * from fornecedores where codfornecedor = '.$codfornecedor;
					
		$resultConsulta = pg_query ( $conexao, $sqlConsulta );

		$obj = pg_fetch_array($resultConsulta);

		$codFornecedor = $obj['codfornecedor'];
		$fornecedor = $obj['fornecedor'];
		$fone = $obj['fone'];
		$tipo = $obj['tipo'];
		$status = $obj['status'];

		pg_close($conexao);
		
		$smarty->assign ( "estatus", "editar" );

		$smarty->assign ( "codFornecedor", $codFornecedor );
		$smarty->assign ( "fornecedor", $fornecedor );
		$smarty->assign ( "fone", $fone );
		$smarty->assign ( "tipo", $tipo );
		$smarty->assign ( "status", $status );		
		
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadForn.html');
		
} elseif ($operacao == "novo") {
		
		$smarty->assign ( "estatus", "novo" );
		
		$smarty->assign ( "codFornecedor", "" );
		$smarty->assign ( "fornecedor", "" );
		$smarty->assign ( "fone", "" );
		
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadForn.html');
}

		
?>