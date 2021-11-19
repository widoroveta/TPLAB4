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

$mail = new PHPMailer;

//    $fname = $_POST['fname'];
//    $toemail = $_POST['toemail'];
//    $subject = $_POST['subject'];
//    $message = $_POST['message'];
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'espert69@hotmail.com';
    $mail->Password = '*****';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('espert69@hotmail.com', 'NOMBREDELQUEMANDA');
    $mail->addReplyTo('widoroveta@gmail.com', 'NOMBREDELQUEMANDA');
    $mail->addAddress('widoroveta@gmail.com');

    $mail->isHTML(true);

    $bodyContent = "hey";

    $mail->Subject = "ke ase";
    $bodyContent = 'Querido:';
    $bodyContent .='<p>'."Ricardo".'</p>';
    $mail->Body = $bodyContent;

    if(!$mail->send())
        echo 'Error: '.$mail->ErrorInfo;
    else
        echo 'Enviado!';

?>

