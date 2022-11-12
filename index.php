<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPmailer/Exception.php';
require './PHPmailer/PHPMailer.php';
require './PHPmailer/SMTP.php';

//Llamamos a la clase PHPMailer, con el parámetro true, para que permita excepciones
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                       //0=No ver Debug output - 2=Ver Debug output
    $mail->isSMTP();                            //Enviar usando SMTP
    $mail->Host       = 'smtp.gmail.com';       //SMTP del servidor desde el que vamos a enviar
    $mail->SMTPAuth   = true;                   //Habilitar o deshabilitar autentificacion SMTP
    $mail->Username   = 'example@gmail.com';    //Correo emisor
    $mail->Password   = 'password';             //Contraseña o contraseña de aplicación emisor
    $mail->SMTPSecure = 'tls';                  //Encriptación tls o ssl. (Mejor tls ya que es una versión mejorada)
    $mail->Port       = 587;                    //Puerto TCP por el cual nos vamos a conectar. 587 o 465 

    //Emisor y receptor
    $mail->setFrom('emisor@gmail.com', 'NombreEmisor');       //Añadir emisor
    $mail->addAddress('receptor@gmail.com', 'NombreReceptor');     //Añadir receptor


    //Adjunto
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Añadir archivo adjunto
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Añadir archivo adjunto con nombre

    //Content
    $mail->isHTML(true);                                  //Aceptar formato HTML en el cuerpo del mensaje
    $mail->Subject = 'Esto es el asunto';                 //Asunto
    $mail->Body    = 'Esto es el cuerpo del mensaje';     //Cuerpo del mensaje

    $mail->send();  //Enviar mensaje
    echo 'Se envió con éxito';  //Mensaje de éxito
} catch (Exception $e) {    //Si hay un error se captura
    echo "Hubo un error al envíar el correo: {$mail->ErrorInfo}";   //Y se muestra el mensaje de dicho error
}
