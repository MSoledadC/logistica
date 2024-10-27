<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recaptcha_secret = 'TU_CLAVE_SECRETA';
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Verificar la respuesta de reCAPTCHA
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        echo "Por favor completa el CAPTCHA.";
    } else {
        // Procesar el formulario
        echo "Formulario enviado con éxito.";
    }
}
?>