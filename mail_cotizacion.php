<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['fq_name'];
    $empresa = $_POST['fq_empresa'];
    $email = $_POST['fq_email'];
    $telefono = $_POST['fq_phone'];
    $origen = $_POST['fq_origen'];
    $destino = $_POST['fq_destino'];
    $detalle = $_POST['fq_detalle'];

    // Validar que todos los campos estén llenos
    if (!empty($nombre) && !empty($empresa) && !empty($email) && !empty($telefono) && !empty($origen) && !empty($destino) && !empty($detalle)) {
        $to = "cotizaciones@logistica4d.com.ar";
        $subject = "Nueva solicitud de cotización";

        // Crear el mensaje con todos los campos
        $message = "Nombre: $nombre\n";
        $message .= "Empresa: $empresa\n"; // Incluir Empresa en el correo
        $message .= "Email: $email\n";
        $message .= "Teléfono: $telefono\n";
        $message .= "Origen del envío: $origen\n";
        $message .= "Destino del envío: $destino\n";
        $message .= "Detalles adicionales: $detalle\n";

        // Configurar los encabezados
        $headers = "From: $email";

        // Enviar el correo

        if (mail($to, $subject, $message, $headers)) {
            echo "Cotización enviada con éxito.<br>";
            echo "<a href='index.html#cotizacion' class='btn btn-primary'>Volver al inicio</a>"; // Enlace al index
        } else {
            echo "Hubo un error al enviar la cotización.<br>";
            echo "<a href='index.html#cotizacion' class='btn btn-primary'>Volver al formulario</a>";
        }
        } else {
            echo "Por favor, complete todos los campos.<br>";
            echo "<a href='index.html#cotizacion' class='btn btn-primary'>Volver al formulario</a>"; // Enlace al index si faltan campos
        }
}
?>