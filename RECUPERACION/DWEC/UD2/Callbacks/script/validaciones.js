import ValidacionError from "./ValidacionError.js";

function validarLongitud(valor, longitud, callback){
    console.log('Validando longitud:', valor);
    if(valor.length < longitud){
        callback(null, new Error('El nombre debe tener al menos 3 caracteres', 'nombre'));
    } else {
        callback(valor, null);
    }
}

function validarNumero(valor, callback){
    let contieneNumero = false;
    for(let caracter of valor){
        if(caracter >= 0 && caracter <= 9){
            contieneNumero = true;
            break;
        }
    }

    if(contieneNumero){
        return callback(null, new ValidacionError('El nombre no debe contener numeros', 'nombre'))
    } else {
        return callback(valor, null)
    }
}

function validarMayuscula(valor, callback){
    let contieneMayuscula = false;
    for(let caracter of valor){
        if(caracter === caracter.toUpperCase()){
            contieneMayuscula = true;
            break;
        }
    }

    if(contieneMayuscula){
        return callback(valor, null)
    } else {
        return callback(null, new ValidacionError('La contraseña debe incluir al menos una mayúscula', 'password'));
    }
}

function validarMinuscula(valor, callback){
    let contieneMinuscula = false;
    for(let caracter of valor){
        if(caracter === caracter.toLowerCase()){
            contieneMinuscula = true;
            break;
        }
    }

    if(contieneMinuscula){
        return callback(valor, null)
    } else {
        return callback(null, new ValidacionError('La contraseña debe incluir al menos una minúscula', 'password'));
    }
}

function validarEmail(valor, callback){
    let arroba = 0;
    for(let caracter of valor){
        if(caracter === '@'){
            arroba++
        }
    }

    if(arroba !== 1){
        return callback(null, new ValidacionError('El email debe contener solo una arroba', 'email'))
    } else {
        return callback(valor,null);
    }
}

function mostrarError(error) {
    alert(error.message);
    document.getElementById(error.campo)?.classList.add('error');
  }
  
  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('btnGuardar');
  
    btn.addEventListener('click', () => {
      const nombre = document.getElementById('nombre').value;
      const password = document.getElementById('password').value;
      const email = document.getElementById('email').value;
  
      document.querySelectorAll('input').forEach(el => el.classList.remove('error'));
  
      validarLongitud(nombre, 3, (val, err) => {
        if (err) return mostrarError(err);
  
        validarNumero(nombre, (val, err) => {
          if (err) return mostrarError(err);
  
          validarMayuscula(password, (val, err) => {
            if (err) return mostrarError(err);
  
            validarMinuscula(password, (val, err) => {
              if (err) return mostrarError(err);
  
              validarEmail(email, (val, err) => {
                if (err) return mostrarError(err);
  
                alert("¡Todo correcto!");
              });
            });
          });
        });
      });
    });
  });