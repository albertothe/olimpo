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

$sqlConsulta = 'select  mov.codmovimento,
								mov.datamov,
								cli.nome AS cliente,
								mov.modalidade,
								fon.forma,
								usu.nome AS vendedor,
								mov.vlrtotal,
								mov.status
							from movimento mov
							inner join clientes cli on cli.codcliente = mov.codcontato
							inner join formapagamentos fon on fon.codforma = mov.codforma
							inner join usuarios usu on usu.codusuario = mov.codusuario';
			
$resultConsulta = pg_query ( $conexao, $sqlConsulta );

$qntlinha = pg_num_rows ( $resultConsulta );


if ($qntlinha > 0) {
	$indice = 0;
	while ( $obj = pg_fetch_object ( $resultConsulta ) ) {
		$codMovimento [] = $obj->codmovimento;
		$dataMov [] = $obj->datamov;
		$vlrTotal [] = $obj->vlrtotal;
		$cliente [] = $obj->cliente;
		$forma [] = $obj->forma;
		$vendedor [] = $obj->vendedor;
		$status [] = $obj->status;
		$indice ++;
	}

	$smarty->assign ( "codMovimento", $codMovimento );
	$smarty->assign ( "dataMov", $dataMov);
	$smarty->assign ( "vlrTotal", $vlrTotal);
	$smarty->assign ( "cliente", $cliente );
	$smarty->assign ( "forma", $forma );
	$smarty->assign ( "vendedor", $vendedor );
	$smarty->assign ( "status", $status );
	
} else {
	$smarty->assign ( "codMovimento", "" );
	$smarty->assign ( "dataMov", "" );
	$smarty->assign ( "vlrTotal", "" );
	$smarty->assign ( "cliente", "" );
	$smarty->assign ( "forma", "" );
	$smarty->assign ( "vendedor", "" );
	$smarty->assign ( "status", "" );
	
}
pg_close($conexao);

$smarty->assign('data_hoje',data_extenso());
$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );

$smarty->display('menu.html');
$smarty->display('listVendas.html');
		
?>