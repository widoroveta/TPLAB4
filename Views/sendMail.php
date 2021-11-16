<?php
//$to = 'pabloemanuelmorales@gmail.com';
//$subject = 'Hello from XAMPP!';
//$message = 'This is a test';
//$headers = "From: pabloemanuelmorales@gmail.com\r\n";
//if (mail($to, $subject, $message, $headers)) {
//    echo "SUCCESS";
//} else {
//    echo "ERROR";

use PHPMailer\PHPMailer;
use PHPMailer\SMTP;

$mail = new PHPMailer();
//indico a la clase que use SMTP
$mail->IsSMTP();
//permite modo debug para ver mensajes de las cosas que van ocurriendo
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->SMTPDebug = 2; //Alternative to above constant
//Debo de hacer autenticación SMTP
$mail->SMTPAuth = false;
$mail->SMTPSecure = "ssl";
$mail->SMTPAutoTLS = false;
//indico el servidor de Gmail para SMTP
$mail->Host = "smtp.live.com";
//indico el puerto que usa Gmail
$mail->Port = 465;
//indico un usuario / clave de un usuario de gmail
$mail->Username = "espert69@hotmail.com";
$mail->Password = "quiero2tetas";
$mail->SetFrom('espert69@hotmail.com', 'Nombre completo');
//$mail->AddReplyTo("pabloemanuelmorales@gmail.com","Nombre completo");
$mail->Subject = "Envío de email usando SMTP de Gmail";
$mail->MsgHTML("Hola que tal, esto es el cuerpo del mensaje!");
//indico destinatario
$address = "pabloemanuelmorales@gmail.com";
$mail->AddAddress($address, "Nombre completo");
if(!$mail->Send()) {
    echo "Error al enviar: " . $mail->ErrorInfo;
} else {
    echo "Mensaje enviado!";
}

