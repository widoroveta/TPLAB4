<?php
require('fpdf/fpdf.php');


ob_start();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',20);
//$pdf->Cell(0,10,'Empresa: '.$jobOffer->getJobOffer()->getCompany()->getNameCompany());
//$pdf->ln();
//$pdf->Cell(0,10,'Puestos de Trabajo:'.$jobOffer->getJobPosition()->getDescription());
foreach($jobOffers as $jobOffer){
    $pdf->Cell(0,15,'Puestos de Trabajo:'.$jobOffer->getJobPosition()->getDescription());
    $pdf->ln();
    foreach ($appointmentDAO->getAllbyJobOffer($jobOffer->getJobOfferId) as $app)
    {  $pdf->Cell(0,10,$app->getStudent()->getEmail());
        $pdf->ln();

    }

}
$pdf->Output('D',"messi.pdf");
ob_end_flush();