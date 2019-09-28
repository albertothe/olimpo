<?php
require_once ("includes/conexao.php");

try {
	
	
	$query = $pdo->prepare("SELECT atualizaestoque('E',6,500,'40',1,'V',1);");
	
	//$query->bindValue(1, (int)($_POST['idade']));
	
	if($query->execute() === false){
		$error = $query->errorInfo();
		echo '<font color=\'#ff0000\'>', substr($error[2], 7), '</font>'; 
	} else {
		$query = null;
		$pdo = null;
		echo '<font color=\'#0000ff\'>Cadastrado com sucesso!</font>';
		
	}
} catch(PDOException $pex){
	echo '<font color=\'#ff0000\'>Ocorreu um erro com a base de dados.</font>';
	//loga o erro e etc
}

?>
