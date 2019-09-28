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

$sqlConsulta = 'select * from clientes ORDER BY nome';
			
$resultConsulta = pg_query ( $conexao, $sqlConsulta );

$qntlinha = pg_num_rows ( $resultConsulta );


if ($qntlinha > 0) {
	$indice = 0;
	while ( $obj = pg_fetch_object ( $resultConsulta ) ) {
		$codCliente [] = $obj->codcliente;
		$nome [] = $obj->nome;
		$endereco [] = $obj->endereco;
		$cidade [] = $obj->cidade;
		$uf [] = $obj->uf;
		$bairro [] = $obj->bairro;
		$celular [] = $obj->celular;
		$status [] = $obj->status;
		$indice ++;
	}
	$smarty->assign ( "codCliente", $codCliente );
	$smarty->assign ( "nome", $nome );
	$smarty->assign ( "endereco", $endereco );
	$smarty->assign ( "cidade", $cidade );
	$smarty->assign ( "uf", $uf );
	$smarty->assign ( "bairro", $bairro );
	$smarty->assign ( "celular", $celular );
	$smarty->assign ( "status", $status );
	
} else {
	$smarty->assign ( "codCliente", "" );
	$smarty->assign ( "nome", "" );
	$smarty->assign ( "endereco", "" );
	$smarty->assign ( "cidade", "" );
	$smarty->assign ( "uf", "" );
	$smarty->assign ( "bairro", "" );
	$smarty->assign ( "celular", "" );
	$smarty->assign ( "status", "" );
	
}
pg_close($conexao);

$smarty->assign('data_hoje',data_extenso());
$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );

$smarty->display('menu.html');
$smarty->display('listClientes.html');
		
?>