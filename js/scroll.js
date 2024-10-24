window.addEventListener('scroll', function() {
    var header = document.querySelector('.site-navbar');
    var serviciosSection = document.getElementById('servicios').offsetTop;

    // Cambia el fondo del nav si has hecho scroll más de 50px o cuando llegas a la sección 'servicios'
    if (window.scrollY > 50 || window.scrollY > serviciosSection - 100) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});