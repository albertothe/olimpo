<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/checa_session.php");
require_once("../includes/configuracoes.php");
require_once("../includes/funcoes.php");

if(isset($_SESSION['erro'])) {
	if ($_SESSION["erro"]=="erro_login"){
		$smarty->assign('erro','Erro no login e/ou senha!');
	}
	elseif ($_SESSION["erro"]=="erro_sessao"){
		$smarty->assign('erro','Usuário ou senha incorreta!');
	}
	else{
		$smarty->assign('erro','Erro não identificado');
	}
}
else{
	$smarty->assign('erro','');
}

unset($_SESSION["SessionId"]);
unset($_SESSION["idUsuarioSessao"]);
unset($_SESSION["nomeExtensoSessao"]);
unset($_SESSION["loginSessao"]);
unset($_SESSION["nivelSessao"]);
unset($_SESSION['erro']);
session_destroy();

#$smarty->display('cabecalho.html');
#$smarty->assign('data_hoje',data_extenso());
$smarty->display('erro.html');
#$smarty->display('rodape.html');

?>