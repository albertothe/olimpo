<?php
require 'funcoes/verificar.php';
include 'global.php';
include 'funcoes/funcoes.php';
include 'funcoes/conexao.php';
require_once("pdf/fpdf/fpdf.php");
$pdf= new FPDF("L","pt","A4");
$pdf->AddPage();

$datainicial = $_POST['datainicial'];
$datafinal = $_POST['datafinal'];

$sqlGerarVndTotal = 	"select  
					SUM(mvi.vlrtotal) AS totalgeral
					from movimento_itens mvi
					inner join movimento mov on mov.codmovimento = mvi.codmovimento 
					inner join formapagamentos fon on fon.codforma = mov.codforma
					inner join produtos pro on pro.codproduto = mvi.codproduto
					inner join clientes cli on cli.codcliente = mov.codcontato
					where mov.status = 'F' and mov.tipomovimento = 'V'  AND mov.codforma <> '4' AND mov.datamov between '$datainicial' and '$datafinal'";					
$resultGerarVndTotal = pg_query ( $conexao, $sqlGerarVndTotal );

$rstotal = pg_fetch_array($resultGerarVndTotal );
						
$totalGeral = $rstotal['totalgeral'];

$pdf->SetFont('arial','B',18);
$pdf->Image('imagens/marca.jpg' , 28, 15, 87 , 74);
$pdf->Cell(0,5,utf8_decode("Relatório de Vendas"),0,1,'C');
$pdf->SetFont('arial','B',14);
$pdf->Cell(0,30,utf8_decode("Período de ".formata_data($datainicial)." à ".formata_data($datafinal)),0,1,'C');
$pdf->Ln(20);

$pdf->Cell(0,5,utf8_decode("Total: ".formatarValor($totalGeral)),0,1,'R');
//$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(10);

$sqlGerarVnd = 	"select  
					mov.codmovimento AS numero,
					mov.modalidade AS modalidade,
					cli.nome AS cliente,
					fon.forma AS plano,
					mov.datamov AS data,
					pro.descricao AS produto,
					mvi.qntmov AS quantidade, 
					mvi.vlrunit As vlrunitario,
					mvi.vlrtotal AS vlrtotal
					from movimento_itens mvi
					inner join movimento mov on mov.codmovimento = mvi.codmovimento 
					inner join formapagamentos fon on fon.codforma = mov.codforma
					inner join produtos pro on pro.codproduto = mvi.codproduto
					inner join clientes cli on cli.codcliente = mov.codcontato
					where mov.status = 'F' and mov.tipomovimento = 'V'  AND mov.codforma <> '4' AND mov.datamov between '$datainicial' and '$datafinal'
					ORDER BY numero desc";					
$resultGerarVnd = pg_query ( $conexao, $sqlGerarVnd );

//cabeçalho da tabela 
$pdf->SetFont('arial','B',10);
$pdf->Cell(30,15,'Num',1,0,"C");
$pdf->Cell(80,15,'Modalidade',1,0,"C");
$pdf->Cell(180,15,'Cliente',1,0,"L");
$pdf->Cell(65,15,'Plano',1,0,"C");
$pdf->Cell(65,15,'Data',1,0,"C");
$pdf->Cell(180,15,'Produto',1,0,"L");
$pdf->Cell(60,15,'Qnt',1,0,"C");
$pdf->Cell(60,15,'VlrUnit',1,0,"C");
$pdf->Cell(60,15,'VlrTotal',1,1,"C");
			
//linhas da tabela			
$i = 0;
$pdf->SetFont('arial','',10);
while ($objGerarVnd = pg_fetch_object ($resultGerarVnd)) {
    $pdf->Cell(30,20,$objGerarVnd->numero,1,0,"C");
    $pdf->Cell(80,20,$objGerarVnd->modalidade,1,0,"C");
    $pdf->Cell(180,20,$objGerarVnd->cliente,1,0,"L");
    $pdf->Cell(65,20,$objGerarVnd->plano,1,0,"C");
	$pdf->Cell(65,20,formata_data($objGerarVnd->data),1,0,"C");
	$pdf->Cell(180,20,utf8_decode($objGerarVnd->produto),1,0,"L");
	$pdf->Cell(60,20,$objGerarVnd->quantidade,1,0,"R");
	$pdf->Cell(60,20,formatarValor($objGerarVnd->vlrunitario),1,0,"R");
	$pdf->Cell(60,20,formatarValor($objGerarVnd->vlrtotal),1,1,"R");
	$i ++;
} 

$sqlGerarVndForma = 	"select  fon.forma AS forma,
					SUM(mvi.vlrtotal) AS totalforma
					from movimento_itens mvi
					inner join movimento mov on mov.codmovimento = mvi.codmovimento 
					inner join formapagamentos fon on fon.codforma = mov.codforma
					inner join produtos pro on pro.codproduto = mvi.codproduto
					inner join clientes cli on cli.codcliente = mov.codcontato
					where mov.status = 'F' and mov.tipomovimento = 'V'  AND mov.codforma <> '4' AND mov.datamov between '$datainicial' and '$datafinal' group by forma";					
$resultGerarVndForma = pg_query ( $conexao, $sqlGerarVndForma );

$pdf->Ln(20);
$pdf->SetFont('arial','B',12);
$pdf->Cell(0,5,utf8_decode("Resumo Plano"),0,1,'L');
$pdf->Ln(5);
$pdf->SetFont('arial','B',10);
$pdf->Cell(65,15,'Plano',1,0,"L");
$pdf->Cell(60,15,'VlrTotal',1,1,"C");

$iforma = 0;
$pdf->SetFont('arial','',10);
while ($objGerarForma = pg_fetch_object ($resultGerarVndForma)) {
    $pdf->Cell(65,20,$objGerarForma->forma,1,0,"L");
	$pdf->Cell(60,20,formatarValor($objGerarForma->totalforma),1,1,"R");
	$iforma ++;
} 

$pdf->Output("arquivo.pdf","I");

pg_close($conexao);
?>