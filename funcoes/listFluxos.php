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

$sqlConsulta = 'SELECT 	FLU.codfluxo AS codfluxo, 
					flu.codcontato, 
					datafluxo, 
					vlrmov, 
					complemento, 
					tipomov, 
					fon.fornecedor AS favorecido, 
					fop.forma, 
					status_recibo
				FROM fluxocaixa flu 
				LEFT JOIN fornecedores fon ON fon.codfornecedor = flu.codcontato 
				INNER JOIN formapagamentos fop ON fop.codforma = flu.codforma  
				ORDER BY datafluxo desc';
			
$resultConsulta = pg_query ( $conexao, $sqlConsulta );

$qntlinha = pg_num_rows ( $resultConsulta );


if ($qntlinha > 0) {
	$indice = 0;
	while ( $obj = pg_fetch_object ( $resultConsulta ) ) {
		$codFluxo [] = $obj->codfluxo;
		$codcontato [] = $obj->codcontato;
		$datafluxo [] = formata_data($obj->datafluxo);
		$vlrmov [] = formatarValor($obj->vlrmov);
		$complemento [] = $obj->complemento;
		$forma [] = $obj->forma;
		$favorecido [] = $obj->favorecido;
		$tipomov [] = $obj->tipomov;
		$status_recibo [] = $obj->status_recibo;
		$indice ++;
	}
	$smarty->assign ( "codFluxo", $codFluxo );
	$smarty->assign ( "codcontato", $codcontato );
	$smarty->assign ( "datafluxo", $datafluxo );
	$smarty->assign ( "vlrmov", $vlrmov );
	$smarty->assign ( "complemento", $complemento );
	$smarty->assign ( "forma", $forma );
	$smarty->assign ( "favorecido", $favorecido );
	$smarty->assign ( "tipomov", $tipomov );
	$smarty->assign ( "status_recibo", $status_recibo );
	
} else {
	$smarty->assign ( "codFluxo", "" );
	$smarty->assign ( "codcontato", "" );
	$smarty->assign ( "datafluxo", "" );
	$smarty->assign ( "vlrmov", "" );
	$smarty->assign ( "complemento", "" );
	$smarty->assign ( "forma", "" );
	$smarty->assign ( "favorecido", "" );
	$smarty->assign ( "tipomov", "" );
	$smarty->assign ( "status_recibo", "" );
	
}
pg_close($conexao);

$smarty->assign('data_hoje',data_extenso());
$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );

$smarty->display('menu.html');
$smarty->display('listFluxos.html');
		
?>