<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

$mail=new PHPMailer();

$body = 'Cuerpo del correo de prueba';

$mail->IsSMTP(); 
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Port = 587; 
$mail->SMTPOptions = array(
   'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
   )
);
$mail->SMTPDebug = 3;
$mail->From = "jesus.gonzalez.munoz.al@iespoligonosur.org";
$mail->FromName = "Jesus";
$mail->Username   = 'jesus.gonzalez.munoz.al@iespoligonosur.org';
$mail->Password   = '7BC8an55';
$mail->SetFrom('jesus.gonzalez.munoz.al@iespoligonosur.org');
$mail->AddReplyTo('jesgonmun@gmail.com', "jesgonmun");
$mail->Subject    = 'Correo de prueba PHPMailer';
$mail->MsgHTML($body);
$mail->IsHTML(true);


$mail->AddAddress('jesus.gonzalez.munoz.al@iespoligonosur.org');
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

?>