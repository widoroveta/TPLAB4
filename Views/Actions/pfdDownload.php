<?php
require('fpdf/fpdf.php');
$careerDAO = \DAO\CareerDAO::getInstance();

ob_start();
$pdf = new FPDF();
$pdf->AddPage();

//$pdf->Cell(0,10,'Empresa: '.$jobOffer->getJobOffer()->getCompany()->getNameCompany());
//$pdf->ln();
//$pdf->Cell(0,10,'Puestos de Trabajo:'.$jobOffer->getJobPosition()->getDescription());\
$pdf->SetFont('Arial', 'b', 24);
$pdf->Cell(20, 15,  $jobOffer->getCompany()->getNameCompany());
$pdf->ln();
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 15, 'Puestos de Trabajo:' . $jobOffer->getJobPosition()->getDescription());
$pdf->ln();
$pdf->Cell(0, 15, 'Requerimiento:' . $jobOffer->getRequirements());
$pdf->ln();
$pdf->Cell(0, 15, 'Fecha de expiracion:' . $jobOffer->getDateExpiration());
$pdf->ln();
$pdf->SetFont('Arial', '', 10);
//$pdf->SetDrawColor();
foreach ($appointmentList as $app) {
    $pdf->Cell(0, 8, "Nombre del postulante:" . $app->getStudent()->getFirstName() . " " . $app->getStudent()->getLastName());
    $pdf->ln();
    $pdf->Cell(0, 8,  'Carrera:' . $careerDAO->searchById($app->getStudent()->getCareer())->getDescription());
    $pdf->ln();
    $pdf->Cell(0, 8,  'Email:' . $app->getStudent()->getEmail());
    $pdf->ln();
    $pdf->Cell(0, 8,  'DNI:' . $app->getStudent()->getDni());
    $pdf->ln();
    $pdf->Cell(0, 8,  'Genero:' . $app->getStudent()->getGender());
    $pdf->ln();
    $pdf->Cell(0, 8,  'Numero de telefono:' . $app->getStudent()->getPhoneNumber());
    $pdf->ln();
}


$pdf->Output('D', $jobOffer->getCompany()->getNameCompany() . ".pdf");
ob_end_flush();
