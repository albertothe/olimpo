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

$codproduto = $_GET['codproduto'];

$sqlConsulta = 'select 
					pro.codproduto,
					descricao,
					gra.grade AS grades,
					qntestoque,
					gra.qntavaria AS avaria
				from produtos pro
				inner join grades gra ON gra.codproduto = pro.codproduto WHERE pro.codproduto = '.$codproduto.' ORDER BY gra.grade';
			
$resultConsulta = pg_query ( $conexao, $sqlConsulta );

$qntlinha = pg_num_rows ( $resultConsulta );

/*$rs = pg_fetch_array($resultConsulta);
						
$idProd = $rs['codproduto'];
if ($idProd > 0) {
	$smarty->assign ( "idProd", $idProd );
} else {
	$smarty->assign ( "idProd", $codproduto );
}*/

pg_close($conexao);

if ($qntlinha > 0) {
	$indice = 0;
	while ( $obj = pg_fetch_object ( $resultConsulta ) ) {
		
		$codProduto [] = $obj->codproduto;
		$descricao [] = $obj->descricao;
		$grade [] = $obj->grades;
		$qntestoque [] = $obj->qntestoque;
		$qntavaria [] = $obj->avaria;
		$indice ++;
		
	}
	
	$smarty->assign ( "codProduto", $codProduto );
	$smarty->assign ( "descricao", $descricao );
	$smarty->assign ( "grade", $grade );
	$smarty->assign ( "qntestoque", $qntestoque );
	$smarty->assign ( "qntavaria", $qntavaria );
	$smarty->assign ( "qntlinha", $qntlinha );

	$smarty->assign ('data_hoje',data_extenso());
	$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
	$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );

	$smarty->display('modalGrades.html');

} else {

	
	$smarty->assign ( "codProduto", "" );
	$smarty->assign ( "descricao", "" );
	$smarty->assign ( "grade", "" );
	$smarty->assign ( "qntestoque", "" );

	$smarty->assign('data_hoje',data_extenso());
	$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
	$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );

	$smarty->display('modalGrades.html');
	
}

	
?>