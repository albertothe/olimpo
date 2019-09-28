<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok
require_once("../includes/verificar.php");
require_once("../includes/conexao.php");

//Produto
 

$getCliente = isset ( $_GET ['codcliente'] ) ? $_GET ['codcliente'] : "";
$postCliente = isset ( $_POST ['codcliente'] ) ? $_POST ['codcliente'] : "";

$codcliente;
if ($postCliente == ''){
	$codcliente = $getCliente;
} else {
	$codcliente = $postCliente;
}

$nome = isset ( $_POST ['nome'] ) ? $_POST ['nome'] : "";
$endereco = isset ( $_POST ['endereco'] ) ? $_POST ['endereco'] : "";
$cidade = isset ( $_POST ['cidade'] ) ? $_POST ['cidade'] : "";
$uf = isset ( $_POST ['uf'] ) ? $_POST ['uf'] : "";
$bairro = isset ( $_POST ['bairro'] ) ? $_POST ['bairro'] : "";
$celular = isset ( $_POST ['celular'] ) ? $_POST ['celular'] : "";
$status = isset ( $_POST ['status'] ) ? $_POST ['status'] : "A";

$celular = substr($celular, 1, 2) . substr($celular, 5, 4) . substr($celular, 11, 4);

$nome = strtoupper($nome);
$cidade = strtoupper($cidade);
$uf = strtoupper($uf);
$endereco = strtoupper($endereco);
$bairro = strtoupper($bairro);


if ($codcliente == null) {
	$sqlConsulta = 'SELECT codcliente FROM clientes ORDER BY codcliente DESC LIMIT 1 ';

	$resultConsulta = pg_query ( $conexao, $sqlConsulta );

	$qntlinha = pg_num_rows ( $resultConsulta );

	$rs = pg_fetch_array($resultConsulta );

	$idCliente = $rs['codcliente'] + 1;

	$codcliente = $idCliente;
	
} else {
	
		$sqlConsulta = 'select * from clientes where codcliente = '.$codcliente;
	
		$resultConsulta = pg_query ( $conexao, $sqlConsulta );
	
		$qntlinha = pg_num_rows ( $resultConsulta );
	
}

if ($resultConsulta) {
	$sqlCliente = "select inserircliente('$codcliente', '$nome','$endereco', '$cidade', '$uf', '$bairro', '$celular', '$status')";

	$resultCliente = pg_query ( $conexao, $sqlCliente );

	if (!$resultCliente){
		pg_close($conexao);
		echo "<script>
    	window.location='listClientes.php';
    	alert('Não cadastrado ou atualizado!');
    	</script>";
	} else {
		pg_close($conexao);
		echo "<script>
	    window.location='listClientes.php';
	    alert('Cadastrado ou atualizado com sucesso!');
	    </script>";
	}
} else {
	pg_close($conexao);
	echo "<script>
    window.location='listClientes.php';
    alert('Não cadastrado ou atualizado!');
    </script>";
}


?>
