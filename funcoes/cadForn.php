<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok
require_once("../includes/verificar.php");
require_once("../includes/conexao.php");

//Produto
$codfornecedor = isset ( $_POST ['codfornecedor'] ) ? $_POST ['codfornecedor'] : "";
$fornecedor = isset ( $_POST ['fornecedor'] ) ? $_POST ['fornecedor'] : "";
$fone = isset ( $_POST ['fone'] ) ? $_POST ['fone'] : "";
$status = isset ( $_POST ['status'] ) ? $_POST ['status'] : "A";

$tipo = 'F';

$fornecedor = strtoupper($fornecedor);

if ($codfornecedor == null) {
	$sqlConsulta = 'SELECT codfornecedor FROM fornecedores ORDER BY codfornecedor DESC LIMIT 1 ';
	
	$resultConsulta = pg_query ( $conexao, $sqlConsulta );
	
	$qntlinha = pg_num_rows ( $resultConsulta );

	$rs = pg_fetch_array($resultConsulta );
	
	$idFornecedor = $rs['codfornecedor'] + 1;

	$codfornecedor = $idFornecedor;
} else {
	
	$sqlConsulta = 'select * from fornecedores where codfornecedor = '.$codfornecedor;
	
	$resultConsulta = pg_query ( $conexao, $sqlConsulta );
	
	$qntlinha = pg_num_rows ( $resultConsulta );
	
}

if ($resultConsulta) {
	$sqlFornecedor = "select inserirfornecedor('$codfornecedor', '$fornecedor', '$fone', '$tipo', '$status')";
	
	$resultFornecedor = pg_query ( $conexao, $sqlFornecedor );
	
	if (!$resultFornecedor){
		pg_close($conexao);
		echo "<script>
    	window.location='listFornecedores.php';
    	alert('Não cadastrado ou atualizado!');
    	</script>";
	} else {
		pg_close($conexao);
		echo "<script>
	    window.location='listFornecedores.php';
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
