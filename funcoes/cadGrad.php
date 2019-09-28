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
$grade = isset ( $_POST ['grade'] ) ? $_POST ['grade'] : "";

$tipo_op = isset ( $_POST ['tipo_op'] ) ? $_POST ['tipo_op'] : "";

$grade = strtoupper($grade);
//Estoque
$qntestoque = isset ( $_POST ['qntestoque'] ) ? $_POST ['qntestoque'] : 0;
$qntminima = isset ( $_POST ['qntminima'] ) ? $_POST ['qntminima'] : 0;
$qntmaxima = isset ( $_POST ['qntmaxima'] ) ? $_POST ['qntmaxima'] : 0;

$data = date('Y-m-d');

$avaria = 0;

$sqlConsulta = "SELECT * FROM grades WHERE codproduto = ".$codproduto." AND TRIM(grade) = '$grade'";

$resultConsulta = pg_query ( $conexao, $sqlConsulta );

$qntlinha = pg_num_rows ( $resultConsulta );

if ($qntlinha > 0){
	pg_close($conexao);
	echo "<script>
	window.location='listGrades.php?codproduto=$codproduto';
	alert('Grade ja cadastrada para este item!');
	</script>";	
} else {
	if($tipo_op == "inserir"){
		//Abrindo Transação
		pg_query ($conexao, "begin");
		
		$sqlGrade = "insert into grades (codproduto,grade,qntestoque,qntminima,qntmaxima,qntavaria) values ('$codproduto','$grade','$qntestoque','$qntminima','$qntmaxima','$avaria')";
		
		$resultGrade = pg_query($conexao, $sqlGrade);
		
		$regGrade = pg_affected_rows($resultGrade);
	
	} elseif($tipo_op == "atualizar") {
		//Abrindo Transação
		pg_query ($conexao, "begin");
		
		$sqlProduto = "update produtos set descricao = " . "'$descricao'" . ", unidade = " . "'$unidade'" ." where codproduto = " . $codproduto;
		
		$resultProduto = pg_query($conexao, $sqlProduto);
		
		$regProduto = pg_affected_rows($resultProduto);
		
	}
	
	if ($regGrade == 1 ){
		pg_query($conexao, "commit");
		pg_close($conexao);
		echo "<script>
	    window.location='listGrades.php?codproduto=$codproduto';
	    alert('Cadastrado ou atualizado com sucesso!');
	    </script>";
	} else {
		pg_query ($conexao, "rollback");
		pg_close($conexao);
		echo "<script>
	    window.location='listProdutos.php';
	    alert('Não cadastrado!');
	    </script>";
	}	
}
?>
