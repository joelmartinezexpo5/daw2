//Ejercicio 1. Comprobar anagramas.
'use strict'

function sonAnagramas(palabra1, palabra2) {
    if (palabra1 === palabra2) {
        return false;
    }

    let conteo1 = {};
    let conteo2 = {};

    //Contar letras
    for (let i = 0; palabra1[i] !== undefined; i++) {

        if(conteo1[palabra1[i]] === undefined){
            conteo1[palabra1[i]] = 1;
        }else{
            ++conteo1[palabra1[i]];
        }
    }

    for (let i = 0; palabra2[i] !== undefined; i++) {

        if(conteo2[palabra2[i]] === undefined){
            conteo2[palabra2[i]] = 1;
        }else{
            ++conteo2[palabra2[i]];
        }

        // console.log(conteo1[palabra1[i]]);
        // console.log(conteo2[palabra2[i]]);
    }

    // Comparar los conteos de cada letra
    for (let letra in conteo1) {
        if (conteo1[letra] !== conteo2[letra]) {
            return false
        }
    }
    for (let letra in conteo2) {
        if (conteo2[letra] !== conteo1[letra]) {
            return false
        }
    }

    console.log(conteo1);
    console.log(conteo2);

    return true;
}

console.log(sonAnagramas('ballena','llenaba'));
