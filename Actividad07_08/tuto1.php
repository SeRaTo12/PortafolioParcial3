<?php
require('../fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40, 10,'!Hola, Mundo!');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40, 10, 'SebastiAn Rodríguez Torres');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40, 10, 'Ingenieria en Tecnologías de la Información');
$pdf->Output();
?>