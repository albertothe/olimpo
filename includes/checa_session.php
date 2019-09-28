<?php
require_once ("configuracoes.php");
session_cache_expire ( 10 );
// session_cache_limiter("must-revalidate");
session_start ();

if (! isset ( $_SESSION ["SessionId"] )) {

	unset ( $_SESSION ["SessionId"] );
	unset ( $_SESSION ["idUsuarioSessao"] );
	unset ( $_SESSION ["nomeUsuarioSessao"] );
	unset ( $_SESSION ["loginSessao"] );
	unset ( $_SESSION ["nivelSessao"] );
	unset ( $_SESSION ["nivelDBSessao"] );
	unset ( $_SESSION ["fantasiaSessao"] );
	unset ( $_SESSION ["idLojaSessao"] );
	unset ( $_SESSION ["codigoVendedorSessao"] );

	$_SESSION ["erro"] = "erro_sessao";
	$smarty->assign ( "logado", "" );
	// header ( 'location:index.php' );
} else {
	$smarty->assign ( "logado", "SIM" );
	$smarty->assign ( "nomeUsuarioSessao", $_SESSION ["nomeUsuarioSessao"] );
	$smarty->assign ( "loginSessao", $_SESSION ["loginSessao"] );
	$smarty->assign ( "nivelSessao", $_SESSION ["nivelSessao"] );
	$smarty->assign ( "idUsuarioSessao", $_SESSION ["idUsuarioSessao"] );
	$smarty->assign ( "nivelDBSessao", $_SESSION ["nivelDBSessao"] );
	$smarty->assign ( "fantasiaSessao", $_SESSION ["fantasiaSessao"] );
	$smarty->assign ( "idLojaSessao", $_SESSION ["idLojaSessao"] );
	$smarty->assign ( "codigoVendedorSessao", $_SESSION ["codigoVendedorSessao"] );

	$smarty->assign ( "logado", $_SESSION ["logado"] );

	// $_SESSION ["logado"] = "S";
}
?>