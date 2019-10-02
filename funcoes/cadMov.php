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
$datamov = isset ( $_POST ['datamov'] ) ? $_POST ['datamov'] : date('Ymd');
$vendedor = isset ( $_POST ['vendedor'] ) ? $_POST ['vendedor'] : "";
$formapagamento = isset ( $_POST ['formapagamento'] ) ? $_POST ['formapagamento'] : "";
$codcliente = isset ( $_POST ['codcliente'] ) ? $_POST ['codcliente'] : "";
$modalidade = 'VAREJO';
$tipomovimento = 'V';

//modulo
$modulo = isset ( $_POST ['modulo'] ) ? $_POST ['modulo'] : "";

//itens venda
$codproduto = isset ( $_POST ['codproduto'] ) ? $_POST ['codproduto'] : "";
$grade = isset ( $_POST ['grade'] ) ? $_POST ['grade'] : "";
$quant = isset ( $_POST ['quant'] ) ? $_POST ['quant'] : "";
$vlrunit = isset ( $_POST ['vlrunit'] ) ? $_POST ['vlrunit'] : "";
$vlrdesc = isset ( $_POST ['vlrdesc'] ) ? $_POST ['vlrdesc'] : "";
$vlrcusto = 0;
$vlrtotal = $quant * $vlrunit;

if ($modulo == 'capavenda'){

	//Abrindo Transação
	pg_query ($conexao, "begin");

	$sqlConsulta = 'SELECT codmovimento FROM movimento WHERE codmovimento = '.$codmovimento;
	
	$resultConsulta = pg_query ( $conexao, $sqlConsulta );
	
	$qntlinha = pg_num_rows ( $resultConsulta );	

	if($qntlinha == 1){
		$sqlUpdateMov = 'UPDATE movimento SET datamov = '."'$datamov'".',codusuario = '."$vendedor".',codcontato = '."$codcliente".',codforma = '."$formapagamento".' WHERE codmovimento = '."$codmovimento";

		$resultUpdateMov = pg_query($conexao, $sqlUpdateMov);
		
		$regUpdateMov = pg_affected_rows($resultUpdateMov);
		
		if ($regUpdateMov == 1 ){
			pg_query ($conexao, "commit");
			pg_close($conexao);
			echo "<script>
		    window.location='frmCadVnd.php?operacao=editar&codmovimento=$codmovimento';
		    alert('Cadastrado ou atualizado com sucesso!');
		    </script>";
		} else {
			pg_query ($conexao, "rollback");
			pg_close($conexao);
			echo "<script>
		    window.location='listVendas.php';
		    alert('NÃ£o cadastrado!');
		    </script>";
		}
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
				echo "<script>
			    window.location='frmCadVnd.php?operacao=editar&codmovimento=$idMovimento';
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
} elseif ($modulo == 'itemvenda'){
	//Abrindo Transação
	pg_query ($conexao, "begin");
	
	$sqlConsulta = 'SELECT * FROM movimento_itens WHERE codmovimento = '.$codmovimento.' AND codproduto = '.$codproduto.' AND TRIM(grade) = '."'$grade'";

	$resultConsulta = pg_query ( $conexao, $sqlConsulta );
	
	$qntlinha = pg_num_rows ( $resultConsulta );
	
	if($qntlinha == 1){
		$sqlUpdateMovItem = 'UPDATE movimento_itens SET qntmov = '."$quant".',vlrunit = '."$vlrunit".',vlrdesconto = '."$vlrdesc".',vlrtotal = '."$vlrtotal".' WHERE codmovimento = '.$codmovimento.' AND codproduto = '.$codproduto.' AND TRIM(grade) = '."'$grade'";

		$resultUpdateMovItem = pg_query($conexao, $sqlUpdateMovItem);
	
		$regUpdateMovItem = pg_affected_rows($resultUpdateMovItem);
	
		if ($regUpdateMovItem == 1 ){
			pg_query ($conexao, "commit");
			pg_close($conexao);
			echo "<script>
			window.location='frmCadVnd.php?operacao=editar&codmovimento=$codmovimento';
			alert('Cadastrado ou atualizado com sucesso!');
			</script>";
		} else {
			pg_query ($conexao, "rollback");
			pg_close($conexao);
			echo "<script>
		    window.location='frmCadVnd.php?operacao=editar&codmovimento=$codmovimento';
		    alert('Item não atualizado!');
		    </script>";
		}
	} else {

		$sqlInsertItem = "insert into movimento_itens (codmovimento,codproduto,grade,datamov,qntmov,vlrunit,vlrtotal,status,vlrcusto,vlrdesconto)
		values ($codmovimento,$codproduto,'$grade','$datamov',$quant,$vlrunit,$vlrtotal,'P',$vlrcusto,$vlrdesc)";

		$resultInsertMov = pg_query($conexao, $sqlInsertItem);
			
		$regInsertMov = pg_affected_rows($resultInsertMov);
			
		if ($regInsertMov == 1 ){
			pg_query ($conexao, "commit");
			pg_close($conexao);
			echo "<script>
			window.location='frmCadVnd.php?operacao=editar&codmovimento=$codmovimento';
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
	
	
	

?>
