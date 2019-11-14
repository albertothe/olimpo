<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("configuracoes.php"); //ok
require_once("funcoes.php"); //ok
require_once("conexao.php");

$codproduto = $_GET['codproduto'];

$sqlConsulta = 'select "idgrade","grade","qntestoque" from "grades" where "codproduto" = '.$codproduto.' order by "grade"';
			
$resultConsulta = pg_query ( $conexao, $sqlConsulta );

$qntlinha = pg_num_rows ( $resultConsulta );

pg_close($conexao);

/*
if ($qntlinha > 0) {
	$indice = 0;
	while ( $obj = pg_fetch_object ( $resultConsulta ) ) {
		$idGrade [] = $obj->idgrade;
		$grade [] = $obj->grades;
		$indice ++;
	}
}

$smarty->assign ( "idGrade", $descricao );
$smarty->assign ( "grade", $grade );

*/

echo "<label>Grades: </label><select name='grade' class='browser-default custom-select'>";
while($reg = pg_fetch_object($resultConsulta)){
	echo "<option value='$reg->grade'>$reg->grade ($reg->qntestoque)</option>";
}
echo "</select>";

?>