function fadeIn(element, duration) {
    var opacity = 0;
    var interval = 50; 
    var delta = interval / duration;

    function increaseOpacity() {
        opacity += delta;
        element.style.opacity = opacity;

        if (opacity >= 1) {
            clearInterval(fadeInterval);
        }
    }

    var fadeInterval = setInterval(increaseOpacity, interval);
}

function mostrarMensajeInicioSesion() {
    var mensajeInicioSesion = document.getElementById('mensaje-inicio-sesion');
    fadeIn(mensajeInicioSesion, 1000); 
}
window.onload = function() {
    mostrarMensajeInicioSesion();
};