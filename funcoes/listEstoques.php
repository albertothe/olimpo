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

$sqlEstTotal = 'select SUM(qntestoque * vlrcusto) AS esttotal, SUM(qntestoque) AS qnttotal
				from estoques';
	
$resultEstTotal = pg_query ( $conexao, $sqlEstTotal );

$rsEstTotal = pg_fetch_array($resultEstTotal);

$estTotal = $rsEstTotal['esttotal'];
$qntTotal = $rsEstTotal['qnttotal'];

$sqlConsulta = 'select idestoque,
					pro.codproduto AS codigo,
					descricao,
					qntestoque,
					qntavaria,
					qntminima,
					vlrcusto,
					vlrvnd_ata,
					vlrvnd_rev,
					markup,
					medvnddia,
					qntdiasest,
					curva_fin,
					grade
				from estoques est
				inner join produtos pro ON pro.codproduto = est.codproduto
				order by descricao';

$resultConsulta = pg_query ( $conexao, $sqlConsulta );

$qntlinha = pg_num_rows ( $resultConsulta );


if ($qntlinha > 0) {
	$indice = 0;
	while ( $obj = pg_fetch_object ( $resultConsulta ) ) {
		$idEstoque [] = $obj->idestoque;
		$codigo [] = $obj->codigo;
		$descricao [] = $obj->descricao;
							
		$qntestoque [] = $obj->qntestoque;
		$qntavaria [] = $obj->qntavaria;
		$qntminima [] = $obj->qntminima;
		$vlrcusto [] = formatarValor($obj->vlrcusto);
		$vlrvnd_ata [] = formatarValor($obj->vlrvnd_ata);
		$vlrvnd_rev [] = formatarValor($obj->vlrvnd_rev);
		$markup [] = formatarValor($obj->markup);
		$medvnddia [] = $obj->medvnddia;
		$qntdiasest [] = $obj->qntdiasest;
		$curva_fin [] = $obj->curva_fin;
		$grade [] = $obj->grade;
		$indice ++;
	}
	$smarty->assign ( "idEstoque", $idEstoque );
	$smarty->assign ( "codigo", $codigo );
	$smarty->assign ( "descricao", $descricao );
	$smarty->assign ( "qntestoque", $qntestoque );
	$smarty->assign ( "qntavaria", $qntavaria );
	$smarty->assign ( "qntminima", $qntminima );
	$smarty->assign ( "vlrcusto", $vlrcusto );
	$smarty->assign ( "vlrvnd_ata", $vlrvnd_ata );
	$smarty->assign ( "vlrvnd_rev", $vlrvnd_rev );
	$smarty->assign ( "markup", $markup );
	$smarty->assign ( "medvnddia", $medvnddia );
	$smarty->assign ( "curva_fin", $curva_fin );
	$smarty->assign ( "grade", $grade );
	$smarty->assign ( "estTotal", formatarValor($estTotal) );
	$smarty->assign ( "qntTotal", $qntTotal );
} else {
	$smarty->assign ( "idEstoque", "" );
	$smarty->assign ( "codigo", "" );
	$smarty->assign ( "descricao", "" );
	$smarty->assign ( "qntestoque", "" );
	$smarty->assign ( "qntavaria", "" );
	$smarty->assign ( "qntminima", "" );
	$smarty->assign ( "vlrcusto", "" );
	$smarty->assign ( "vlrvnd_ata", "" );
	$smarty->assign ( "vlrvnd_rev", "" );
	$smarty->assign ( "markup", "" );
	$smarty->assign ( "medvnddia", "" );
	$smarty->assign ( "curva_fin", "" );
	$smarty->assign ( "grade", "" );
	$smarty->assign ( "estTotal", "" );
	$smarty->assign ( "qntTotal", "" );
}
pg_close($conexao);

$smarty->assign('data_hoje',data_extenso());
$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );

$smarty->display('menu.html');
$smarty->display('listEstoques.html');
		
?>