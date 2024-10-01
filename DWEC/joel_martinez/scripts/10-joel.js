// 10-Crea una función que reciba una cadena de texto y que cuente 
// el número de apariciones de cada carácter. Debe devolver un objeto 
// de tipo clave-valor con el resultado.Añade el código auxiliar necesario 
// para probar la aplicación.

'use strict';
function contarCaracteres(cadena){

    let contador={};

    for(let i = 0; i < cadena.length; ++i){

        let caracter = cadena[i];

        if(contador[caracter]){
            ++contador[caracter];
        }else{
            contador[caracter] = 1;
        }
    }

    return contador;
}

let cadena = 'hola mundo';
let resultado = contarCaracteres(cadena);
console.log(resutado);