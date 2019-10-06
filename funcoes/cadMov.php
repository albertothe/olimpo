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
$getMovimento = isset ( $_GET ['codmovimento'] ) ? $_GET ['codmovimento'] : "";
$postMovimento = isset ( $_POST ['codmovimento'] ) ? $_POST ['codmovimento'] : "";

$codmovimento;
if ($postMovimento == ''){
	$codmovimento = $getMovimento;
} else {
	$codmovimento = $postMovimento;
}

$datamov = isset ( $_POST ['datamov'] ) ? $_POST ['datamov'] : date('Ymd');
$vendedor = isset ( $_POST ['vendedor'] ) ? $_POST ['vendedor'] : "";
$formapagamento = isset ( $_POST ['formapagamento'] ) ? $_POST ['formapagamento'] : "";
$codcliente = isset ( $_POST ['codcliente'] ) ? $_POST ['codcliente'] : "";
$modalidade = 'VAREJO';
$tipomovimento = 'V';

//modulo
$getModulo = isset ( $_GET ['modulo'] ) ? $_GET ['modulo'] : "";
$postModulo = isset ( $_POST ['modulo'] ) ? $_POST ['modulo'] : "";

$modulo;
if ($postModulo == ''){
	$modulo = $getModulo;
} else {
	$modulo = $postModulo;
}
//itens venda
$codproduto = isset ( $_POST ['codproduto'] ) ? $_POST ['codproduto'] : "";
$grade = isset ( $_POST ['grade'] ) ? $_POST ['grade'] : "";
$quant = isset ( $_POST ['quant'] ) ? $_POST ['quant'] : "";
$vlrunit = isset ( $_POST ['vlrunit'] ) ? $_POST ['vlrunit'] : "";
$vlrdesc = isset ( $_POST ['vlrdesc'] ) ? $_POST ['vlrdesc'] : "";
$percdesc = isset ( $_POST ['percdesc'] ) ? $_POST ['percdesc'] : "";
$vlrcusto = 0;


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
	
	$vlrtotal = $quant * $vlrunit;
	$desconto = 0;
	if($vlrdesc <> ''){
		$desconto = $vlrdesc;
		$vlrtotal = $vlrtotal - $vlrdesc;
	} elseif ($percdesc <> ''){
		$percdesc = $percdesc / 100;
		$desconto = ($vlrtotal * $percdesc);
		$vlrtotal = $vlrtotal - ($vlrtotal * $percdesc);
	}

	//Abrindo Transação
	pg_query ($conexao, "begin");
	
	$sqlConsulta = 'SELECT * FROM movimento_itens WHERE codmovimento = '.$codmovimento.' AND codproduto = '.$codproduto.' AND TRIM(grade) = '."'$grade'";

	$resultConsulta = pg_query ( $conexao, $sqlConsulta );
	
	$qntlinha = pg_num_rows ( $resultConsulta );
	
	if($qntlinha == 1){
		$sqlUpdateMovItem = 'UPDATE movimento_itens SET qntmov = '."$quant".',vlrunit = '."$vlrunit".',vlrdesconto = '."$desconto".',vlrtotal = '."$vlrtotal".' WHERE codmovimento = '.$codmovimento.' AND codproduto = '.$codproduto.' AND TRIM(grade) = '."'$grade'";

		$resultUpdateMovItem = pg_query($conexao, $sqlUpdateMovItem);
	
		$regUpdateMovItem = pg_affected_rows($resultUpdateMovItem);
	
		if ($regUpdateMovItem == 1 ){
			
			$sqlConsultaTotVnd = "SELECT SUM(mvi.vlrtotal) AS totalvnd
								FROM movimento_itens mvi
								WHERE mvi.qntmov > 0 AND codmovimento = ".$codmovimento;
				
			$resultConsultaTotVnd = pg_query ( $conexao, $sqlConsultaTotVnd );
			
			$rsTotVnd = pg_fetch_array($resultConsultaTotVnd);
			
			$totalVnd = $rsTotVnd['totalvnd'];
				
			$SqltotalVnd = 'update movimento set vlrtotal  = '."$totalVnd".' where codmovimento = '."$codmovimento";
			
			$resulTotalVnd = pg_query($conexao, $SqltotalVnd);
				
			$regUpdateTotal = pg_affected_rows($resulTotalVnd);
				
			if ($regUpdateTotal == 1 ){
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
			pg_query ($conexao, "rollback");
			pg_close($conexao);
			echo "<script>
		    window.location='frmCadVnd.php?operacao=editar&codmovimento=$codmovimento';
		    alert('Item não atualizado!');
		    </script>";
		}
	} else {

		$sqlInsertItem = "insert into movimento_itens (codmovimento,codproduto,grade,datamov,qntmov,vlrunit,vlrtotal,status,vlrcusto,vlrdesconto)
		values ($codmovimento,$codproduto,'$grade','$datamov',$quant,$vlrunit,$vlrtotal,'P',$vlrcusto,$desconto)";

		$resultInsertMov = pg_query($conexao, $sqlInsertItem);
			
		$regInsertMov = pg_affected_rows($resultInsertMov);
			
		if ($regInsertMov == 1 ){
			
			$sqlConsultaTotVnd = "SELECT SUM(mvi.vlrtotal) AS totalvnd
								FROM movimento_itens mvi
								WHERE mvi.qntmov > 0 AND codmovimento = ".$codmovimento;
			
			$resultConsultaTotVnd = pg_query ( $conexao, $sqlConsultaTotVnd );
				
			$rsTotVnd = pg_fetch_array($resultConsultaTotVnd);
				
			$totalVnd = $rsTotVnd['totalvnd'];
			
			$SqltotalVnd = 'update movimento set vlrtotal  = '."$totalVnd".' where codmovimento = '."$codmovimento";

			$resulTotalVnd = pg_query($conexao, $SqltotalVnd);			
			
			$regUpdateTotal = pg_affected_rows($resulTotalVnd);
			
			if ($regUpdateTotal == 1 ){
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
				alert('Não cadastrado!');
				</script>";				
			}
		} else {
			pg_query ($conexao, "rollback");
			pg_close($conexao);
			echo "<script>
		    window.location='frmCadVnd.php?operacao=editar&codmovimento=$codmovimento';
		    alert('Não cadastrado!');
		    </script>";
		}
	}
	
} elseif ($modulo == 'finalizavenda'){
	//Abrindo Transação
	pg_query ($conexao, "begin");

	$faturamentoMov = 'F';
	$e_s = 'S';
	$tipoMovimento = 'V';

	$sqlFinalVnd = 'update movimento set "status" = '."'$faturamentoMov'".' where "codmovimento" = ' . "'$codmovimento'";
	
	$resultFinalVnd = pg_query($conexao, $sqlFinalVnd);
	
	$sqlFinalVndItens = 'update movimento_itens set "status" = '."'$faturamentoMov'".'  where "codmovimento" = ' . "'$codmovimento'";
	
	$resulFinalVndItens = pg_query($conexao, $sqlFinalVndItens );
	
	$regFinalVnd = pg_affected_rows($resultFinalVnd);
	$regFinalVndItens = pg_affected_rows($resulFinalVndItens);
	
	if ($regFinalVnd == 1 && $regFinalVndItens > 0){
		try {

			$sqlConsultaItens = "SELECT	codproduto,
								grade,
								qntmov
								FROM
								movimento_itens
								WHERE qntmov > 0 AND codmovimento = ".$codmovimento;
			
			$resultConsultaItens = pg_query ( $conexao, $sqlConsultaItens );
			
			$qntlinhaItens = pg_num_rows ( $resultConsultaItens );
			
			if ($qntlinhaItens > 0) {
				$indice = 0;
				while ( $obj = pg_fetch_object ( $resultConsultaItens ) ) {
					//$codproduto [] = $obj->codproduto;
					//$grade [] = $obj->grade;
					//$qntEstMov [] = $obj->qntmov;
		
					$query = $conn->prepare("SELECT atualizaestoque('$e_s',$obj->codproduto,$obj->qntmov,'$obj->grade',$codmovimento,'$tipoMovimento',$session_codUsuarioLogado);");
					
					$indice ++;
				}
			
			}
			if($query->execute() === false){
				$error = $query->errorInfo();
				echo '<font color=\'#ff0000\'>', substr($error[2], 7), '</font>';
			} else {
				pg_query ($conexao, "commit");
				pg_close($conexao);
				echo "<script>
				    window.location='listVendas.php';
				    alert('Cadastrado ou atualizado com sucesso!');
				    </script>";
			}
		} catch(PDOException $pex){
			echo '<font color=\'#ff0000\'>Ocorreu um erro com a base de dados.</font>';
			//loga o erro e etc
		}
	}
	pg_query ($conexao, "rollback");
	pg_close($conexao);
	echo "<script>
    window.location='listVendas.php';
    alert('Venda não finalizada!');
    </script>";

	
}
	


?>
