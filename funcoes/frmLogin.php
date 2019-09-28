<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
//require_once("../includes/verificar.php"); //ok
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok


#$smarty->display('cabecalho.html');
$smarty->assign('data_hoje',data_extenso());

//$smarty->assign("login", "");
//$smarty->assign("senha", "");
$smarty->display('frmLogin.html');
#$smarty->display('rodape.html');
		
?>
