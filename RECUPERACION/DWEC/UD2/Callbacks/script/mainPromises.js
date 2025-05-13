import {
    validarEmail,
    validarFecha,
    validarLongitud,
    validarMayuscula,
    validarMinuscula,
    validarNumero,
} from "./validacionesPromises.js";

function mostrarError(error){
    alert(error.message);
    document.getElementById(error.campo)?.classList.add('error');
}

function inicializar() {
    const btnGuardar = document.getElementById('btnGuardar');

    btnGuardar.addEventListener('click', function () {
        const nombre = document.getElementById('nombre').value;
        const password = document.getElementById('password').value;
        const email = document.getElementById('email').value;
        const fecha = document.getElementById('fechaNacimiento').value;

        validarLongitud(nombre, 3)
            .then(result => validarNumero(result))
            .then(() => validarMayuscula(password))
            .then(result => validarMinuscula(result))
            .then(() => validarEmail(email))
            .then(() => validarFecha(fecha))
            .then(() => {
                console.log('Todas las validaciones pasaron correctamente');
            })
            .catch((error) => mostrarError(error));
    });
}

inicializar();