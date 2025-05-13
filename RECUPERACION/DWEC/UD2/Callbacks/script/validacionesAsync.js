import ValidacionError from "./validacionError.js";

async function validarLongitud(valor, longitud) {
    return new Promise((resuelve, rechaza) => {
        if (valor.length > longitud) {
            resuelve(valor);
        } else {
            rechaza(new ValidacionError('El nombre debe tener al menos 3 caracteres', 'nombre'))
        }
    })
}

async function validarNumero(valor) {
    return new Promise((resuelve, rechaza) => {
        let contieneNumero = false;
        for (let caracter of valor) {
            if (caracter >= 0 && caracter <= 9) {
                contieneNumero = true;
                break;
            }
        }

        if (contieneNumero) {
            rechaza(new ValidacionError('El nombre no debe contener numeros', 'nombre'))
        } else {
            resuelve(valor)
        }
    })
}

async function validarMayuscula(valor) {
    return new Promise((resuelve, rechaza) => {
        let contieneMayuscula = false;
        for (let caracter of valor) {
            if (caracter === caracter.toUpperCase()) {
                contieneMayuscula = true;
                break;
            }
        }

        if (contieneMayuscula) {
            resuelve(valor)
        } else {
            rechaza(new ValidacionError('La contraseña debe incluir al menos una mayúscula', 'password'));
        }
    })
}

async function validarMinuscula(valor) {
    return new Promise((resuelve, rechaza) => {
        let contieneMinuscula = false;
        for (let caracter of valor) {
            if (caracter === caracter.toLowerCase()) {
                contieneMinuscula = true;
                break;
            }
        }

        if (contieneMinuscula) {
            resuelve(valor)
        } else {
            rechaza(new ValidacionError('La contraseña debe incluir al menos una minúscula', 'password'));
        }
    })
}

async function validarEmail(valor) {
    return new Promise((resuelve, rechaza) => {
        let arroba = 0;
        for (let caracter of valor) {
            if (caracter === '@') {
                arroba++
            }
        }

        if (arroba !== 1) {
            rechaza(new ValidacionError('El email debe contener solo una arroba', 'email'));
        }

        let partesEmail = valor.split('@');
        let usuario = partesEmail[0];
        let dominio = partesEmail[1];

        if (!usuario || !dominio) {
            rechaza(new ValidacionError('El email debe tener texto antes y despues del @', 'email'));
        }

        if (dominio.lastIndexOf('.') === -1) {
            rechaza(new ValidacionError('El email debe terminar con un punto seguido de 2 o 3 letras', 'email'));
        }

        let separacionPunto = dominio.split('.');
        console.log(separacionPunto[1].length)

        if (separacionPunto[1].length < 2 || separacionPunto[1].length > 3) {
            rechaza(new ValidacionError('El email debe terminar con un punto seguido de 2 o 3 letras', 'email'));
        }

        resuelve(valor);
    })
}

async function validarFecha(valor) {
    return new Promise((resuelve, rechaza) => {
        if (!valor) {
            rechaza(new ValidacionError('Debes introducir una fecha', 'fechaNacimiento'));
        }

        const nacimiento = new Date(valor);
        const hoy = new Date();

        let edad = hoy.getFullYear() - nacimiento.getFullYear();
        const cumpleEsteAño = new Date(hoy.getFullYear(), nacimiento.getMonth(), nacimiento.getDate()) <= hoy;

        if (!cumpleEsteAño) edad--;

        if (edad < 18 || edad > 24) {
            rechaza(new ValidacionError('Debes tener entre 18 y 24 años', 'fechaNacimiento'));
        }

        resuelve(valor);
    })
}

export { validarLongitud, validarNumero, validarMayuscula, validarMinuscula, validarEmail, validarFecha };

