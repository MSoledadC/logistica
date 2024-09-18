<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['fname'];
    $apellido = $_POST['lname'];
    $email = $_POST['email'];
    $asunto = $_POST['subject'];
    $mensaje = $_POST['message'];

    // Validar datos
    if (!empty($nombre) && !empty($email)) {
        $to = "correo_contacto@tudominio.com";
        $subject = "Nuevo mensaje de contacto: $asunto";
        $message = "Nombre: $nombre $apellido\nEmail: $email\nMensaje: $mensaje";
        $headers = "From: $email";

        // Enviar correo
        if (mail($to, $subject, $message, $headers)) {
            echo "Mensaje enviado con éxito.";
        } else {
            echo "Hubo un error al enviar el mensaje.";
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
}
?>