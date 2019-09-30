<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok
require_once("../includes/verificar.php");
require_once("../includes/conexao.php");
require_once("../includes/listVend.php");
require_once("../includes/listForm.php");
//require_once("../includes/listClie.php");

$session_usuarioLogado = isset ( $_SESSION ["nomeUsuarioSessao"] ) ? $_SESSION ['nomeUsuarioSessao'] : "";
$session_codUsuarioLogado = isset ( $_SESSION ["codUsuarioSessao"] ) ? $_SESSION ['codUsuarioSessao'] : "";

$codmovimento = isset ( $_GET ['codmovimento'] ) ? $_GET ['codmovimento'] : "";

$getOperacao = isset ( $_GET ['operacao'] ) ? $_GET ['operacao'] : "";
$postOperacao = isset ( $_POST ['operacao'] ) ? $_POST ['operacao'] : "";

$operacao;
if ($postOperacao == ''){
	$operacao = $getOperacao;
} else {
	$operacao = $postOperacao;
}

if ($operacao == 'novo'){
	
	$sqlConsulta = 'SELECT MAX(codmovimento) AS codmovimento FROM movimento';
	
	$resultConsulta = pg_query ( $conexao, $sqlConsulta );
	
	$qntlinha = pg_num_rows ( $resultConsulta );
	
	pg_close($conexao);

	if ($qntlinha == 1){

		$rs = pg_fetch_array($resultConsulta );
		
		$idMovimento = $rs['codmovimento'] + 1;
		
		$codmovimento = $idMovimento;

	} else {
		$codmovimento = 1;
	}	
	
	$dataMov = date('Y-m-d');
	
	$smarty->assign('codmovimento',$codmovimento);
	$smarty->assign('operacao',$operacao);
	$smarty->assign('dataMov',formata_data($dataMov));
	$smarty->assign('data_hoje',data_extenso());
	$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
	$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
	$smarty->display('menu.html');
	$smarty->display('frmCadVnd.html');
	
} elseif ($operacao == 'editar'){

	$sqlConsulta = "SELECT
				mov.codmovimento AS codmovimento,
				mov.datamov AS datamov,
				usu.nome AS vendedor,
				fpg.forma AS formapagamento,
				cli.codcliente AS codcliente,
				cli.nome AS cliente,
				cli.celular AS celular,
				cli.endereco AS endereco,
				cli.cidade AS cidade,
				cli.bairro AS bairro,
				cli.uf AS uf,
				mov.vlrtotal AS vlrtotal
				FROM
				movimento mov
				INNER JOIN
				usuarios usu ON usu.codusuario = mov.codusuario
				INNER JOIN
				clientes cli ON cli.codcliente = mov.codcontato
				INNER JOIN
				formapagamentos fpg ON fpg.codforma = mov.codforma WHERE codmovimento = ".$codmovimento;
	
	$resultConsulta = pg_query ( $conexao, $sqlConsulta );
	
	$qntlinha = pg_num_rows ( $resultConsulta );
	
	pg_close($conexao);
	
	if ($qntlinha == 1){

		$rs = pg_fetch_array($resultConsulta );
		
		$codMovimento = $rs['codmovimento'];
		$dataMov = $rs['datamov'];
		$codCliente = $rs['codcliente'];
		$cliente = $rs['cliente'];
		$forma = $rs['formapagamento'];
		$vendedor = $rs['vendedor'];
		$celular = $rs['celular'];
		$endereco = $rs['endereco'];
		$cidade = $rs['cidade'];
		$bairro = $rs['bairro'];
		$uf = $rs['uf'];
		$vlrTotal = $rs['vlrtotal'];
		
		
		$smarty->assign ( "codmovimento", $codMovimento );
		$smarty->assign ( "dataMov", $dataMov);
		$smarty->assign ( "vlrTotal", $vlrTotal);
		$smarty->assign ( "cliente", $cliente );
		$smarty->assign ( "codCli", $codCliente );
		$smarty->assign ( "forma", $forma );
		$smarty->assign ( "vendedor", $vendedor );
		$smarty->assign ( "celular", $celular );
		$smarty->assign ( "endereco", $endereco );
		$smarty->assign ( "cidade", $cidade );
		$smarty->assign ( "bairro", $bairro );
		$smarty->assign ( "uf", $uf );
		$smarty->assign('operacao',$operacao);
		$smarty->assign('data_hoje',data_extenso());
		$smarty->assign ('session_usuarioLogado', $session_usuarioLogado );
		$smarty->assign ('session_codUsuarioLogado', $session_codUsuarioLogado );
		$smarty->display('menu.html');
		$smarty->display('frmCadVnd.html');
	
	}
	
}
		
?>