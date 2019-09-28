<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok
require_once("../includes/verificar.php");
require_once("../includes/conexao.php");

//Produto
$codproduto = isset ( $_POST ['codproduto'] ) ? $_POST ['codproduto'] : "";
$descricao = isset ( $_POST ['descricao'] ) ? $_POST ['descricao'] : "";
$unidade = isset ( $_POST ['unidade'] ) ? $_POST ['unidade'] : "PC";
$grade = isset ( $_POST ['grade'] ) ? $_POST ['grade'] : "S";
$status = isset ( $_POST ['status'] ) ? $_POST ['status'] : "A";

$descricao = strtoupper($descricao);
$unidade = strtoupper($unidade );
//Estoque
$qntestoque = isset ( $_POST ['qntestoque'] ) ? $_POST ['qntestoque'] : 0;
$qntminima = isset ( $_POST ['qntminima'] ) ? $_POST ['qntminima'] : 0;
$qntmaxima = isset ( $_POST ['qntmaxima'] ) ? $_POST ['qntmaxima'] : 0;
$vlrcusto = isset ( $_POST ['vlrcusto'] ) ? $_POST ['vlrcusto'] : 1;
$vlrvnd_ata = isset ( $_POST ['vlrvnd_ata'] ) ? $_POST ['vlrvnd_ata'] : 1;
$vlrvnd_rev = isset ( $_POST ['vlrvnd_rev'] ) ? $_POST ['vlrvnd_rev'] : 1;
$datacad = date('Y-m-d');

if(!empty($vlrvnd_ata)){
	$markup = ($vlrcusto / $vlrvnd_ata) * 100;
} else {
	$markup = 1;
}
$avaria = 0;

if ($codproduto == null) {
	
	$sqlConsulta = 'SELECT codproduto FROM produtos ORDER BY codproduto DESC LIMIT 1 ';

	$resultConsulta = pg_query ( $conexao, $sqlConsulta );

	$qntlinha = pg_num_rows ( $resultConsulta );

	$rs = pg_fetch_array($resultConsulta );

	$idProduto = $rs['codproduto'] + 1;

	$codproduto = $idProduto;
	
} else {
	$sqlConsulta = 'select * from produtos where codproduto = '.$codproduto;
	
	$resultConsulta = pg_query ( $conexao, $sqlConsulta );
	
	$qntlinha = pg_num_rows ( $resultConsulta );	
}

if ($resultConsulta) {
	$sqlProduto = "select inserirproduto('$codproduto', '$descricao', '$unidade', '$datacad', '$status', '$grade', '$qntestoque', '$qntminima', '$qntmaxima', '$vlrcusto', '$vlrvnd_ata', '$vlrvnd_rev', '$markup', '$avaria')";

	$resultProduto = pg_query ( $conexao, $sqlProduto );

	if (!$resultProduto){
		pg_close($conexao);
		echo "<script>
    	window.location='listProdutos.php';
    	alert('Não cadastrado ou atualizado!');
    	</script>";
	} else {
		pg_close($conexao);
		echo "<script>
	    window.location='listProdutos.php';
	    alert('Cadastrado ou atualizado com sucesso!');
	    </script>";
	}
} else {
	pg_close($conexao);
	echo "<script>
    window.location='listFornecedores.php';
    alert('NÃ£o cadastrado!');
    </script>";
}

?>
