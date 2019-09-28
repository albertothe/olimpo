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

$codforma = isset ( $_GET ['codforma'] ) ? $_GET ['codforma'] : "";

$operacao = isset ( $_GET ['operacao'] ) ? $_GET ['operacao'] : "";

if ($operacao == "ver"){
		$sqlConsulta = 'select * from formapagamentos where codforma = '.$codforma;
					
		$resultConsulta = pg_query ( $conexao, $sqlConsulta );

		$obj = pg_fetch_array($resultConsulta);

		$codForma = $obj['codforma'];
		$forma = $obj['forma'];
		$taxa = $obj['taxa'];
		$status = $obj['status'];

		pg_close($conexao);
		
		$smarty->assign ( "estatus", "ver" );

		$smarty->assign ( "codForma", $codForma );
		$smarty->assign ( "forma", $forma );
		$smarty->assign ( "taxa", $taxa );
		$smarty->assign ( "status", $status );
		
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadForm.html');

} elseif ($operacao == "editar") {

		$sqlConsulta = 'select * from formapagamentos where codforma = '.$codforma;
					
		$resultConsulta = pg_query ( $conexao, $sqlConsulta );

		$obj = pg_fetch_array($resultConsulta);

		$codForma = $obj['codforma'];
		$forma = $obj['forma'];
		$taxa = $obj['taxa'];
		$status = $obj['status'];;

		pg_close($conexao);
		
		$smarty->assign ( "estatus", "editar" );

		$smarty->assign ( "codForma", $codForma );
		$smarty->assign ( "forma", $forma );
		$smarty->assign ( "taxa", $taxa );
		$smarty->assign ( "status", $status );	
		
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadForm.html');
		
} elseif ($operacao == "novo") {
		
		$smarty->assign ( "estatus", "novo" );
		
		$smarty->assign ( "codForma", "" );
		$smarty->assign ( "forma", "" );
		$smarty->assign ( "taxa", "" );
		
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadForm.html');
}

		
?>