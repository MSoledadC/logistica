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

        // Enviar correo
        if (mail($to, $subject, $message, $headers)) {
            echo '<div class="container text-center mt-5">
                    <p class="text-success">Mensaje enviado con éxito.</p>
                    <a href="index.html" class="btn btn-primary py-3 px-5 empezar">Volver al inicio</a>
                  </div>';
            } else {
                echo '<div class="container text-center mt-5">
                        <p class="text-danger">Hubo un error al enviar el mensaje.</p>
                        <a href="index.html" class="btn btn-primary py-3 px-5 empezar">Volver al inicio</a>
                    </div>';
            }

            // Cerrar el HTML aquí
            echo '</body></html>';
        } else {
            // Si faltan campos, devolver error
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
                        <p class="text-danger">Por favor, complete todos los campos.</p>
                        <a href="index.html" class="btn btn-primary py-3 px-5 empezar">Volver al inicio</a>
                    </div>
                </body>
                </html>';
        }
    }
    ?>