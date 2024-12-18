import validacionError from "./validacionError.js";

function validarFormulario(){
    const nombre = document.getElementById('nombre').value;
    const password = document.getElementById('password').value;
    const email = document.getElementById('email').value;
    const fecha = document.getElementById('fecha');

    function validarNombre(valor, callback){
        if(!valor || valor.length < 3 || /[0-9]/.test(valor)){
            return callback(null, new validacionError("El nombre debe contener al menos tres caracteres y no debe tener numeros"))
        } else {
            return callback("exito", null);
        }
    }

    function validarPassword(valor, callback){
        if(!valor || valor.length < 8 || !/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/.test(valor)){
            return callback(null, new validacionError("La contraseña debe incluir al menos una letra mayúscula, una minúscula, un número, y tener una longitud mínima de 8 caracteres."))
        } else {
            return callback("exito", null);
        }
    }

    function validarEmail(valor, callback){
        if(!valor || !/^[^@]+@[^@]+\.[a-zA-Z]{2,3}$/.test(valor)){
            return callback(null, new validacionError("El email debe contener una única @, texto antes y después de la @, y terminar con un punto seguido de 2 o 3 letras."))
        } else {
            return callback("exito", null);
        }
    }

    validarNombre(nombre,(fnBien, fnMal) =>{
        if(fnBien){
            console.log("El nombre es valido: ", fnBien);
        }
        if(fnMal){
            console.log("Error:", fnMal);
        }
    })

    validarPassword(password,(fnBien, fnMal) => {
        if(fnBien){
            console.log("La contraseña es valida: ", fnBien);
        }
        if(fnMal){
            console.log("Error:", fnMal);
        }
    })

    validarEmail(email,(fnBien, fnMal) => {
        if(fnBien){
            console.log("El email es valido: ", fnBien);
        }
        if(fnMal){
            console.log("Error:", fnMal);
        }
    })


    // validarNombre(nombre,(fnBien, fnMal) =>{
    //     if(fnBien){
    //         console.log(bien);
    //         return;
    //     }
    //     if(fnMal){
    //         console.log("Error");
    //     }
    // })

    
}

document.getElementById('guardar').addEventListener('click', validarFormulario);