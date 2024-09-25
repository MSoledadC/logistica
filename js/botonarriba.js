// Selecciona el botón de "volver arriba"
const backToTopButton = document.getElementById('back-to-top');

// Añade un evento de clic al botón
backToTopButton.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' // Desplazamiento suave
    });
});