<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['fname'];
    $apellido = $_POST['lname'];
    $email = $_POST['email'];
    $asunto = $_POST['subject'];
    $mensaje = $_POST['message'];

    // Validar datos
    if (!empty($nombre) && !empty($email)) {
        $to = "consultas@logistica4d.com.ar";
        $subject = "Nuevo mensaje de contacto: $asunto";
        $message = "Nombre: $nombre $apellido\nEmail: $email\nMensaje: $mensaje";
        $headers = "From: $email";

        // Enviar correo
        if (mail($to, $subject, $message, $headers)) {
            echo "Mensaje enviado con éxito.<br>";
            echo "<a href='index.html' class='btn btn-primary'>Volver al inicio</a>"; // Enlace al index
        } else {
            echo "Hubo un error al enviar el mensaje.<br>";
            echo "<a href='index.html' class='btn btn-primary'>Volver al inicio</a>"; // Enlace al index en caso de error
        }
    } else {
        echo "Por favor, complete todos los campos.<br>";
        echo "<a href='index.html' class='btn btn-primary'>Volver al inicio</a>"; // Enlace al index si faltan campos
    }
}
?>