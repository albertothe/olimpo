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

$tipoMovimento = 'A';
$codMovimento = 2;

if($codproduto){

	try {
		
		$query = $conn->prepare("SELECT atualizaavaria('$e_s',$codproduto,$qntEstMov,'$grade',$codMovimento,'$tipoMovimento',$session_codUsuarioLogado);");
	
		if($query->execute() === false){
			$error = $query->errorInfo();
			echo '<font color=\'#ff0000\'>', substr($error[2], 7), '</font>';
		} else {
			echo "<script>
			    window.location='listEstoques.php';
			    alert('Movimentado avaria com sucesso!');
			    </script>";
		}
	} catch(PDOException $pex){
		echo '<font color=\'#ff0000\'>Ocorreu um erro com a base de dados.</font>';
		//loga o erro e etc
	}	
	
} else {
	echo "<script>
    window.location='listEstoques.php';
    alert('Não cadastrado!');
    </script>";
}	

?>
