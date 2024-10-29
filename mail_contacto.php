<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // Recibe el email del formulario

    // Validar que el campo de email no esté vacío y sea un email válido
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "consultas@logistica4d.com.ar"; // Dirección de destino
        $subject = "Nuevo contacto desde el sitio web";

        // Crear el mensaje
        $message = "Se ha recibido un nuevo contacto desde el sitio web.\n\n";
        $message .= "Email: " . htmlspecialchars($email) . "\n";

        // Encabezados para el correo
        $headers = "From: no-reply@logistica4d.com.ar\r\n";
        $headers .= "Reply-To: $email\r\n"; // Para que las respuestas vayan al remitente

        // Iniciar salida HTML
        echo '<!DOCTYPE html>
              <html lang="es">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Resultado del envío</title>
                <link rel="stylesheet" href="css/cambios.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
                <link rel="stylesheet" href="fonts/icomoon/style.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <link rel="stylesheet" href="css/magnific-popup.css">
                <link rel="stylesheet" href="css/jquery-ui.css">
                <link rel="stylesheet" href="css/owl.carousel.min.css">
                <link rel="stylesheet" href="css/owl.theme.default.min.css">
                <link rel="stylesheet" href="css/bootstrap-datepicker.css">
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
                <link rel="stylesheet" href="css/aos.css">
                <link rel="stylesheet" href="css/style.css">
              </head>
              <body>';

        // Enviar el correo
        if (mail($to, $subject, $message, $headers)) {
            echo '<div class="container text-center mt-5">
                    <p class="text-success">Gracias por contactarnos. Nos pondremos en contacto pronto.</p>
                    <a href="index.html" class="btn btn-primary py-3 px-5 empezar">Volver al inicio</a>
                  </div>';
        } else {
            echo '<div class="container text-center mt-5">
                    <p class="text-danger">Hubo un error al enviar el mensaje. Por favor, inténtelo nuevamente.</p>
                    <a href="index.html" class="btn btn-primary py-3 px-5 empezar">Volver al inicio</a>
                  </div>';
        }

        // Cerrar el HTML aquí
        echo '</body></html>';
    } else {
        // Si falta el campo de email o es inválido, devolver error
        echo '<!DOCTYPE html>
              <html lang="es">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Error en el envío</title>
                <link rel="stylesheet" href="css/cambios.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
                <link rel="stylesheet" href="fonts/icomoon/style.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <link rel="stylesheet" href="css/magnific-popup.css">
                <link rel="stylesheet" href="css/jquery-ui.css">
                <link rel="stylesheet" href="css/owl.carousel.min.css">
                <link rel="stylesheet" href="css/owl.theme.default.min.css">
                <link rel="stylesheet" href="css/bootstrap-datepicker.css">
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
                <link rel="stylesheet" href="css/aos.css">
                <link rel="stylesheet" href="css/style.css">
              </head>
              <body>
                <div class="container text-center mt-5">
                  <p class="text-danger">Por favor, ingrese un email válido.</p>
                  <a href="index.html" class="btn btn-primary py-3 px-5 empezar">Volver al inicio</a>
                </div>
              </body>
              </html>';
    }
}
?>
