<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['fq_name'];
    $email = $_POST['fq_email'];
    $telefono = $_POST['fq_phone'];
    $origen = $_POST['fq_origen'];
    $destino = $_POST['fq_destino'];
    $detalle = $_POST['fq_detalle'];

    // Validar que todos los campos estén llenos
    if (!empty($nombre) && !empty($email) && !empty($telefono) && !empty($origen) && !empty($destino) && !empty($detalle)) {
        $to = "correo_cotizacion@tudominio.com";
        $subject = "Nueva solicitud de cotización";
        
        // Crear el mensaje con todos los campos
        $message = "Nombre: $nombre\n";
        $message .= "Email: $email\n";
        $message .= "Teléfono: $telefono\n";
        $message .= "Origen del envío: $origen\n";
        $message .= "Destino del envío: $destino\n";
        $message .= "Detalles adicionales: $detalle\n";
        
        // Configurar los encabezados
        $headers = "From: $email";
        
        // Enviar el correo
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