<?php
	//require_once("../includes/destroi_session.php");
	session_start(); 
    session_destroy(); 
	header("location: ../index.php");
?>