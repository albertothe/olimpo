<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
//require_once("../includes/verificar.php");
require_once ("../includes/configuracoes.php");
require_once ("../includes/conexao.php");
session_start();

$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE; 
// Recupera a senha, a criptografando em MD5 
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE; 

// Usuário não forneceu a senha ou o login 
if(!$login || !$senha) { 
	echo "Você deve digitar sua senha e login!";	
	exit; 
} 

$logando = "SELECT * FROM usuarios WHERE status = 'A' AND login = '$login' AND senha = '$senha' AND status = 'A'";

$result = pg_query ( $conexao, $logando );

pg_close($conexao);
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
if(pg_num_rows($result) > 0 ){
	$rs = pg_fetch_array($result);
    $_SESSION ["codUsuarioSessao"] = $rs['codusuario'];	
	$_SESSION ["nomeUsuarioSessao"] = $rs['nome'];
	$_SESSION['login'] = $rs['login'];
	$_SESSION['senha'] = $rs['senha'];
	header("location: principal.php"); 	

}else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header("location: ../index.php");
}


?>
