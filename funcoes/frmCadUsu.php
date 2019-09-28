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

$codusuario = isset ( $_GET ['codusuario'] ) ? $_GET ['codusuario'] : "";

$operacao = isset ( $_GET ['operacao'] ) ? $_GET ['operacao'] : "";

if ($operacao == "ver"){
		$sqlConsulta = 'select * from usuarios where codusuario = '.$codusuario;
					
		$resultConsulta = pg_query ( $conexao, $sqlConsulta );

		$obj = pg_fetch_array($resultConsulta);

		$codUsuario = $obj['codusuario'];
		$nome = $obj['nome'];
		$senha = $obj['senha'];
		$tipousuario = $obj['tipousuario'];
		$perfil = $obj['perfil'];
		$login = $obj['login'];
		$status = $obj['status'];

		pg_close($conexao);
		
		$smarty->assign ( "estatus", "ver" );

		$smarty->assign ( "codUsuario", $codUsuario );
		$smarty->assign ( "nome", $nome );
		$smarty->assign ( "senha", $senha );
		$smarty->assign ( "tipousuario", $tipousuario );
		$smarty->assign ( "perfil", $perfil );
		$smarty->assign ( "login", $login );
		$smarty->assign ( "status", $status );
		
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadUsu.html');

} elseif ($operacao == "editar") {
		$sqlConsulta = 'select * from usuarios where codusuario = '.$codusuario;
			
		$resultConsulta = pg_query ( $conexao, $sqlConsulta );
		
		$obj = pg_fetch_array($resultConsulta);
		
		$codUsuario = $obj['codusuario'];
		$nome = $obj['nome'];
		$senha = $obj['senha'];
		$tipousuario = $obj['tipousuario'];
		$perfil = $obj['perfil'];
		$login = $obj['login'];
		$status = $obj['status'];

		pg_close($conexao);
		
		$smarty->assign ( "estatus", "editar" );

		$smarty->assign ( "codUsuario", $codUsuario );
		$smarty->assign ( "nome", $nome );
		$smarty->assign ( "senha", $senha );
		$smarty->assign ( "tipousuario", $tipousuario );
		$smarty->assign ( "perfil", $perfil );
		$smarty->assign ( "login", $login );
		$smarty->assign ( "status", $status );
		
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadUsu.html');
		
} elseif ($operacao == "novo") {
		
		$smarty->assign ( "estatus", "novo" );
		
		$smarty->assign ( "codUsuario", "" );
		$smarty->assign ( "nome", "" );
		$smarty->assign ( "senha", "" );
		$smarty->assign ( "tipousuario", "" );
		$smarty->assign ( "perfil", "" );
		$smarty->assign ( "login", "" );
		
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadUsu.html');
}

		
?>