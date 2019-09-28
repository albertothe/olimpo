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

$codproduto = isset ( $_GET ['codproduto'] ) ? $_GET ['codproduto'] : "";

$operacao = isset ( $_GET ['operacao'] ) ? $_GET ['operacao'] : "";

if ($operacao == "ver"){
	//if (empty($codproduto)){

		$sqlConsulta = 'select * from produtos pro inner join estoques est on pro.codproduto = est.codproduto where pro.codproduto = '.$codproduto;
					
		$resultConsulta = pg_query ( $conexao, $sqlConsulta );

		$obj = pg_fetch_array($resultConsulta);

		$codProduto = $obj['codproduto'];
		$descricao = $obj['descricao'];
		$unidade = $obj['unidade'];
		$status = $obj['status'];
		$grade = $obj['grade'];
		$qntestoque = $obj['qntestoque'];
		$qntminima = $obj['qntminima'];
		$qntmaxima = $obj['qntmaxima'];
		$vlrcusto = $obj['vlrcusto'];
		$vlrvnd_ata = $obj['vlrvnd_ata'];
		$vlrvnd_rev = $obj['vlrvnd_rev'];

		pg_close($conexao);
		
		$smarty->assign ( "estatus", "ver" );

		$smarty->assign ( "codProduto", $codProduto );
		$smarty->assign ( "descricao", $descricao );
		$smarty->assign ( "unidade", $unidade );
		$smarty->assign ( "status", $status );
		$smarty->assign ( "grade", $grade );
		$smarty->assign ( "qntestoque", $qntestoque );
		$smarty->assign ( "qntminima", $qntminima );
		$smarty->assign ( "qntmaxima", $qntmaxima );
		$smarty->assign ( "vlrcusto", $vlrcusto );
		$smarty->assign ( "vlrvnd_ata", $vlrvnd_ata );
		$smarty->assign ( "vlrvnd_rev", $vlrvnd_rev );
		
		
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadProd.html');
	//}
} elseif ($operacao == "editar") {

		$sqlConsulta = 'select * from produtos pro inner join estoques est on pro.codproduto = est.codproduto where pro.codproduto = '.$codproduto;
					
		$resultConsulta = pg_query ( $conexao, $sqlConsulta );

		$obj = pg_fetch_array($resultConsulta);

		$codProduto = $obj['codproduto'];
		$descricao = $obj['descricao'];
		$unidade = $obj['unidade'];
		$status = $obj['status'];
		$grade = $obj['grade'];
		$qntestoque = $obj['qntestoque'];
		$qntminima = $obj['qntminima'];
		$qntmaxima = $obj['qntmaxima'];
		$vlrcusto = $obj['vlrcusto'];
		$vlrvnd_ata = $obj['vlrvnd_ata'];
		$vlrvnd_rev = $obj['vlrvnd_rev'];

		pg_close($conexao);
		
		$smarty->assign ( "estatus", "editar" );

		$smarty->assign ( "codProduto", $codProduto );
		$smarty->assign ( "descricao", $descricao );
		$smarty->assign ( "unidade", $unidade );
		$smarty->assign ( "status", $status );
		$smarty->assign ( "grade", $grade );
		$smarty->assign ( "qntestoque", $qntestoque );
		$smarty->assign ( "qntminima", $qntminima );
		$smarty->assign ( "qntmaxima", $qntmaxima );
		$smarty->assign ( "vlrcusto", $vlrcusto );
		$smarty->assign ( "vlrvnd_ata", $vlrvnd_ata );
		$smarty->assign ( "vlrvnd_rev", $vlrvnd_rev );
		
		
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadProd.html');
		
} elseif ($operacao == "novo") {
		
		$smarty->assign ( "estatus", "novo" );
		
		$smarty->assign ( "codProduto", $codproduto );
		$smarty->assign ( "descricao", "" );
		$smarty->assign ( "unidade", "" );
		$smarty->assign ( "status", "" );
		$smarty->assign ( "grade", "" );
		
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadProd.html');
}

		
?>