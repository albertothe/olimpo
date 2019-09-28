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

//Capa da venda
$codmovimento = isset ( $_POST ['codmovimento'] ) ? $_POST ['codmovimento'] : "";
$datamov = isset ( $_POST ['datamov'] ) ? $_POST ['datamov'] : "";
$vendedor = isset ( $_POST ['vendedor'] ) ? $_POST ['vendedor'] : "";
$formapagamento = isset ( $_POST ['formapagamento'] ) ? $_POST ['formapagamento'] : "";
$codcliente = isset ( $_POST ['codcliente'] ) ? $_POST ['codcliente'] : "";
$modalidade = 'VAREJO';
$tipomovimento = 'V';




if($codmovimento){

	//Abrindo Transação
	pg_query ($conexao, "begin");

	$sqlConsulta = 'SELECT codmovimento FROM movimento WHERE codmovimento = '.$codmovimento;
	
	$resultConsulta = pg_query ( $conexao, $sqlConsulta );
	
	$qntlinha = pg_num_rows ( $resultConsulta );	

	if($qntlinha == 1){
		echo "Aqui";
		Exit;
	} else {

		$sqlConsMov = 'SELECT MAX(codmovimento) AS codmovimento FROM movimento';
		
		$resultConsMov = pg_query ( $conexao, $sqlConsMov );
		
		$qntlinhaMov = pg_num_rows ( $resultConsMov );
		
		if ($qntlinhaMov == 1){
			$rs = pg_fetch_array($resultConsMov );
		
			$idMovimento = $rs['codmovimento'] + 1;

			$sqlInsertMov = "insert into movimento (codmovimento,datamov,modalidade,vlrtotal,status,codusuario,codcontato,codforma,tipomovimento,fluxo) 
							values ('$idMovimento','$datamov','$modalidade',0,'P','$vendedor','$codcliente','$formapagamento','$tipomovimento','F')";
			
			$resultInsertMov = pg_query($conexao, $sqlInsertMov);
			
			$regInsertMov = pg_affected_rows($resultInsertMov);
			
			if ($regInsertMov == 1 ){
				pg_query ($conexao, "commit");
				pg_close($conexao);
				"SELECT
				mov.codmovimento AS codmovimento,
				mov.datamov AS datamov,
				usu.nome AS vendedor,
				fpg.forma AS formapagamento,
				cli.codcliente AS codcliente,
				cli.nome AS cliente,
				cli.celular AS celular,
				cli.endereco AS endereco,
				cli.cidade AS cidade,
				cli.bairro AS bairro,
				cli.uf AS uf
				FROM
				movimento mov
				INNER JOIN
				usuarios usu ON usu.codusuario = mov.codusuario
				INNER JOIN
				clientes cli ON cli.codcliente = mov.codcontato
				INNER JOIN
				formapagamentos fpg ON fpg.codforma = mov.codforma"
				echo "<script>
			    window.location='listVendas.php';
			    alert('Cadastrado ou atualizado com sucesso!');
			    </script>";
			} else {
				pg_query ($conexao, "rollback");
				pg_close($conexao);
				echo "<script>
			    window.location='listEstoques.php';
			    alert('NÃ£o cadastrado!');
			    </script>";
			}
		}

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
