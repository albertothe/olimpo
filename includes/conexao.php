<?php
// Local

$host = "localhost";
$port = '5432';
$user = "postgres";
$pass = "p4v800dx";
$d_b  = "olimpo";


$conexao = pg_connect("host=$host dbname=$d_b port=$port user=$user password=$pass");

if (!@($conexao)) {
	print "Deu certo.";
}
//$pdo = new PDO('pgsql:host=localhost;dbname=olimpo', 'postgres', 'p4v800dx');

try {
	$conn = new PDO('pgsql:host=localhost;dbname=olimpo', 'postgres', 'p4v800dx');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

?>
