<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$conexion = mysqli_connect("localhost", "root", "", "sistema_central");
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];
$email = $_POST["email"];
$sql = "INSERT INTO citas(fecha, hora, email_usuario) VALUES ('$fecha', '$hora', '$email')";
$resultado = mysqli_query($conexion, $sql);

$mail = new PHPMailer(true);
if ($resultado) {
    
    try {
        $mail->SMTPDebug = 0;  
        $mail->isSMTP();  
        $mail->Host = 'smtp.mailgun.org';  
        $mail->SMTPAuth = true;  
        $mail->Username = 'postmaster@sandbox6a1c6a7c6fd9497b91014ad28a3bf8e3.mailgun.org'; 
        $mail->Password = 'd19c58d118a9bba032fcd3ebc2a50bff-fa6e84b7-0bc08015'; 
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587; 
        
        
        $mail->setFrom($_POST["email"], 'Enviado por');
        $mail->addAddress('recichaovw@gmail.com', 'Email usuario');
        
        $mail->isHTML(true); 
        $mail->Subject = 'Nueva cita agendada';
        $mail->Body = 'Hola deseo reservar una cita para la recolección del material reciclable, el ' . $_POST["fecha"] . ' a las ' . $_POST["hora"] . ', <b>¿Hay disponibilidad?</b>';
        $mail->AltBody = 'Un nuevo usuario requiere de los servicios de Recichao';
        
        $mail->send();
        echo "Cita registrada exitosamente";
    } catch (Exception $e) {
       echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
} else {
    echo "No se insertaron los datos";
}