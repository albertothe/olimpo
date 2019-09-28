<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok
require_once("../includes/verificar.php");
require_once("../includes/conexao.php");

//Produto
$codforma = isset ( $_POST ['codforma'] ) ? $_POST ['codforma'] : "";
$forma = isset ( $_POST ['forma'] ) ? $_POST ['forma'] : "";
$taxa = isset ( $_POST ['taxa'] ) ? $_POST ['taxa'] : "";
$status = isset ( $_POST ['status'] ) ? $_POST ['status'] : "A";

$tipo = 'F';

$forma = strtoupper($forma);

if ($codforma == null) {
	
	$sqlConsulta = 'SELECT codforma FROM formapagamentos ORDER BY codforma DESC LIMIT 1 ';
	
	$resultConsulta = pg_query ( $conexao, $sqlConsulta );
	
	$qntlinha = pg_num_rows ( $resultConsulta );

	$rs = pg_fetch_array($resultConsulta );
	
	$idForma = $rs['codforma'] + 1;

	$codforma = $idForma;
} else {
	
	$sqlConsulta = 'select * from formapagamentos where codforma = '.$codforma;
	
	$resultConsulta = pg_query ( $conexao, $sqlConsulta );
	
	$qntlinha = pg_num_rows ( $resultConsulta );
	
}

if ($resultConsulta) {
	$sqlForma = "select inserirforma('$codforma', '$forma', '$taxa', '$status')";
	
	$resultForma = pg_query ( $conexao, $sqlForma );
	
	if (!$resultForma){
		pg_close($conexao);
		echo "<script>
    	window.location='listFormapagamentos.php';
    	alert('Não cadastrado ou atualizado!');
    	</script>";
	} else {
		pg_close($conexao);
		echo "<script>
	    window.location='listFormapagamentos.php';
	    alert('Cadastrado ou atualizado com sucesso!');
	    </script>";
	}
} else {
	pg_close($conexao);
	echo "<script>
    window.location='listFormapagamentos.php';
    alert('NÃ£o cadastrado!');
    </script>";
}

?>
