import ValidacionError from "./validacionError.js";

function validarLongitud(valor, longitud, callback) {
    console.log('valoridando longitud:', valor);
    if (valor.length < longitud) {
        callback(null, new ValidacionError('El nombre debe tener al menos 3 caracteres', 'nombre'));
    } else {
        callback(valor, null);
    }
}

function validarNumero(valor, callback) {
    let contieneNumero = false;
    for (let caracter of valor) {
        if (caracter >= 0 && caracter <= 9) {
            contieneNumero = true;
            break;
        }
    }

    if (contieneNumero) {
        return callback(null, new ValidacionError('El nombre no debe contener numeros', 'nombre'))
    } else {
        return callback(valor, null)
    }
}

function validarMayuscula(valor, callback) {
    let contieneMayuscula = false;
    for (let caracter of valor) {
        if (caracter === caracter.toUpperCase()) {
            contieneMayuscula = true;
            break;
        }
    }

    if (contieneMayuscula) {
        return callback(valor, null)
    } else {
        return callback(null, new ValidacionError('La contraseña debe incluir al menos una mayúscula', 'password'));
    }
}

function validarMinuscula(valor, callback) {
    let contieneMinuscula = false;
    for (let caracter of valor) {
        if (caracter === caracter.toLowerCase()) {
            contieneMinuscula = true;
            break;
        }
    }

    if (contieneMinuscula) {
        return callback(valor, null)
    } else {
        return callback(null, new ValidacionError('La contraseña debe incluir al menos una minúscula', 'password'));
    }
}

function validarEmail(valor, callback) {
    let arroba = 0;
    for (let caracter of valor) {
        if (caracter === '@') {
            arroba++
        }
    }

    if (arroba !== 1) {
        return callback(null, new ValidacionError('El email debe contener solo una arroba', 'email'));
    }

    let partesEmail = valor.split('@');
    let usuario = partesEmail[0];
    let dominio = partesEmail[1];

    if (!usuario || !dominio) {
        return callback(null, new ValidacionError('El email debe tener texto antes y despues del @', 'email'));
    }

    if (dominio.lastIndexOf('.') === -1) {
        return callback(null, new ValidacionError('El email debe terminar con un punto seguido de 2 o 3 letras', 'email'));
    }

    let separacionPunto = dominio.split('.');
    console.log(separacionPunto[1].length)

    if (separacionPunto[1].length < 2 || separacionPunto[1].length > 3) {
        return callback(null, new ValidacionError('El email debe terminar con un punto seguido de 2 o 3 letras', 'email'));
    }

    callback(valor, null);
}

function validarFecha(valor, callback) {
    if (!valor) {
        return callback(null, new ValidacionError('Debes introducir una fecha', 'fechaNacimiento'));
    }

    const nacimiento = new Date(valor);
    const hoy = new Date();

    let edad = hoy.getFullYear() - nacimiento.getFullYear();
    const cumpleEsteAño = new Date(hoy.getFullYear(), nacimiento.getMonth(), nacimiento.getDate()) <= hoy;

    if (!cumpleEsteAño) edad--;

    if (edad < 18 || edad > 24) {
        return callback(null, new ValidacionError('Debes tener entre 18 y 24 años', 'fechaNacimiento'));
    }

    callback(valor, null);
}


function mostrarError(error) {
    alert(error.message);
    document.getElementById(error.campo)?.classList.add('error');
}

const btnGuardar = document.getElementById('btnGuardar');

btnGuardar.addEventListener('click', () => {
    const nombre = document.getElementById('nombre').value;
    const password = document.getElementById('password').value;
    const email = document.getElementById('email').value;
    const fecha = document.getElementById('fechaNacimiento').value;

    document.querySelectorAll('input').forEach(el => el.classList.remove('error'));

    validarLongitud(nombre, 3, (valor, error) => {
        if (error) return mostrarError(error);

        validarNumero(nombre, (valor, error) => {
            if (error) return mostrarError(error);

            validarMayuscula(password, (valor, error) => {
                if (error) return mostrarError(error);

                validarMinuscula(password, (valor, error) => {
                    if (error) return mostrarError(error);

                    validarLongitud(password, 8, (valor) => {
                        if (error) return mostrarError(error);

                        validarEmail(email, (valor, error) => {
                            if (error) return mostrarError(error);

                            validarFecha(fecha, (valor, error) => {
                                if (error) return mostrarError(error)

                                alert("¡Todo correcto!");
                            });
                        });
                    });
                });
            });
        });
    });
});
