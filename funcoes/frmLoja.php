<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/verificar.php"); //ok
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok

$session_usuarioLogado = isset ( $_SESSION ["nomeUsuarioSessao"] ) ? $_SESSION ['nomeUsuarioSessao'] : "";


#$smarty->display('cabecalho.html');
$smarty->assign('data_hoje',data_extenso());
$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
$smarty->assign ( "FrmVisualizar", '' );
//$smarty->assign("login", "");
//$smarty->assign("senha", "");
$smarty->display('topo.html');
$smarty->display('frmLoja.html');
		
?>
