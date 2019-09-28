<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok
require_once("../includes/verificar.php");
require_once("../includes/conexao.php");
require_once("../includes/funcoes.php");

//Usuario logado
$session_codUsuarioLogado = isset ( $_SESSION ["codUsuarioSessao"] ) ? $_SESSION ['codUsuarioSessao'] : "";

//Movimento Estoque
$codproduto = isset ( $_POST ['codproduto'] ) ? $_POST ['codproduto'] : "";
$grade = isset ( $_POST ['grade'] ) ? $_POST ['grade'] : "";
$e_s = isset ( $_POST ['e_s'] ) ? $_POST ['e_s'] : "";
$qntEstMov = isset ( $_POST ['qntestmov'] ) ? $_POST ['qntestmov'] : 0;
$observacao = isset ( $_POST ['observacao'] ) ? $_POST ['observacao'] : "";

$tipoMovimento = 'O';
$codMovimento = 2;

$dataEstMov = date('Y-m-d');

if($codproduto){
	//Abrindo Transação
	pg_query ($conexao, "begin");
	
	$sqlOutrosMov = "insert into estmovimento (codproduto,dataestmov,qntestmov,observacao,tipomov,grade) values ('$codproduto','$dataEstMov','$qntEstMov','$observacao','$e_s','$grade')";
	
	$resultOutrosMov = pg_query($conexao, $sqlOutrosMov);

	$regOutrosMov = pg_affected_rows($resultOutrosMov);

}

if ($regOutrosMov == 1 ){
	
	try {
		
		$query = $conn->prepare("SELECT atualizaestoque('$e_s',$codproduto,$qntEstMov,'$grade',$codMovimento,'$tipoMovimento',$session_codUsuarioLogado);");
	
		if($query->execute() === false){
			$error = $query->errorInfo();
			echo '<font color=\'#ff0000\'>', substr($error[2], 7), '</font>';
		} else {
			pg_query ($conexao, "commit");
			pg_close($conexao);
			echo "<script>
			    window.location='frmCadOutrosMov.php';
			    alert('Cadastrado ou atualizado com sucesso!');
			    </script>";
		}
	} catch(PDOException $pex){
		echo '<font color=\'#ff0000\'>Ocorreu um erro com a base de dados.</font>';
		//loga o erro e etc
	}	
	
} else {
	pg_query ($conexao, "rollback");
	pg_close($conexao);
	echo "<script>
    window.location='listEstoques.php';
    alert('NÃ£o cadastrado!');
    </script>";
}	

?>
