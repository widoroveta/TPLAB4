<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'utnmdptestmailtp@gmail.com';
$mail->Password = 'UTN123456';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('utnmdptestmailtp@gmail.com', 'Utn reg mardelplata');
$mail->addReplyTo($appointment->getStudent()->getEmail(), $appointment->getStudent()->getFirstName() . " " . $appointment->getStudent()->getFirstName());
$mail->addAddress($appointment->getStudent()->getEmail());

$mail->isHTML(true);


$mail->Subject = "Oferta laboral expirada";
$bodyContent = 'Querido:';
$bodyContent .= '<p>' . $appointment->getStudent()->getFirstName() . " " . $appointment->getStudent()->getLastName() . " la oferta laboral de " . $appointment->getJobOffer()->getCompany()->getNameCompany() . ' de ' . $appointment->getJobOffer()->getJobPosition()->getDescription() . " ha expirado" .
    '</p>';
$mail->Body = $bodyContent;

if (!$mail->send()) { ?>
    <script>alert('Error:');

    </script>

    <?php sleep(3); } else {
    ?>
    <script>alert('Enviado');

    </script>
    <?php
    sleep(3);
}