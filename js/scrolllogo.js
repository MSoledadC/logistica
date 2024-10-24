window.onscroll = function() {
    var header = document.querySelector(".site-navbar");
    if (window.pageYOffset > 50) {  // Cambia 50 por la cantidad de scroll que prefieras
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
};