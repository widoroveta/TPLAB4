<?php 
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.office365.com';
$mail->SMTPAuth = true;
$mail->Username = 'guido.roveta@alumnos.mdp.utn.edu.ar';
$mail->Password = 'Altoguiso147';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('guido.roveta@alumnos.mdp.utn.edu.ar', 'Utn reg mardelplata');
$mail->addAddress('widoroveta@gmail.com', 'Nombre del Destinatario');

$mail->isHTML(true);
$mail->Subject = 'Asunto del Correo';
$mail->Body = 'Contenido del correo electrónico';

if ($mail->send()) {
    echo 'El correo electrónico fue enviado correctamente.';
} else {
    echo 'Hubo un error al enviar el correo electrónico. Error: ' . $mail->ErrorInfo;
}