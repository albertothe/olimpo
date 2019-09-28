<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok
require_once("../includes/verificar.php");
require_once("../includes/conexao.php");
/*
$getUsuario = isset ( $_GET ['codusuario'] ) ? $_GET ['codusuario'] : "";
$postUsuario = isset ( $_POST ['codusuario'] ) ? $_POST ['codusuario'] : "";

$codusuario;
if ($postUsuario == ''){
	$codusuario = $getUsuario;
} else {
	$codusuario = $postUsuario;
}*/

$codusuario = isset ( $_POST ['codusuario'] ) ? $_POST ['codusuario'] : "";
$nome = isset ( $_POST ['nome'] ) ? $_POST ['nome'] : "";
$senha = isset ( $_POST ['senha'] ) ? $_POST ['senha'] : "";
$tipousuario = isset ( $_POST ['tipousuario'] ) ? $_POST ['tipousuario'] : "C";
$perfil = isset ( $_POST ['perfil'] ) ? $_POST ['perfil'] : "";
$login = isset ( $_POST ['login'] ) ? $_POST ['login'] : "";
$status = isset ( $_POST ['status'] ) ? $_POST ['status'] : "A";

$tipo_op = isset ( $_POST ['tipo_op'] ) ? $_POST ['tipo_op'] : "A";

$nome = strtoupper($nome);
$perfil = strtoupper($perfil);

if ($codusuario == null) {
	$sqlConsulta = 'SELECT codusuario FROM usuarios ORDER BY codusuario DESC LIMIT 1 ';

	$resultConsulta = pg_query ( $conexao, $sqlConsulta );

	$qntlinha = pg_num_rows ( $resultConsulta );

	$rs = pg_fetch_array($resultConsulta );

	$idUsuario = $rs['codusuario'] + 1;

	$codusuario = $idUsuario;
	
} else {

			$sqlConsulta = 'select * from usuarios where codusuario = '.$codusuario;
		
			$resultConsulta = pg_query ( $conexao, $sqlConsulta );
		
			$qntlinha = pg_num_rows ( $resultConsulta );
}

if ($qntlinha > 0) {

	if ($tipo_op == 'passawd'){

		$sqlSenha = 'update "usuarios" set "senha" = ' . "md5('$senha')" .' where "codusuario" = ' . "'$codusuario'";
		
		$resultUsuario = pg_query ( $conexao, $sqlSenha );

	} else {
		$sqlUsuario = "select inserirusuario('$codusuario', '$nome','$senha', '$tipousuario', '$perfil', '$login', '$status')";
		
		$resultUsuario = pg_query ( $conexao, $sqlUsuario );
	}
	
	if (!$resultUsuario){
		pg_close($conexao);
		echo "<script>
    	window.location='listUsarios.php';
    	alert('Não cadastrado ou atualizado!');
    	</script>";
	} else {
		pg_close($conexao);
		echo "<script>
	    window.location='listUsuarios.php';
	    alert('Cadastrado ou atualizado com sucesso!');
	    </script>";
	}
	
} else {
	pg_close($conexao);
	echo "<script>
    window.location='listUsuarios.php';
    alert('Não cadastrado ou atualizado!');
    </script>";
}


?>
