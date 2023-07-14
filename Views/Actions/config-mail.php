<?php
$mail->isSMTP();
$mail->Host = 'smtp.office365.com';
$mail->SMTPAuth = true;
$mail->Username = 'guido.roveta@alumnos.mdp.utn.edu.ar';
$mail->Password = 'Altoguiso147';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;