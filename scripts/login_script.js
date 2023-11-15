document.addEventListener("DOMContentLoaded", function() {
    if (mensajeInicioSesion !== "") {
        if (tipoMensaje === "exito") {
            mostrarExitoMensaje(mensajeInicioSesion);
        } else {
            mostrarErrorMensaje(mensajeInicioSesion);
        }
    }
});

function mostrarExitoMensaje(mensaje) {
    console.log("Mensaje de éxito:", mensaje);
}

function mostrarErrorMensaje(mensaje) {
    let errorMessage = document.getElementById("error-message");
    errorMessage.innerHTML = mensaje;
    errorMessage.style.opacity = 0;
    errorMessage.style.display = "block";

    let opacity = 0;
    let fadeInInterval = setInterval(function () {
        if (opacity < 1) {
            opacity += 0.1;
            errorMessage.style.opacity = opacity;
        } else {
            clearInterval(fadeInInterval);
            setTimeout(function () {
                let fadeOutInterval = setInterval(function () {
                    if (opacity > 0) {
                        opacity -= 0.1;
                        errorMessage.style.opacity = opacity;
                    } else {
                        clearInterval(fadeOutInterval);
                        errorMessage.style.display = "none";
                    }
                }, 50);
            }, 2000); 
        }
    }, 50);
}
