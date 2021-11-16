<?php
require('fpdf/fpdf.php');

ob_start();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',20);
//$pdf->Cell(0,10,'Empresa: '.$jobOffer->getJobOffer()->getCompany()->getNameCompany());
//$pdf->ln();
//$pdf->Cell(0,10,'Puestos de Trabajo:'.$jobOffer->getJobPosition()->getDescription());
foreach($array as $a){
    $pdf->Cell(0,10,'Puestos de Trabajo:'.$a);
    $pdf->ln();
}
$pdf->Output('D',"messi.pdf");
ob_end_flush();