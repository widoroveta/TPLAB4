<?php
//$to = 'pabloemanuelmorales@gmail.com';
//$subject = 'Hello from XAMPP!';
//$message = 'This is a test';
//$headers = "From: pabloemanuelmorales@gmail.com\r\n";
//if (mail($to, $subject, $message, $headers)) {
//    echo "SUCCESS";
//} else {
//    echo "ERROR";
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if(isset($arrayJobOffers)){
foreach ($arrayJobOffers

as $jobOffer)
{
foreach ($jobOffer

as $appointment)
{

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.office365.com';
$mail->SMTPAuth = true;
//TODO: cambiar de email y hacer una connection strings

$mail->Username = '';
$mail->Password = '';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('', 'NOMBREDELQUEMANDA');
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
}
}
}
?>

