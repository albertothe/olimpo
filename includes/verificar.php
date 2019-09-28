<?php
/* define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* define o prazo do cache em 30 minutos */
session_cache_expire(10);
$cache_expire = session_cache_expire();

if(!isset($_SESSION)) {  
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:../index.php');
		}
} 
$logado = $_SESSION['login'];
$nomeUsuarioSessao = $_SESSION['nomeUsuarioSessao'];

?>