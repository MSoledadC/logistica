<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['fq_name'];
    $email = $_POST['fq_email'];

    // Validar datos
    if (!empty($nombre) && !empty($email)) {
        $to = "correo_cotizacion@tudominio.com";
        $subject = "Nueva solicitud de cotización";
        $message = "Nombre: $nombre\nEmail: $email";
        $headers = "From: $email";

        // Enviar correo
        if (mail($to, $subject, $message, $headers)) {
            echo "Cotización enviada con éxito.";
        } else {
            echo "Hubo un error al enviar la cotización.";
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }
}
?>