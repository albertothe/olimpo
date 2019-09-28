<?php

require('WriteHTML.php');

$pdf=new PDF_HTML();
$pdf->AddPage();
$pdf->SetFont('Arial');

$html1 = 'Default <font face="courier">Courier <font face="helvetica">Helvetica <font face="times">Times <font face="dejavusans">dejavusans </font>Times </font>Helvetica </font>Courier </font>Default';
$html2 = '<small>small text</small> normal <small>small text</small> normal <sub>subscript</sub> normal <sup>superscript</sup> normal';
$html3 = "<font size='10' color='#ff7f50'>The</font> <font size='10' color='#6495ed'>quick</font> <font size='14' color='#dc143c'>brown</font> <font size='18' color='#008000'>fox</font> <font size='22'><a href='http://www.tcpdf.org'>jumps</a></font> <font size='22' color='#a0522d'>over</font> <font size='18' color='#da70d6'>the</font> <font size='14' color='#9400d3'>lazy</font> <font size='10' color='#4169el'>dog</font>.";

$html = $html1.'<br>'.$html2.'<br>'.$html3.'<br>'.$html3.'<br>'.$html2;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('materia-PDF.pdf','I');
?>
