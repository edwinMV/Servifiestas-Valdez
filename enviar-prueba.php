<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

$body = "Nombre:" . $nombre . "<br>Correo:" . $correo . "<br>Telefono:" . $telefono . "<br>Mensaje:" . $mensaje;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';     
	//servers
    $mail->SMTPAuth   = true;                                 
    $mail->Username   = 'hectorvaldezg12@gmail.com';                    
    $mail->Password   = '3271049777';                              
    $mail->SMTPSecure = 'tls';         
    $mail->Port       = 587;                                  

    //Recipients
    $mail->setFrom('hectorvaldezg12@gmail.com', $nombre);
    $mail->addAddress('servifiestasvaldez@gmail.com');     

    // Content
    $mail->isHTML(true);                                
    $mail->Subject = 'envío';
    $mail->Body    = $body;
	$mail->CharSet = 'UTF-8';
    $mail->send();
    echo '<script>
			alert("El mensaje se envío correctamente");
			window.history.go(-1);
			</script>';
} catch (Exception $e) {
	echo 'Hubo un error al mandar correo:', $mail->ErrorInfo;
 }
    
