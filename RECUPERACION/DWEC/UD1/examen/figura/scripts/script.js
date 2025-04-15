'use strict'

function dibujarDiavolo(tamanio) {
    let diavolo = [];

    for (let i = tamanio - 1; i >= 0; i--) {
        let linea = "";
        for (let j = 0; j < tamanio - i - 1; j++) {
            linea += " ";
        }
        for (let k = 0; k < i + 1; k++) {
            linea += "* ";
        }
        diavolo.push(linea);
    }

    for (let i = 1; i < tamanio; i++) {
        let linea = "";
        for (let j = 0; j < tamanio - i - 1; j++) {
            linea += " ";
        }
        for (let k = 0; k < i + 1; k++) {
            linea += "* ";
        }
        diavolo.push(linea);
    }
    return diavolo;
}

// Llamada a la función con el tamaño indicado por parámetro
console.log(dibujarDiavolo(7).join('\n'));