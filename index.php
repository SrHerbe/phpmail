<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPmailer/Exception.php';
require './PHPmailer/PHPMailer.php';
require './PHPmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'agapitoelpro@gmail.com';                     //SMTP username
    $mail->Password   = 'ohjkoedihypkwxsb';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('agapitoelpro@gmail.com', 'Agar');
    $mail->addAddress('samuelherbe@gmail.com', 'SAMUEL');     //Add a recipient


    //Adjunto
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Esto es el asunto';
    $mail->Body    = 'Esto es el cuerpo del mensaje';

    $mail->send();
    echo 'Se envió con éxito';
} catch (Exception $e) {
    echo "Hubo un error al envíar el correo: {$mail->ErrorInfo}";
}