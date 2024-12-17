import validacionError from "./validacionError";

function validarFormulario(){
    const nombre = document.getElementById('nombre');
    const password = document.getElementById('password');
    const email = document.getElementById('email');
    const fecha = document.getElementById('fecha');

    function validarNombre(valor, callback){
        if(!valor || valor.length < 3 || /[0-9]/.test(nombre)){
            callback(null, new validacionError("El nombre debe contener al menos tres caracteres y no debe tener numeros"))
        } else {
            callback("exito", null);
        }
    }

    validarNombre(nombre,(fnBien, fnMal) =>{
        if(fnBien){
            console.log(bien);
            return;
        }
        if(fnMal){
            console.log("Error");
        }
    })

    
}