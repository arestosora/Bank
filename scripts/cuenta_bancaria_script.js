// En cuenta_bancaria_script.js

// Animación al realizar acciones
document.getElementById('acciones-form').addEventListener('submit', function () {
    document.getElementById('loader').style.display = 'block';
});

// Animación al mostrar mensajes de éxito/error
document.addEventListener('DOMContentLoaded', function () {
    var mensajeAcciones = document.getElementById('mensaje-acciones');
    if (mensajeAcciones) {
        mensajeAcciones.style.opacity = '1';
        setTimeout(function () {
            mensajeAcciones.style.opacity = '0';
        }, 3000); // Ocultar el mensaje después de 3 segundos
    }
});

// Animación al cambiar el saldo
var saldoValor = document.getElementById('saldo-valor');
if (saldoValor) {
    saldoValor.style.color = 'green';
    setTimeout(function () {
        saldoValor.style.color = ''; // Revertir al color original
    }, 5000); // Cambiar el color durante 1 segundo
}
