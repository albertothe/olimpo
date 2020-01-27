<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
require_once("../includes/configuracoes.php"); //ok
require_once("../includes/funcoes.php"); //ok
require_once("../includes/verificar.php");
require_once("../includes/conexao.php");
require_once("../pdf/fpdf/fpdf.php");

$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();

$codmovimento = $_GET['codmovimento'];

$sqlGerarNota = "select  
					mov.codmovimento AS numero,
					mov.modalidade AS modalidade,
					cli.nome AS cliente,
					fon.forma AS plano,
					mov.datamov AS data,
					usu.nome AS vendedor,
					CASE WHEN mov.status = 'F' THEN 'FINALIZADA' ELSE 'PENDENTE' END AS situacao,
					mvi.codproduto AS codpro,
					pro.descricao AS produto,
					mvi.grade AS grade,
					mvi.qntmov AS quantidade, 
					mvi.vlrunit As vlrunitario,
					mvi.vlrtotal AS vlrtotal
					from movimento_itens mvi
					inner join movimento mov on mov.codmovimento = mvi.codmovimento 
					inner join formapagamentos fon on fon.codforma = mov.codforma
					inner join produtos pro on pro.codproduto = mvi.codproduto
					inner join clientes cli on cli.codcliente = mov.codcontato
					inner join usuarios usu on usu.codusuario = mov.codusuario
					where mov.status = 'F' and mov.tipomovimento = 'V' AND mov.codmovimento = "."$codmovimento";
					
$resultGerarNota = pg_query ( $conexao, $sqlGerarNota );

$numLinha = pg_numrows($resultGerarNota);

$rgNota = pg_fetch_array($resultGerarNota);
						
$modalidade = $rgNota['modalidade'];
$pedido = $rgNota['numero'];
$data = $rgNota['data'];
$cliente = $rgNota['cliente'];
$plano = $rgNota['plano'];
$situacao = $rgNota['situacao'];
$vendedor = $rgNota['vendedor'];

$pdf->SetFont('arial','B',16);

//$pdf->Image('imagens/logo2.png' , 28, 15, 175 , 95);
$pdf->Cell(0,5,utf8_decode("J.A MULTIMARCAS - PEDIDO"),0,1,'C');
$pdf->SetFont('arial','B',10);
$pdf->Ln(10);
$pdf->Cell(0,5,utf8_decode("Av. 15 de novembro, 1111 - Lourival Parente"),0,1,'C');
//$pdf->Ln(10);
//$pdf->Cell(0,5,utf8_decode("Lourival Parente"),0,1,'C');
$pdf->Ln(20);
$pdf->SetFont('arial','B',12);
$pdf->Cell(0,0,utf8_decode("Situação: ".$situacao),0,1,'L');
$pdf->Cell(0,0,utf8_decode("Pedido....................: ".$pedido),0,1,'R');
$pdf->Ln(5);
$pdf->SetFont('arial','',10);
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode("Cliente.......: ".$cliente),0,1,'L');
$pdf->Cell(0,0,utf8_decode("Vendedor: ".$vendedor),0,1,'R');
$pdf->Ln(15);
$pdf->Cell(0,0,utf8_decode("Modalidade: ".$modalidade),0,1,'L');
$pdf->Cell(0,0,utf8_decode("Plano: ".$plano),0,1,'C');
$pdf->Cell(0,0,utf8_decode("Data.: ".formata_data($data)),0,1,'R');
$pdf->Ln(10);
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(15);
$pdf->Cell(0,0,utf8_decode("Itens da Venda:"),0,1,'L');
$pdf->Ln(5);
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(5);



//cabeçalho da tabela 
$pdf->SetFont('arial','B',10);
$pdf->Cell(30,20,'Item',1,0,"C");
$pdf->Cell(30,20,'Cod.',1,0,"C");
$pdf->Cell(220,20,'Produto',1,0,"L");
$pdf->Cell(40,20,'Grade',1,0,"C");
$pdf->Cell(60,20,'Quant.',1,0,"C");
$pdf->Cell(80,20,'Vlr.Unit.',1,0,"C");
$pdf->Cell(80,20,'Vlr.Total',1,1,"C");
			
//linhas da tabela			
//$item = 0;
$pdf->SetFont('arial','',10);

for($count=0;$count < $numLinha && $objGerarVnd=pg_fetch_object($resultGerarNota,$count);$count++){
	$pdf->Cell(30,20,$count+1,1,0,"C");
	$pdf->Cell(30,20,$objGerarVnd->codpro,1,0,"C");
	$pdf->Cell(220,20,utf8_decode($objGerarVnd->produto),1,0,"L");
	$pdf->Cell(40,20,utf8_decode($objGerarVnd->grade),1,0,"C");
	$pdf->Cell(60,20,$objGerarVnd->quantidade,1,0,"R");
	$pdf->Cell(80,20,formatarValor($objGerarVnd->vlrunitario),1,0,"R");
	$pdf->Cell(80,20,formatarValor($objGerarVnd->vlrtotal),1,1,"R");
} 

$sqlGerarVndTotal = 	"select  
					SUM(mvi.vlrtotal) AS totalgeral
					from movimento_itens mvi
					inner join movimento mov on mov.codmovimento = mvi.codmovimento 
					inner join formapagamentos fon on fon.codforma = mov.codforma
					inner join produtos pro on pro.codproduto = mvi.codproduto
					inner join clientes cli on cli.codcliente = mov.codcontato
					where mov.status = 'F' and mov.tipomovimento = 'V' AND mov.codmovimento = "."$codmovimento";					
$resultGerarVndTotal = pg_query ( $conexao, $sqlGerarVndTotal );

$rstotal = pg_fetch_array($resultGerarVndTotal );
						
$totalGeral = $rstotal['totalgeral'];

$pdf->SetFont('arial','',10);
$pdf->Ln(1);
$pdf->Cell(0,5,"","B",1,'C');
$pdf->SetFont('arial','B',14);
$pdf->Ln(15);
$pdf->Cell(0,0,"Total da venda: ".formatarValor($totalGeral),0,1,'R');
$pdf->Ln(15);
$pdf->Cell(0,5,"","B",1,'C');

$pdf->SetFont('arial','I',10);
$pdf->Ln(50);
$pdf->SetX("140"); 
$pdf->Cell(300,0,"","B",1,'C');
$pdf->Ln(8);
$pdf->Cell(0,0,"Vendedor",0,1,'C');
$pdf->Output("arquivo.pdf","I");

pg_close($conexao);
?>