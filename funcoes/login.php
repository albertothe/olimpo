<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once '../includes/checa_session.php';
require_once ("../includes/configuracoes.php");
require_once ("../includes/conexao.php");
// require_once ("includes/destroi_session.php");

$login = isset ( $_POST ['login'] ) ? $_POST ['login'] : "";

$senha = isset ( $_POST ['senha'] ) ? $_POST ['senha'] : "";

// $login = $_POST ["login"];
// $senha = $_POST ["senha"];
// session_cache_expire(1);
// session_start();

$db = new conectarLocal ();
$conexao = $db->getConnectionLocal ();

$sql = 'select "idUsuario", "nomeUsuario", "nivelUsuario", "login", "senha", "usuarios"."ativo", "lojas"."fantasia", "lojas"."idLoja"  
		from "usuarios", "lojas"
		where "login"  = ' . "'$login'" . ' and "senha" = ' . "'$senha'" . ' and "usuarios"."idLoja" = "lojas"."idLoja"
		and "usuarios"."ativo"' . " = 'S'";

$execSqlDb = pg_query ( $conexao, $sql );
$obj = pg_fetch_object ( $execSqlDb );
$linhas = pg_affected_rows ( $execSqlDb );

if ($linhas > 0) {
	
	$ativo = $obj->ativo;
	$pass = $obj->senha;
	$user = $obj->login;
	$nivelDB = $obj->nivelUsuario;
	
	$session_id = md5 ( time () . $obj->idUsuario );
	$_SESSION ["SessionId"] = $session_id;
	$_SESSION ["idUsuarioSessao"] = $obj->idUsuario;
	$_SESSION ["nomeUsuarioSessao"] = $obj->nomeUsuario;
	$_SESSION ["loginSessao"] = $obj->login;
	$_SESSION ["nivelSessao"] = $obj->nivelUsuario;
	$_SESSION ["nivelDBSessao"] = $nivelDB;
	$_SESSION ["fantasiaSessao"] = $obj->fantasia;
	$_SESSION ["idLojaSessao"] = $obj->idLoja;
	$_SESSION ["logado"] = "S";
	
	if ($obj->nivelUsuario == "0") {
		$_SESSION ["nivelSessao"] = "Suporte";
	} elseif ($obj->nivelUsuario == "1") {
		$_SESSION ["nivelSessao"] = "Administrador";
	} elseif ($obj->nivelUsuario == "2") {
		$_SESSION ["nivelSessao"] = "Gerente";
	} elseif ($obj->nivelUsuario == "3") {
		$_SESSION ["nivelSessao"] = "Vendedor";
	} elseif ($obj->nivelUsuario == "4") {
		$_SESSION ["nivelSessao"] = "Caixa";
	} elseif ($obj->nivelUsuario == "5") {
		$_SESSION ["nivelSessao"] = "Cadastro";
	} else {
		$_SESSION ["nivelSessao"] = "Nao Identificado";
	}
	
	//if ($_SESSION ['nivelDBSessao'] == "3" || $_SESSION ['nivelSessao'] == "4") {
		header ( "location: ../forms/formVendas.php" );
	//} else {
	//	header ( "location: ../forms/home.php" );
	//}
	// }
	// else {
	// header ( "location: home.php" );
	// }
} else {
	$_SESSION ["erro"] = "erro_login";
	header ( "location: ../funcoes/erro.php" );
}
// $smarty->display('usuario',$_SESSION["login"]);
$db->fechar ( $db );
?>